@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >
                    <h1>
                        {{isset($photo) ? __('translation.update_photo'):__('translation.new_photo')}}
                    </h1>
                </div>

                <div class="card-body">
                    <form action="{{isset($photo) ? route('photos.update', $photo->id) : route('photos.store')}}" 
                        method="POST" enctype="multipart/form-data" style="display: grid">
                    @csrf
                    @isset($photo)
                        @method('PUT')
                    @endisset

                        {{-- photo Name --}}
                        <div class="form-group">
                            <label for="name" class="text-monospace">
                                <h5 style="font-weight: bold"> {{__('translation.name')}}:</h5>
                            </label>

                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                @isset($photo)
                                    value="{{$photo->name}}"
                                @endisset

                                @if(app()->getLocale() == 'ar')
                                    dir="rtl" style= "float: right;"
                                    placeholder= "أدخل اسم الصورة"
                                @else
                                    placeholder="Enter photo Name"
                                @endif>
                        </div>


                        {{-- Path --}}
                        <div style="display: flex;">
                            <div class="form-group mt-3">
                                <label for="image" class="mt-3 text-monospace">
                                    <h5 style="font-weight: bold">{{__('translation.image')}}:</h5>
                                </label>

                                <input type="file" name="image" class="form-control-file"
                                @isset($photo)value="{{$photo->path}}" @endisset>
                            </div>

                            @isset($photo)
                                <img src="{{asset($photo->path)}}"
                                alt="image" style="width: 30%;">
                            @endisset
                            
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
                                {{isset($photo) ? __('translation.update'):__('translation.add')}}
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

    <script src="{{ asset('js/photos.js') }}"></script>

@endsection