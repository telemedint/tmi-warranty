<?php

namespace App\Http\Controllers;

use App\Device;
use App\Invoice;
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

    public function deviceDetails(Request $request)
    {
        $serial = $request->serial;
        $invoice = Invoice::where('device_serial', $serial)->first();
        return view('frontend.device')->with('invoice', $invoice);
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
