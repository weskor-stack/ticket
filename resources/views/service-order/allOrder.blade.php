@extends('layouts.app')

@section('template_title')
    Service Order
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                        <link rel="stylesheet" href="{{ asset('css/CSS_Service_order/CSS_Service_order.css') }}">
                            <span id="card_title">
                                {{ __('Orders') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tickets.index') }}" class="myButton"  data-placement="left"><i class="material-icons">keyboard_double_arrow_left</i>&nbsp;
                                  {{ __('Back') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr style="text-align: center">
                                        <th>{{ __('Order')}}</th>
                                                                    
                                        <th>{{ __('Order date')}}</th>
                                        <th>{{ __('Ticket')}}</th>
                                        <th>{{ __('Maintenance type')}}</th>
                                        <th>{{ __('Service type')}}</th>
                                        <th>{{ __('Order status')}}</th>
                                        <th>{{ __('Actions')}}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceOrders as $serviceOrder)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ $serviceOrder->order_service_id }}</td>
                                            <td>{{ $serviceOrder->date_order }}</td>
                                            <td>{{ $serviceOrder->ticket->subject }}</td>                                            
                                            <td>{{ $serviceOrder->typeMaintenance->name }}</td>
                                            <td>{{ $serviceOrder->typeService->name }}</td>
                                            <td>{{ $serviceOrder->orderStatus->name }}</td>

                                            <td>
                                                <a title="{{ __('Order') }}" class="btn btn-warning" href="{{ route('service-orders.index','id_ticket='.$serviceOrder->order_service_id) }}"><i class="material-icons" style="font-size:20px">visibility</i>&nbsp; {{ __('Order') }}</a>
                                            </td>
                                                                                        
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $serviceOrders->links() !!}
            </div>
        </div>
    </div>

@endsection