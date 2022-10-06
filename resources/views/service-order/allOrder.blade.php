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
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ticket') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                                                    
                                        <th>Order date</th>
                                        <th>Ticket</th>
                                        <th>Maintenance type</th>
                                        <th>Service type</th>
                                        <th>Order status</th>
                                        <th>Actions</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceOrders as $serviceOrder)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ $serviceOrder->order_service_id }}</td>
                                            <td>{{ $serviceOrder->date_order }}</td>
                                            <td>{{ $serviceOrder->ticket_id }}</td>
                                            <td>{{ $serviceOrder->order_status_id }}</td>
                                            <td>{{ $serviceOrder->type_maintenance_id }}</td>
                                            <td>{{ $serviceOrder->type_service_id }}</td>

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