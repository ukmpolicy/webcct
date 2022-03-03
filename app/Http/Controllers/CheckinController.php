<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\TalkshowCheckin;
use App\Models\TalkshowRegistration;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index() {

        $open = false;

        $open = $this->getStatus();
        if ($open) {
            $level = Setting::where('key', 'talkshow_checkin_level')->first();
            if ($level) {
                $data['checkInLevel'] = $level;
            }
        }

        $data['open'] = $open;
        return view('user.pages.checkin.index', $data);
    }

    private function getStatus() {
        $setting = Setting::where('key', 'talkshow_checkin_status')->first();
        if ($setting) { 
            return ($setting->value == 1) ? true : false;
        }
        return false;
    }

    public function checkIn(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'serial_number' => 'required',
        ]);

        if ($this->getStatus()) {

            $attendee = TalkshowRegistration::where('email', $request->email)->where('serial_number', $request->serial_number)->first();
            if ($attendee) {
                $tc = TalkshowCheckin::where('attendee_id', $attendee->id)->first();
                if ($tc) {
                    $level = Setting::where('key', 'talkshow_checkin_level')->first();
                    if ($tc->count <= $level->value) {
                        $tc->count = (int)$tc->count + 1;
                    }else {
                        return view('user.pages.checkin.failed', ['message' => 'Maaf, Anda sudah melakukan checkin']);
                    }
                }else {
                    $tc = new TalkshowCheckin();
                    $tc->attendee_id = $attendee->id;
                    $tc->count = 1;
                }
                $tc->save();
                return view('user.pages.checkin.success', ['attendee' => $attendee, 'count' => $tc->count]);
            }
            return view('user.pages.checkin.failed', ['message'=> 'Maaf, Anda tidak terdaftar sebagai peserta talkshow']);
        }
        return redirect()->route('checkin');
    }
}
