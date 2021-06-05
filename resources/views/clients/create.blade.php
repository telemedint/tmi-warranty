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
                            <input type="text" name="name" placeholder="Enter Client's Name" 
                            class="form-control @error('name') is-invalid @enderror"
                            @isset($client)
                                value="{{$client->name}}"
                            @endisset>

                            <label for="company" class="mt-3 text-monospace"><h5>{{__('translation.company')}}:</h5></label>
                            <input type="text" name="company" placeholder="Enter company name" class="form-control"
                            @isset($client)
                                value="{{$client->company}}"
                            @endisset>

                            <label for="email" class="mt-3 text-monospace"><h5>{{__('translation.email')}}:</h5></label>
                            <input type="text" name="email" placeholder="Enter email address" class="form-control"
                            @isset($client)
                                value="{{$client->email}}"
                            @endisset>

                            <label for="phone" class="mt-3 text-monospace"><h5>{{__('translation.phone')}}:</h5></label>
                            <input type="text" name="phone" placeholder="Enter phone number" 
                            class="form-control @error('phone') is-invalid @enderror"
                            @isset($client)
                                value="{{$client->phone}}"
                            @endisset>

                            <label for="address" class="mt-3 text-monospace"><h5>{{__('translation.address')}}:</h5></label>
                            <input type="text" name="address" placeholder="Enter home address" class="form-control"
                            @isset($client)
                                value="{{$client->address}}"
                            @endisset>

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
                            <button type="submit" class="btn btn-success mt-4 float-right">{{isset($client) ? 'Update':'Submit'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection