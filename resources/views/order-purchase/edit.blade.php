@extends('layouts.app')

@section('template_title')
    Update Order Purchase
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Order Purchase</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('order-purchases.update', $orderPurchase->purchase_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('order-purchase.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
