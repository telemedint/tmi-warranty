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
                            <label for="name" class="text-monospace"><h5>Category Name:</h5></label>
                            <input type="text" name="name" placeholder="Enter Category's Name" 
                            class="form-control @error('name') is-invalid @enderror"
                            @isset($category)
                                value="{{$category->name}}"
                            @endisset>

                            {{-- Code --}}
                            <label for="code" class="mt-3 text-monospace"><h5>Code:</h5></label>
                            <input type="text" name="code" placeholder="Enter code here" 
                            class="form-control @error('code') is-invalid @enderror"
                            @isset($category)
                                value="{{$category->code}}"
                            @endisset>

                            {{-- Serial --}}
                            <label for="serial" class="mt-3 text-monospace"><h5>Serial:</h5></label>
                            <input type="text" name="serial" placeholder="Enter Category serial" 
                            class="form-control @error('serial') is-invalid @enderror"
                            @isset($category)
                                value="{{$category->serial}}"
                            @endisset>

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

                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-4 float-right">{{isset($category) ? 'Update':'Submit'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection