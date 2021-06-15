@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16" style="width: 100%">
            <div class="card">
                <div class="card-header">
                    <h1>@lang('translation.devices')</h1>
                    <a href="{{route('devices.create')}}" class="btn btn-success add">@lang('translation.add_device')</a>
                </div>

                <div class="card-body">
                    @if ($devices->count() > 0)
                        <table class="table">
                            <tr>
                                <th>{{__('translation.image')}}</th>
                                <th>{{__('translation.name')}}</th>
                                <th>{{__('translation.serial')}}</th>
                                <th>{{__('translation.category')}}</th>
                            </tr>
                            @foreach ($devices as $device)
                                <tr>
                                    <td><img src="{{asset('storage/'.$device->image)}}" alt="image" width="150px"></td>
                                    <td><div class="list-item">{{$device->name}}</div></td>
                                    <td><div class="list-item">{{$device->serial}}</div></td>
                                    <td>
                                        <div class="list-item">
                                            @if($category = App\Category::find($device->category_id))
                                                    {{$category->name}}  
                                            @else
                                                Category has been deleted
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <form class="float-right" action="{{route('devices.destroy', $device->id)}}" 
                                        method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm ml-2">{{__('translation.delete')}}</button>
                                        </form>
                                        <a href="{{route('devices.edit',$device->id)}}" class="btn btn-primary btn-sm float-right">{{__('translation.edit')}}</a>
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