@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="card text-blue bg-info">
                                <div class="card-header">Devices</div>
                                <div class="card-body">{{$devices_num}}</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-blue bg-light">
                                <div class="card-header">Categories</div>
                                <div class="card-body">{{$categories_num}}</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-blue bg-secondary">
                                <div class="card-header">Clients</div>
                                <div class="card-body">{{$clients_num}}</div>
                            </div>
                        </div>
        
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-md-6">
                            <div class="card text-blue bg-success">
                                <div class="card-header">Invoices</div>
                                <div class="card-body">{{$invoices_num}}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card text-blue bg-danger">
                                <div class="card-header">Tickets</div>
                                <div class="card-body">{{$tickets_num}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
