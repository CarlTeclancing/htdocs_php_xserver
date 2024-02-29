<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    // ABOUT
    public function about()
    {
        return view('site.about');
    }

    // SERVICES
    public function services()
    {
        return view('site.services');
    }

    // REGISTER
    public function register()
    {
        return view('site.register');
    }

    //LOGON
    public function logon()
    {
        return view('site.logon');
    }

    //OTP
    public function otp()
    {
        return view('site.otp');
    }
}
