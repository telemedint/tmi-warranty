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
                        <h1>@lang('translation.barcode_and_serial')</h1>
                        
                    </div>

                    <div class="card-body">
                        
                        <!-- Barcode -->
                        <div id='Barcode2' style="padding:5% ;display: flex; margin-right: auto; margin-left: auto; text-align: center">
                            <div id="barcode" class="flx-elem">
                                <img src="{{'data:image/png;base64,' . DNS1D::getBarcodePNG($serial, "C128B")}}" alt="barcode"/>
                            </div>

                            <div id="serial" class="flx-elem">
                                <strong>{{$serial}}</strong>
                            </div> 
                        </div>
                    
                    </div>
                </div>
                <div class="card">
                    <button id="print" class="btn btn-dark" style="width:auto; text-align: center">@lang('translation.print')</button>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        

        $("#print").on('click', function(event) {
            printBarcode();
        });


        function printBarcode() {
            var w = window.open();
            var headers =  $("#headers").html();
            var field= $("#barcode").html();
            var field2= $("#serial").html();

            var html = "<!DOCTYPE HTML>";
            html += '<html lang="en-us">';
            html += '<head><style></style></head>';
            html += "<body>";

            //check to see if they are null so "undefined" doesnt print on the page.
            if(headers != null) html += headers + "<br/><br/>";
            if(field != null) html += field + "<br/><br/>";
            if(field2 != null) html += field2 + "<br/><br/>";

            html += "</body>";
            w.document.write(html);
            w.document.close();
            w.window.print();
        }
    </script>
@endsection
