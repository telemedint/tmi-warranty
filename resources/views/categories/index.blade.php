@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('error'))
                <div class="alert alert-danger">{{session()->get('error')}}</div>
            @endif
            <div class="card card-default">
                <div class="card-header">
                    <h1>@lang('translation.categories')</h1>
                    <a href="{{route('categories.create')}}" class="btn btn-success submit_btn">@lang('translation.add_category')</a>
                </div>

                <div class="card-body">
                    @if ($categories->count() > 0)
                        <table class="table" id="categories_table">
                            <thead>
                                <tr>
                                    <th>{{__('translation.name')}}</th>
                                    <th>{{__('translation.code')}}</th>
                                    <th>{{__('translation.serial')}}</th>
                                    <th>{{__('translation.options')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><div class="list-item">{{$category->name}}</div></td>
                                    <td><div class="list-item">{{$category->code}}</div></td>
                                    <td><div class="list-item">{{$category->serial}}</div></td>
                                    <td>
                                        <form class="float-right" action="{{route('categories.destroy', $category->id)}}" 
                                        method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm ml-2">
                                                {{__('translation.delete')}}
                                            </button>
                                        </form>
                                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-sm float-right">{{__('translation.edit')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No categories yet</p> 
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
            $('#categories_table').DataTable();
        } );
    </script>
@endsection