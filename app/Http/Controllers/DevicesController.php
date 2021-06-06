<?php

namespace App\Http\Controllers;

use App\Category;
use App\Device;
use App\Http\Requests\DeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $devices = DB::table('devices')->paginate(10);
        return view('devices.index', ['devices' => $devices, 'categories', Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        
        $device = Device::create([
            'name'=>$request->name,
            'serial'=>$request->serial,
            'image'=>$request->image->store('imges','public'),
            'category_id'=>$request->category_id,
        ]);
        
        session()->flash('success','device added successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('devices.create',['device'=>$device,'categories'=>Category::all()]);
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
        $data = $request->only('name','seial','category_id');
        if($request->hasFile('image')){
            $image = $request->image->store('imges','public');
            Storage::disk('public')->delete($device->image);
            $data['image'] = $image;
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
        $device->delete();
        return redirect(route('devices.index'));
    }
}
