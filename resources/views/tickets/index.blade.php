@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{__('translation.tickets')}}</h1>
                    {{-- <a href="{{route('tickets.create')}}" class="btn btn-success submit_btn">{{__('translation.add_ticket')}}</a> --}}
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @if ($tickets->count() > 0)
                        <table class="table">
                            <tr>
                                <th>{{__('translation.applicant_name')}}</th>
                                <th>{{__('translation.applicant_phone')}}</th>
                                <th>{{__('translation.details')}}</th>
                                <th>{{__('translation.request_date')}}</th>
                                <th>{{__('translation.status')}}</th>
                            </tr>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td><div class="list-item">{{$ticket->applicant_name}}</div></td>
                                    <td><div class="list-item">{{$ticket->applicant_phone}}</div></td>
                                    <td><div class="list-item">{{$ticket->details}}</div></td>
                                    <td><div class="list-item">{{$ticket->created_at}}</div></td>
                                    <td><div class="list-item">{{boolval($ticket->status)? 'Finished':'Open'}}</div></td>
                                    <td>
                                        <a href={{route('tickets.complete', $ticket->id)}} class='btn'
                                            style="color: {{boolval($ticket->status) ? '#27e024' : '#505250'}};">
                                                Finish
                                            </a>
            
                                        {{-- <form class="float-right" action="{{route('tickets.destroy', $ticket->id)}}" 
                                        method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Are you sure?')">
                                                {{__('translation.delete')}}
                                            </button>
                                        </form> --}}
                                        {{-- <a href="{{route('tickets.edit',$ticket->id)}}" class="btn btn-primary btn-sm float-right">{{__('translation.edit')}}</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="row justify-content-center">
                            {{ $tickets->links() }}
                        </div>
                        

                    @else
                        <p>No tickets yet</p> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection