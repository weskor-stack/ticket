@extends('layouts.app')

@section('template_title')
    Service
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <!----------------------------------------------------------------------------------->
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
                            <tbody>
                                <tr>
                                    <td style="width:15%"></td>
                                    <td class="text-left" style="width:25%">
                                        @foreach($customers as $customer)
                                            <b>{{ __('Name') }}:</b> {{ $customer->name }}<br>
                                            @foreach($contacts as $contact)
                                                <b>{{ __('Contact') }}:</b> {{ $contact->name }} {{ $contact->last_name}}<br>
                                                <b>{{ __('Contacts phone') }}:</b> {{ $contact->phone }}<br>
                                                <b>{{ __('Customers phone') }}:</b> {{ $customer->phone }}<br><br>
                                            @endforeach
                                        @endforeach
                                        
                                        <b></b> <br>
                                        <b></b> 
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
                                    </td>
                                    <td class="text-left" style="width:30%">
                                        <b>{{ __('Ticket') }}:</b> {{ $tickets }}<br>
                                        <b>{{ __('Order') }}:</b> {{ $service->order_service_id }}<br>
                                        <!--b>{{ __('Report') }}:</b>{{ $service->service_id }} <br>-->
                                        <b>{{ __('Service Address') }}:</b> {{ $customer->address }}<br>
                                        <b>{{ __('Date') }}:</b> {{ \Carbon\Carbon::parse($service->date_service)->format('d/m/Y') }}

                                        <b></b> 
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!----------------------------------------------------------------------------------->
                    <div class="card-header">
                        <div class="table-responsive" style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Reports') }}
                            </span>

                             <div class="float-right">
                                <link rel="stylesheet" href="{{ asset('css/CSS_Service_order/CSS_Service_order.css') }}">
                                    @if($service->service_status_id=='2')
                                        <a href="{{ route('service.pdf','id_ticket='.$service->order_service_id) }}" class="btn btn-primary btn-lg"  data-placement="left" title="{{ __('PDF') }}"><i class="material-icons">book</i>&nbsp; {{ __('PDF') }}</a>
&nbsp;
                                        <a title="{{ __('Back') }}" href="{{ route('service-orders.index','id_ticket='.$service->order_service_id) }}" class="myButton"  data-placement="left"><i class="material-icons" style="font-size:20px">keyboard_double_arrow_left</i>&nbsp;
                                            {{ __('Back') }}
                                        </a>
                                    @else
                                        @method('GET')
                                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                                        <a href="{{ route('service.pdf','id_ticket='.$service->order_service_id) }}" class="btn btn-primary btn-lg"  data-placement="left" title="{{ __('PDF') }}"><i class="material-icons">book</i>&nbsp; {{ __('PDF') }}</a>
