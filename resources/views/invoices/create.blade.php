@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >
                    <h1>
                        {{isset($invoice) ? __('translation.update_invoice'):__('translation.new_invoice')}}
                    </h1>
                </div>

                <div class="card-body">
                    <form action="{{isset($invoice) ? route('invoices.update', $invoice->id) : route('invoices.store')}}" 
                        method="POST" enctype="multipart/form-data" style="display: grid">
                    @csrf
                    @isset($invoice)
                        @method('PUT')
                    @endisset


                        {{-- Client Name --}}
                        <div class="form-group" style="display: flex;">
                            <label for="client_name" class="text-monospace" style="width: 30%;">
                                <h5 style="font-weight: bold">{{__('translation.client_name')}}:</h5>
                            </label>

                            <select  id="client"  name="client_id" class="form-control" style="width: 50%">
                                <option disabled selected value> -- select Client -- </option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}" class="form-control custom-select"
                                        @isset($invoice) 
                                            @if ($client->id == $invoice->client_id) selected @endif 
                                        @endisset>
                                            {{$client->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- Serial --}}
                        <div class="form-group mt-3" style="display: flex;">
                            <label for="serial" class="text-monospace">
                                <h5 style="font-weight: bold">{{__('translation.device_serial')}}:</h5>
                            </label>

                            <input type="text" id= "device_serial" name="device_serial" class="form-control" 
                            style="width: 50%; text-align: center;"
                            @isset($invoice)value="{{$invoice->device_serial}}" @endisset>
                        </div>

                        {{-- Device Info (Name & Image) --}}
                        <div class="form-group" id="device_info" name="device_info" style="display: none">
                            <div class="flex-box" style="display: flex;">
                                {{-- Device Name --}}
                                <div class="device_name" style="display: flex; width: 70%; padding: 40px">
                                    <label for="device_name" class="text-monospace" name="device_name_label">
                                        <h5 style="font-weight: bold">{{__('translation.device_name')}}:</h5>
                                    </label>

                                    <label type="text" id= "device_name" name="device_name" class="form-control"
                                    style="width: 50%; text-align: center; margin-right: 3%; margin-left: 3%"> </label>
                                </div>
                                {{-- Device Image --}}
                                <img src="" id="device_image"  alt="Device Image" style="width: 20%;" class="justify-content-center">
                            </div>
                        </div>

                        
                        @isset($invoice)
                        <div class="device_name" style="display: flex">
                            <label class="text-monospace">
                                <h5 style="font-weight: bold">{{__('translation.device_name')}}:</h5>
                            </label>
                            <input type="text" class="form-control" style="text-align: center; font-weight: bold"
                            value="{{App\Device::where('full_serial',$invoice->device_serial)->first()->name}}" >
                        </div>
                            <img src="{{asset('public/images/devices/'. App\Device::where('full_serial',$invoice->device_serial)->first()->image)}}" 
                            alt="image" style="width: 50%">
                        @endisset
                        

                        {{-- Purchase Date --}}
                        <div class="purchase_date" style="display: flex;">
                            
                            <label for="purchase_date" class="flx-elem text-monospace">
                                <h5 style="font-weight: bold"> {{__('translation.purchase_date')}}:</h5>
                            </label>
                            
                            <input type="date" id="purchase_date" name="purchase_date"
                            value="{{date('Y-m-d')}}" style="width: 60%; margin: 1%; text-align: center;"
                            class="form-control @error('purchase_date_from') is-invalid @enderror">

                        </div>

                        {{-- Technical Support --}}
                        <div class="technical_support mt-4" style="display: flex;">
                            
                            <label for="technical_support" class="flx-elem text-monospace">
                                <h5 style="font-weight: bold"> {{__('translation.technical_support')}}:</h5>
                            </label>
                            
                            <input type="hidden" name="technical_support_chk" value="0" />
                            <input type="checkbox" id="technical_support_chk" name="technical_support_chk" 
                            class="form-control flx-elem" checked value="1" style="width: 5%;">

                            <input type="date" id="technical_support" name="technical_support"
                            value="{{isset($invoice) ? $invoice->technical_support : date('Y-m-d', strtotime('+1 year'))}}" style="text-align: center;"
                            class="form-control flx-elem @error('technical_support') is-invalid @enderror">

                        </div>

                        {{-- Repairing Service --}}
                        <div class="repairing_service mt-4" style="display: flex;">
                            
                            <label for="repairing_service" class="flx-elem text-monospace">
                                <h5 style="font-weight: bold"> {{__('translation.repairing_service')}}:</h5>
                            </label>
                            
                            <input type="hidden" name="repairing_service_chk" value="0" />
                            <input type="checkbox" id="repairing_service_chk" name="repairing_service_chk"
                            class="form-control flx-elem" checked value="1"  style="width: 5%;">

                            <input type="date" id="repairing_service" name="repairing_service"
                            value="{{isset($invoice) ? $invoice->repairing_service : date('Y-m-d', strtotime('+1 year'))}}" style="text-align: center;"
                            class="form-control flx-elem @error('repairing_service') is-invalid @enderror">

                        </div>

                        {{-- Premium Support --}}
                        <div class="premium_support mt-4" style="display: flex;">
                            
                            <label for="premium_support" class="flx-elem text-monospace">
                                <h5 style="font-weight: bold"> {{__('translation.premium_support')}}:</h5>
                            </label>
                            
                            <input type="hidden" name="premium_support_chk" value="0" />
                            <input type="checkbox" id="premium_support_chk" name="premium_support_chk" 
                            class="form-control flx-elem" value= "1" style="width: 5%;">

                            <input type="date" id="premium_support" name="premium_support"
                            disabled value="{{isset($invoice) ? $invoice->premium_support : date('Y-m-d', strtotime('+1 year'))}}" style="text-align: center;"
                            class="form-control flx-elem @error('premium_support') is-invalid @enderror">

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
                                {{isset($invoice) ? __('translation.update'):__('translation.add')}}
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/invoices.js') }}"></script>
    <script type="text/javascript">
        //Add Image onchange of serial
        $("#device_serial").on('change',function(event){
            event.preventDefault();

            let serial = $("#device_serial").val();
            
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
            url: "{{ route('serial-info-ajax') }}",
            type:"POST",
            data:{
                serial: serial,
                _token: _token
            },
            success:function(response){
                console.log(response);
                if(response) {
                    $('#device_info').show();
                    $('#device_name').html(response.device_name);
                    $('#device_image').attr("src",response.device_image);
                }
            },
            error: function (data) {
                console.log(data);
            }
            });
        });
    </script>
@endsection