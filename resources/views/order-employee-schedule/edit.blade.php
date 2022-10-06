@extends('layouts.app')

@section('template_title')
    Update Order Employee Schedule
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Order Employee Schedule</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('order-employee-schedules.update', $orderEmployeeSchedule->order_employee_schedule_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('order-employee-schedule.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
