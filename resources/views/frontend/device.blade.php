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
              {{$invoice->device->name}}
          </h1>
          <br />
          <div class="row">
              <div class="col-md-4">
                  <p class="grey bold">
                      Serial number
                  </p>
                  <h4 class="bold">
                      {{$invoice->device->full_serial}}
                  </h4>
              </div>
              <div class="col-md-4">
                  <p class="grey bold">
                      Purchase date
                  </p>
                  <h4 class="bold">
                      {{-- 23 March 2021 --}}
                      {{date('d-m-Y', strtotime($invoice->purchase_date))}}
                  </h4>
              </div>
              <div class="col-md-4">
                  <p class="grey bold">
                      License valid to
                  </p>
                  <h4 class="bold green">
                      {{-- 23 March 2022 --}}
                      {{date('d-m-Y', strtotime($invoice->technical_support))}}
                  </h4>
              </div>
              <div class="col-md-8">
                  <br />
                  <p class="grey bold">
                      Registered to
                  </p>
                  <h4 class="bold">
                      {{-- Ibrahim Badran Charitable Foundation --}}
                      {{$invoice->client->company}}
                  </h4>
              </div>
              <div class="col-md-4">
                  <br />
                  <p class="grey bold">
                      Branch
                  </p>
                  <h4 class="bold">
                      {{-- Shiekh Zayed City, Giza, Egypt. --}}
                      {{$invoice->client->address}}
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

                  <a class="btn outline pull-right" href="{{route('upgrade-license', $invoice->device->id)}}">Upgrade license</a>
                  <a class="btn pull-right" href="{{route('request-maintenance', $invoice->device->id)}}">Request maintenance</a>

              </div>
          </div>
      </div>
  </div>
  <div class="col-md-4 fill-home">
      <div class="padding-for-side-image">
          {{-- <img src="{{ asset('themes/frontend/assets/images/phone.jpg') }}" /> --}}
          <img src="{{asset('public/images/devices/' . $invoice->device->photo->name)}}" alt="Device Image"/>
      </div>
  </div>
 
@endsection


@section('vendor_js')   
@endsection

@section('page_js')      
@endsection