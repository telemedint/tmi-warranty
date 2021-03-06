<?php

namespace App\Http\Controllers;

use App\Category;
use App\Device;
use App\Photo;
use App\Client;
use App\Http\Requests\DeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        return view('devices.index', ['devices' => $devices, 'categories', Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create', ['categories' => Category::all(), 'photos'=>Photo::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        $device = $request->all();

        if($request->hasFile('image')){
            // dd($request->image);
            $destination_path = public_path('images/devices');
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            //Storage::disk('public')->put('images/devices/', $image);
            $path = $image->move($destination_path, $image_name);
            $device['image'] = $image_name;

            $photo = new Photo(['name'=> $image_name, 'path'=>$path]);
            $photo->save();
            $device['photo_id']= $photo->id;
        }
        
        $category_id = Category::where('serial', $request->category_serial)->first()->id;
        $device['category_id'] = $category_id;
        
        $device = new Device($device);
        $device->save();

        session()->flash('success', 'device added successfully');
        session()->flash('serial', $device->full_serial);
        return redirect(route('devices.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('devices.create', ['device' => $device, 'categories' => Category::all(), 'photos'=>Photo::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceRequest $request, Device $device)
    {
        $data = $request->all();
        
        $category_id = Category::where('serial', $request->category_serial)->first()->id;
        $data['category_id'] = $category_id;
        $data['image'] = Photo::find($request->photo_id)->name;
        
        if ($request->hasFile('image')) {
            // $image = $request->image->store('imges', 'public');
            $destination_path = public_path('images/devices');
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $image->move($destination_path, $image_name);
            $data['image'] = $image_name;

            $photo = new Photo(['name'=> $image_name, 'path'=>$path]);
            $photo->save();
            $data['photo_id']= $photo->id;
        }
        
        $device->update($data);
        session()->flash('success', 'Device has been updated successfully');
        return redirect(route('devices.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        // Storage::disk('public')->delete('/images/devices/' . $device->image);
        $device->delete();
        return redirect(route('devices.index'));
    }

    public function getDevicePhoto(Request $request)
    {
        // $device_photo = Photo::where('id',$request->photo_id)->first();
        $device_photo = Photo::find($request->photo_id);
        return response()->json(['device_photo'=>asset('public/images/devices/'. $device_photo->name)]);
    }

    public function getInvoiceInfo(Request $request)
    {
        
        $id = $request->id;
        $device = Device::find($id);
        $invoice = $device->invoice;
        if($invoice == null){
            return null;
        }
        $client = Client::find($invoice->client_id);
        $device_name = $device->name;
        $not_available = __('translation.not_available');
        return response()->json(['invoice'=>$invoice, 'client'=>$client, 'device_name'=>$device_name, 'not_available'=>$not_available]);
    }
}
