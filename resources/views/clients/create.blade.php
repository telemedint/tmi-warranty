@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('css/phone_valid.css')}}">
@endsection
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
                            placeholder= "{{__('translation.client_placeholder')}}"
                            @isset($client) value="{{$client->name}}" @endisset>

                            {{-- Company --}}
                            <label for="company" class="mt-3 text-monospace"><h5>{{__('translation.company')}}:</h5></label>
                            
                            <input type="text" name="company" class="form-control"
                            placeholder= "{{__('translation.company_placeholder')}}"
                            @isset($client) value="{{$client->company}}" @endisset>

                            {{-- Email --}}
                            <label for="email" class="mt-3 text-monospace"><h5>{{__('translation.email')}}:</h5></label>
                            
                            <input type="email" name="email"  class="form-control" placeholder= "{{__('translation.email_placeholder')}}"
                            @isset($client) value="{{$client->email}}" @endisset>

                            {{-- Phone --}}
                            <label for="phone" class="mt-3 text-monospace"><h5>{{__('translation.phone')}}:</h5></label>
                            
                            <div class="phone_div" style="display: flex;">
                                <input type="tel" pattern="[01]{2}[0-9]{9}" maxlength="11" name="phone" title="{{__('translation.phone_valid')}}"
                                class="form-control @error('phone') is-invalid @enderror" placeholder= "{{__('translation.phone_placeholder')}}"
                                @isset($client) value="{{$client->phone}}" @endisset>
                                
                                <span class="validity mx-2"></span>
                            </div>

                            {{-- Address --}}
                            <label for="address" class="mt-3 text-monospace"><h5>{{__('translation.address')}}:</h5></label>
                            
                            <input type="text" name="address" class="form-control" placeholder= "{{__('translation.address_placeholder')}}"
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