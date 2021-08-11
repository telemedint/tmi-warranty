<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Device;
use App\Invoice;
use App\Ticket;
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
        $clients_num = Client::all()->count();
        $categories_num = Category::all()->count();
        $devices_num = Device::all()->count();
        $invoices_num = Invoice::all()->count();
        $tickets_num = Ticket::all()->count();
        return view('home',
            ['clients_num'=>$clients_num,
             'categories_num'=>$categories_num,
             'categories_num'=>$categories_num,
             'devices_num'=>$devices_num,
             'invoices_num'=>$invoices_num,
             'tickets_num'=>$tickets_num,
            ]);
    }

    public function checkSerial()
    {
        return view('frontend.check');
    }

    public function deviceDetails(Request $request)
    {
        $serial = $request->serial;
        $device = Device::where('full_serial', $serial)->first();
        if($device){
            $invoice = $device->invoice;
            if($invoice){
                return view('frontend.device')->with('invoice', $invoice);
            }else{
                session()->flash('error',"This device dosen't have an invoice");
                return redirect(route('main-page'));    
            }
        }else{
            session()->flash('error',"Couldn 't find the device. Please enter another serial ");
            return redirect(route('main-page'));
        }
        
    }

    public function requestMaintenance($device_id)
    {
        $device = Device::find($device_id);
        return view('frontend.request')->with('device', $device);
    }

    public function requestSent(Request $request)
    {
        $ticket = $request->all();
        $ticket = new Ticket($ticket);
        $ticket->save();
        return view('frontend.sent',['ticket'=> $ticket]);
    }

    public function upgradeLicense($device_id)
    {
        $device = Device::find($device_id);
        return view('frontend.upgrade')->with('device', $device);
    }

     public function payment($device_id)
    {
        $device = Device::find($device_id);
        return view('frontend.payment')->with('device', $device);
    }

    public function upgradedLicense()
    {
        return view('frontend.upgraded');
    }
}
