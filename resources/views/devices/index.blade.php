@extends('layouts.app')

<?php
use Illuminate\Support\Facades\Storage;
use App\Category;
?>
@section('style')
    <style>
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
                            <div class="alert alert-warning">
                                <img src="{{'data:image/png;base64,' . DNS1D::getBarcodePNG(session()->get('serial'), "C128B")}}" alt="barcode"/>
                            </div>
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
                                    <th>{{ __('translation.serial') }}</th>
                                    <th>{{ __('translation.category') }}</th>
                                </tr>
                                @foreach ($devices as $device)
                                    <tr>
                                        <td><img src="{{ asset('/public/images/devices/' . $device->image) }}" alt="image"
                                                width="150px"> </td>

                                        <td>
                                            <div class="list-item">{{ $device->name }}</div>
                                        </td>
                                        <td>
                                            <div class="list-item">{{ $device->full_serial }}</div>
                                        </td>
                                        <td>
                                            <div class="list-item">
                                                @if ($category = Category::find($device->category_id))
                                                    {{ $category->name }}
                                                @else
                                                    Category has been deleted
                                                @endif
                                            </div>
                                        </td>
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
                                            <a href="{{ route('devices.print', $device->full_serial) }}"
                                                class="btn btn-warning btn-sm float-right ml-2">Barcode2</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

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
@endsection
