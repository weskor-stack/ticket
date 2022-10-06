<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" hidden>
            {{ Form::label('Servicio') }}
            {{ Form::text('service_id', $service->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Report Id']) }}
            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
        <h1 style="text-align:center;">{{ __('Activities implemented')}}</h1>
            <legend>{{ __('Activities implemented')}}</legend>
            {{ Form::textarea('description', $serviceTaskSpecific->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('Description task'), 'required']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
        <legend>{{ __('Evidence') }} </legend>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            
            <table class=table align="center">
                <tr>
                    <td align="center">
                        <h5>{{ __('Before')}}:</h5>

                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$serviceTaskSpecific->previous_evidence }}" id="blah" width="100" height="100" alt="">
                            <input type="file" id="previous_evidence" class="form-control.<?php echo ($errors->has('previous_evidence') ? ' is-invalid' : ''); ?>" name="previous_evidence" multiple required><br><br>
                            
                            {!! $errors->first('previous_evidence', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <td align="center">
                        <h5>{{ __('After') }}:</h5>
                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$serviceTaskSpecific->subsequent_evidence }}" id="blah2" width="100" height="100" alt="">
                            <input type="file" id="subsequent_evidence" class="form-control.<?php echo ($errors->has('subsequent_evidence') ? ' is-invalid' : ''); ?>" name="subsequent_evidence" multiple required><br><br>
                            {!! $errors->first('subsequent_evidence', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <br>
                </tr>
            </table>
            <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
        </div>
        <div class="form-group">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <legend>{{ __('Signature') }}</legend>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />     
            <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
            <style>
                .kbw-signature { width: 100%; height: 200px;}
                #sig canvas{ width: 100% !important; height: auto;}
            </style>

            <div>
            <div>
                <div>
                    <div>
                        <div>
                                <!--@if ($message = Session::get('success'))
                                    <div class="alert alert-success  alert-dismissible">
                                         
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif-->
                                <form method="POST" action="{{ route('service-task-specifics.store') }}">
                                    @csrf
                                    <div class="col-md-12">
                                        <!--<label class="" for="">Firmas de evidencia</label>-->
                                        <br/>
                                        <div id="sig"></div>
                                        <br><br>
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <td style="text-align:center;">
                                                    <div class="form-group">
                                                        <legend style="text-align:center">{{ __('Executor')}}</legend>
                                                        <!--{{ Form::text('executor', $serviceTaskSpecific->executor, ['class' => 'form-control' . ($errors->has('description_activity') ? ' is-invalid' : ''), 'placeholder' => 'Descripción del servicio', 'maxlength' => 50]) }}
                                                        {!! $errors->first('executor', '<div class="invalid-feedback">:message</div>') !!}-->
                                                        <select class="form-select" id="employee_id" name="employee_id" style="width:600px; height:38px; text-align:center;" required>
                                                            @foreach ($employeeOrders as $item)
                                                                @foreach ($employees as $employee)
                                                                    @if($item->employee_id == $employee->employee_id)
                                                                        <option value="{{$item->employee_id}}">{{$employee->name}} {{$employee->last_name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </select>      
                                                    </div>
                                                </td>
                                                <td style="text-align:center;">
                                                    <div class="form-group">
                                                        <legend style="text-align:center">{{ __('Contact')}}</legend>
                                                            @foreach($contacts as $contact)
                                                                
                                                                    <input class="form-control.<?php echo($errors->has('description_activity') ? ' is-invalid' : ''); ?>" type="text" name="contact_id" id="contact_id" value="{{$contact->contact_id}}" maxlength="50" style="width:600px; height:38px;text-align:center;" require hidden>
                                                                    <input class="form-control.<?php echo($errors->has('description_activity') ? ' is-invalid' : ''); ?>" type="text" name="contact" id="contact" value="{{$contact->job_title}} {{$contact->name}} {{$contact->last_name}}" maxlength="50" style="width:600px; height:38px;text-align:center;" disabled require>
                                                                
                                                            @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <button id="clear" title="{{ __('Clear')}}" class="btn btn-warning btn-sm"><i class="material-icons" style="font-size:20px">cleaning_services</i>&nbsp; {{ __('Clear')}}</button>
                                        
                                        <textarea id="signature_evidence" name="signature_evidence" style="display: none" class="form-control.<?php echo ($errors->has('signature_evidence') ? ' is-invalid' : ''); ?>" required></textarea>
                                        {!! $errors->first('signature_evidence', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
            <script type="text/javascript">
                var sig = $('#sig').signature({syncField: '#signature_evidence', syncFormat: 'PNG'});
                $('#clear').click(function(e) {
                    e.preventDefault();
                    sig.signature('clear');
                    $("#signature_evidence").val('');
                });
            </script>
        </div>

        

        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 9999) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>

    </div>
    <br>
    <div class="box-footer mt20" style="text-align:center;">
        @if($service_report->isEmpty())
            @method('GET')
            <a type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#dialogo10"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</a>
        @else
            <button type="submit" class="btn btn-success btn-lg" id="btnEnviar"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
            <!--<a class="btn btn-danger btn-lg" href="{{ route('services.index') }}"> Cancel</a>-->
        @endif
        
        <div>
            <div class="modal fade" id="dialogo10" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                                                        
                        <!-- cabecera del diálogo -->
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('Warning')}}</h4>
                                <img src="{!! asset('images/warning.png')!!}" width="10%">
                        </div>
                                                            
                        <!-- cuerpo del diálogo -->
                        <div class="modal-body">
                            <p style="text-align:ceter;">{{ __('Service not uploaded')}}, {{__('you will lose the information')}}.</p>
                            <p style="text-align:ceter;">{{__('And you will have to upload the activities again')}}</p>

                            <br>
                                                                               
                        </div>
                                                            
                        <!-- pie del diálogo -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="material-icons" style="font-size:20px">thumb_up</i> {{ __('Accept')}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons" style="font-size:20px">block</i> {{ __('Close')}}</button>
                        </div>
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>
    </div>
</div>