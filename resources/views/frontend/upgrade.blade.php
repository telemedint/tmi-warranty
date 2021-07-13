@extends('layouts.frontend')

@section('title') Check Serial @endsection

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
                    <h2 class="green bold upgrade-title">
                        Upgrade your license
                        <a href="device.html" style="color: #000;" class="pull-right">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </h2>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-12 plan-card grey">
                                <h3 class="bold center">
                                    Standard
                                </h3>
                                <ul class="bold">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        On demand technical support
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        First time installation byour experts
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device software updates
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Repairing malfunctioned parts
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device replacement
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Priority support
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device monthly checkup
                                    </li>
                                    <h4 class="bold center">
                                        Already covered
                                    </h4>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12 plan-card grey">
                                <h3 class="bold center">
                                    Exxemtial
                                </h3>
                                <ul class="bold">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        On demand technical support
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        First time installation byour experts
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device software updates
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Repairing malfunctioned parts
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device replacement
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Priority support
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device monthly checkup
                                    </li>
                                    <h4 class="bold center">
                                        Already covered
                                    </h4>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12 plan-card active">
                                <h3 class="bold center">
                                    Premium
                                </h3>
                                <ul class="bold">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        On demand technical support
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        First time installation byour experts
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device software updates
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Repairing malfunctioned parts
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device replacement
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Priority support
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Device monthly checkup
                                    </li>
                                    <h4 class="bold center">
                                        12,000 EGP / Year
                                    </h4>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 center">
                            <br />
                            <br />
                            <a class="btn" style="width: 298px !important;display: block;margin: 0 auto;"
                                href="{{route('payment', $device->id)}}">Next</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fill-home">
                <div class="padding-for-side-image">
                    <img src="{{ asset('themes/frontend/assets/images/phone.jpg') }}" />
                </div>
            </div>
@endsection


@section('vendor_js')   
@endsection

@section('page_js')      
@endsection