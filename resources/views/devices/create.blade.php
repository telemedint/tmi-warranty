@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >
                    <h1>
                        {{isset($device) ? __('translation.update_device'):__('translation.new_device')}}
                    </h1>
                </div>

                <div class="card-body">
                    <form action="{{isset($device) ? route('devices.update', $device->id) : route('devices.store')}}" 
                        method="POST" enctype="multipart/form-data" style="display: grid">
                    @csrf
                    @isset($device)
                        @method('PUT')
                    @endisset

                        {{-- Device Name --}}
                        <div class="form-group">
                            <label for="name" class="text-monospace" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right;" @endif>
                                <h5 style="font-weight: bold"> {{__('translation.name')}}:</h5>
                            </label>

                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                @isset($device)
                                    value="{{$device->name}}"
                                @endisset

                                @if(app()->getLocale() == 'ar')
                                    dir="rtl" style= "float: right;"
                                    placeholder= "أدخل اسم الجهاز"
                                @else
                                    placeholder="Enter Device Name"
                                @endif>
                        </div>

                        {{-- Category --}}
<<<<<<< HEAD
                        <div class="form-group" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right;" @endif>
                            <label for="category_serial" class="mt-4 text-monospace" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif>
                                <h5 style="font-weight: bold">{{__('translation.category')}}:</h5>
                            </label>

                            <select  id="category"  name="category_serial" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif>
                                <option disabled selected value> -- select a Categroy -- </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->serial}}" class="form-control custom-select"
=======
                        <div class="form-group mt-5">
                            <label for="category_id" class="mt-4 text-monospace" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif>
                                <h5 style="font-weight: bold">{{__('translation.category')}}:</h5>
                            </label>

                            <select  id="category"  name="category_id" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif>
                                <option disabled selected value> -- select a Categroy -- </option>
                                @foreach($categories as $category)
 
                                    <option value="{{$category->id}}" class="form-control custom-select"
>>>>>>> 8e24643bdb4fe5493e374ef05af1a9947ec7d05d
                                        @isset($device) 
                                            @if ($category->id == $device->category_id) selected @endif 
                                        @endisset>
                                            {{$category->name}}
<<<<<<< HEAD
=======
 
>>>>>>> 8e24643bdb4fe5493e374ef05af1a9947ec7d05d
                                    </option>
                                @endforeach
                            </select>
                        </div>
<<<<<<< HEAD
                        
=======

>>>>>>> 8e24643bdb4fe5493e374ef05af1a9947ec7d05d
                        {{-- Serial --}}
                        <div class="form-group">
                            <label for="serial" class="text-monospace" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif>
                                <h5 style="font-weight: bold">{{__('translation.serial')}}:</h5>
                            </label>

                            <div class="serial" style="display: flex;">
                                {{-- Category Serial --}}
                                <input type="text" id= "category_serial" name="category_serial" readonly class="form-control" style="width: 25%; margin: 1%; text-align: center;" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif
                                    @isset($device)
                                        value="{{$device->category->serial}}"
                                    @endisset>

                                {{-- Second Serial --}}
                                <input type="text" name="serial_second" id="serial_second" style="width: 35%; margin: 1%; text-align: center;"
                                class="form-control @error('serial_second') is-invalid @enderror"
                                @if(app()->getLocale() == 'ar')
                                    dir="rtl" style= "float: right;"
                                    placeholder= "الرقم التسلسلي الثاني"
                                @else
                                    placeholder="Enter second serial number"
                                @endif

                                @isset($device)
                                    value="{{$device->serial}}"
                                @endisset>

                                {{-- First Serial --}}
                                <input type="text" name="serial_first" id="serial_first" style="width: 35%; margin: 1%; text-align: center;"
                                    class="form-control @error('serial_first') is-invalid @enderror"
                                    @if(app()->getLocale() == 'ar')
                                        dir="rtl" style= "float: right;"
                                        placeholder= "أدخل الرقم التسلسلي الأول"
                                    @else
                                        placeholder="Enter first serial number"
                                    @endif

                                    @isset($device)
                                        value="{{$device->serial}}"
                                    @endisset>
                            </div>

                            {{-- Full Serial --}}
                            <input type="text" id= "full_serial" name="full_serial" readonly class="form-control" 
                            style="width: 50%; margin: 10%; text-align: center;"  @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif
                                    @isset($device)
                                        value="{{$device->serial}}"
                                    @endisset>
                        </div>
<<<<<<< HEAD
=======
 
                        @isset($device)
                            <div class="form-group">
                                <img src="{{asset('storage/'. $device->image)}}" alt="image" style="width: 100%">
                            </div>    
                        @endisset 
>>>>>>> 8e24643bdb4fe5493e374ef05af1a9947ec7d05d

                        {{-- Image --}}
                        @isset($device)
                            <div class="form-group" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right;" @endif>
                                <img src="{{asset('storage/'. $device->image)}}" alt="image" style="width: 100%">
                            </div>    
                        @endisset

                        <div class="form-group mt-4" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif>
                            <label for="image" class="mt-3 text-monospace">
                                <h5 style="font-weight: bold">{{__('translation.image')}}:</h5>
                            </label>
                            <input type="file" name="image" class="form-control"
                            @isset($device)value="{{$device->image}}" @endisset>
                        </div>
                            
                        
                        
                        {{-- Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="form-group mt-4" @if(app()->getLocale() == 'ar') dir="rtl" @endif>
                            <button type="submit" class="btn btn-success add mt-4"
                            @if(app()->getLocale() == 'ar') 
                                dir="rtl" style= "float: left;" 
                            @else
                                style= "float: right;" 
                            @endif>
                                {{isset($device) ? __('translation.update'):__('translation.submit')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection

=======
@endsection 
>>>>>>> 8e24643bdb4fe5493e374ef05af1a9947ec7d05d
@section('script')

<script src="{{ asset('js/devices.js') }}"></script>

<<<<<<< HEAD
@endsection
=======
@endsection 
>>>>>>> 8e24643bdb4fe5493e374ef05af1a9947ec7d05d
