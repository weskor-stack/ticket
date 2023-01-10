<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('css/pdf_tables2.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Define header and footer blocks before your content -->
    <header style="text-align: center;">
        <img src="{{ public_path('images/pdf_customer/header.png') }}" width="800px" height="90px"/>
    </header>
    <footer>
        <img src="{{ public_path('images/pdf_customer/footer.png') }}" width="800px" height="185px"/>
    </footer>
   
    <div>
        <table id=customers3>
            <thead>
                <b><legend>{{ __('Customer')}}</legend></b>
            </thead>
            
            <tbody>
                <tr>
                    <th>
                        @foreach($customers as $customer)
                            <b>{{ __('Name') }}:</b> {{ $customer->name }}<br>
                            @foreach($contacts as $contact)
                                <b>{{ __('Contact') }}:</b> {{ $contact->name }} {{ $contact->last_name}}<br>
                                <b>{{ __('Contacts phone') }}:</b> {{ $contact->phone }}<br>
                                <b>{{ __('Customers phone') }}:</b> {{ $customer->phone }}<br><br>
                            @endforeach
                        @endforeach
                    </th>
                    <th>
                        <b>{{ __('Ticket') }}:</b> {{ $tickets }}<br>
                        <b>{{ __('Order') }}:</b> {{ $service->order_service_id }}<br>
                        <b>{{ __('Service Address') }}:</b> {{ $customer->address }}<br>
                        <b>{{ __('Date') }}:</b> {{ \Carbon\Carbon::parse($service->data_service)->format('d/m/Y') }}
                        <b></b> 
                    </th>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div>
        <h3>{{ __('Reports')}}</h3>
        <table id="customers3">
           <tr>
               @foreach($maintenances as $manitenance)
                   
                        @if($manitenance->type_maintenance_id == $type_maintenance)
                            <td>
                                <b>* {{ __('Type of maintenance')}}: </b> {{$manitenance->name}}.
                            </td>
                        @endif
                    
                @endforeach
                
                @foreach($typeServices as $service)
                    
                        @if($service->type_service_id == $type_service)
                            <td>
                                <b>* {{ __('Type of service')}}: </b> {{$service->name}}.
                            </td>
                        @endif
                    
                @endforeach
            </tr>
        </table>
    </div>
    <b><legend>{{ __('Schedule')}}</legend></b>
    <br>
    <br>
    <div>
        <table id="customers2">
            <thead>
                <tr>
                    <th>{{ __('Date service')}}</th>
                    <th>{{ __('Time entry')}}</th>
                    <th>{{ __('Exit')}}</th>
                    <th>{{ __('Lunchtime')}}</th>
                    <th>{{ __('Service hour')}}</th>
                    <th>{{ __('Service extra')}}</th>
                    <th>{{ __('Duration travel')}}</th>                    
                    <th>{{ __('Employee')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($service_employees as $service_employee)
                    @if($service_employee->service_id == $service3)
                        @foreach ($serviceReports as $serviceReport)
                            @if($serviceReport->service_employee_id == $service_employee->service_employee_id)
                                <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                    <td>{{ \Carbon\Carbon::parse($serviceReport->date)->format('d/m/Y') }}</td>
                                                        
                                    <td>{{ $serviceReport->time_entry }}</td>
                                    <td>{{ $serviceReport->time_departure }}</td>
                                    <td>{{ $serviceReport->lunchtime }} horas</td>
                                    <td>{{ $serviceReport->hours_service }} horas</td>
                                    <td>{{ $serviceReport->hours_extras }} horas</td>
                                    <td>{{ $serviceReport->hours_travel }} horas</td>
                                    @foreach($employees as $employee)
                                        @if($serviceReport->serviceEmployee->employee_id == $employee->employee_id)
                                            <td>{{ $employee->name }} {{ $employee->last_name }} {{ $employee->second_last_name }}</td>
                                        @endif
                                    @endforeach                                    
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <br>
    <h2 style="text-align:center;">{{ __('Elements used') }}</h2>
    
    <b><legend>{{ __('Materials')}}</legend></b>
    <br><br>
    <div>
        <table id="customers2">
            <thead>
               <tr>
                    <th>{{ __('Key')}}</th>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Quantity')}}</th>
                    <th>{{ __('Unit of measure')}}</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($materialUseds as $materialUsed)
                    <tr>
                        <td>{{ $materialUsed->material->key }}</td>
                        <td>{{ $materialUsed->material->name }}</td>
                        <td>{{ $materialUsed->quantity }}</td>
                        <td>{{ $materialUsed->material->unitMeasure->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <b><legend>{{ __('Tools')}}</legend></b>
    <br><br>
    <div>
        <table id=customers2>
            <thead>
                <tr>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Key')}}</th>
                    <th>{{ __('Quantity')}}</th>
                    <th>{{ __('Unit of measure')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($toolUseds as $toolUsed)
                    <tr>
                        <td>{{ $toolUsed->tool->name }}</td>
                        <td>{{ $toolUsed->tool->key }}</td>
                        <td>{{ $toolUsed->quantity }}</td>
                        <td>{{ $toolUsed->tool->unitMeasure->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    <div style="page-break-before: always;">
        <div>
        <br>
            @foreach($activity2 as $activity)
                <div class="box box-info padding-1">
                    <div class="box-body">
                        <div class="form-group">
                            <h1 style="text-align:center;">{{ __('Activities implemented')}}</h1>
                            <legend>{{ __('Activities implemented')}}</legend> <br><br><br>
                                           
                            {{ $activity->description }}

                            <br>
                        </div>
                        <br><br>
                        <div>
                            <legend>{{ __('Evidence') }} </legend>
                            <table class=table align="center">
                                <tr>
                                    <td style="text-align:center;">
                                        <h5>{{ __('Before')}}:</h5>

                                        <div class="form-group"style="text-align:center;">
                                            <img src="{{  $activity->previous_evidence }}" width="250" height="250" alt="">
                                        </div>
                                    </td>
                                    <td style="text-align:center;">
                                        <h5>{{ __('After') }}:</h5>
                                        <div class="form-group" style="text-align:center;">
                                            <img src="{{  $activity->subsequent_evidence }}" width="250" height="250" alt="">
                                        </div>
                                    </td>
                                    <br>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <legend>{{ __('Signature') }}:</legend><br>
                            <img src="{{  $activity->signature_evidence }}" width="100%" height="200" alt="">
                                            
                        </div>
                        <div>
                            <table id="customers4">
                                <tr>
                                    <td w>
                                        <div>
                                            <legend style="text-align:center">{{ __('Executor')}}: </legend><br>
                                            @foreach($employees as $employee)
                                                @if($employee->employee_id == $activity->employee_id )
                                                    {{ $employee->name }} {{ $employee->last_name }} {{ $employee->second_last_name }}
                                                @endif
                                            @endforeach                                            
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <legend>{{ __('Contact')}}:</legend><br>
                                            @foreach($contacts as $contact)
                                                @if($contact->contact_id == $activity->contact_id )
                                                    {{ $contact->name }} {{ $contact->last_name }} {{ $contact->second_last_name }}
                                                @endif
                                            @endforeach                                            
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!-- <table class="table table-striped table-hover" style="text-align:center;">
                                <tr style="text-align:center;">
                                    <td style="text-align:center;">
                                        <div class="form-group">
                                            <legend style="text-align:center">{{ __('Executor')}}</legend> <br>
                                            @foreach($employees as $employee)
                                                @if($employee->employee_id == $activity->employee_id )
                                                    <input type="text" class="form-control" style="text-align:center;" name="employee_id" id="employee_id" value="{{ $employee->name }} {{ $employee->last_name }} {{ $employee->second_last_name }}" disabled>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td style="text-align:center;">
                                        <div class="form-group" style="text-align:center;">
                                            <legend style="text-align:center">{{ __('Contact')}}</legend> <br>
                                            @foreach($contacts as $contact)
                                                @if($contact->contact_id == $activity->contact_id )
                                                    <input type="text" class="form-control" style="text-align:center;" name="contact_id" id="contact_id" value="{{ $contact->name }} {{ $contact->last_name }} {{ $contact->second_last_name }}" disabled>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                 </tr>
                            </table> -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>