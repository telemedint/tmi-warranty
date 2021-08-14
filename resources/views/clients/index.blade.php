@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{__('translation.clients')}}</h1>
                    <a href="{{route('clients.create')}}" class="btn btn-success submit_btn">{{__('translation.add_client')}}</a>
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{session()->get('error')}}</div>
                    @endif
                    
                    @if ($clients->count() > 0)
                        <table class="table display" id="clients_table">
                            <thead>
                                <tr>
                                    <th>{{__('translation.name')}}</th>
                                    <th>{{__('translation.phone')}}</th>
                                    <th>{{__('translation.address')}}</th>
                                    <th>{{ __('translation.options') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td><div class="list-item">{{$client->name}}</div></td>
                                    <td><div class="list-item">{{$client->phone}}</div></td>
                                    <td><div class="list-item">{{$client->address}}</div></td>
                                    <td>
                                        <form class="float-right" action="{{route('clients.destroy', $client->id)}}" 
                                        method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Are you sure?')">
                                                {{__('translation.delete')}}
                                            </button>
                                        </form>
                                        <a href="{{route('clients.edit',$client->id)}}" class="btn btn-primary btn-sm float-right">{{__('translation.edit')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        <p>No clients yet</p> 
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
            $('#clients_table').DataTable();
        } );
    </script>
@endsection