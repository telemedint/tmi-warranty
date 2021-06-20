@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16" style="width: 100%">
            <div class="card">
                <div class="card-header">
                    <h1>@lang('translation.invoices')</h1>
                    <a href="{{route('invoices.create')}}" class="btn btn-success submit_btn">@lang('translation.add_invoice')</a>
                </div>

                <div class="card-body">
                    @if ($invoices->count() > 0)
                        <table class="table">
                            <tr>
                                <th>{{__('translation.client_name')}}</th>
                                <th>{{__('translation.purchase_date')}}</th>
                                <th>{{__('translation.technical_support')}}</th>
                                <th>{{__('translation.repairing_service')}}</th>
                                <th>{{__('translation.premium_support')}}</th>
                            </tr>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    {{-- <td><div class="list-item">{{$invoice->client->name}}</div></td> --}}
                                    <td>
                                        <div class="list-item">
                                            @if($client = App\Client::find($invoice->client_id))
                                                    {{$client->name}}  
                                            @else
                                                Client has been deleted
                                            @endif
                                        </div>
                                    </td>
                                    <td><div class="list-item">{{$invoice->purchase_date}}</div></td>
                                    <td><div class="list-item">{{$invoice->technical_support}}</div></td>
                                    <td><div class="list-item">{{$invoice->repairing_service}}</div></td>
                                    <td><div class="list-item">{{$invoice->premium_support}}</div></td>
                                    
                                    <td>
                                        <form class="float-right" action="{{route('invoices.destroy', $invoice->id)}}" 
                                        method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm ml-2">{{__('translation.delete')}}</button>
                                        </form>
                                        <a href="{{route('invoices.edit',$invoice->id)}}" class="btn btn-primary btn-sm float-right">{{__('translation.edit')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="row justify-content-center">
                            {{ $invoices->links() }}
                        </div>
                    @else
                        <p>No invoices yet</p>    
                    @endif    
                    
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection