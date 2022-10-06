@extends('layouts.app')

@section('template_title')
    {{ $orderEmployeeSchedule->name ?? 'Show Order Employee Schedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Order Employee Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('order-employee-schedules.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Order Employee Schedule Id:</strong>
                            {{ $orderEmployeeSchedule->order_employee_schedule_id }}
                        </div>
                        <div class="form-group">
                            <strong>Time Entry:</strong>
                            {{ $orderEmployeeSchedule->time_entry }}
                        </div>
                        <div class="form-group">
                            <strong>Time Departure:</strong>
                            {{ $orderEmployeeSchedule->time_departure }}
                        </div>
                        <div class="form-group">
                            <strong>Lunchtime:</strong>
                            {{ $orderEmployeeSchedule->lunchtime }}
                        </div>
                        <div class="form-group">
                            <strong>Hours Service:</strong>
                            {{ $orderEmployeeSchedule->hours_service }}
                        </div>
                        <div class="form-group">
                            <strong>Hours Travel:</strong>
                            {{ $orderEmployeeSchedule->hours_travel }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $orderEmployeeSchedule->date }}
                        </div>
                        <div class="form-group">
                            <strong>Order Service Id:</strong>
                            {{ $orderEmployeeSchedule->order_service_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $orderEmployeeSchedule->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $orderEmployeeSchedule->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $orderEmployeeSchedule->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
