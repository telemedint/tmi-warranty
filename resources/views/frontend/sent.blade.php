@extends('layouts.frontend')

@section('title') Check Serial @endsection

@section('vendor_css')  
@endsection

@section('page_css')   
@endsection 

@section('content')  
<div class="col-md-8">
                <div class="device-serial-form inner-content main-padding">
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <a href="requested.html" class="bold">
                                <i class="fa fa-long-arrow-left" aria-hidden="true"></i> My product
                            </a>
                            <br />
                            <br />
                            <h2 class="green bold">
                                <i class="fa fa-check-circle" style="font-size: 60px;" aria-hidden="true"></i>
                                <br />
                                <br />
                                Your maintenance request was sent successfully
                            </h2>
                            <br />
                            <h4 class="bold grey">
                                A Telemed representative will contact you within 2 working days to know more about your
                                request and schedule a date for maintenance
                            </h4>
                            <br />
                            <br />
                            <br />
                        </div>
                        <div class="col-md-12">
                            <h1 class="bold">
                                {{-- Telemed electronic stethoscope 3rd generation --}}
                                {{-- {{dd($ticket)}} --}}
                                {{$ticket->device->name}}
                            </h1>
                        </div>
                        <div class="col-md-3">
                            <p class="grey bold">
                                Serial number
                            </p>
                            <h4 class="bold">
                                {{-- TMI-2017120219876 --}}
                                {{$ticket->device->full_serial}}
                            </h4>
                        </div>
                        <div class="col-md-3">
                            <p class="grey bold">
                                Purchase date
                            </p>
                            <h4 class="bold">
                                {{-- 23 March 2021 --}}
                                {{date('d-m-Y', strtotime($ticket->device->invoice->purchase_date))}}
                            </h4>
                        </div>
                        <div class="col-md-3">
                            <p class="grey bold">
                                License valid to
                            </p>
                            <h4 class="bold green">
                                {{-- 23 March 2022 --}}
                                {{date('d-m-Y', strtotime($ticket->device->invoice->technical_support))}}
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <br />
                            <p class="grey bold">
                                Registered to
                            </p>
                            <h4 class="bold">
                                {{-- Ibrahim Badran Charitable Foundation --}}
                                {{$ticket->device->invoice->client->company}}
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <br />
                            <p class="grey bold">
                                Branch
                            </p>
                            <h4 class="bold">
                                {{-- Shiekh Zayed City, Giza, Egypt. --}}
                                {{$ticket->device->invoice->client->address}}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fill-home">
                <div class="padding-for-side-image">
                    {{-- <img src="{{ asset('themes/frontend/assets/images/phone.jpg') }}" /> --}}
                    <img src="{{asset('public/images/devices/' . $ticket->device->image)}}" alt="Device Image"/>
                </div>
            </div>
@endsection


@section('vendor_js')   
@endsection

@section('page_js')      
@endsection