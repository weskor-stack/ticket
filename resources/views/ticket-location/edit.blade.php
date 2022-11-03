@extends('layouts.app')

@section('template_title')
    Update Ticket Location
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Ticket Location</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ticket_locations.update', $ticketLocation->ticket_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('ticket-location.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