&nbsp;
                                        @method('GET')
                                        <a title="{{ __('Back') }}" type="button" class="myButton" data-toggle="modal" data-target="#dialogo4"><i class="material-icons" style="font-size:20px">keyboard_double_arrow_left</i>&nbsp; {{ __('Back')}}</a>
                                    @endif
                                
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <!----------------------->
                        <table class="table table-striped table-hover">
                            <tr style="text-align: left">
                                <!-- <td style="width:10%"></td> -->
                                <td style="width:40%; text-align: center">
                                    <div class="form-group">
                                    <legend>{{ __('Type of maintenance')}}</legend>
                                        @foreach($serviceOrder as $serviceOrder)
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
                                        @endforeach
                                    </div>
                                </td>
                                <td style="width:40%; text-align: center">
                                    <div class="form-group">
                                    <legend>{{ __('Type of service')}}</legend><br>
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
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <!----------------------->

                        
                    </div>
                    
                    <div>
                    
                        <!--@method('GET')
                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                        @method('GET')
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dialogo1">Add</button>-->

                        <div class="modal fade" id="dialogo0" data-backdrop="static">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                <!-- cabecera del diálogo -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Generate Order')}}</h4>
                                    </div>
                                                            
                                <!-- cuerpo del diálogo -->
                                    <div class="modal-body">
                                        Contenido
                                        
                                    </div>
                                                            
                                <!-- pie del diálogo -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        <div class="modal modal-fullscreen fade" id="dialogo1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                <div class="modal-content">
                                                        
                                    <!-- cabecera del diálogo -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ __('Add')}}</h4>
                                            <img src="{{ asset('images/icons/schedule.png') }}" width="6%">
                                        </div>
                                                        
                                    <!-- cuerpo del diálogo -->
                                        <div class="modal-body">
                                            
                                        
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                                            
                                            <!-- Include Moment.js CDN -->
                                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
                                            
                                            <!-- Include Bootstrap DateTimePicker CDN -->
                                            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
                                            
                                            <script src="https://cdn.jsdelivr.net/npm/pc-bootstrap4-datetimepicker@4.17.51/src/js/bootstrap-datetimepicker.min.js"></script>
                                            
                                                <form method="POST" action="{{ route('service-reports.store') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf

                                                    @include('service-report.form2')

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
                    
                        <div class="modal fade" id="dialogo2" data-backdrop="static">
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
                                                <b>{{ __('Stock') }}: </b><input type="text" id="text10" name="text10" value="" style="width:70px;" disabled> &nbsp;&nbsp; 
                                                <b>{{ __('unit_measure') }}: </b><input type="text" id="text12" name="text12" value="" style="width:80px;" disabled><br>
                                                <form method="POST" action="{{ route('material-useds.store') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf
                                                    @include('material-used.form')

                                                    <script>
                                                        $('.select2').select2({
                                                            dropdownParent: $('#dialogo2 .modal-body')
                                                        });
                                                    </script>
                                                </form>
                                                <script>
                                                    var value_input;
                                                    $('select').on('change', function() {
                                                        var data = this.value;
                                                        /*document.getElementById("text1").value = data;
                                                        const contenido = document.getElementById("text1").value;
                                                        //alert(contenido);*/
                                                        var countryId = $(this).find(':selected').data('stock');
                                                        var unity = $(this).find(':selected').data('unity');
                                                        $("#text10").val(data);
                                                        $("#text12").val(unity);
                                                        document.getElementById("text10").value = countryId;
                                                        document.getElementById("text12").value = unity;
                                                        //alert( "{{ __('unit_measure')}}: " + unity + "\n" + "{{ __('Stock')}}: " + countryId );                        
                                                        //alert(quantity);
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
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        <div class="modal fade" id="dialogo3" data-backdrop="static">
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
                                                <b>{{ __('Stock') }}: </b><input type="text" id="text13" name="text13" value="" style="width:70px;" disabled> &nbsp;&nbsp; 
                                                <b>{{ __('unit_measure') }}: </b><input type="text" id="text14" name="text14" value="" style="width:80px;" disabled><br>
                                                <form method="POST" action="{{ route('tool-useds.store') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf
                                                    @include('tool-used.form')

                                                    <script>
                                                        $('#tool_id').select2({
                                                            dropdownParent: $('#dialogo3 .modal-body')
                                                        });
                                                    </script>
                                                </form>
                                                <script>
                                                    var value_input;
                                                    $('select').on('change', function() {
                                                        var data = this.value;
                                                        /*document.getElementById("text1").value = data;
                                                        const contenido = document.getElementById("text1").value;
                                                        //alert(contenido);*/
                                                        var countryId = $(this).find(':selected').data('stock');
                                                        var unity = $(this).find(':selected').data('unity');
                                                        $("#text13").val(data);
                                                        $("#text14").val(unity);
                                                        document.getElementById("text13").value = countryId;
                                                        document.getElementById("text14").value = unity;
                                                        //alert( "{{ __('unit_measure')}}: " + unity + "\n" + "{{ __('Stock')}}: " + countryId );                        
                                                        //alert(quantity);
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
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        <div class="modal fade" id="dialogo4" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                <!-- cabecera del diálogo -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Warning')}}</h4>
                                        <img src="{!! asset('images/warning.png')!!}" width="10%">
                                    </div>
                                                            
                                <!-- cuerpo del diálogo -->
                                    <div class="modal-body">
                                        <p style="text-align:ceter;">{{ __('If you have unsaved information')}}, {{__('you will lose the information')}},</p>
                                        <p style="text-align:ceter;">{{__('and you will have to enter the information again')}}</p>

                                        <br>
                                                                                
                                    </div>
                                                            
                                <!-- pie del diálogo -->
                                    <div class="modal-footer">
                                        <a href="{{ route('service-orders.index','id_ticket='.$serviceOrder->order_service_id) }}" class="btn btn-success">
                                        <i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept') }}
                                        </a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons" style="font-size:20px">block</i>&nbsp; {{ __('Cancel')}}</button>
                                    </div>
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        <div class="modal fade" id="help_add">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                <!-- cabecera del diálogo 
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Generate Order')}}</h4>
                                    </div>-->
                                                            
                                <!-- cuerpo del diálogo -->
                                    <div class="modal-body">
                                        <img src="{!! asset('images/user_guide/help_add.png')!!}" width="100%">
                                    </div>
                                                            
                                <!-- pie del diálogo
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>-->
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        <div class="modal fade" id="help_material">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                <!-- cabecera del diálogo 
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Generate Order')}}</h4>
                                    </div>-->
                                                            
                                <!-- cuerpo del diálogo -->
                                    <div class="modal-body">
                                        <img src="{!! asset('images/user_guide/agregar_material.png')!!}" width="100%">
                                    </div>
                                                            
                                <!-- pie del diálogo
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>-->
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        <div class="modal fade" id="help_tool">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                <!-- cabecera del diálogo 
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Generate Order')}}</h4>
                                    </div>-->
                                                            
                                <!-- cuerpo del diálogo -->
                                    <div class="modal-body">
                                        <img src="{!! asset('images/user_guide/agregar_herramienta.png')!!}" width="100%">
                                    </div>
                                                            
                                <!-- pie del diálogo
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>-->
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                    </div>

                    <div>
                        <br>
                    </div>

                    <div>
                        <!----------------------->
                        <div class="form-group table-responsive">
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
                                    <td></td>
                                    
                                    <td style="text-align:right;" colspan="2">
                                        @if($serviceOrder_id=='8')

                                        @else
                                            @method('GET')
                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                                            @method('GET')
                                            <button title="{{ __('Add')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogo1"><i class="material-icons" style="font-size:20px">add</i>&nbsp; {{ __('Add')}}</button>
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
										<th>{{ __('Service extra')}}</th>
										<th>{{ __('Duration travel')}}</th>										
										<th hidden>{{ __('Service report')}}</th>
										<th >{{ __('Employee')}}</th>
										<th></th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($service_employees as $service_employee)
                                        @if($service_employee->service_id == $service5)
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
                                                        
                                                        <td hidden>{{ $serviceReport->service_employee_id }}</td>
                                                        <td hidden>{{ $serviceReport->serviceEmployee->employee_id }} </td>
                                                        @foreach($employees as $employee)
                                                            @if($serviceReport->serviceEmployee->employee_id == $employee->employee_id)
                                                                <td>{{ $employee->name }} {{ $employee->last_name }} {{ $employee->second_last_name }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                        @if($serviceOrder_id=='8')

                                                        @else
                                                            <form action="{{ route('service-reports.destroy',$serviceReport->service_employee_id) }}" method="POST">
                                                                <!--<a class="btn btn-sm btn btn-outline-primary" href="{{ route('service-reports.show',$serviceReport->service_employee_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                                <a class="btn btn-sm btn-outline-success" href="{{ route('service-reports.edit',$serviceReport->service_employee_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete service?')"><i class="material-icons" style="font-size:20px">delete</i>&nbsp; {{ __('Delete')}}</button>
                                                            </form>
                                                        @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        <!----------------------->
                        @if ($activity2->isEmpty())
                        <h1 style="text-align:center;">{{ __('Items to use') }}</h1>
                        <div class="table-responsive">
                            <b><legend>{{ __('Materials')}}</legend></b>
                            <table class="table table-striped table-hover">
                                <thead class="thead">                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th style="width:20%">{{ __('Key')}}</th>
                                        <th style="width:20%">{{ __('Name')}}</th>
										<th style="width:20%">{{ __('Quantity')}}</th>
										<th style="width:20%">{{ __('Unit of measure')}}</th>
										<th style="width:20%" hidden>{{ __('Stock')}}</th>

                                        <th style="width:20%" hidden></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($materialAssigneds as $materialAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td style="width:20%">{{ $materialAssigned->material->key }}</td>
                                            <td style="width:20%">{{ $materialAssigned->material->name }}</td>
											<td style="width:20%">{{ $materialAssigned->quantity }}</td>
											<td style="width:20%">{{ $materialAssigned->material->unitMeasure->name }}</td>
											
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <b><legend>{{ __('Tools')}}</legend></b>
                            <table class="table table-striped table-hover">
                                <thead class="thead">                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th style="width:20%">{{ __('Key')}}</th>
                                        <th style="width:20%">{{ __('Name')}}</th>
										<th style="width:20%">{{ __('Quantity')}}</th>
										<th style="width:20%">{{ __('Unit of measure')}}</th>
										<th style="width:20%" hidden>{{ __('Stock')}}</th>

                                        <th style="width:20%" hidden></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($toolAssigneds as $toolAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td style="width:20%">{{ $toolAssigned->tool->key }}</td>
                                            <td style="width:20%">{{ $toolAssigned->tool->name }}</td>
											<td style="width:20%">{{ $toolAssigned->quantity }}</td>
											<td style="width:20%">{{ $toolAssigned->tool->unitMeasure->name }}</td>
											
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else

                        @endif
                        <!----------------------->
                        <br>
                        <h1 style="text-align:center;">{{ __('Elements used') }}</h1>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr style="text-align: left">
                                        <td><b><legend>{{ __('Materials')}}</legend></b></td>
                                        <td></td>
                                        <td></td>
                                        <td hidden></td>
                                        
                                        <td style="text-align:right;" colspan="2">
                                        @if($serviceOrder_id=='8')    
                                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#dialogo2" hidden>{{ __('Add material')}}</button>
                                        @else
                                            @method('GET')
                                            <button title="{{ __('Add material')}}" type="button" class="btn btn-dark" data-toggle="modal" data-target="#dialogo2"><i class="material-icons" style="font-size:20px">add</i>&nbsp; {{ __('Add material')}}</button>
                                            <button title="{{__('Help')}}" class="btn" width="5%" data-toggle="modal" data-target="#help_material"><i class="material-icons">&#xe887;</i></button>
                                        @endif    
                                        
                                        </td>
                                    </tr>                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
                                        <th style="width:20%">{{ __('Key')}}</th>
                                        <th style="width:20%">{{ __('Name')}}</th>
										<th style="width:20%">{{ __('Quantity')}}</th>
                                        <th style="width:20%" hidden>{{ __('Stock')}}</th>
										<th style="width:20%">{{ __('Unit of measure')}}</th>
										

                                        <th style="width:20%"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($materialUseds as $materialUsed)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
                                            <td style="width:20%">{{ $materialUsed->material->key }}</td>
                                            <td style="width:20%">{{ $materialUsed->material->name }}</td>											
											<td style="width:20%">{{ $materialUsed->quantity }}</td>
                                            <td style="width:20%" hidden>{{ $materialUsed->material->stock }}</td>
											<td style="width:20%">{{ $materialUsed->material->unitMeasure->name }}</td>
											

                                            <td style="width:20%">
                                                @if($serviceOrder_id=='8')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete material?')" hidden><i class="material-icons" style="font-size:20px">delete</i>&nbsp; Delete</button>
                                                @else    
                                                    <form action="{{ route('material-useds.destroy',$materialUsed->service_material_id) }}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('material-assigneds.show',$materialAssigned->material_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-outline-success"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                        @method('GET')
                                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo6" href="{{ route('material-useds.edit',$materialUsed->service_material_id) }}" hidden>Edit</button>
                                                        
                                                       
                                                        <!--<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo6" >Edit</button>-->
                                                        
                                                        <button type="button" class="btn btn-info" href="#" data-toggle="modal" data-target="#dialogo9{{ $materialUsed->service_material_id }}"><i class="material-icons" style="font-size:20px">edit</i>&nbsp; {{ __('Edit') }}</button>
                                                        
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete material?')"><i class="material-icons" style="font-size:20px">delete</i>&nbsp; {{ __('Delete') }}</button>
                                                    </form>
                                                @endif
                                            </td>
                                            @include('service.modal.material')
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
                                            @if($serviceOrder_id=='8')
                                                <button type="button" class="btn btn-black" data-toggle="modal" data-target="#dialogo3" hidden>Add tool</button>
                                            @else
                                                @method('GET')
                                                <button title="{{ __('Add tool')}}" type="button" class="btn btn-dark" data-toggle="modal" data-target="#dialogo3"><i class="material-icons" style="font-size:20px">add</i>&nbsp; {{ __('Add tool')}}</button>
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
                                    @foreach ($toolUseds as $toolUsed)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>

                                            <td style="width:20%">{{ $toolUsed->tool->name }}</td>
											<td style="width:20%">{{ $toolUsed->tool->key }}</td>
											<td style="width:20%">{{ $toolUsed->quantity }}</td>
											<td style="width:20%" hidden>{{ $toolUsed->tool->stock }}</td>
											<td style="width:20%">{{ $toolUsed->tool->unitMeasure->name }}</td>

                                            <td style="width:20%">
                                                @if($serviceOrder_id=='8')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete tool?')" hidden><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                @else
                                                    <form action="{{ route('tool-useds.destroy',$toolUsed->service_tool_id) }}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('tool-assigneds.show',$toolAssigned->tool_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                                        <a class="btn btn-outline-success" hidden><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        <button type="button" class="btn btn-info" href="#" data-toggle="modal" data-target="#dialogo10{{ $toolUsed->service_tool_id }}"><i class="material-icons" style="font-size:20px">edit</i>&nbsp; {{ __('Edit') }}</button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete tool?')"><i class="material-icons" style="font-size:20px">delete</i>&nbsp; {{ __('Delete')}}</button>
                                                    </form>
                                                @endif
                                            </td>
                                            @include('service.modal.tool_edit')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!----------------------->
                        <div>
                            <div class="card-body">
                            @if ($activity2->isEmpty())
                                <form method="POST" action="{{ route('service-task-specifics.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf

                                    @include('service-task-specific.form')

                                </form>
                            @else
                                <p></p>
                                @foreach($activity2 as $activity)
                                <div class="box box-info padding-1 table-responsive">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <h1 style="text-align:center;">{{ __('Activities implemented')}}</h1>
                                            <legend>{{ __('Activities implemented')}}</legend>
                                           
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $activity->description }}</textarea>
                                        </div>
                                        <div class="form-group table-responsive">
                                            <legend>{{ __('Evidence') }} </legend>
                                                <table class="container">
                                                    <tr class="table-responsive" style="text-align:center">
                                                        <td class="table-responsive" style="text-align:center">
                                                            <h5 style="text-align:center">{{ __('Before')}}:</h5>

                                                            <div class="form-group">
                                                                <img src="{{  $activity->previous_evidence }}" width="500" height="500" alt="">
                                                            </div>
                                                        </td>
                                                        <td class="table-responsive" style="text-align:center">
                                                            <h5 style="text-align:center">{{ __('After') }}:</h5>
                                                            <div class="form-group">
                                                                <img src="{{  $activity->subsequent_evidence }}" width="500" height="500" alt="">
                                                            </div>
                                                        </td>
                                                        <br>
                                                    </tr>
                                                </table>
                                        </div>
                                        <div>
                                            <legend>{{ __('Signature') }}:</legend><br>
                                            <img src="{{  $activity->signature_evidence }}" width="100%" height="300" alt="">
                                            
                                        </div>
                                        <div>
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <legend style="text-align:center">{{ __('Executor')}}</legend>
                                                            @foreach($employees as $employee)
                                                                @if($employee->employee_id == $activity->employee_id )
                                                                    <input type="text" class="form-control" style="text-align:center;" name="employee_id" id="employee_id" value="{{ $employee->name }} {{ $employee->last_name }} {{ $employee->second_last_name }}" disabled>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <legend style="text-align:center">{{ __('Contact')}}</legend>
                                                            @foreach($contacts as $contact)
                                                                @if($contact->contact_id == $activity->contact_id )
                                                                    <input type="text" class="form-control" style="text-align:center;" name="contact_id" id="contact_id" value="{{ $contact->name }} {{ $contact->last_name }} {{ $contact->second_last_name }}" disabled>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            @endif
                            </div>
                        </div>
                        <!----------------------->
                    </div>

                </div>
                {!! $services->links() !!}
            </div>
        </div>
    </div>
@endsection
