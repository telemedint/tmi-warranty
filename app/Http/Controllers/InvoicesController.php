<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Device;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Javascript;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::paginate(10);
        return view('invoices.index', ['invoices' => $invoices, 'clients', Client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('invoices.create', ['clients' => Client::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = Invoice::create([
            'client_id' => $request->client_id,
            'device_serial' => $request->device_serial,
            'purchase_date' => $request->purchase_date,
            'technical_support' => $request->technical_support,
            'repairing_service' => $request->repairing_service,
            'premium_support' => $request->premium_support,
            //'client_id' => Client::where('name', $request->client_name)->first()->id,
        ]);

        session()->flash('success', 'Invoice added successfully');
        return redirect(route('invoices.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.create', ['invoice' => $invoice, 'clients' => Client::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $data = $request->only('client_id', 'device_serial','purchase_date',
        'technical_support', 'repairing_service','premium_support');
        
        // $device_id = Device::where('full_serial', $request->device_serial)->first()->id;
        // $data['device_id'] = $device_id;

      

        $invoice->update($data);
        session()->flash('success', 'Invoice has been updated successfully');
        return redirect(route('invoices.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect(route('invoices.index'));
    }

    public function getSerialInfo(Request $request)
    {
        
        $serial = $request->serial;
        $device = Device::where('full_serial',$serial)->first();
        $device_name = $device->name;
        $device_image = $device->image;

        return response()->json(['device_name'=>$device_name, 'device_image'=>asset('storage/'. $device_image)]);
    }
}
