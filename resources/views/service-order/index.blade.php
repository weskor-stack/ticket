@extends('layouts.app')

@section('template_title')
    Service Order
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <!--------------------------------------------------------------------->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr style="text-align: center">
                                    <td></td>
                                    <td style="text-align: left"><legend>{{ __('Customer')}}</legend></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                                <tr>
                                    <td style="width:5%"></td>
                                    <td class="text-left" style="width:30%">
                                        @foreach($customers as $customer)
                                            <b>{{ __('Name')}}:</b> {{ $customer->name }}<br>
                                            @foreach($contacts as $contact)
                                                <b>{{ __('Contact')}}:</b> {{ $contact->name }}<br>
                                                <b>{{ __('Contacts phone')}}:</b> {{ $contact->phone }}<br>
                                            @endforeach
                                            <b>{{ __('Customers phone')}}:</b> {{ $customer->phone }}<br><br>

                                            <b>{{ __('Service Address')}}:</b> {{ $customer->address }}<br>
                                        @endforeach
                                        <b>{{ __('Date')}}:</b> {{\Carbon\Carbon::parse($serviceOrder->date_order)->format('d/m/Y')}}
                                        
                                    </td>
                                    <td class="text-left" style="width:30%">
                                        <b>{{ __('Factory')}}:</b> {{ $factories->name }}<br>
                                        <b>{{ __('Address')}}:</b> {{ $factories->address }}<br>
                                        <b>{{ __('Site')}}:</b> {{ $ticket_location->site }}<br>
                                        <b>{{ __('Location')}}:</b> 
                                            @if($ticket_location->location == 'L')
                                                {{ __('Local') }}
                                            @else
                                                {{ __('Foreign') }}
                                            @endif
                                        <br>
                                        <br>
                                        @if($serviceOrder_id=='8')

                                        @else
                                            <a type="submit" class="btn btn-info" data-toggle="modal" data-target="#location{{ $customers2->customer_id }}"><i class="material-icons" style="font-size:20px">edit</i>&nbsp; {{ __('Edit') }}</a>
                                        @endif
                                        @include('service-order.modal.location')
                                    </td>
                                    <td class="text-left" style="width:20%">
                                        <b>{{ __('Ticket')}}:</b> {{ $serviceOrder->ticket_id }}<br>
                                        <b>{{ __('Order')}}:</b> {{ $serviceOrder->order_service_id }}<br>
                                        <b></b> <br>
                                        <b></b><br><br>

                                        <b></b> <br>
                                        <b></b> 
                                    </td>
                                    <td class="text-left" style="width:15%">
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <form action="{{ route('service-orders.destroy',$serviceOrder->order_service_id) }}" method="POST">
                                            <!--<a class="btn btn-outline-primary" href="{{ route('service-orders.show',$serviceOrder->order_service_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                            @if($serviceOrder->order_status_id=='8')
                                                <a class="btn btn-outline-success" href="{{ route('service-orders.edit',$serviceOrder->order_service_id) }}" hidden><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1" hidden>Material</button>
                                                <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('material-assigneds.create', 'order='.$serviceOrder->order_service_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Material</a>-->
                                                <a type="submit" class="btn btn-outline-secondary" href="{{ route('tool-assigneds.create', 'order='.$serviceOrder->order_service_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Tools</a>
                                                <a type="submit" class="btn btn-outline-secondary" href="{{ route('employee-orders.create','order='.$serviceOrder->order_service_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Add employee</a>
                                            @else
                                                <!--<a class="btn btn-outline-success" href="{{ route('service-orders.edit',$serviceOrder->order_service_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('material-assigneds.create', 'order='.$serviceOrder->order_service_id) }}"><i class="fa fa-fw fa-trash"></i> Material</a>-->
                                                @method('GET')
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                                                <!--@method('GET')
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo4" >Edit</button>-->
                                                <!--@method('GET')
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1">Material</button>-->
                                                <!---->   
                                                <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('tool-assigneds.create', 'order='.$serviceOrder->order_service_id) }}"><i class="fa fa-fw fa-trash"></i> Tools</a>-->
                                                                            
                                                <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('employee-orders.create','order='.$serviceOrder->order_service_id) }}"><i class="fa fa-fw fa-trash"></i> Add employee</a>-->
                                            @endif

                                            @if($serviceOrder->order_status_id=='1')
                                                <!--<a href="{{ route('services.create','id='.$serviceOrder->order_service_id) }}" class="btn btn-outline-warning"  data-placement="left">{{ __('Create report') }}</a>-->
                                                @method('GET')
                                                <button title="{{ __('Create report') }}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogo5"><i class="material-icons" style="font-size:20px">bookmarks</i>&nbsp;{{ __('Create report') }}</button>
                                                <button title="{{__('Help')}}" class="btn" width="5%" data-toggle="modal" data-target="#help_crear_reporte"><i class="material-icons">&#xe887;</i></button>
                                            @else
                                                <a href="{{ route('services.create','id='.$serviceOrder->order_service_id) }}" class="btn btn-outline-warning"  data-placement="left" hidden>{{ __('Create report') }}</a>
                                                <a title="{{ __('Reports')}}" type="submit" class="btn btn-warning" href="{{ route('services.index','id_ticket='.$serviceOrder->order_service_id) }}"><i class="material-icons" style="font-size:20px">visibility</i>&nbsp; {{ __('Reports')}}</a>
                                                <button title="{{__('Help')}}" class="btn" width="5%" data-toggle="modal" data-target="#help"><i class="material-icons">&#xe887;</i></button>
                                            @endif                    
                                                                            
                                            <div>                                                                                

                                                <div class="modal fade" id="dialogo0">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">{{ __('Add material')}}</h4>
                                                                    <img src="{{ asset('images/icons/add2.png') }}" width="8%">
                                                                </div>

                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                                            
                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('material-assigneds.store') }}"  role="form" enctype="multipart/form-data">
                                                                            @csrf

                                                                            @include('material-assigned.form')

                                                                        </form>
                                                                    </div>                                                            
                                                                </div>

                                                            <!-- pie del diálogo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                                                                </div>

                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                </div>
                                                
                                                <div class="modal fade" id="dialogo1" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">{{ __('Add material')}}</h4>
                                                                    <img src="{{ asset('images/icons/add2.png') }}" width="8%">
                                                                </div>

                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <!--<input type="number" name="message" id="message"> <br>-->
                                                                        <b>{{ __('Stock') }}: </b><input type="text" id="text1" name="text1" value="" style="width:70px;" disabled> &nbsp; &nbsp; 
                                                                        <b>{{ __('unit_measure') }}: </b><input type="text" id="text2" name="text2" value="" style="width:80px;" disabled><br><br>
                                                                        <form method="POST" action="{{ route('material-assigneds.store') }}"  role="form" enctype="multipart/form-data">
                                                                            @csrf

                                                                            @include('material-assigned.form')

                                                                            <script>
                                                                                 $('.select2').select2({
                                                                                    dropdownParent: $('#dialogo1 .modal-body')
                                                                                });
                                                                            </script>
                                                                        </form>
                                                                        <br>

                                                                        <script>
                                                                            var value_input;
                                                                            $('select').on('change', function() {
                                                                                var data = this.value;
                                                                                /*document.getElementById("text1").value = data;
                                                                                const contenido = document.getElementById("text1").value;
                                                                                //alert(contenido);*/
                                                                                var countryId = $(this).find(':selected').data('stock');
                                                                                var unity = $(this).find(':selected').data('unity');
                                                                                $("#text1").val(data);
                                                                                $("#text2").val(unity);
                                                                                document.getElementById("text1").value = countryId;
                                                                                document.getElementById("text2").value = unity;
                                                                                //alert( "{{ __('unit_measure')}}: " + unity + "\n" + "{{ __('Stock')}}: " + countryId );
                                                                                
                                                                                //alert(quantity);
                                                                            });

                                                                            /*$('#message').on("keyup", function(){
                                                                                var x = $('#message').val();
                                                                                var y = document.getElementById("text1").value;
                                                                                if (x>y) {
                                                                                    alert("No hay suficiente material");
                                                                                }
                                                                            });
                                                                            /*function elementoCantidad(elemento){
 
                                                                                alert("s");

                                                                            }*/
                                                                        </script>

                                                                        <script>
                                                                            $(document).ready(function() {
                                                                                $('#dialogo1').on('show.bs.modal', function() {
                                                                                    $('#select2-sample').select2();
                                                                                })
                                                                            });
                                                                        </script>
                                                                    </div>                                                            
                                                                </div>

                                                            <!-- pie del diálogo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons" style="font-size:20px">block</i>&nbsp; {{ __('Cancel')}}</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                        
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                </div>
                                                        
                                                <div class="modal fade" id="dialogo2" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">{{ __('Add tool')}}</h4>
                                                                    <img src="{{ asset('images/icons/add2.png') }}" width="8%">
                                                                </div>

                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">                    
                                                                    <div class="card-body">
                                                                        <b>{{ __('Stock') }}: </b><input type="text" id="text3" name="text3" value="" style="width:70px;" disabled> &nbsp; &nbsp;
                                                                        <b>{{ __('unit_measure') }}: </b><input type="text" id="text4" name="text4" value="" style="width:80px;" disabled><br> <br>
                                                                        <form method="POST" action="{{ route('tool-assigneds.store') }}"  role="form" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @include('tool-assigned.form')

                                                                            <script>
                                                                                 $('#tool_id').select2({
                                                                                    dropdownParent: $('#dialogo2 .modal-body')
                                                                                });
                                                                            </script>
                                                                        </form>
                                                                        <script>
                                                                            var value_input;
                                                                            $('#tool_id').on('change', function() {
                                                                                var data = this.value;
                                                                                document.getElementById("text1").value = data;
                                                                                const contenido = document.getElementById("text1").value;
                                                                                //alert(contenido);*/
                                                                                var countryId = $(this).find(':selected').data('stock');
                                                                                var unity = $(this).find(':selected').data('unity');
                                                                                $("#text3").val(data);
                                                                                $("#text4").val(unity);
                                                                                document.getElementById("text3").value = countryId;
                                                                                document.getElementById("text4").value = unity;
                                                                                //alert( "{{ __('unit_measure')}}: " + unity + "\n" + "{{ __('Stock')}}: " + countryId );
                                                                            });
                                                                        </script>
                                                                    </div>                                                            
                                                                </div>
                                                            <!-- pie del diálogo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons" style="font-size:20px">block</i>&nbsp; {{ __('Cancel')}}</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                </div>

                                                <div class="modal fade" id="dialogo3" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">{{ __('Add employee')}}</h4>   
                                                                    <img src="{{ asset('images/icons/add2.png') }}" width="8%">         
                                                                </div>
                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">                
                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('employee-orders.store') }}"  role="form" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @include('employee-order.form')

                                                                            <script>
                                                                                 $('#employee_id').select2({
                                                                                    dropdownParent: $('#dialogo3 .modal-body')
                                                                                });
                                                                            </script>
                                                                        </form>
                                                                    </div>                                                            
                                                                </div>
                                                            <!-- pie del diálogo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons" style="font-size:20px">block</i>&nbsp; {{ __('Cancel')}}</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                </div>
                                                    
                                                <div class="modal fade" id="dialogo4" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">{{__('Edit')}}</h4>
                                                                </div>
                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('service-orders.update', $serviceOrder->order_service_id) }}"  role="form" enctype="multipart/form-data">
                                                                            {{ method_field('PATCH') }}
                                                                            @csrf
                                                                            
                                                                            <div class="box box-info padding-1">
                                                                                <div class="box-body">
                                                                                    

                                                                                    <div class="form-group" hidden>
                                                                                        {{ Form::label('ticket_id:') }}
                                                                                        @foreach ($tickets as $ticket)
                                                                                        {{ Form::text('ticket_id', $ticket->ticket_id, ['class' => 'md-form md-outline input-with-post-icon datepicker' . ($errors->has('date_order') ? ' is-invalid' : ''), 'placeholder' => 'Date Order']) }}
                                                                                        {!! $errors->first('date_order', '<div class="invalid-feedback">:message</div>') !!}
                                                                                        @endforeach
                                                                                    </div>
                                                                                            
                                                                                    <div class="form-group" style="text-align:center" hidden>
                                                                                        {{ Form::label(__('Date')) }}
                                                                                        {{ Form::date('date_order', date('Y-m-d'), ['class' => 'md-form md-outline input-with-post-icon datepicker' . ($errors->has('date_order') ? ' is-invalid' : ''), 'placeholder' => 'Date Order']) }}
                                                                                        {!! $errors->first('date_order', '<div class="invalid-feedback">:message</div>') !!}
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="form-group">
                                                                                        <table class="table table-striped table-hover">
                                                                                            <tr>
                                                                                                <td style="width:30%"></td>
                                                                                                <td>
                                                                                                    <div class="form-group">
                                                                                                    {{ Form::label( __('Type of maintenance')) }}<br>
                                                                                                    <input type="radio" name="type_maintenance_id" id="type_maintenance_id" value="1" checked> {{ __('Preventive') }} <br>
                                                                                                    <!--@if ($serviceOrder->type_maintenance_id=='1')
                                                                                                    {{ Form::radio('type_maintenance_id','1',true) }}
                                                                                                    @else
                                                                                                    {{ Form::radio('type_maintenance_id','1') }}
                                                                                                    @endif
                                                                                                    {{ Form::label( __('Preventive')) }}<br>-->
                                                                                                    @if ($serviceOrder->type_maintenance_id=='2')
                                                                                                    {{ Form::radio('type_maintenance_id','2',true) }}
                                                                                                    @else
                                                                                                    {{ Form::radio('type_maintenance_id','2') }}
                                                                                                    @endif
                                                                                                    {{ Form::label( __('Corrective')) }}<br>
                                                                                                    @if ($serviceOrder->type_maintenance_id=='3')
                                                                                                    {{ Form::radio('type_maintenance_id','3'),true }}
                                                                                                    @else
                                                                                                    {{ Form::radio('type_maintenance_id','3') }}
                                                                                                    @endif
                                                                                                    {{ Form::label( __('Predictive')) }}<br>
                                                                                                    
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div class="form-group">
                                                                                                        {{ Form::label( __('Type of service')) }}<br>
                                                                                                        <input type="radio" name="type_service_id" id="type_service_id" value="1" checked> {{ __('Mechanic') }} <br>
                                                                                                        <!--@if ($serviceOrder->type_service_id=='1')
                                                                                                        {{ Form::radio('type_service_id','1',true) }}
                                                                                                        @else
                                                                                                        {{ Form::radio('type_service_id','1') }}
                                                                                                        @endif
                                                                                                        {{ Form::label( __('Software')) }}<br>-->
                                                                                                        @if ($serviceOrder->type_service_id=='2')
                                                                                                        {{ Form::radio('type_service_id','2',true) }}
                                                                                                        @else
                                                                                                        {{ Form::radio('type_service_id','2') }}
                                                                                                        @endif
                                                                                                        {{ Form::label( __('Electric')) }}<br>
                                                                                                        @if ($serviceOrder->type_service_id=='3')
                                                                                                        {{ Form::radio('type_service_id','3',true) }}
                                                                                                        @else
                                                                                                        {{ Form::radio('type_service_id','3') }}
                                                                                                        @endif
                                                                                                        {{ Form::label( __('Electronic')) }}<br>
                                                                                                        
                                                                                                        <!--{{ Form::select('type_service_id', $service, $serviceOrder->type_service_id, ['class' => 'form-control' . ($errors->has('type_service_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de servicio']) }}
                                                                                                        {!! $errors->first('type_service_id', '<div class="invalid-feedback">:message</div>') !!}-->
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="width:20%"></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                        
                                                                                    </div>

                                                                                    

                                                                                    <div class="form-group" hidden>
                                                                                        {{ Form::label('status_order_id') }}
                                                                                        {{ Form::text('status_order_id', 1) }}
                                                                                        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-group" hidden>
                                                                                        {{ Form::label('user_id') }}
                                                                                        {{ Form::text('user_id', 9999) }}
                                                                                        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                                                                                    </div>
                                                                                    
                                                                                    <br>
                                                                                </div>
                                                                                <div class="box-footer mt20" style="text-align:center">
                                                                                    <button type="submit" class="btn btn-success btn-lg"><i class="far fa-thumbs-up"></i>&nbsp; {{ __('Accept')}}</button>
                                                                                    <!--<a class="btn btn-danger btn-lg" href="{{ route('service-orders.index') }}"> Cancel</a>-->
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>                                                           
                                                                </div>
                                                                
                                                            <!-- pie del diálogo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp; {{ __('Cancel') }}</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                </div>
                                                    
                                                <div class="modal fade" id="dialogo5">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">{{ __('Create report')}}</h4>                
                                                                </div>

                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                    <p style="text-align:center">{{ __('Do you want create a report?')}}</p>
                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('services.store') }}"  role="form" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @include('service.form')
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            
                                                            <!-- pie del diálogo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;{{ __('Cancel')}}</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                </div> 
                                                
                                                <div class="modal fade" id="dialogo6">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">{{ __('Edit')}}</h4>
                                                                </div>
                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                    <div class="card-body">

                                                                    </div>                                                           
                                                                </div>
                                                                
                                                            <!-- pie del diálogo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                </div>

                                                <div class="modal modal-fullscreen fade" id="help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo 
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">{{ __('Help')}}</h1>
                                                                <img src="{!! asset('images/question.png')!!}" width="5%">
                                                            </div>-->
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body" style="background-color: #d6dbdf; text-align:centered;">
                                                                
                                                                <div class="card-body">
                                                                    <img src="{!! asset('images/user_guide/user_guide3.png')!!}" width="100%">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo 
                                                            <div class="modal-footer" style="background-color: #d6dbdf;">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                                                            </div>-->
                                                        
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                                                    <div class="modal modal-fullscreen fade" id="help_crear_reporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo 
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">{{ __('Help')}}</h1>
                                                                <img src="{!! asset('images/question.png')!!}" width="5%">
                                                            </div>-->
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body" style="background-color: #d6dbdf; text-align:center;">
                                                                
                                                                <div class="card-body" style="background-color: #d6dbdf; text-align:center;">
                                                                    <!--<img src="{!! asset('images/user_guide/user_guide1.png')!!}" width="100%">-->
                                                                   
                                                                    <img src="{!! asset('images/user_guide/crear_reporte.png')!!}" width="80%" style="text-align:center;">
                                                                    
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo
                                                            <div class="modal-footer" style="background-color: #d6dbdf;">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                                                            </div> -->
                                                        
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                                                    
                                                    <div class="modal modal-fullscreen fade" id="help_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo 
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">{{ __('Help')}}</h1>
                                                                <img src="{!! asset('images/question.png')!!}" width="5%">
                                                            </div>-->
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body" style="background-color: #d6dbdf; text-align:centered;">
                                                                
                                                                <div class="card-body">
                                                                    <img src="{!! asset('images/user_guide/editar.png')!!}" width="100%">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo
                                                            <div class="modal-footer" style="background-color: #d6dbdf;">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                                                            </div> -->
                                                        
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                                                    <div class="modal modal-fullscreen fade" id="help_material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo 
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">{{ __('Help')}}</h1>
                                                                <img src="{!! asset('images/question.png')!!}" width="5%">
                                                            </div>-->
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body" style="background-color: #d6dbdf; text-align:centered;">
                                                                
                                                                <div class="card-body">
                                                                    <img src="{!! asset('images/user_guide/agregar_material.png')!!}" width="100%">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo
                                                            <div class="modal-footer" style="background-color: #d6dbdf;">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                                                            </div> -->
                                                        
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                                                    <div class="modal modal-fullscreen fade" id="help_tool" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo 
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">{{ __('Help')}}</h1>
                                                                <img src="{!! asset('images/question.png')!!}" width="5%">
                                                            </div>-->
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body" style="background-color: #d6dbdf; text-align:centered;">
                                                                
                                                                <div class="card-body">
                                                                    <img src="{!! asset('images/user_guide/agregar_herramienta.png')!!}" width="100%">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo
                                                            <div class="modal-footer" style="background-color: #d6dbdf;">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                                                            </div> -->
                                                        
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                                                    <div class="modal modal-fullscreen fade" id="help_employee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-gl modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo 
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">{{ __('Help')}}</h1>
                                                                <img src="{!! asset('images/question.png')!!}" width="5%">
                                                            </div>-->
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body" style="background-color: #d6dbdf; text-align:centered;">
                                                                
                                                                <div class="card-body">
                                                                    <img src="{!! asset('images/user_guide/agregar_empleado.png')!!}" width="100%">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo
                                                            <div class="modal-footer" style="background-color: #d6dbdf;">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel')}}</button>
                                                            </div> -->
                                                        
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                                                    <div class="modal fade" id="schedule" data-backdrop="static">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                                                    
                                                                <!-- cabecera del diálogo -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">{{ __('Add')}}</h4>
                                                                        <img src="{{ asset('images/icons/schedule.png') }}" width="6%">
                                                                    </div>
                                                                                    
                                                                <!-- cuerpo del diálogo -->
                                                                    <div class="modal-body">
                                                                        
                                                                        <div class="card-body">
                                                                        
                                                                        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">-->

                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                                                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                                                                        
                                                                        <!-- Include Moment.js CDN -->
                                                                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
                                                                        
                                                                        <!-- Include Bootstrap DateTimePicker CDN -->
                                                                        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
                                                                        
                                                                        <script src="https://cdn.jsdelivr.net/npm/pc-bootstrap4-datetimepicker@4.17.51/src/js/bootstrap-datetimepicker.min.js"></script>
                                                                        
                                                                            <form method="POST" action="{{ route('order-employee-schedules.store') }}"  role="form" enctype="multipart/form-data">
                                                                                @csrf

                                                                                @include('order-employee-schedule.form')

                                                                                <script>
                                                                                    $('#time_entry').datetimepicker({
                                                                                        format: 'HH:mm'
                                                                                    });

                                                                                    $('#time_departure').datetimepicker({
                                                                                        format: 'HH:mm'
                                                                                    });
                                                                                </script>
                                                                            </form>
                                                                        </div>                                                                                            
                                                                    </div>
                                                                                    
                                                                <!-- pie del diálogo -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons" style="font-size:20px">block</i>&nbsp; {{ __('Cancel')}}</button>
                                                                    </div>
                                                                                    
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                
                                            </form>
                                            <br>                                                                                                
                                        </td>
                                    </tr>
                                    
                        </table>
                    </div>
                    <!--------------------------------------------------------------------->
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Order of service') }}
                            </span>

                            <div class="float-right">
                                <link rel="stylesheet" href="{{ asset('css/CSS_Service_order/CSS_Service_order.css') }}">
                                <a href="{{ route('service-order.pdf','id_ticket='.$serviceOrder->order_service_id) }}" class="btn btn-primary btn-lg"  data-placement="left" title="{{ __('PDF') }}"><i class="material-icons">book</i>&nbsp; {{ __('PDF') }}</a>
                                &nbsp;
                                <a href="{{ route('tickets.index') }}" class="myButton"  data-placement="left"><i class="material-icons">keyboard_double_arrow_left</i>&nbsp;
                                  {{ __('Back') }}
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
                        <!---->
                            <table class="table table-striped table-hover">
                                <tr style="text-align: left">
                                    <td style="width:20%"></td>
                                    <td style="width:25%">
                                        <div class="form-group">
                                        <legend>{{ __('Type of maintenance')}}</legend>
                                        @if ($serviceOrder->type_maintenance_id=='1')
                                        {{ Form::radio('type_maintenance_id','1',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','1',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label(__('Preventive')) }}<br>
                                        @if ($serviceOrder->type_maintenance_id=='2')
                                        {{ Form::radio('type_maintenance_id','2',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','2',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label( __('Corrective')) }}<br>
                                        @if ($serviceOrder->type_maintenance_id=='3')
                                        {{ Form::radio('type_maintenance_id','3',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','3',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label( __('Predictive')) }}<br>
                                       
                                        </div>
                                    </td>
                                    <td style="width:30%">
                                        <div class="form-group">
                                        <legend>{{ __('Type of service')}}</legend>
                                            
                                            @if ($serviceOrder->type_service_id=='1')
                                            {{ Form::radio('type_service_id','1',true,array('disabled')) }}
                                            @else
                                            {{ Form::radio('type_service_id','1',false,array('disabled')) }}
                                            @endif
                                            {{ Form::label( __('Mechanic')) }}<br>
                                            @if ($serviceOrder->type_service_id=='2')
                                            {{ Form::radio('type_service_id','2',true,array('disabled')) }}
                                            @else
                                            {{ Form::radio('type_service_id','2',false,array('disabled')) }}
                                            @endif
                                            {{ Form::label( __('Electric')) }}<br>
                                            @if ($serviceOrder->type_service_id=='3')
                                            {{ Form::radio('type_service_id','3',true,array('disabled')) }}
                                            @else
                                            {{ Form::radio('type_service_id','3',false,array('disabled')) }}
                                            @endif
                                            {{ Form::label( __('Electronic')) }}<br>
                                            
                                            <!--{{ Form::select('type_service_id', $service, $serviceOrder->type_service_id, ['class' => 'form-control' . ($errors->has('type_service_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de servicio']) }}
                                            {!! $errors->first('type_service_id', '<div class="invalid-feedback">:message</div>') !!}-->
                                        </div>
                                    </td>
                                    <td style="width:25%">
                                        <br>
                                        <br>
                                        <br>
                                        @if($serviceOrder->order_status_id=='8')

                                        @else
                                            @method('GET')
                                            <a title="{{ __('Edit')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogo4" ><i class="material-icons" style="font-size:20px">edit</i>&nbsp; {{ __('Edit')}}</a>
                                            <a title="{{__('Help')}}" class="btn" width="5%" data-toggle="modal" data-target="#help_edit"><i class="material-icons">&#xe887;</i></a>

                                            
                                        @endif

                                        @include('service-order.modal.purchase')
                                        @include('service-order.modal.purchase_index')

                                        <!----------------------->
                                        @if($orderPurchases->isEmpty())
                                            <a title="{{ __('Purchase')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchase{{ $serviceOrder->order_service_id }}" ><i class="material-icons" style="font-size:20px">attach_money</i>&nbsp; {{ __('Purchase')}}</a>
                                        @else
                                            <a title="{{ __('View Purchase')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchase_index"><i class="material-icons" >visibility</i>&nbsp; {{__('Purchase')}}</a>
                                            <!-- @if($serviceOrder->order_status_id=='8')

                                            @else
                                                <a title="{{ __('Purchase')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchase{{ $serviceOrder->order_service_id }}" ><i class="material-icons" style="font-size:20px">attach_money</i>&nbsp; {{ __('Purchase')}}</a>
                                                <a title="{{ __('View Purchase')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchase_index"><i class="material-icons" >visibility</i>&nbsp; {{__('Purchase')}}</a>
                                            @endif -->
                                        @endif
                                        <!----------------------->
                                    </td>
                                </tr>
                            </table>
                            <!----------------------->

                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr style="text-align:right;">
                                        <td><b><legend>{{ __('Materials')}}</legend></b></td>
                                        <td></td>
                                        <td></td>
                                        <td hidden></td>
                                        
                                        <td style="text-align:right;" colspan="2">
                                        @if($serviceOrder->order_status_id=='8')    
                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1" hidden>{{ __('Add material')}}</button>
                                        @else
                                            @method('GET')
                                            <button title="{{ __('Add material')}}"  type="button" class="btn btn-dark" data-toggle="modal" data-target="#dialogo1"><i class="material-icons" style="font-size:20px">add</i>&nbsp; {{ __('Add material')}}</button>
                                            <button title="{{__('Help')}}" class="btn" width="5%" data-toggle="modal" data-target="#help_material"><i class="material-icons">&#xe887;</i></button>
                                        @endif    
                                        
                                        </td>
                                    </tr>                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
                                        <th style="width:20%">{{ __('Name')}}</th>
										<th style="width:20%">{{ __('Key')}}</th>
										<th style="width:20%">{{ __('Quantity')}}</th>
                                        <th style="width:20%" hidden>{{ __('Stock')}}</th>
										<th style="width:20%">{{ __('Unit of measure')}}</th>
										

                                        <th style="width:25%"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($materialAssigneds as $materialAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
                                            <td style="width:20%">{{ $materialAssigned->material->name }}</td>
											<td style="width:20%">{{ $materialAssigned->material->key }}</td>
											<td style="width:20%">{{ $materialAssigned->quantity }}</td>
                                            <td style="width:20%" hidden>{{ $materialAssigned->material->stock }}</td>
											<td style="width:20%">{{ $materialAssigned->material->unitMeasure->name }}</td>
											

                                            <td style="width:25%">
                                                @if($serviceOrder->order_status_id=='8')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete material?')" hidden><i class="material-icons" style="font-size:20px">delete</i>&nbsp; Delete</button>
                                                @else    
                                                    <form action="{{ route('material-assigneds.destroy',$materialAssigned->order_material_id) }}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('material-assigneds.show',$materialAssigned->material_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-outline-success"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                        @method('GET')
                                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo6" href="{{ route('material-assigneds.edit',$materialAssigned->material_id) }}" hidden>Edit</button>
                                                        
                                                       
                                                        <!--<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo6" >Edit</button>-->
                                                        
                                                        <button type="button" class="btn btn-info" href="#" data-toggle="modal" data-target="#dialogo7{{ $materialAssigned->order_material_id }}"><i class="material-icons" style="font-size:20px">edit</i>&nbsp; {{ __('Edit') }}</button>
                                                        
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete material?')"><i class="material-icons" style="font-size:20px">delete</i>&nbsp; {{ __('Delete') }}</button>
                                                    </form>
                                                @endif
                                            </td>
                                            @include('service-order.modal.edit')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            
                            <table class="table table-striped table-hover">
                                <thead class="thead">      
                                    <tr style="text-align: left">
                                        <td><b><legend>{{ __('Tools')}}</legend></b></td>
                                        <td hidden></td>
                                        <td></td>
                                        <td></td>
                                        
                                        <td style="text-align:right;" colspan="2">
                                            @if($serviceOrder->order_status_id=='8')
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo2" hidden>Add tool</button>
                                            @else
                                                @method('GET')
                                                <button title="{{ __('Add tool')}}" type="button" class="btn btn-dark" data-toggle="modal" data-target="#dialogo2"><i class="material-icons" style="font-size:20px">add</i>&nbsp;{{ __('Add tool')}}</button>
                                                <button title="{{__('Help')}}" class="btn" width="5%" data-toggle="modal" data-target="#help_tool"><i class="material-icons">&#xe887;</i></button>
                                            @endif
                                            
                                        </td>
                                    </tr>                          
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th style="width:20%">{{ __('Name')}}</th>
										<th style="width:20%">{{ __('Key')}}</th>
										<th style="width:20%">{{ __('Quantity')}}</th>
                                        <th style="width:20%" hidden>{{ __('Stock')}}</th>
										<th style="width:20%">{{ __('Unit of measure')}}</th>

                                        <th style="width:20%"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($toolAssigneds as $toolAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>

                                            <td style="width:20%">{{ $toolAssigned->tool->name }}</td>
											<td style="width:20%">{{ $toolAssigned->tool->key }}</td>
											<td style="width:20%">{{ $toolAssigned->quantity }}</td>
											<td style="width:20%" hidden>{{ $toolAssigned->tool->stock }}</td>
											<td style="width:20%">{{ $toolAssigned->tool->unitMeasure->name }}</td>

                                            <td style="width:20%">
                                                @if($serviceOrder->order_status_id=='8')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete tool?')" hidden><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                @else
                                                    <form action="{{ route('tool-assigneds.destroy',$toolAssigned->order_tool_id) }}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('tool-assigneds.show',$toolAssigned->tool_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                                        <a class="btn btn-outline-success" hidden><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        <button type="button" class="btn btn-info" href="#" data-toggle="modal" data-target="#dialogo8{{ $toolAssigned->order_tool_id }}"><i class="material-icons" style="font-size:20px">edit</i>&nbsp; {{ __('Edit') }}</button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete tool?')"><i class="material-icons" style="font-size:20px">delete</i>&nbsp; {{ __('Delete')}}</button>
                                                    </form>
                                                @endif
                                            </td>
                                            @include('service-order.modal.tool_edit')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr style="text-align: left">
                                        <td><legend>{{ __('Employees')}}</legend></td>
                                        <td></td>
                                        <td hidden></td>
                                        <td></td>
                                        
                                        <td style="text-align:right;" colspan="2">
                                            @if($serviceOrder->order_status_id=='8')
                                                
                                            @else
                                                @method('GET')
                                                <button title="{{ __('Add employee')}}" type="button" class="btn btn-dark" data-toggle="modal" data-target="#dialogo3"><i class="material-icons" style="font-size:20px">add</i>&nbsp; {{ __('Add employee')}}</button>
                                                <button title="{{__('Help')}}" class="btn" width="5%" data-toggle="modal" data-target="#help_employee"><i class="material-icons">&#xe887;</i></button>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <th style="width:15%" hidden>No</th>
                                        
                                        <th style="width:15%" hidden>{{ __('Order')}}</th>
                                        <th style="width:20%">{{ __('ID Employees')}}</th>
                                        <th style="width:20%">{{ __('Employee')}}</th>
                                        <th style="width:20%">{{ __('Department')}}</th>
                                        <th style="width:20%">{{ __('Supervisor')}}</th>
                                        <th style="width:20%" hidden>{{ __('Status')}}</th>
                                        <th style="width:20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeeOrders as $employeeOrder)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td style="width:20%">{{ $employeeOrder->employee_id }}</td>
                                            <td style="width:20%" hidden>{{ $employeeOrder->order_service_id }}</td>
                                            @foreach($employeeOrders_data as $employee)
                                                @if($employeeOrder->employee_id == $employee->employee_id)
                                                    <td style="width:20%">{{ $employee->name }} {{ $employee->last_name }} {{ $employee->second_last_name }}</td>
                                                @endif
                                            @endforeach
                                            @foreach($employee_hierarchical_position as $supervisor)
                                                @if($supervisor->employee_id == $employeeOrder->employee_id)
                                                    @foreach($hierarchical_position as $position)
                                                        @if($position->hierarchical_position_id == $supervisor->hierarchical_position_id)
                                                            @foreach($hierarchical as $jerarquia)
                                                                @if($jerarquia->hierarchical_id == $position->hierarchical_id)
                                                                    <td style="width:20%">{{$jerarquia->position}} {{$position->name}} </td>
                                                                    @if($jerarquia->position == "Director" and $position->name == "general")
                                                                        <td>-</td>
                                                                    @else
                                                                    @foreach($hierarchical_structure as $structure)
                                                                        @if($structure->hierarchical_position_id == $supervisor->hierarchical_position_id)
                                                                            @foreach($employee_hierarchical_position as $supervisor2)
                                                                                @if($supervisor2->hierarchical_position_id == $structure->superior_hierarchical_position_id)
                                                                                    @foreach($employee2 as $employ2)
                                                                                        @if($employ2->employee_id == $supervisor2->employee_id)
                                                                                            <td>{{$employ2->name}} {{$employ2->last_name}} {{$employ2->second_last_name}}</td>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            @endforeach
                                                                            <!--td>{{$structure->superior_hierarchical_position_id}} {{$supervisor->hierarchical_position_id}}</!--td-->
                                                                            
                                                                        @endif
                                                                    @endforeach
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                
                                            <th style="width:20%" hidden></th>
                                            <td style="width:20%">
                                                @if($serviceOrder->order_status_id=='8')
                                                
                                                @else
                                                    <form action="{{ route('employee-orders.destroy',$employeeOrder->order_service_id) }} {{$employeeOrder->employee_id}}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('employee-orders.show',$employeeOrder->employee_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                                        <a class="btn btn-outline-success" hidden><i class="material-icons" style="font-size:20px">edit</i>&nbsp; {{ __('Edit')}}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete employee?')"><i class="material-icons" style="font-size:20px">delete</i>&nbsp; {{ __('Delete')}}</button>
                                                    </form>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>

                        <!----------------------->
                        @if($employeeOrders->isEmpty())

                        @else
                        <table class="table table-striped table-hover">
                                
                            <thead style="text-align: center">
                                <tr>
                                    <td>
                                    <b><legend>{{ __('Schedule')}}</legend></b>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td style="text-align:right;" colspan="2">
                                        @if($serviceOrder->order_status_id=='8')

                                        @else
                                            @method('GET')
                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                                            @method('GET')
                                            <button title="{{ __('Add')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#schedule"><i class="material-icons" style="font-size:20px">add</i>&nbsp; {{ __('Add')}}</button>
                                            <button title="{{__('Help')}}" class="btn" width="5%" data-toggle="modal" data-target="#help_add"><i class="material-icons">&#xe887;</i></button>
                                        @endif
                                    </td>
                                </tr>
                                <tr style="text-align: center">
                                        
                                        
                                    <th>{{ __('Date service')}}</th>
									<th>{{ __('Time entry')}}</th>
									<th>{{ __('Exit')}}</th>
									<th>{{ __('Lunchtime')}}</th>
									<th>{{ __('Service hour')}}</th>
									<th>{{ __('Duration travel')}}</th>	
									<th >{{ __('Employee')}}</th>
									<th></th>

                                        
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
                                        <td>
                                            @if($serviceOrder->order_status_id=='8')

                                            @else
                                                <form action="{{ route('order-employee-schedules.destroy',$schedule->order_employee_schedule_id) }}" method="POST">
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete employee?')"><i class="material-icons" style="font-size:20px">delete</i>&nbsp; {{ __('Delete')}}</button>
                                                </form>
                                            @endif
                                        </td>
                                                        
                                    </tr>        
                                @endforeach
                                    
                            </tbody>
                        </table>
                        <br>
                        <br>
                        @endif
                    <!----------------------->
                    <!----------------------->
                    @if($shcedules->isEmpty())

                    @else
                        @if($serviceOrder->order_status_id=='8')

                        @else
                            <a href="{{ route('notify-sales','id_ticket='.$serviceOrder->order_service_id) }}" class="btn btn-primary btn-lg"  data-placement="left" title="{{ __('Finish') }}"><i class="material-icons">send</i>&nbsp; {{ __('Finish') }}</a>
                        @endif
                    @endif
                    <!----------------------->
                    </div>
                        <!---->
                    </div>
                </div>
                {!! $serviceOrders->links() !!}
            </div>
        </div>
    </div>
@endsection
