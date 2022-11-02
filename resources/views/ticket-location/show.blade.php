@extends('layouts.app')

@section('template_title')
    {{ $ticketLocation->name ?? 'Show Ticket Location' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ticket Location</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ticket_locations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ticket Id:</strong>
                            {{ $ticketLocation->ticket_id }}
                        </div>
                        <div class="form-group">
                            <strong>Factory Id:</strong>
                            {{ $ticketLocation->factory_id }}
                        </div>
                        <div class="form-group">
                            <strong>Site:</strong>
                            {{ $ticketLocation->site }}
                        </div>
                        <div class="form-group">
                            <strong>Location:</strong>
                            {{ $ticketLocation->location }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $ticketLocation->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $ticketLocation->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
