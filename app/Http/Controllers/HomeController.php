<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function checkSerial()
    {
        return view('frontend.check');
    }

    public function deviceDetails()
    {
        return view('frontend.device');
    }

    public function requestMaintenance()
    {
        return view('frontend.request');
    }

    public function requestSent()
    {
        return view('frontend.sent');
    }

    public function upgradeLicense()
    {
        return view('frontend.upgrade');
    }

     public function payment()
    {
        return view('frontend.payment');
    }

    public function upgradedLicense()
    {
        return view('frontend.upgraded');
    }
}
