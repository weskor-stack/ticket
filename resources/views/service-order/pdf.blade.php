<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('css/pdf_tables.css') }}" rel="stylesheet" type="text/css">
    
</head>
<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <img src="{{ public_path('images/logoAutomatyco3.png') }}" width="30%" height="150%" style="text-align: left;"/>
    </header>
    <footer>
        <p>Av. 5 de Mayo #15 Bod. #8 Colonia San Juan de Ocotan. Tel/Fax: (33) 3120-1000 C.P. 45019, Zapopan, Jalisco</p>
        <p>R.F.C. AMC-030901-P69</p>
    </footer>
<br>
<br>    
    <div>
        <table id="customers3">
            <thead>
                <tr>
                    <b><legend>{{ __('Customer')}}:</legend></b>
                </tr>
            </thead>
            <br>
                <tr>
                    <th></th>
                    <th>
                        @foreach($customers as $customer)
                            @foreach($contacts as $contact)
                                @if($tickets->contact_id == $contact->contact_id)
                                    @if($customer->customer_id == $contact->customer_id)
                                        <b>{{ __('Name')}}:</b> {{ $customer->name }}<br>
                                        <b>{{ __('Contact')}}:</b> {{ $contact->name }}<br>
                                        <b>{{ __('Contacts phone')}}:</b> {{ $contact->phone }}<br>
                                        <b>{{ __('Customers phone')}}:</b> {{ $customer->phone }}<br>
                                        <b>{{ __('Service Address')}}:</b> {{ $customer->address }}<br>
                                        <b>{{ __('Date')}}:</b> {{\Carbon\Carbon::parse($serviceOrder->date_order)->format('d/m/Y')}}
                                    @endif
                                @endif
                            @endforeach                
                        @endforeach
                    </th>
                    <th>
                        
                    </th>
                    <td>
                        <b>{{ __('Ticket')}}:</b> {{ $serviceOrder->ticket->ticket_id }}<br>
                        <b>{{ __('Order')}}:</b> {{ $serviceOrder->order_service_id }}<br>
                        <b></b><br><br>
                        <b></b> 
                    </td>
                </tr>
        </table>
    </div>
    <br><br>
    <div>
        <h3>{{ __('Order of service')}}</h3>
        <table id="customers3">
           <tr>
                <td>
                    <b>* {{ __('Type of maintenance')}}: </b> {{$serviceOrder->typeMaintenance->name}}.
                </td>
                <td>
                    <b>* {{ __('Type of service')}}: </b> {{$serviceOrder->typeService->name}}.
                </td>
            </tr>
        </table>
    </div>
    <br>
    <b><legend>{{ __('Materials')}}</legend></b>
    <br>
    <br>
    <div>
        <table id ="customers2">
            <thead>                           
                <tr>
                    <th>{{ __('Name')}}</th>
					<th>{{ __('Key')}}</th>
                    <th>{{ __('Quantity')}}</th>
                    <th>{{ __('Unit of measure')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materialAssigneds as $materialAssigned)                   
                    <tr>
                        <td>{{ $materialAssigned->material->name }}</td>
                        <td>{{ $materialAssigned->material->key }}</td>
                        <td>{{ $materialAssigned->quantity }}</td>
                        <td>{{ $materialAssigned->material->unitMeasure->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <b><legend>{{ __('Tools')}}</legend></b>
    <br>
    <br>
    <div>
        <table id="customers2">
            <thead>      
                <tr>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Key')}}</th>
                    <th>{{ __('Quantity')}}</th>
                    <th>{{ __('Unit of measure')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($toolAssigneds as $toolAssigned)
                    <tr>
                        <td>{{ $toolAssigned->tool->name }}</td>
                        <td>{{ $toolAssigned->tool->key }}</td>
                        <td>{{ $toolAssigned->quantity }}</td>
                        <td>{{ $toolAssigned->tool->unitMeasure->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <b><legend>{{ __('Employees')}}</legend></b>
    <br>
    <br>
    <div>
        <table id="customers2">
            <thead>
                <tr>
                    <th>{{ __('ID Employees')}}</th>
                    <th>{{ __('Employee')}}</th>
                    <th>{{ __('Department')}}</th>
                    <th>{{ __('Supervisor')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employeeOrders as $employeeOrder)
                    <tr>
                        <td>{{ $employeeOrder->employee_id }}</td>
                        @foreach($employees as $employee)
                            @if($employee->employee_id == $employeeOrder->employee_id)
                                <td>{{ $employee->name }} {{ $employee->last_name }}</td>
                            @endif
                        @endforeach
                        
                        @foreach($employee_hierarchical_position as $supervisor)
                            @if($supervisor->employee_id == $employeeOrder->employee_id)
                                @foreach($hierarchical_position as $position)
                                    @if($position->hierarchical_position_id == $supervisor->hierarchical_position_id)
                                        @foreach($hierarchical as $jerarquia)
                                            @if($jerarquia->hierarchical_id == $position->hierarchical_id)
                                                <td style="width:20%">{{$jerarquia->position}} {{$position->name}} </td>
                                                @foreach($hierarchical_structure as $structure)
                                                    @if($structure->hierarchical_position_id == $supervisor->hierarchical_position_id)
                                                        @foreach($employee_hierarchical_position as $supervisor2)
                                                            @if($supervisor2->hierarchical_position_id == $structure->superior_hierarchical_position_id)
                                                                @foreach($employees as $employ2)
                                                                    @if($employ2->employee_id == $supervisor2->employee_id)
                                                                        <td>{{$employ2->name}} {{$employ2->last_name}} {{$employ2->second_last_name}}</td>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach          
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>

    <br><br>
    <b><legend>{{ __('Schedule')}}</legend></b>
    <br><br>
    <div>
        <table class="table table-striped table-hover" id="customers2">
                                
            <thead style="text-align: center">
                <tr style="text-align: center">
                
                    <th>{{ __('Date service')}}</th>
                    <th>{{ __('Time entry')}}</th>
                    <th>{{ __('Exit')}}</th>
                    <th>{{ __('Lunchtime')}}</th>
                    <th>{{ __('Service hour')}}</th>
                    <th>{{ __('Duration travel')}}</th>	
                    <th >{{ __('Employee')}}</th>
    
                </tr>
            </thead>
            
            <tbody>
                @foreach($shcedules as $schedule)
                    <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                        <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>                                
                        <td>{{ $schedule->time_entry }}</td>
                        <td>{{ $schedule->time_departure }}</td>
                        <td>{{ $schedule->lunchtime }} horas</td>
                        <td>{{ $schedule->hours_service }} horas</td>
                        <td>{{ $schedule->hours_travel }} horas</td>
                        <td>
                            @foreach($employee2 as $employee)
                                @if($employee->employee_id == $schedule->employee_id)    
                                    {{ $employee->name }} {{ $employee->last_name }} {{ $employee->second_last_name }}
                                @endif
                            @endforeach
                        </td>
                    </tr>        
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>