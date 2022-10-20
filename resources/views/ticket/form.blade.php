
<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label( __('Subject')) }}
            {{ Form::text('subject', $ticket->subject, ['class' => 'form-control' . ($errors->has('subject') ? ' is-invalid' : ''), 'placeholder' =>  __('Subject'), 'style'=>'width:700px', 'required']) }}
            {!! $errors->first('subject', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('Problem')) }}
            {{ Form::text('problem', $ticket->problem, ['class' => 'form-control' . ($errors->has('problem') ? ' is-invalid' : ''), 'placeholder' => __('Problem'),'style'=>'width:700px', 'required']) }}
            {!! $errors->first('problem', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        
        <div class="form-group">
            <link rel="stylesheet" href="/path/to/select2.css">
            <link rel="stylesheet" href="{{ asset('css_tickets/tickets_css_summon_button.css') }}">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            {{ Form::label( __('Customer')) }} <br>
            <!--{{ Form::text('customer_id', "", ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => __('Customer')]) }}
            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dialogo1">+</a> <br>
            <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">{{ __('+') }}</a>-->
            <input type="text" id="customer_id" name="customer_id" class="form-control.<?php echo ($errors->has('customer_id') ? ' is-invalid' : ''); ?>" required hidden>
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
            <script> $('.select2').select2();</script>
            <select class="form-select select2" id="customer" style="width:600px; height:100%;" required>
                <option selected disabled>{{ __('Select customer')}}</option>
                @foreach ($countries as $country)
                <option value="{{ $country->customer_id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <br>
            <a style="margin-left:620px; margin-top:-50px;" type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dialogo1">+</a> <br>
        </div>
        <script>$('.select2').select2();</script>
        <br>
        <div class="form-group">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            {{ Form::label( __('Contact')) }} <br>
            <!--{{ Form::text('contact_id', $ticket->contact_id, ['class' => 'form-select, select2' . ($errors->has('contact_id') ? ' is-invalid' : ''), 'placeholder' => __('Contact')]) }}
            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dialogo2">+</a> <br>
            <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">{{ __('+') }}</a>-->
            <input type="text" id="contact_id" name="contact_id" class="form-control.<?php echo ($errors->has('contact_id') ? ' is-invalid' : ''); ?>" required hidden>
            {!! $errors->first('contact_id', '<div class="invalid-feedback">:message</div>') !!}
            <script>
                $('.select2').select2();
            </script>
            <select class="form-select" name="contact" id="contact" style="width:600px; height:38px;" required></select>            
            
            <a  style="margin-left:620px; margin-top:-61px;" type="button" class="btn btn-outline-dark" id="add" data-toggle="modal" data-target="#dialogo2">+</a> <br>

            <script>
                // $('#contact').select2();
                var customer = document.getElementById('customer_id').value;
                $("#customer").on("select2:select", function (e) {
                        var countryId = $(this).val();
                        customer = document.getElementById('customer_id').value= countryId;
                        document.getElementById('ejemplo').value= countryId;
                        $('#contact').html('');
                        $.ajax({
                            url: "{{ route('getStates') }}?customer_id="+customer,
                            type: 'get',
                            success: function (res) {
                                $('#contact').html("<option value=''>{{ __('Select contact')}}</option>");
                                $.each(res, function (key, value) {
                                    $('#contact').append('<option value="' + value
                                        .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                                });
                            }
                        });
                    

                    $('#contact').on("change", function () {
                        var contactId = this.value;
                        document.getElementById('contact_id').value= contactId;
                        
                    });
                });
            </script>
        </div>
        
        <br>

        <div class="table-responsive">
            
            <table class="table" style="width:700px;">
                <!-- <thead class="thead">
                    <tr style="text-align: center">
                        <th></th>
                                                                    
                        <th></th>
                    </tr>
                </thead> -->
                <tbody>
                    <tr style="text-align: left; font-size: 15px; vertical-align: center;">
                        <td><b>{{ __('Factory')}}:</b></td>
                        <td>
                            <select class="form-select" name="factory_id" id="factory_id" style="width:500px; height:38px;" required></select>

                            <a  style="margin-left:520px; margin-top:-61px;" type="button" class="btn btn-outline-dark" id="add" data-toggle="modal" data-target="#dialogo4">+</a> <br>

                           
                            <!-- <input type="text" name="factory" id="factory2"> -->
                        </td>                                          
                    </tr>
                    <tr>
                        <td>
                            <b>{{ __('Address') }}: </b>
                        </td>
                        <td>
                            <!-- <div class="resultado"></div> -->
                            <input type="text" id="result" class="form-control" style="width:600px; height:38px;" dissabled>
                        </td>
                    </tr>
                    <tr>
                        <td><b>{{ __('Site') }}:</b></td>
                        <td>
                            <input type="text" name="site" id="site" class="form-control" style="width:600px; height:38px;">
                            <!-- <textarea name="site" id="site" cols="120" rows="5" ></textarea> -->
                        </td>
                    </tr>
                    <tr>
                        <td><b>{{ __('Location') }}:</b></td>
                        <td>
                            <div class="form-group">
                                <input type="radio" name="location" id="location" value="L" checked>{{ __('Local') }} <br>
                                <input type="radio" name="location" id="location" value="F">{{ __('Foreign') }} <br>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <script>
                //$('.select2').select2();
                var customer = document.getElementById('customer_id').value;
                $("#customer").on("select2:select", function (e) {
                        var countryId = $(this).val();
                        customer = document.getElementById('customer_id').value= countryId;
                        document.getElementById('customer_factory').value= countryId;
                        $('#factory_id').html('');
                        $.ajax({
                            url: "{{ route('getFactories') }}?customer_id="+customer,
                            type: 'get',
                            success: function (res) {
                                $('#factory_id').html("<option value=''>{{ __('Select fatory')}}</option>");
                                $.each(res, function (key, value) {
                                    $('#factory_id').append('<option value="' + value
                                    .factory_id +'">' + value.name + '</option>');
                                });
                            }
                        });
                    

                    $('#contact').on("change", function () {
                        var contactId = this.value;
                        // document.getElementById('factory2').value= contactId;
                        document.getElementById('contact_factory').value= contactId;
                        // alert( document.getElementById('contact_factory').value);
                    });
                });

                $('#factory_id').on("change", function () {
                        var contactId = this.value;
                        const resultado = document.querySelector('.resultado');
                        // resultado.textContent = contactId;
                        // alert( document.getElementById('contact_factory').value);

                        $('.resultado').html('');
                        $.ajax({
                            url: "{{ route('getAddress') }}?factory_id="+contactId,
                            type: 'get',
                            success: function (res) {
                                // $('.resultado').html("<option value=''>{{ __('Select fatory')}}</option>");
                                $.each(res, function (key, value) {
                                    // $('.resultado').append(value.address);
                                    document.getElementById('result').value= value.address;
                                });
                            }
                        });
                    });
            </script>

            <script>$('.select2').select2();</script>

        </div>
        <br>

        <div>
            {{ Form::label( __('Priority')) }} 
            {{ Form::select('priority_id', $priority, $ticket->priority_id, ['class' => 'form-select' . ($errors->has('priority_id') ? ' is-invalid' : ''), 'placeholder' => __('Priority'), 'style'=>'width:700px','required']) }}
            {!! $errors->first('priority_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>
        <div>
        {{ Form::label( __('Project')) }} 
        <select name="project_id_s" id="project_id_s" class="form-select" style="width:700px; height:38px;">
                <option value ="Project" selected disabled >{{ __('Project') }}</option>
                @foreach($projects as $project)
                
                    <option value="{{ $project->project_id }}
                    @foreach($warranty_of as $cons_garantia) @if($cons_garantia->project_id == $project->project_id) ,{{$cons_garantia->date_end}} @endif @endforeach  ">{{ $project->name }}</option>
                    
                    
                @endforeach
            </select><br>
            <div  hidden id="status_warranty_principal">
                <input type="text" name="project_id" id="project_id" style="margin-left:-15%;" hidden>
                <div  class="spinner-grow" id="status_warranty_color" style="width:20px; height:20px;" data-toggle="tooltip" title="selecciona una opción"></div>
                <div   style="margin-left:40px; margin-top:-25px;" > <p id="texto_garantia"> Garantía = <strong><span id="texto_status_garantía"></span></strong> <br> Fecha de hoy = 
                <span  id="texto_fecha_hoy_garantia"></span> <br> Fecha de final = <strong><span id="texto_fecha_final_garantia"></span> </strong> </p> </div>

                <a hidden data-toggle="modal" data-target="#dialogo3" style="margin-left:35%; margin-top:-150px;"  id="boton_de_creacion_garantia">{{ __('Create waranty')}}</a>           

            </div>
            
            <script src="{{ asset('js/tickets_js/Tickets_js.js') }}" defer></script>
            
            
            
        </div>
        <br>
                


        

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
        <a class="btn btn-secondary btn-lg" href="{{ route('tickets.index') }}"><i class="material-icons" style="font-size:20px">block</i>&nbsp; {{ __('Cancel')}}</a>
    </div>
</div>