<?php

namespace App\Http\Controllers;

use App\Exports\DataPeserta;
use App\Mail\TestMail;
use App\Models\TalkshowRegistration;
use App\Notifications\TesNotif;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    
    public function index()
    {
        return Excel::download(new DataPeserta(), 'peserta_talkshow.xlsx');
        // Mail::to('zulfahmineo@gmail.com')->send(new TestMail());
        // $user = TalkshowRegistration::where('email', 'zulfahmineo@gmail.com')->first();

        // if ($user) {
        //     $user->notify(new TesNotif());
        // }

        // dd('success');


        // return view('user.pages.home.index');
    }

    public function tesPost() {
        return response()->json(['message' => 'Success', 'body' => null]);
    }
}
