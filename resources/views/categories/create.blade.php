@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{isset($category)?'Update Category':'New Category'}}</h1></div>

                <div class="card-body">
                    <form action="{{isset($category) ? 
                    route('categories.update', $category->id) : route('categories.store')}}" 
                        method="POST">
                    @csrf
                    @isset($category)
                        @method('PUT')
                    @endisset
                        
                    
                        <div class="form-group">

                            {{-- Category Name --}}
                            <label for="name" class="text-monospace"><h5>{{__('translation.name')}}:</h5></label>
                            
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            @if(app()->getLocale() == 'ar') placeholder= "أدخل التصنيف" @else placeholder="Enter Category's Name" @endif
                            @isset($category) value="{{$category->name}}" @endisset>

                            {{-- Code --}}
                            <label for="code" class="mt-3 text-monospace"><h5>{{__('translation.code')}}:</h5></label>
                            
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                            @if(app()->getLocale() == 'ar') placeholder= "أدخل الكود" @else placeholder="Enter code here" @endif
                            @isset($category) value="{{$category->code}}" @endisset>

                            {{-- Serial --}}
                            <label for="serial" class="mt-3 text-monospace"><h5>{{__('translation.serial')}}:</h5></label>
                            
                            <input type="text" name="serial"  
                            class="form-control @error('serial') is-invalid @enderror"
                            @if(app()->getLocale() == 'ar') placeholder= "أدخل الرقم التسلسلي للقسم" @else placeholder="Enter Category serial" @endif
                            @isset($category) value="{{$category->serial}}" @endisset>

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

                        </div>

                        {{-- Submit Button --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-4 submit_btn">{{isset($category) ? __('translation.update'):__('translation.submit')}}</b  utton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection