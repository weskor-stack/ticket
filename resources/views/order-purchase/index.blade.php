@extends('layouts.app')

@section('template_title')
    Order Purchase
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order Purchase') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('order-purchases.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <tr>
                                        <th>No</th>
                                        
										<th>Order Service Id</th>
										<th>Purchase Id</th>
										<th>Key</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderPurchases as $orderPurchase)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $orderPurchase->order_service_id }}</td>
											<td>{{ $orderPurchase->purchase_id }}</td>
											<td>{{ $orderPurchase->key }}</td>
											<td>{{ $orderPurchase->user_id }}</td>
											<td>{{ $orderPurchase->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('order-purchases.destroy',$orderPurchase->purchase_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('order-purchases.show',$orderPurchase->purchase_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('order-purchases.edit',$orderPurchase->purchase_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $orderPurchases->links() !!}
            </div>
        </div>
    </div>
@endsection
