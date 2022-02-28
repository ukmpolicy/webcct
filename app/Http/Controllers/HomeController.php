<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\TalkshowRegistration;
use App\Notifications\TesNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    
    public function index()
    {
        // Mail::to('zulfahmineo@gmail.com')->send(new TestMail());
        // $user = TalkshowRegistration::where('email', 'zulfahmineo@gmail.com')->first();

        // if ($user) {
        //     $user->notify(new TesNotif());
        // }

        // dd('success');


        return view('user.pages.home.index');
    }
}
