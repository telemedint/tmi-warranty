@extends('layouts.app')

<?php
use Illuminate\Support\Facades\Storage;
use App\Photo;
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
                        <h1>@lang('translation.photos')</h1>
                        <a href="{{ route('photos.create') }}"
                            class="btn btn-success submit_btn">@lang('translation.add_photo')</a>
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif

                        @if ($photos->count() > 0)
                            <table class="table">
                                <tr>
                                    <th>{{ __('translation.image') }}</th>
                                    <th>{{ __('translation.name') }}</th>
                                    <th>{{ __('translation.path') }}</th>
                                </tr>
                                @foreach ($photos as $photo)
                                    <tr>
                                        <td><img src="{{ asset('/public/images/devices/' . $photo->name) }}" alt="image"
                                            width="150px"> </td>

                                        <td>
                                            <div class="list-item">{{ $photo->name }}</div>
                                        </td>
                                        <td>
                                            <div class="list-item">{{ $photo->path }}</div>
                                        </td>

                                        <td>
                                            <form class="float-right" action="{{ route('photos.destroy', $photo->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm ml-2"
                                                    onclick="return confirm('Are you sure?')">{{ __('translation.delete') }}</button>
                                            </form>
                                            <a href="{{ route('photos.edit', $photo->id) }}"
                                                class="btn btn-primary btn-sm float-right ml-2">{{ __('translation.edit') }}</a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            <div class="row justify-content-center">
                                {{ $photos->links() }}
                            </div>
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
    
@endsection
