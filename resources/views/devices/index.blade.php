@extends('layouts.app')

<?php
use Illuminate\Support\Facades\Storage;
use App\Category;
?>
@section('style')
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /*Hidden by default*/
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
                        <!-- The Modal -->
                        <div id="myModal" class="modal" style="border: solid;">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <center><p id="BarCode">Some text in the Modal..</p></center>
                            </div>
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
                                            <button id="{{ 'barcode' . $device->id }}"
                                                value="{{ DNS1D::getBarcodePNG($device->full_serial, "C128B") }}"
                                                class="barcode btn btn-secondary btn-sm float-right">Barcode</button>
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
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        $(".barcode").on('click', function(event) {
            modal.style.display = "block"; // When the button is clicked, open the modal
            let barcode = event.target.value;
            let barcodeImg = '<img src="data:image/png;base64,' + barcode + '" alt="barcode"   />';
            $("#BarCode").html(barcodeImg);
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
