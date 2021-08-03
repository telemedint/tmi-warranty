<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\File;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::paginate(10);
        return view('photos.index', ['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->all();
        
        $destination_path = public_path('images/devices');
        $image = $request->file('image');
        $extension = $image->extension();
        $name = $request->name . '.' . $extension;
        $photo['name'] = $name;
        // $name = $image->getClientOriginalName();
        $path = $image->move($destination_path, $name);
        $photo['path'] = $path;
        
        
        $photo = new Photo($photo);
        $photo->save();
        return redirect(route('photos.index'));
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
    public function edit(Photo $photo)
    {
        return view('photos.create', ['photo' => $photo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $destination_path = public_path('images/devices');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            File::delete( $photo->path);
            $photo->path = $image->move($destination_path, $image_name);
        }else{
            $photo->name = $request->name;
            $new_path = $destination_path . '/' . $photo->name;
            File::move( $photo->path, $new_path);
            $photo->path = $new_path;
        }
        
        $photo->update();
        session()->flash('success', 'Photo has been updated successfully');
        return redirect(route('photos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $destination_path = public_path('images/devices');
        File::delete( $destination_path . '/' . $photo->name);
        $photo->delete();
        return redirect(route('photos.index'));
    }
}
