@extends('layouts.app')

<?php
use Illuminate\Support\Facades\Storage;
use App\Category;
?>
@section('style')
    <style>
        .device-name:hover {
            color:#ccc42b;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16" style="width: 100%">
                <div class="card">
                    <div class="card-header">
                        <h1>@lang('translation.devices')</h1>
                        <a href="{{ route('devices.create') }}"
                            class="btn btn-success submit_btn">@lang('translation.add_device')</a>
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif
                        <!-- Barcode -->
                        <div id="Barcode" style="display:none;">
                            <p id="BarcodeImg" style=" margin-right: auto; margin-left: auto">Barcode Image</p>
                            <p id="BarcodeSerial" style=" margin-right: auto; margin-left: auto">Barcode Serial</p>
                        </div>
                    

                        @if ($devices->count() > 0)
                            <table class="table">
                                <tr>
                                    <th>{{ __('translation.image') }}</th>
                                    <th>{{ __('translation.name') }}</th>
                                    <th>{{ __('translation.category') }}</th>
                                    <th>{{ __('translation.serial') }}</th>
                                    <th>{{ __('translation.stored_at') }}</th>
                                </tr>
                                @foreach ($devices as $device)
                                    <tr>
                                        <td><img src="{{ asset('/public/images/devices/' . $device->image) }}" alt="image"
                                                width="150px"> </td>

                                        <td><div class="list-item device-name" data-id="{{$device->id}}"> {{ $device->name }}</div></td>
                                        <td>
                                            <div class="list-item">
                                                @if ($category = Category::find($device->category_id))
                                                    {{ $category->name }}
                                                @else
                                                    Category has been deleted
                                                @endif
                                            </div>
                                        </td>
                                        <td><div class="list-item">{{ $device->full_serial }}</div></td>
                                        <td><div class="list-item">{{$device->stored_at}}</div></td>
                                        <td>
                                            <form class="float-right" action="{{ route('devices.destroy', $device->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm ml-2"
                                                    onclick="return confirm('Are you sure?')">{{ __('translation.delete') }}</button>
                                            </form>
                                            <a href="{{ route('devices.edit', $device->id) }}"
                                                class="btn btn-primary btn-sm float-right ml-2">{{ __('translation.edit') }}</a>
                                            <button id="{{ 'barcode' . $device->id }}" data-serial="{{$device->full_serial}}"
                                                value="{{ DNS1D::getBarcodePNG($device->full_serial, "C128B") }}"
                                                class="barcode btn btn-secondary btn-sm float-right ml-2">Barcode</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            {{-- Invoice info Modal  --}}
                            <div id="invoice-modal" class="modal" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    
                                    <div class="modal-header justify-content-center">
                                      <h4 class="modal-title" id="modal-title" style="color: rgb(29, 199, 29);">{{__("translation.invoice_info")}}</h4>
                                    </div>

                                    <div class="modal-body">
                                        <h5>{{__("translation.client_name")}}</h5>
                                        <p id="modal-client-name"></p>
                                        <hr>
                                        <h5>{{__("translation.device_name")}}</h5>
                                        <p id="modal-device-name"></p>
                                        <hr>
                                        <h5>{{__("translation.purchase_date")}}</h5>
                                        <p id="modal-purchase-date"></p>
                                        <hr>
                                        <h5>{{__("translation.technical_support")}}</h5>
                                        <p id="modal-technical-support"></p>
                                        <hr>
                                        <h5>{{__("translation.repairing_service")}}</h5>
                                        <p id="modal-repairing-service"></p>
                                        <hr>
                                        <h5>{{__("translation.premium_support")}}</h5>
                                        <p id="modal-premium-support"></p>
                                    </div>
                                    
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>

                                  </div>
                                </div>
                              </div>

                            {{-- No Invoice Modal  --}}
                            <div id="no-invoice-modal" class="modal" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                      <h4 class="modal-title" id="modal-title" style="color: rgb(29, 199, 29);">{{__("translation.invoice_info")}}</h4>
                                      
                                    </div>
                                    
                                    <div class="modal-body" id="no-invoice-modal-body">
                                        <h5>{{__("translation.no_invoice_message")}}</h5>
                                    </div>
                                    
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                {{ $devices->links() }}
                            </div>
                        @else
                            <p>No devices yet</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        
        $(".barcode").on('click', function(event) {
            let barcode = event.target.value;
            let barcodeImg = '<img src="data:image/png;base64,' + barcode + '" alt="barcode"   />';
            $("#BarcodeImg").html(barcodeImg);

            let serial = event.target.dataset.serial;
            $("#BarcodeSerial").html(serial);

            printBarcode();
        });


        function printBarcode() {
            
            var headers =  $("#headers").html();
            var field= $("#BarcodeImg").html();
            var field2= $("#BarcodeSerial").html();

            var html = "<!DOCTYPE HTML>";
            html += '<html lang="en-us">';
            html += '<head><style></style></head>';
            html += "<body>";

            //check to see if they are null so "undefined" doesnt print on the page.
            if(headers != null) html += headers + "<br/><br/>";
            if(field != null) html += field + "<br/><br/>";
            if(field2 != null) html += field2 + "<br/><br/>";

            html += "</body>";
            
            var w = window.open();
            w.document.write(html);
            w.document.close();
            w.window.print();
        }
    </script>

    <script>
        $(document).ready(function(){
            $(".device-name").on("click",function(event){
                
                let device = event.target;

                event.preventDefault();

                let id = device.dataset.id;
                let _token   = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ route('invoice-info-ajax') }}",
                    type:"POST",
                    data:{
                        id: id,
                        _token: _token
                    },
                    success:function(response){
                        
                        console.log(response);
                        if(response) {
                            $("#invoice-modal").modal("show");    
                            $("#invoice-modal").find("#modal-client-name").text(response.client.name);
                            $("#invoice-modal").find("#modal-device-name").text(response.device_name);
                            $("#invoice-modal").find("#modal-purchase-date").text(response.invoice.purchase_date);
                            
                            if(response.invoice.technical_support){
                                $("#invoice-modal").find("#modal-technical-support").text(response.invoice.technical_support);
                            }else{
                                $("#invoice-modal").find("#modal-technical-support").text(response.not_available);
                            }
                            if(response.invoice.repairing_service){
                                $("#invoice-modal").find("#modal-repairing-service").text(response.invoice.repairing_service);
                            }else{
                                $("#invoice-modal").find("#modal-repairing-service").text(response.not_available);
                            }
                            if(response.invoice.premium_support){
                                $("#invoice-modal").find("#modal-premium-support").text(response.invoice.premium_support);
                            }else{
                                $("#invoice-modal").find("#modal-premium-support").text(response.not_available);
                            }
                        }else{
                            $("#no-invoice-modal").modal("show");
                        }
                    },
                    error: function (data) {
                        console.log(data);
                        
                    }
                });
                
            });

        });
    </script>
    
@endsection
