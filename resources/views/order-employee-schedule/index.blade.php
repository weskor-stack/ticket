@extends('layouts.app')

@section('template_title')
    Order Employee Schedule
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order Employee Schedule') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('order-employee-schedules.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Order Employee Schedule Id</th>
										<th>Time Entry</th>
										<th>Time Departure</th>
										<th>Lunchtime</th>
										<th>Hours Service</th>
										<th>Hours Travel</th>
										<th>Date</th>
										<th>Order Service Id</th>
										<th>Employee Id</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderEmployeeSchedules as $orderEmployeeSchedule)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $orderEmployeeSchedule->order_employee_schedule_id }}</td>
											<td>{{ $orderEmployeeSchedule->time_entry }}</td>
											<td>{{ $orderEmployeeSchedule->time_departure }}</td>
											<td>{{ $orderEmployeeSchedule->lunchtime }}</td>
											<td>{{ $orderEmployeeSchedule->hours_service }}</td>
											<td>{{ $orderEmployeeSchedule->hours_travel }}</td>
											<td>{{ $orderEmployeeSchedule->date }}</td>
											<td>{{ $orderEmployeeSchedule->order_service_id }}</td>
											<td>{{ $orderEmployeeSchedule->employee_id }}</td>
											<td>{{ $orderEmployeeSchedule->user_id }}</td>
											<td>{{ $orderEmployeeSchedule->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('order-employee-schedules.destroy',$orderEmployeeSchedule->order_employee_schedule_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('order-employee-schedules.show',$orderEmployeeSchedule->order_employee_schedule_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('order-employee-schedules.edit',$orderEmployeeSchedule->order_employee_schedule_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $orderEmployeeSchedules->links() !!}
            </div>
        </div>
    </div>
@endsection
