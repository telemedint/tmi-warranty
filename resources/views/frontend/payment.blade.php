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
                        Telemed electronic stethoscope 3rd generation
                    </h1>
                    <br />
                    <h2 class="green bold upgrade-title">
                        Upgrade your license
                        <a href="{{route('upgrade-license')}}" style="color: #000;" class="pull-right">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </h2>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-12 plan-card">
                                <h3 class="bold center green">
                                    Premium
                                </h3>
                                <ul class="bold">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        On demand technical support
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        First time installation by our experts
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
                                    <h4 class="bold center green">
                                        12,000 EGP / Year
                                    </h4>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-1">
                            <h3>
                                <a href="{{route('upgrade-license')}}" class="bold">
                                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Payment details
                                </a>
                            </h3>
                            <form action="{{route('upgraded-license')}}">
                                <label class="bold">
                                    Card number
                                </label>
                                <input name="number" placeholder="e.g. 1234 1234 1234 1234" />
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="bold">
                                            Expiry date
                                        </label>
                                        <input type="date" name="expiry" placeholder="e.g. MM - YY" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="bold">
                                            CVV
                                        </label>
                                        <input name="cvv" placeholder="e.g. 123" />
                                    </div>
                                </div>
                                <br />
                                <input class="btn" type="submit" value="Upgrade now" />
                                <p class="bold red">
                                    <br />
                                    Your premium license will be valid for a year from the transaction date, an amount
                                    of 12,000 EGP will be deducted from your card.
                                </p>
                            </form>
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