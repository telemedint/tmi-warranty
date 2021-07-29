@extends('layouts.app')
@section('style')
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                    <td>
                                        <select id="{{$ticket->id}}" class="status-select custom-select custom-select-sm" style="color: {{boolval($ticket->status) ? '#27e024' : '#505250'}}">
                                            <option value="0" @if (!$ticket->status) selected @endif>{{__('translation.open')}}</option>
                                            <option value="1" @if ($ticket->status) selected @endif>{{__('translation.finished')}}</option>
                                        </select>
            
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

@section('script')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('.status').select2();
        });
    </script>

    <script type="text/javascript">
        //Save status onchange of serial
        $(".status-select").on('change',function(event){
            event.preventDefault();
            let status = event.target.value;
            let id = event.target.id;
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('tickets.updateStatus') }}",
                type:"POST",
                data:{
                    status: status,
                    id: id,
                    _token: _token
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        if(status == 1){
                            $('#'+id).attr("style",'color: #27e024');
                        }else{
                            $('#'+id).attr("style",'color: #505250');
                        }
                    }
                },
                error: function (data) {
                    window.alert("error");
                    console.log(data);
                }
            });
        });
    </script>
    
@endsection