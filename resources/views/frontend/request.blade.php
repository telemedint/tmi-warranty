@extends('layouts.frontend')

@section('title') Request @endsection

@section('vendor_css')  
@endsection

@section('page_css')   
@endsection 

@section('content')  
 
            <div class="col-md-8">
                <div class="device-serial-form inner-content main-padding">
                    <h1 class="bold">
                        {{-- Telemed electronic stethoscope 3rd generation --}}
                        {{$device->name}}
                    </h1>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <p class="grey bold">
                                Serial number
                            </p>
                            <h4 class="bold">
                                {{-- TMI-2017120219876 --}}
                                {{$device->full_serial}}
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <p class="grey bold">
                                Purchase date
                            </p>
                            <h4 class="bold">
                                {{-- 23 March 2021 --}}
                                {{date('d-m-Y', strtotime($device->invoice->purchase_date))}}
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <p class="grey bold">
                                License valid to
                            </p>
                            <h4 class="bold green">
                                {{-- 23 March 2022 --}}
                                {{date('d-m-Y', strtotime($device->invoice->technical_support))}}
                            </h4>
                        </div>
                        <div class="col-md-8">
                            <br />
                            <p class="grey bold">
                                Registered to
                            </p>
                            <h4 class="bold">
                                {{-- Ibrahim Badran Charitable Foundation --}}
                                {{$device->invoice->client->company}}
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <br />
                            <p class="grey bold">
                                Branch
                            </p>
                            <h4 class="bold">
                                {{-- Shiekh Zayed City, Giza, Egypt. --}}
                                {{$device->invoice->client->address}}
                            </h4>
                        </div>
                        <div class="col-md-12">
                            <br />
                            <br />
                            <h2 class="green bold">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                Elligible for Telemed technical support
                            </h2>
                            <p class="bold support-desc">
                                Technical support includes any software maintenance for the selected device such as
                                installing the device software on different operating systems and resolving any
                                technical issue related to the device
                            </p>
                            <br />
                            <h2 class="green bold">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                Elligible for Telemed technical support
                            </h2>
                            <p class="bold support-desc">
                                Technical support includes any software maintenance for the selected device such as
                                installing the device software on different operating systems and resolving any
                                technical issue related to the device
                            </p>
                            <br />
                            <h2 class="red bold">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                Elligible for Telemed technical support
                            </h2>
                            <p class="bold support-desc">
                                Technical support includes any software maintenance for the selected device such as
                                installing the device software on different operating systems and resolving any
                                technical issue related to the device
                            </p>
                            <br />

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fill-home">
                <form class="grey-form" action="{{route('request-sent')}}">
                    <input type="hidden" name="device_id" value="{{$device->id}}" />
                    <h3 class="bold">
                        Request maintenance
                    </h3>
                    <br />
                    <label class="bold">
                        Full name
                    </label>
                    <input name="applicant_name" placeholder="e.g. Mahmoud Mohamed" />
                    <label class="bold">
                        Phone number
                    </label>
                    <input name="applicant_phone" placeholder="e.g. 0100 000 0000" />
                    <label class="bold">
                        Details (optional)
                    </label>
                    <textarea name="details" placeholder="Enter your problem details"></textarea>
                    <br />
                    <br />
                    <input class="btn" type="submit" value="Request maintenance" />
                    <a href="{{route('device-details')}}" class="close-form-btn">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </form>
            </div> 
@endsection


@section('vendor_js')   
@endsection

@section('page_js')      
@endsection