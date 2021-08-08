@extends('layouts.app')

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
                        <h1>@lang('translation.photos')</h1>
                        <a href="{{ route('photos.create') }}"
                            class="btn btn-success submit_btn">@lang('translation.add_photo')</a>
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif
                        
                        @if (session()->has('error'))
                            <div class="alert alert-danger">{{session()->get('error')}}</div>
                        @endif

                        @if ($photos->count() > 0)
                            <table class="table" id="photos_table">
                                <thead>
                                    <tr>
                                        <th>{{ __('translation.image') }}</th>
                                        <th>{{ __('translation.name') }}</th>
                                        <th>{{ __('translation.options') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach ($photos as $photo)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('/public/images/devices/' . $photo->name) }}" alt="image"
                                            width="300px"> 
                                        </td>
                                        <td>
                                            <div class="list-item" style="text-align: center; margin: 35% 0; font-weight: bold; font-size: 16px;">{{ $photo->name }}</div>
                                        </td>

                                        <td>
                                            <form class="float-right" action="{{ route('photos.destroy', $photo->id) }}" 
                                                method="POST" style="text-align: center; margin: 35% 0; font-weight: bold;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm ml-2"
                                                    onclick="return confirm('Are you sure?')">{{ __('translation.delete') }}</button>
                                            </form>
                                            <a href="{{ route('photos.edit', $photo->id) }}" style="text-align: center; margin: 35% 0; font-weight: bold;"
                                                class="btn btn-primary btn-sm float-right ml-2">{{ __('translation.edit') }}</a>  
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Photos yet</p>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#photos_table').DataTable();
        } );
    </script>
@endsection
