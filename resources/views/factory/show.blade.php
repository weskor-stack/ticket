@extends('layouts.app')

@section('template_title')
    {{ $factory->name ?? 'Show Factory' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Factory</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('factories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Factory Id:</strong>
                            {{ $factory->factory_id }}
                        </div>
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $factory->key }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $factory->name }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $factory->address }}
                        </div>
                        <div class="form-group">
                            <strong>Customer Id:</strong>
                            {{ $factory->customer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Id:</strong>
                            {{ $factory->contact_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $factory->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $factory->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
