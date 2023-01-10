
<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group table-responsive">
            {{ Form::label( __('Subject')) }}
            {{ Form::text('subject', $ticket->subject, ['class' => 'form-control' . ($errors->has('subject') ? ' is-invalid' : ''),'id' => 'subject', 'oninput' => 'save_data_ticket()' , 'placeholder' =>  __('Subject'), 'style'=>'width:80%', 'required']) }}
            {!! $errors->first('subject', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group table-responsive">
            {{ Form::label( __('Problem')) }}
            {{ Form::text('problem', $ticket->problem, ['class' => 'form-control' . ($errors->has('problem') ? ' is-invalid' : ''), 'id' => 'problem','oninput' => 'save_data_ticket()' , 'placeholder' => __('Problem'),'style'=>'width:80%', 'required']) }}
            {!! $errors->first('problem', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        
        <div class="form-group table-responsive">
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
            <select class="form-select select2" id="customer" style="width:60%; height:100%;" required>
                <option selected disabled>{{ __('Select customer')}}</option>
                @foreach ($countries as $country)
                <option value="{{ $country->customer_id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <br>
            <a onclick="save_data_ticket()" style="margin-left:65%; margin-top:-50px;" type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dialogo1">+</a> <br>
        </div>
        <script>$('.select2').select2();</script>
        <br>
        <div class="form-group table-responsive">
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
            <select class="form-select" name="contact" id="contact" style="width:60%; height:38px;" required></select>            
            
            <a onclick="save_data_ticket()" name="add_contacto" style="margin-left:65%; margin-top:-61px;" type="button" class="btn btn-outline-dark" id="add2" data-toggle="modal" data-target="#dialogo2" hidden >+</a> <br>

            <script>
                var contacto;
                var contactos;
                var contact_id2;
                var customer = document.getElementById('customer_id').value;
                var add_contact = document.getElementsByName("add_contacto");
                $("#customer").on("select2:select", function (e) {
                        var countryId = $(this).val();
                        customer = document.getElementById('customer_id').value= countryId;
                        document.getElementById('ejemplo').value= countryId;
                        $('#contact').html('');
                        $.ajax({
                            url: "{{ route('getStates') }}?customer_id="+customer,
                            type: 'get',
                            success: function (res) {
                                $('#contact').html("<option value='' selected disabled>{{ __('Select contact')}}</option>");
                                $.each(res, function (key, value) {
                                    $('#contact').append('<option value="' + value
                                        .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                                });
                            }
                        });
                    (document.getElementById("add2").removeAttribute("hidden",""));

                    $('#contact').on("change", function () {
                        var contactId = this.value;
                        document.getElementById('contact_id').value= contactId;
                        var ex = document.getElementById('contact');
                        var datos2 = ex.options[ex.selectedIndex].text;
                        contactos = datos2;
                        contact_id2 = contactId;
                        // alert(contact_id2);
                        (document.getElementById("add").removeAttribute("hidden",""));
                    });
                });
                $(document).ready(function() {
                    // alert(contactos);
                    var customer = document.getElementById('customer_id').value;
                    var contact = document.getElementById('contact_id').value;
                    var e = document.getElementById('customer');
                    var datos = e.options[e.selectedIndex].text;

                    //alert (customer + " - " + contact);
                    if (customer == ""){
                        $('#contact').html('');
                        $.ajax({
                            url: "{{ route('getStates') }}?customer_id="+customer,
                            type: 'get',
                            success: function (res) {
                                // document.getElementById('contact_id').value="";
                                $('#contact').html("<option value='0' selected disabled>{{ __('Select contact')}}</option>");
                                $.each(res, function (key, value) {
                                    $('#contact').append('<option value="' + value
                                        .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                                });
                            }
                        });
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
                    }
                    else{
                        if (contact == "") {
                            $('#contact').html('');
                            $.ajax({
                                url: "{{ route('getContacts') }}?contact_id="+contact,
                                type: 'get',
                                success: function (res) {
                                    // document.getElementById('contact_id').value="";
                                    // $('#contact').html("<option value='"+contact+"' selected disabled>"+res+"</option>");
                                    $.each(res, function (key, value) {
                                        $('#contact').append('<option value="' + value
                                            .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                                    });
                                    (document.getElementById("add")).removeAttribute("hidden","");
                                }
                            });
                        }
                        // $('#contact').html('');
                        // $.ajax({
                        //     url: "{{ route('getStates') }}?customer_id="+customer,
                        //     type: 'get',
                        //     success: function (res) {
                        //         // document.getElementById('contact_id').value="";
                        //         $('#contact').html("<option value='0' selected disabled>{{ __('Select contacts')}}</option>");
                        //         $.each(res, function (key, value) {
                        //             $('#contact').append('<option value="' + value
                        //                 .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                        //         });
                        //     }
                        // });
                        $('#contact').html('');
                            $.ajax({
                                url: "{{ route('getContacts') }}?contact_id="+contact,
                                type: 'get',
                                success: function (res) {
                                    (document.getElementById("add").removeAttribute("hidden",""));
                                    // document.getElementById('contact_id').value="";
                                    // $('#contact').html("<option value='"+contact+"' selected disabled>"+res+"</option>");
                                    $.each(res, function (key, value) {
                                        $('#contact').append('<option value="' + value
                                            .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                                    });
                                }
                            });
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
                        (document.getElementById("add2").removeAttribute("hidden",""));

                        $('#contact').on("change", function () {
                            var contactId = this.value;
                            document.getElementById('contact_id').value= contactId;
                            (document.getElementById("add").removeAttribute("hidden",""));
                        });
                    }
                });
                // $('#contact').select2();
                // var customer = document.getElementById('customer_id').value;
                // var add_contact = document.getElementsByName("add_contacto");
                // $("#customer").on("select2:select", function (e) {
                //         var countryId = $(this).val();
                //         customer = document.getElementById('customer_id').value= countryId;
                //         document.getElementById('ejemplo').value= countryId;
                //         $('#contact').html('');
                //         $.ajax({
                //             url: "{{ route('getStates') }}?customer_id="+customer,
                //             type: 'get',
                //             success: function (res) {
                //                 $('#contact').html("<option value='' selected disabled>{{ __('Select contact')}}</option>");
                //                 $.each(res, function (key, value) {
                //                     $('#contact').append('<option value="' + value
                //                         .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                //                 });
                //             }
                //         });
                //     (document.getElementById("add2").removeAttribute("hidden",""));

                //     $('#contact').on("change", function () {
                //         var contactId = this.value;
                //         document.getElementById('contact_id').value= contactId;
                //         (document.getElementById("add").removeAttribute("hidden",""));
                //     });
                // });
            </script>
        </div>
        
        <br>

        <div class="form-group table-responsive">
            
            <table class="table" style="width:85%;">
                <!-- <thead class="thead">
                    <tr style="text-align: center">
                        <th></th>
                                                                    
                        <th></th>
                    </tr>
                </thead> -->
                <tbody>
                    <tr style="text-align: left; font-size: 15px; vertical-align: center;">
                        <td style="width:10%;"><b>{{ __('Factory')}}:</b> <br> </td> 
                        <td style="width:90%;">
                            <select class="form-select" name="factory_id" id="factory_id" style="width:90%; height:38px;" required></select>

                            <a onclick="save_data_ticket()" name="add_fabrica" style="margin-left:92%; margin-top:-63px;" type="button" class="btn btn-outline-dark" id="add" data-toggle="modal" data-target="#dialogo4" hidden>+</a> <br>

                           
                            <!-- <input type="text" name="factory" id="factory2"> -->
                        </td>                                          
                    </tr>
                    <tr>
                        <td style="width:10%;">
                            <b>{{ __('Address') }}: </b>
                        </td>
                        <td style="width:90%;">
                            <!-- <div class="resultado"></div> -->
                            <input type="text" id="result" class="form-control" style="width:100%; height:38px;" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:10%;"><b>{{ __('Site') }}:</b></td>
                        <td style="width:90%;">
                            <input type="text" name="site" id="site" class="form-control" style="width:100%; height:38px;">
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
                        document.getElementById('contact_factory').value= contactId;
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

        <div class="form-group table-responsive">
            {{ Form::label( __('Priority')) }} 
            {{ Form::select('priority_id', $priority, $ticket->priority_id, ['class' => 'form-select' . ($errors->has('priority_id') ? ' is-invalid' : ''),'onclick' => 'save_data_ticket()' , 'id'=>'priority_id', 'placeholder' => __('Priority'), 'style'=>'width:80%','required']) }}
            {!! $errors->first('priority_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>
        <div class="form-group table-responsive">
<!----------------------------------------------------------------------Select proyecto----------------------------------------------------------------------------------->
        {{ Form::label( __('Project')) }} 
        <select onclick="save_data_ticket()" name="project_id_s" id="project_id_s" class="form-select" style="width:80%; height:38px;" required>
                <option value ="" selected disabled >{{ __('Project') }}</option>
                @foreach($projects as $project)
                    <option value="{{ $project->project_id }}
                    @foreach($warranty_of as $cons_garantia) @if($cons_garantia->project_id == $project->project_id) ,{{$cons_garantia->date_end}} @endif @endforeach  ">{{ $project->name }}</option>
                @endforeach
        </select>
        <br>
<!------------------------------------------------------------Datos de garantía al seleccionar proyecto-------------------------------------------------------------------->            
            <div id="status_warranty_principal" hidden>
                <input type="text" name="project_id" id="project_id" style="margin-left:-15%;" hidden>
                <div  class="spinner-grow" id="status_warranty_color" style="width:20px; height:20px;" data-toggle="tooltip" title="selecciona una opción"></div>
                <div   style="margin-left:40px; margin-top:-25px;" > <p id="texto_garantia"> {{ __('Warranty')}} = <strong><span id="texto_status_garantía"></span></strong> <br> {{ __('Today_date')}} = 
                <span  id="texto_fecha_hoy_garantia"></span> <br> {{ __('Final Date')}} = <strong><span id="texto_fecha_final_garantia"></span> </strong> </p> </div>
                <a onclick="save_data_ticket()" hidden data-toggle="modal" data-target="#dialogo3" style="margin-left:260px; margin-top:-11px;"  id="boton_de_creacion_garantia">{{ __('Create waranty')}}</a>           
            </div>
            <script src="{{ asset('js/tickets_js/Tickets_js_2.js') }}" defer></script> <!--script para detectar la garantía -->
        </div>
        
        <br>
    </div>
    <br>
<!--------------------------------------------------------------Submit de datos generales----------------------------------------------------------------------------------->    
    <div class="box-footer mt20 table-responsive">
        <button onclick="cancel_tickets()"type="submit" class="btn btn-success"><i class="material-icons" style="font-size:20px; width:auto; height:auto;">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
        <a onclick="cancel_tickets()" class="btn btn-secondary" href="{{ route('tickets.index') }}"><i class="material-icons" style="font-size:20px; width:auto; height:auto;">block</i>&nbsp; {{ __('Cancel')}}</a>
    </div>
</div>


<script>
    function save_data_ticket(){
        var input_data_ticket = [];
            var tema = document.getElementById('subject'); 
            var problematica = document.getElementById('problem');
            var prioridad = document.getElementById('priority_id');
            var proyecto = document.getElementById('project_id_s');
            input_data_ticket.push(tema.value);
            input_data_ticket.push(problematica.value);
            input_data_ticket.push(prioridad.value);
            input_data_ticket.push(proyecto.selectedIndex);
            input_data_ticket.push(proyecto.value);
        //

        localStorage.setItem("salida_ticket",input_data_ticket);
       // alert("tema "+input_data_ticket[0]+" problematica "+input_data_ticket[1]+" prioridad "+input_data_ticket[2]+" proyecto "+input_data_ticket[3]);
      //  alert(localStorage.getItem("salida_ticket"));



//coment

    }


    $(document).ready(function(){
        var datos_cancel  = localStorage.getItem("salida_ticket");
        if(datos_cancel == ""){
            //alert("nopasa");
                              }
        else
                              {  
            document.getElementById('subject').value = ((localStorage.getItem("salida_ticket").split(','))[0]);
            document.getElementById('problem').value = ((localStorage.getItem("salida_ticket").split(','))[1]);
            document.getElementById("priority_id").selectedIndex = ((localStorage.getItem("salida_ticket").split(','))[2]);
            document.getElementById("project_id_s").selectedIndex = ((localStorage.getItem("salida_ticket").split(','))[3]);
            document.getElementById("project_id").value = ((localStorage.getItem("salida_ticket").split(','))[4]);
                              }
    });



    
function cancel_tickets(){
    localStorage.setItem("salida_ticket","");
}


</script>