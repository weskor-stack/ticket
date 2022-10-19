@extends('layouts.app')

@section('template_title')
    {{ $orderPurchase->name ?? 'Show Order Purchase' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Order Purchase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('order-purchases.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Order Service Id:</strong>
                            {{ $orderPurchase->order_service_id }}
                        </div>
                        <div class="form-group">
                            <strong>Purchase Id:</strong>
                            {{ $orderPurchase->purchase_id }}
                        </div>
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $orderPurchase->key }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $orderPurchase->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $orderPurchase->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
