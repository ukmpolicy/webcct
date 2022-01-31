<?php

namespace App\Http\Controllers;

use App\Mail\AcceptData;
use App\Mail\DeacceptData;
use App\Mail\RecheckingData;
use App\Models\Attendee;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Registration;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    private $status = [
        "checking", "deaccepted", "accepted", "rechecked"
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
        $maxPage = $maxPage;
        $data["status"] = $this->status;
        return view("admin.pages.attendee.index", $data);
    }

    public function getRegistrations(Request $request) {
        $registrations = Registration::join("attendees", "attendees.id", "=", "Registrations.attendee_id");

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
                    case 3: $this->rechecking($id); break;
                    default: $changed = false;
                }
                if ($changed) return redirect()->route("registration")->with("success", "Status berhasil diubah");
            }
        }
        return redirect()->route("registration")->with("failed", "Status gagal diubah");
    }

    public function formCompetitionEvent() {
        $data['events'] = Event::where('category_id', 0)->get();
        return view("user.pages.registration.competition", $data);
    }
    
    public function formTalkshowEvent() {
        return view("user.pages.registration.talkshow");
    }

    public function test() {
        $events = [
            "Typing Speed" => 30000,
            "Linux Server" => 40000,
            "Design Poster" => 40000,
        ];
        foreach ($events as $name => $price) {
            if (!Event::where('name', $name)->first()) {
                $event = new Event();
                $event->name = strtolower($name);
                $event->price = $price;
                $event->category_id = 0;
                // $event->start = null;
                $event->limit = 0;
                $event->save();
            }
        }
    }

    public function registerCompetitionEvent(Request $request) {
        $this->test();
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
            "identity" => "required|image",
            "bp" => "required|image",
        ]);

        $attendee = new Attendee();
        
        $file = $request->file("identity");
        if ($file) {
            $filename = time().rand(1111111, 9999999).".".$file->getClientOriginalExtension();
            $dir = "uploads/identity/";
            $file->move($dir, $filename);
            $attendee->identity = $filename;
        }

        $attendee->name = trim(strtolower($request->name));
        $attendee->email = trim(strtolower($request->email));
        $attendee->phone = $request->phone;
        $attendee->birthdate = $request->birthdate;
        $attendee->region = trim(strtolower($request->region));
        $attendee->city = trim(strtolower($request->city));
        $attendee->address = trim(strtolower($request->address));
        $attendee->education = trim(strtolower($request->education));
        $attendee->save();

        $price = 0;        
        $registration = new Registration();

        $file = $request->file("bp");
        if ($file) {
            $filename = time().rand(1111111, 9999999).".".$file->getClientOriginalExtension();
            $dir = "uploads/bp/";
            $file->move($dir, $filename);
            $registration->bp_filename = $filename;
        }

        $registration->attendee_id = $attendee->id;
        $registration->price = $price;
        $registration->save();

        foreach ($request->events as $e_id) {
            $e = Event::find($e_id);
            if ($e) $price += $e->price;

            $ne = new EventRegistration();
            $ne->registration_id = $registration->id;
            $ne->event_id = $e_id;
            $ne->save();
        }
        
        $registration->price = $price;
        $registration->save();

        $data['attendee'] = $attendee;
        return view('user.pages.registration.success', $data);
    }

    public function RegisterTalkshowEvent(Request $request) {
        $this->validate($request, [
            "name" => "required",
            "email" => "requied",
            "phone" => "requied|numeric",
            "birthdate" => "requied",
            "legion" => "requied",
            "city" => "requied",
            "address" => "requied",
            "agency" => "requied",
            "events" => "requied|array",
            "card" => "requied",
            "bs" => "requied",
        ]);

        $attendee = new Attendee();

        $file = $request->file("card");
        if ($file) {
            $filename = time().rand(1111111, 9999999).".".$file->getClientOriginalExtension();
            $dir = "uploads/card/";
            $file->move($dir, $filename);
            $attendee->card = $filename;
        }

        $attendee->name = trim(strtolower($request->name));
        $attendee->email = trim(strtolower($request->email));
        $attendee->phone = $request->phone;
        $attendee->birthdate = $request->birthdate;
        $attendee->legion = trim(strtolower($request->legion));
        $attendee->city = trim(strtolower($request->city));
        $attendee->address = trim(strtolower($request->address));
        $attendee->agency = trim(strtolower($request->birthdate));
        $attendee->save();

        $price = 0;        
        $registration = new Registration();

        $file = $request->file("bs");
        if ($file) {
            $filename = time().rand(1111111, 9999999).".".$file->getClientOriginalExtension();
            $dir = "uploads/bs/";
            $file->move($dir, $filename);
            $registration->bs_filename = $filename;
        }

        $registration->attendee_id = $attendee->id;
        $registration->price = $price;
        $registration->save();

        foreach ($request->events as $e_id) {
            $e = Event::find($e_id);
            if ($e) $price += $e->price;

            $ne = new EventRegistration();
            $ne->registration_id = $registration->id;
            $ne->event_id = $e_id;
            $ne->save();
        }
        
        $registration->price = $price;
        $registration->save();

        return redirect()->route("event")->with("success", "Peserta berhasil didaftarkan");
    }

    public function checking($id) {
        $registration = Registration::find($id);

        if ($registration) {
            $registration->status = 0; // Checking
            $registration->token = '';
            $registration->save();
            return true;
        }
        return false;
    }

    public function accept($id) {
        $registration = Registration::find($id);

        if ($registration) {
            $token = $this->getToken($id);
            $registration->status = 2; // Accepted
            // $registration->token = $token; // Accepted
            $registration->save();
            
            $data["attendee"] = Attendee::find($registration->attendee_id);
            $data["registration"] = $registration;
            $data['events'] = EventRegistration::where('registration_id', $registration->id)
            ->join("events", "events.id", "=", "event_registrations.event_id")->get();
            Mail::to($data['attendee']->email)->send(new AcceptData($data));
            
            return true;
        }
        return false;
    }

    public function deaccept($id) {
        $registration = Registration::find($id);

        if ($registration) {
            $registration->status = 1; // Deaccepted
            $registration->token = '';
            $registration->save();            

            $data["attendee"] = Attendee::find($registration->attendee_id);
            $data["registration"] = $registration;
            $data['events'] = EventRegistration::where('registration_id', $registration->id)
            ->join("events", "events.id", "=", "event_registrations.event_id")->get();
            Mail::to($data['attendee']->email)->send(new DeacceptData($data));

            return true;
        }
        return false;
    }

    public function rechecking($id) {
        $registration = Registration::find($id);

        if ($registration) {
            $registration->status = 3; // Rechecked
            $registration->token = '';
            $registration->save();            

            $data["attendee"] = Attendee::find($registration->attendee_id);
            $data["registration"] = $registration;
            $data['events'] = EventRegistration::where('registration_id', $registration->id)
            ->join("events", "events.id", "=", "event_registrations.event_id")->get();
            Mail::to($data['attendee']->email)->send(new RecheckingData($data));

            return true;
        }
        return false;
    }

    public function getToken(int $id) {
        $token = '';
        $cars = 'A B C D E F G H I J K L M NO P Q R S T U V W X Y Z ab c d e f g h i j k l m n op q r s t u v w x y z 1 2 3 4 5 6 7 8 9 0';
        $cars = explode(' ', $cars);

        for ($i=0; $i<10; $i++) {
            $token .= $cars[rand(0, count($cars) - 1)];
        }
        $token .= $cars[(count($cars)-1)%$id];
        return $token;
    }
}
