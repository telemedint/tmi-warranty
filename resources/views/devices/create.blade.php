@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{isset($device) ? __('translation.update_device'):__('translation.new_device')}}</h1></div>

                <div class="card-body">
                    <form action="{{isset($device) ? route('devices.update', $device->id) : route('devices.store')}}" 
                        method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($device)
                        @method('PUT')
                    @endisset
                        <div class="form-group">
                            <label for="name" class="text-monospace"><h5>{{__('translation.name')}}:</h5></label>
                            <input type="text" name="name" placeholder="Enter Device Name" 
                            class="form-control @error('name') is-invalid @enderror"
                            @isset($device)
                                value="{{$device->name}}"
                            @endisset>
                        </div>

                        <div class="form-group">
                            <label for="serial" class="mt-3 text-monospace"><h5>{{__('translation.serial')}}:</h5></label>
                            <input type="text" name="serial" placeholder="Enter serial number" 
                            class="form-control @error('serial') is-invalid @enderror"
                            @isset($device)
                                value="{{$device->serial}}"
                            @endisset>
                        </div>

                        <div class="form-group">
                            <img src="{{asset('storage/'. $device->image)}}" alt="image" style="width: 100%">
                        </div>

                        <div class="form-group">
                            <label for="image" class="mt-3 text-monospace"><h5>{{__('translation.image')}}:</h5></label>
                            <input type="file" name="image" class="form-control"
                            @isset($device)value="{{$device->image}}" @endisset>
                        </div>
                            
                        <div class="form-group">
                            <label for="category_id" class="mt-4 text-monospace"><h5>{{__('translation.category')}}y:</h5></label>
                            <select  name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" class="form-control custom-select">{{$category->name}}</option>
                                @endforeach
                                 {{-- @isset($device)
                                            @if ($category->id == $device->category_id) selected @endif
                                        @endisset --}}
                            </select>
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-4 float-right">{{isset($device) ? 'Update':'Submit'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection