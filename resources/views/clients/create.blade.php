@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{isset($client)? __('translation.update_client') :__('translation.new_client')}}</h1></div>

                <div class="card-body">
                    <form action="{{isset($client) ? 
                        route('clients.update', $client->id) : route('clients.store')}}" 
                        method="POST">
                    @csrf
                    @isset($client)
                        @method('PUT')
                    @endif
                        <div class="form-group">
                            <label for="name" class="text-monospace" is><h5>{{__('translation.name')}}:</h5></label>
                            
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            @if(app()->getLocale() == 'ar') placeholder= "أدخل اسم العميل" @else placeholder="Enter Client's Name"  @endif
                            @isset($client) value="{{$client->name}}" @endisset>

                            {{-- Company --}}
                            <label for="company" class="mt-3 text-monospace"><h5>{{__('translation.company')}}:</h5></label>
                            
                            <input type="text" name="company" class="form-control"
                            @if(app()->getLocale() == 'ar') placeholder= "أدخل اسم الشركة" @else placeholder="Enter company name" @endif
                            @isset($client) value="{{$client->company}}" @endisset>

                            {{-- Email --}}
                            <label for="email" class="mt-3 text-monospace"><h5>{{__('translation.email')}}:</h5></label>
                            
                            <input type="text" name="email"  class="form-control"
                            @if(app()->getLocale() == 'ar') placeholder= "أدخل الإيميل" @else placeholder="Enter email address"  @endif
                            @isset($client) value="{{$client->email}}" @endisset>

                            {{-- Phone --}}
                            <label for="phone" class="mt-3 text-monospace"><h5>{{__('translation.phone')}}:</h5></label>
                            
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            @if(app()->getLocale() == 'ar') placeholder= "أدخل رقم الهاتف" @else placeholder="Enter phone number"  @endif
                            @isset($client) value="{{$client->phone}}" @endisset>

                            {{-- Address --}}
                            <label for="address" class="mt-3 text-monospace"><h5>{{__('translation.address')}}:</h5></label>
                            
                            <input type="text" name="address" class="form-control"
                            @if(app()->getLocale() == 'ar') placeholder= "أدخل العنوان" @else placeholder="Enter address" @endif
                            @isset($client) value="{{$client->address}}" @endisset>

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

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-4 submit_btn">
                                {{isset($client) ? __('translation.update'):__('translation.add')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection