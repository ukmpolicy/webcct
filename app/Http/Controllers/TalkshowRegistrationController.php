<?php

namespace App\Http\Controllers;

use App\Exports\PTExport;
use App\Mail\AcceptData;
use App\Mail\DeacceptData;
use App\Mail\RecheckingData;
use App\Mail\TalkshowAccept;
use App\Models\Attendee;
use App\Models\CompetitionRegistration;
use App\Models\CRAttachment;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Registration;
use App\Models\Setting;
use App\Models\TalkshowRegistration;
use App\Models\TRAttachment;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class TalkshowRegistrationController extends Controller
{
    
    private $status = ['offline', 'online'];
    private $data = [
        "birthdate", "region", "city", "address", "institution", "profession"
    ];

    public function index(Request $request) {
        $registrations = $this->getRegistrations($request);
        $page = 1;
        $perPage = 10;
        $maxPage = ceil($registrations->count()/$perPage);
        
        if (is_numeric($request->page)) {
            $page = $request->page;
        }

        $data["registrations"] = $registrations;
        $data["page"] = $page;
        $data["perPage"] = $perPage;
        $data["maxPage"] = $maxPage;
        $data["status"] = $this->status;
        return view("admin.pages.attendee_talkshow.index", $data);
    }

    public function getRegistrations(Request $request) {
        $registrations = TalkshowRegistration::select("*");

        if ($request->status) {
            $status = '';
            foreach ($this->status as $k => $v) if (strtolower($request->status) == $v) $status = $k;
            $registrations = $registrations->where('status', $status);
        }

        if ($request->search) {
            $s = $request->search;
            $registrations = $registrations->where('name', 'like', '%$'.$s.'$%')->orWhere('email', 'like', '%$'.$s.'$%')->orWhere('phone', 'like', '%$'.$s.'$%')->orWhere('data', 'like', '%'.$s.'%');
        }

        return $registrations->get();
    }

    public function formRegistration() {
        $terms = Setting::where('key', 'terms_talkshow')->first();
        $data["terms"] = ($terms) ? $terms->value : '';
        
        $expired = false;

        $closingTime = Setting::where('key', 'talkshow_closing_registration')->first();
        if ($closingTime) $expired = (time() > strtotime($closingTime->value));

        $statusReg = Setting::where('key', 'talkshow_status_registration')->first();
        if ($statusReg) $expired = ($statusReg->value == 0);

        $data["expired"] = $expired;

        return view("user.pages.registration.talkshow", $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "phone" => "required|numeric",
            "birthdate" => "required",
            "region" => "required",
            "city" => "required",
            "address" => "required",
            "institution" => "required",
            "profession" => "required",
            "status" => "required",
            "terms" => "accepted",

            // Attachments
            "bs" => "required|image",
            "bp" => ["image", Rule::requiredIf(function() use ($request) {
                return (int) $request->status == 0;
            })],
        ]);

        $data = $request->only($this->data);
        $serial_number = time().TalkshowRegistration::count().rand(11111,99999);

        $registration = new TalkshowRegistration();
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->phone = $request->phone;
        $registration->serial_number = $serial_number;
        $registration->data = strtolower(json_encode($data));
        $registration->status = $request->status;
        $registration->save();

        $this->attachment($request, $registration->id, "bs");
        $this->attachment($request, $registration->id, "bp");

        Mail::to($registration->email)->send(new TalkshowAccept(["registration" => $registration]));

        return view('user.pages.registration.success', ["attendee" => $registration]);
    }

    public function export() {
        return Excel::download(new PTExport, 'peserta_talkshow.xlsx');redirect()->back();
    }

    public function attachment(Request $request, int $id, string $key) {
        $file = $request->file($key);
        if ($file) {
            $filename = time().rand(1111111, 9999999).".".$file->getClientOriginalExtension();
            $dir = "uploads/attachments/";
            $file->move($dir, $filename);

            $attachment = new TRAttachment();
            $attachment->tr_id = $id;
            $attachment->key = $key;
            $attachment->filename = $filename;
            $attachment->save();
        }
    }

}
