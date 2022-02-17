<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    
    public function index()
    {
        // Mail::to('zulfahmineo@gmail.com')->send(new TestMail());

        return view('user.pages.home.index');
    }
}
