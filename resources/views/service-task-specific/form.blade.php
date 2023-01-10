<div class="box box-info padding-1 table-responsive">
    <div class="box-body table-responsive">
        
        <div class="form-group table-responsive" hidden>
            {{ Form::label('Servicio') }}
            {{ Form::text('service_id', $service->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Report Id']) }}
            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group table-responsive">
        <h1 style="text-align:center;">{{ __('Activities implemented')}}</h1>
            <legend>{{ __('Activities implemented')}}</legend>
            {{ Form::textarea('description', $serviceTaskSpecific->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('Description task'), 'required']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group table-responsive">
        <legend>{{ __('Evidence') }} </legend>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            
            <table class="table-responsive" align="center">
                <tr>
                    <td align="center">
                        <h5>{{ __('Before')}}:</h5>

                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$serviceTaskSpecific->previous_evidence }}" id="blah" width="100" height="100" alt="">
                            <input type="file" id="previous_evidence" class="form-control.<?php echo ($errors->has('previous_evidence') ? ' is-invalid' : ''); ?>" required><br><br>
                            <input type="text" id="previous_evidence2" style="display: none" name="previous_evidence" class="form-control" required>
                            
                            {!! $errors->first('previous_evidence', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <td align="center">
                        <h5>{{ __('After') }}:</h5>
                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$serviceTaskSpecific->subsequent_evidence }}" id="blah2" width="100" height="100" alt="">
                            <input type="file" id="subsequent_evidence" class="form-control.<?php echo ($errors->has('subsequent_evidence') ? ' is-invalid' : ''); ?>" required><br><br>
                            <input type="text" id="subsequent_evidence2" style="display: none" name="subsequent_evidence" class="form-control" required>
                            {!! $errors->first('subsequent_evidence', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <br>
                </tr>
            </table>
            <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
        </div>
        <div class="form-group table-responsive">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <legend>{{ __('Signature') }}</legend>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />     
            <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
            <!-- <style>
                .kbw-signature { width: 100%; height: 200px;}
                #sig canvas{ width: 100% !important; height: auto;}
            </style> -->

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
                                        <!-- <div id="sig"></div> -->
                                        <style>
                                            canvas {
                                                width: 100%;
                                                height: 5%;
                                                background-color: #F0F0EF;
                                            } 
                                        </style>
                                        <div><canvas id="sig" onclick="data_image()"></canvas></div>

                                        <script>
                                            //======================================================================
                                            // VARIABLES
                                            //======================================================================
                                            let miCanvas = document.querySelector('#sig');
                                            let lineas = [];
                                            let correccionX = 0;
                                            let correccionY = 0;
                                            let pintarLinea = false;
                                            // Marca el nuevo punto
                                            let nuevaPosicionX = 0;
                                            let nuevaPosicionY = 0;

                                            let posicion = miCanvas.getBoundingClientRect()
                                            correccionX = posicion.x;
                                            correccionY = posicion.y;

                                            miCanvas.width = innerWidth;
                                            miCanvas.height = 300;

                                            //======================================================================
                                            // FUNCIONES
                                            //======================================================================

                                            /**
                                             * Funcion que empieza a dibujar la linea
                                             */
                                            function empezarDibujo () {
                                                pintarLinea = true;
                                                lineas.push([]);
                                            };
                                            
                                            /**
                                             * Funcion que guarda la posicion de la nueva línea
                                             */
                                            function guardarLinea() {
                                                lineas[lineas.length - 1].push({
                                                    x: nuevaPosicionX,
                                                    y: nuevaPosicionY
                                                });
                                            }

                                            /**
                                             * Funcion dibuja la linea
                                             */
                                            function dibujarLinea (event) {
                                                event.preventDefault();
                                                if (pintarLinea) {
                                                    let ctx = miCanvas.getContext('2d')
                                                    // Estilos de linea
                                                    ctx.lineJoin = ctx.lineCap = 'round';
                                                    ctx.lineWidth = 1;
                                                    // Color de la linea
                                                    ctx.strokeStyle = '#000';
                                                    // Marca el nuevo punto
                                                    if (event.changedTouches == undefined) {
                                                        // Versión ratón
                                                        nuevaPosicionX = event.layerX;
                                                        nuevaPosicionY = event.layerY;
                                                    } else {
                                                        // Versión touch, pantalla tactil
                                                        nuevaPosicionX = event.changedTouches[0].pageX - correccionX;
                                                        nuevaPosicionY = event.changedTouches[0].pageY - correccionY;
                                                    }
                                                    // Guarda la linea
                                                    guardarLinea();
                                                    // Redibuja todas las lineas guardadas
                                                    ctx.beginPath();
                                                    lineas.forEach(function (segmento) {
                                                        ctx.moveTo(segmento[0].x, segmento[0].y);
                                                        segmento.forEach(function (punto, index) {
                                                            ctx.lineTo(punto.x, punto.y);
                                                        });
                                                    });
                                                    ctx.stroke();
                                                    let canvas = document.getElementById("sig");
                                                    var dataURL = canvas.toDataURL();
                                                    $("#signature_evidence").val(dataURL);
                                                }
                                            }

                                            /**
                                             * Funcion que deja de dibujar la linea
                                             */
                                            function pararDibujar () {
                                                pintarLinea = false;
                                                guardarLinea();
                                                /*document.getElementById('clear').addEventListener('click', function() {
                                                    // let ctx = miCanvas.getContext('2d')
                                                    // ctx.clearRect(0, 0, miCanvas.width, miCanvas.height);
                                                    // lineas = [];
                                                    // alert("hola");
                                                    location.reload();
                                                }, false);*/
                                            }

                                            //======================================================================
                                            // EVENTOS
                                            //======================================================================

                                            // Eventos raton
                                            miCanvas.addEventListener('mousedown', empezarDibujo, false);
                                            miCanvas.addEventListener('mousemove', dibujarLinea, false);
                                            miCanvas.addEventListener('mouseup', pararDibujar, false);

                                            // Eventos pantallas táctiles
                                            miCanvas.addEventListener('touchstart', empezarDibujo, false);
                                            miCanvas.addEventListener('touchmove', dibujarLinea, false);

                                        </script>
                                        <br><br>
                                        <div  class="container">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td style="text-align:center;">
                                                        <div class="form-group table-responsive">
                                                            <legend style="text-align:center">{{ __('Executor')}}</legend>
                                                            <!--{{ Form::text('executor', $serviceTaskSpecific->executor, ['class' => 'form-control' . ($errors->has('description_activity') ? ' is-invalid' : ''), 'placeholder' => 'Descripción del servicio', 'maxlength' => 50]) }}
                                                            {!! $errors->first('executor', '<div class="invalid-feedback">:message</div>') !!}-->
                                                            <select class="form-select" id="employee_id" name="employee_id" style="width:100%; height:38px; text-align:center;" required>
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
                                                        <div class="form-group table-responsive">
                                                            <legend style="text-align:center">{{ __('Contact')}}</legend>
                                                                @foreach($contacts as $contact)
                                                                    
                                                                        <input class="form-control.<?php echo($errors->has('description_activity') ? ' is-invalid' : ''); ?>" type="text" name="contact_id" id="contact_id" value="{{$contact->contact_id}}" maxlength="50" style="width:100%; height:38px;text-align:center;" require hidden>
                                                                        <input class="form-control.<?php echo($errors->has('description_activity') ? ' is-invalid' : ''); ?>" type="text" name="contact" id="contact" value="{{$contact->job_title}} {{$contact->name}} {{$contact->last_name}}" maxlength="50" style="width:100%; height:38px;text-align:center;" disabled require>
                                                                    
                                                                @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- <button id="clear" title="{{ __('Clear')}}" class="btn btn-warning btn-sm"><i class="material-icons" style="font-size:20px">cleaning_services</i>&nbsp; {{ __('Clear')}}</button> -->
                                            
                                            <a onclick="data_image()" class="btn btn-warning btn-sm" id="clear"><i class="material-icons" style="font-size:20px">cleaning_services</i> {{ __('Clear')}}</a>

                                            <textarea id="signature_evidence" name="signature_evidence" style="display: none" class="form-control.<?php echo ($errors->has('signature_evidence') ? ' is-invalid' : ''); ?>" required></textarea>
                                            {!! $errors->first('signature_evidence', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
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
                // var sig = $('#sig').signature({syncField: '#signature_evidence', syncFormat: 'PNG'});
                $('#clear').click(function(e) {
                //     e.preventDefault();
                //     sig.signature('clear');
                    let ctx = miCanvas.getContext('2d')
                    ctx.clearRect(0, 0, miCanvas.width, miCanvas.height);
                    lineas = [];
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
            <button onclick="data_image()" type="submit" class="btn btn-success btn-lg" id="btnEnviar"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
            <!--<a class="btn btn-danger btn-lg" href="{{ route('services.index') }}"> Cancel</a>-->
            <script>
                var base64String = "";
                var subsequent = "";
                function data_image() {
                    
                    // var input = document.getElementById('previous_evidence');
                    // input.style.width = '156px';
                    // input.style.height = 'auto';
                    // if(input.files && input.files[0]){
                    //     console.log("File Seleccionado : ", input.files[0]);
                    //     alert(input.files[0]['size']);
                    // }
                    var file = document.querySelector('#previous_evidence')['files'][0];
                    var file2 = document.querySelector('#subsequent_evidence')['files'][0];
                    var reader = new FileReader();
                    var reader2 = new FileReader();
                    reader.onload = function () {
                        base64String = reader.result.replace("data:", "")
                            .replace(/^.+,/, "");
                        imageBase64Stringsep = base64String;
                    }
                    reader2.onload = function () {
                        subsequent = reader2.result.replace("data:", "")
                            .replace(/^.+,/, "");
                        imageBase64Stringsep = subsequent;
                    }
                    reader.readAsDataURL(file);   
                    reader2.readAsDataURL(file2); 
                    
                    // alert("Guardando información");

                    console.log("data:image/jpeg;base64,"+base64String);

                    console.log("data:image/jpeg;base64,"+subsequent);
                    // alert("data:image/jpeg;base64,"+base64String);
                    document.getElementById('previous_evidence2').value="data:image/jpeg;base64,"+base64String;

                    document.getElementById('subsequent_evidence2').value="data:image/jpeg;base64,"+subsequent;
                    // alert("Hola");
                    // alert("data:image/jpeg;base64,"+base64String);
                    // document.getElementById('previous_evidence2').value='"data:image/jpeg;base64,'+base64String+'"';
                    // alert(document.getElementById('previous_evidence').value);
                }
                
            </script>
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