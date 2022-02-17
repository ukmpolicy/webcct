<?php

namespace App\Http\Controllers;

use App\Mail\AcceptData;
use App\Mail\DeacceptData;
use App\Mail\RecheckingData;
use App\Models\Attendee;
use App\Models\CompetitionRegistration;
use App\Models\CRAttachment;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Registration;
use App\Models\Setting;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;

class CompetitionRegistrationController extends Controller
{
    private $status = [
        "checking", "deaccepted", "accepted"
    ];

    public static $events = [
        [
            "name" => "Typing Speed",
            "price" => 30000
        ],
        [
            "name" => "Design Poster",
            "price" => 40000
        ],
        [
            "name" => "Linux Server",
            "price" => 40000
        ],
    ];

    public function index(Request $request) {
        $registrations = $this->getRegistrations($request);
        $page = 1;
        $perPage = 10;
        $maxPage = ceil($registrations->count()/$perPage);
        
        if (is_numeric($request->page)) {
            $page = $request->page;
        }

        $data["competitions"] = self::$events;
        $data["registrations"] = $registrations;
        $data["page"] = $page;
        $data["perPage"] = $perPage;
        $data["maxPage"] = $maxPage;
        $data["status"] = $this->status;
        return view("admin.pages.attendee.index", $data);
    }

    public function formRegistration() {
        $data['events'] = self::$events;
        $terms = Setting::where('key', 'terms_competition')->first();
        $data["terms"] = ($terms) ? $terms->value : '';
        return view("user.pages.registration.competition", $data);
    }

    public function getRegistrations(Request $request) {
        $registrations = CompetitionRegistration::select("*");

        if ($request->status) {
            $status = '';
            foreach ($this->status as $k => $v) if (strtolower($request->status) == $v) $status = $k;
            $registrations = $registrations->where('status', $status);
        }

        if ($request->search) {
            $s = $request->search;
            $registrations = $registrations->where('name', 'like', '%'.$s.'%')->orWhere('email', 'like', '%'.$s.'%')
            ->orWhere('phone', 'like', '%'.$s.'%')->orWhere('address', 'like', '%'.$s.'%')->orWhere('email', 'city', '%'.$s.'%')->orWhere('region', 'like', '%'.$s.'%')->orWhere('education', 'like', '%'.$s.'%');
        }

        return $registrations->get();
    }

    public function changeStatus(Request $request, $id) {
        if ($request->has("status")) {
            if (is_numeric($request->status)) {
                $changed = true;
                switch ($request->status) {
                    case 0: $this->checking($id); break;
                    case 1: $this->deaccept($id); break;
                    case 2: $this->accept($id); break;
                    default: $changed = false;
                }
                if ($changed) return redirect()->route("competition")->with("success", "Status berhasil diubah");
            }
        }
        return redirect()->route("competition")->with("failed", "Status gagal diubah");
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
            "education" => "required",
            "events" => "required|array",
            "terms" => "accepted",

            // Attachments
            "identity" => "required|image",
            "bp" => "required|image",
        ]);

        $price = 0;
        foreach ($request->events as $i) $price += self::$events[$i]["price"];

        $registration = new CompetitionRegistration();
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->phone = $request->phone;
        $registration->birthdate = $request->birthdate;
        $registration->region = $request->region;
        $registration->city = $request->city;
        $registration->address = $request->address;
        $registration->education = $request->education;
        $registration->competitions = json_encode($request->events);
        $registration->price = $price;
        $registration->save();

        $this->attachment($request, $registration->id, "identity");
        $this->attachment($request, $registration->id, "bp");

        return view('user.pages.registration.success', ["attendee" => $registration]);
    }

    public function attachment(Request $request, int $id, string $key) {
        $file = $request->file($key);
        if ($file) {
            $filename = time().rand(1111111, 9999999).".".$file->getClientOriginalExtension();
            $dir = "uploads/attachments/";
            $file->move($dir, $filename);

            $attachment = new CRAttachment();
            $attachment->cr_id = $id;
            $attachment->key = $key;
            $attachment->filename = $filename;
            $attachment->save();
        }
    }

    public function checking($id) {
        $registration = CompetitionRegistration::find($id);

        if ($registration) {
            $registration->status = 0; // Checking
            $registration->save();
            return redirect()->route('competition')->with('success', 'Status berhasil diubah');
        }
        return redirect()->route('competition')->with('failed', 'Status gagal diubah');
    }

    public function deaccept($id) {
        $registration = CompetitionRegistration::find($id);

        if ($registration) {
            $registration->status = 1; // Deaccepted
            $registration->save();            

            Mail::to($registration->email)->send(new AcceptData(["registration" => $registration]));

            return redirect()->route('competition')->with('success', 'Status berhasil diubah');
        }
        return redirect()->route('competition')->with('failed', 'Status gagal diubah');
    }

    public function accept($id) {
        $registration = CompetitionRegistration::find($id);

        if ($registration) {
            $registration->status = 2; // Accepted
            $registration->save();
            Mail::to($registration->email)->send(new AcceptData(["registration" => $registration]));
            
            return redirect()->route('competition')->with('success', 'Status berhasil diubah');
        }
        return redirect()->route('competition')->with('failed', 'Status gagal diubah');
    }
}
