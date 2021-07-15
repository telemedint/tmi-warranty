<?php

namespace App\Http\Controllers;

use App\Category;
use App\Device;
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
        $devices = Device::paginate(10);
        return view('devices.index', ['devices' => $devices, 'categories', Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create', ['categories' => Category::all()]);
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
    public function show($serial)
    {
        // $barcode = DNS1D::getBarcodePNG($serial, "C128B");
        return view('devices.show', ['serial' => $serial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('devices.create', ['device' => $device, 'categories' => Category::all()]);
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
        $data = $request->only('name', 'full_serial','serial_first','serial_second');
        
        $category_id = Category::where('serial', $request->category_serial)->first()->id;
        $data['category_id'] = $category_id;
        
        if ($request->hasFile('image')) {
            // $image = $request->image->store('imges', 'public');
            $destination_path = public_path('images/devices');
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            File::delete( $destination_path . '/' . $device->image);
            $path = $image->move($destination_path, $image_name);
            
            // Storage::disk('public')->delete($device->image);
            // Storage::delete($destination_path . '/' . $image_name);
            
            $data['image'] = $image_name;
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
        $destination_path = public_path('images/devices');
        // Storage::disk('public')->delete('/images/devices/' . $device->image);
        File::delete( $destination_path . '/' . $device->image);
        $device->delete();
        return redirect(route('devices.index'));
    }
}
