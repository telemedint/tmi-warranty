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
                        <div class="form-group" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right;" @endif>
                            <label for="category_serial" class="mt-4 text-monospace" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif>
                                <h5 style="font-weight: bold">{{__('translation.category')}}:</h5>
                            </label>

                            <select  id="category"  name="category_serial" @if(app()->getLocale() == 'ar') dir="rtl" style= "float: right; text-align: right" @endif>
                                <option disabled selected value> -- select a Categroy -- </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->serial}}" class="form-control custom-select"
                                        @isset($device) 
                                            @if ($category->id == $device->category_id) selected @endif 
                                        @endisset>
                                            {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- Serial --}}
                        <div class="form-group">
                            <label for="serial" class="text-monospace">
                                <h5 style="font-weight: bold">{{__('translation.serial')}}:</h5>
                            </label>

                            <div class="serial" style="display: flex;" id="serial">
                                {{-- Category Serial --}}
                                <input type="text" id= "category_serial" name="category_serial" readonly 
                                class="form-control" style="width: 25%; margin: 1%; text-align: center;"
                                    @isset($device)
                                        value="{{$device->category->serial}}"
                                    @endisset>

                                {{-- Second Serial --}}
                                <input type="text" name="serial_second" id="serial_second" style="width: 35%; margin: 1%; text-align: center;"
                                class="form-control @error('serial_second') is-invalid @enderror"
                                @if(app()->getLocale() == 'ar')
                                    placeholder= "الرقم التسلسلي الثاني"
                                @else
                                    placeholder="Enter second serial number"
                                @endif

                                @isset($device) value="{{$device->serial_second}}" @endisset>

                                {{-- First Serial --}}
                                <input type="text" name="serial_first" id="serial_first" style="width: 35%; margin: 1%; text-align: center;"
                                    class="form-control @error('serial_first') is-invalid @enderror"
                                    @if(app()->getLocale() == 'ar')
                                        placeholder= "أدخل الرقم التسلسلي الأول"
                                    @else
                                        placeholder="Enter first serial number"
                                    @endif

                                    @isset($device) value="{{$device->serial_first}}" @endisset>
                            </div>

                            {{-- Full Serial --}}
                            <input type="text" id= "full_serial" name="full_serial" readonly class="form-control" 
                            style="width: 50%; margin: 10%; text-align: center;"
                            @isset($device)value="{{$device->full_serial}}" @endisset>
                        </div>

                        {{-- Image --}}
                        @isset($device)
                            <div class="form-group">
                                <img src="{{asset('storage/'. $device->image)}}" alt="image" style="width: 100%">
                            </div>    
                        @endisset

                        <div class="form-group mt-4">
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

                        {{-- Button --}}
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success submit_btn mt-4">
                                {{isset($device) ? __('translation.update'):__('translation.submit')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script src="{{ asset('js/devices.js') }}"></script>

@endsection