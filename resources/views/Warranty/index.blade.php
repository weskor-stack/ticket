{{-- /////////////////////////////////////////////////////////////////// Index de garantía /////////////////////////////////////////////////////////////////////// --}}  
@extends('layouts.app')
    <!--vínculo de mis scripts-->
    <script src="warranty_js/Warranty_js.js"></script>
@section('template_title')
    Ticket
@endsection

@section('content')

{{-- /////////////////////////////////////////////////////////////////// div principal /////////////////////////////////////////////////////////////////////// --}}  
<div>

{{-- ///////////////////////////////////////////////////////// mensaje de salidaal crear registro //////////////////////////////////////////////////////////// --}}  
    <div style="background: rgb(0,0,0); background: linear-gradient(90deg, rgba(0,0,0,0.0) 0%, rgba(237,237,237,1) 50%, rgba(0,0,0,0.0) 100%);" class="" id="select_proyecto" name="select_proyecto">
        <strong> <center> Selección de proyecto </center> </strong>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success">
                    <strong>Registro guardado!</strong> <br>
                    Tu registro se ha guardado con exito

                    </button>
            </div>
        @endif
    </div>
    
 {{-- /////////////////////////////////////////////////////////División de selección de proyecto /////////////////////////////////////////////////////////--}}   
    <div  name="seleccion_proyecto" class="jumbotron text-center" >
                @csrf
                <div style="background: rgb(0,0,0);background: linear-gradient(90deg, rgba(0,0,0,0.0) 0%, rgba(237,237,237,1) 50%, rgba(0,0,0,0.0) 100%); width:100%;">
                    <label for="proyecto_cb">Nombre_proyecto</label>
                </div>

                <select href="#crear"  data-toggle="collapse" name="proyecto_cb" id="proyecto_cb" class="form-select" size="3" aria-label="size 3 select example" style="margin-left:28%; margin-top:15px; width:50%;" onchange="info_selected()"  href="#crear">
                    <option disabled>Nombre_Proyecto</option>
{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                                                           Orden de los datos:
id_proyecto_1 
nombre_proyecto_2,
status_proyecto_3
nombre_empleado_4,
primer_apellido_empleado_5,
segundo_apellido_empleado_6,
fecha_inicio_7,
fecha_final_8,
consulta_garantia_9

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
 
                        @foreach($consulta_db as $cons_db)
                            <?php
                            $valores_de_consulta = array(
                                "sin id de proyecto" ,
                                "sin nombre de proyecto" ,
                                "sin status" ,
                                "Sin nombre" ,
                                "Sin primer apellido" ,
                                "Sin segundo apellido" ,
                                "Sin fecha de inicio" ,
                                "Sin fecha final" ,
                                "NoWarranty"
                            ) 
                          
                            ?>
                            
                                <option 
{{-- /////////////////////////////////////////////////////consulta a los valores de nombre de proyecto y su id/////////////////////////////////////////////////////--}}
                                        {{$valores_de_consulta[0] = $cons_db->project_id}}
                                        {{$valores_de_consulta[1] = $cons_db->name}} 

{{-- /////////////////////////////////////////////////////--consulta de los valores del status del proyecto--//////////////////////////////////////////////////////--}}
                                    @foreach($consulta_Project_Status as $spr)
                                        @if($spr->project_status_id == $cons_db->project_status_id)
                                            {{$valores_de_consulta[2] = $spr->name}}   
                                        @endif
                                    @endforeach

{{-- ////////////////////////////////////consulta del nombre, apellido y segundo apellido de project manager con respecto a la id de otra tabla////////////////////--}}
                                    @foreach($consulta_project_mannager as $cprmg) 
                                            @foreach($consulta_empleados as $cons_nombres) 
                                                @if($cprmg->project_id == $cons_db->project_id and $cons_nombres->employee_id == $cprmg->manager_id)
                                                        {{$valores_de_consulta[3]=$cons_nombres->name}} 
                                                        {{$valores_de_consulta[4]=$cons_nombres->last_name}} 
                                                        {{$valores_de_consulta[5]=$cons_nombres->second_last_name}}          
                                                @endif
                                            @endforeach
                                    @endforeach
                                    
{{-- /////////////////////////////////////////////////////consulta de fecha de inicio y de fin del proyecto///////////////////////////////////////////////////// --}}
                                    @foreach($consulta_fechas as $cons_fechas)
                                        @if($cons_db->project_id == $cons_fechas->project_id)
                                                    {{$valores_de_consulta[6]=$cons_fechas-> date_start}}
                                                    {{$valores_de_consulta[7]=$cons_fechas-> date_finish}} 
                                        @endif 
                                    @endforeach

{{-- /////////////////////////////////////////////////////////////// consulta si tiene garantía o no /////////////////////////////////////////////////////////// --}}
                                    @foreach($consulta_garantia as $cons_garantia) 
                                        @if($cons_garantia->project_id == $cons_db->project_id) 
                                            {{$valores_de_consulta[8]=$cons_garantia->date_end}}
                                            {{$valores_de_consulta[9]=$cons_garantia->date_start}}  
                                        @endif 
                                    @endforeach
                                    
{{-- /////////////////////////////////////////////////////////////asignación de valores con respecto al arreglo///////////////////////////////////////////////// --}}                                  
                                    value="
                                            @foreach($valores_de_consulta as $cons_val)
                                                ,{{$cons_val}}
                                            @endforeach
                                          "
{{-- ////////////////////////////////////////////////////////////// texto que muestra valor de opción ////////////////////////////////////////////////////////// --}}
                                    id="proyecto_cb" > {{$cons_db->key}} -- {{$cons_db->name}}</option>
                        @endforeach

                </select>

                <br>

{{-- //////////////////////////////////////////////////////// Sección de muestra de información del proyecto seleccionado/////////////////////////////////////////////////////// --}}  
    <br>
    <div class="collapse" id="crear">

        <div  class="col-sm-12"style="background: rgb(0,0,0);
            background: linear-gradient(90deg, rgba(0,0,0,0.0) 0%, rgba(237,237,237,1) 50%, rgba(0,0,0,0.0) 100%);"> <strong> <center> {{ __('Project info')}} </center> </strong> </div>
        <div  name="informacion_proyecto"   style="background:#f5f7fc;">
    <div>  
        
    <div class="row">
            <div class="col-md-8">
 
                    <label for="p_project" id="nombre_proyecto" style="width:50%;  position:center; margin-left:auto;">{{ __('Project name')}}</label>
                    <input type="text", id="nombre_proyecto2" style="width:50%;   text-align: center;   position:center; margin-left:auto;" placeholder="" readonly="readonly" disabled >
<br>
                    <label for="p_project"style="width:50%; position:center; margin-left:auto;">Project Manager  </label>
                    <br>
                    <input type="text", id="project_manager" style="width:50%; position:center;  text-align: center; margin-left:auto;"placeholder="Project Manager" readonly="readonly" style="width:50%;" disabled> </input>
           
<br> 
<div style="width:80%; position:center; margin-left:auto; ">
<table class="table">

    <tbody style="text-align:center;">
        <tr>
            
        </tr>
        <tr>
            <td scope="row"><label for="p_project">{{ __('Project status')}}</label>
            <br>
            <input style="text-align:center;" type="text", id="status_input"  placeholder="" readonly="readonly"  disabled>
        </td>
      
        </tr>
        <tr>
            <td scope="row"> <label for="p_project">{{ __('Start date')}}</label>
            <br>
            <input style="text-align:center;" type="text", id="Fecha_inicio_vista" placeholder="Fecha inicio" readonly="readonly" disabled>
        </td>

        </tr>
        <tr>
            <td>
            <label for="p_project">{{ __('End date')}}</label>
            <br>
            <input style="text-align:center;" type="text", id="Fecha_final_vista" placeholder="Fecha final" readonly="readonly" disabled>  
            </td>
        </tr>
    </tbody>
</table>
                    
             
                   
                            
                    
</div>                            
                    
                <br><br><br>
                
            </div>
        </div>


    </div>
  
<!-- {{-- /////////////////////////////////////////////////////////////////// collapse de la garantía /////////////////////////////////////////////////////////////////////// --}}           -->
<div style="background: rgb(0,0,0); background: linear-gradient(90deg, rgba(0,0,0,0.0) 0%, rgba(237,237,237,1) 50%, rgba(0,0,0,0.0) 100%); width:100%; height:20px;"></div>              

        
                @if(count($errors)>0)

                                                 @if(count($errors)>1)  
                                                            Faltan {{count($errors)}} campos por llenar
                                                 @else
                                                            Falta 1 dato
                                                 @endif
         
                                                @foreach($errors->all() as $error)
                                                    {{$error}}
                                                @endforeach

                @endif
</div>            
            <div id="div_garantia_no_tiene" style="height:80px;" >
                <div  class="col-sm-12" style="background: rgb(0,0,0);background: linear-gradient(90deg, rgba(0,0,0,0.0) 0%, rgba(237,237,237,1) 50%, rgba(0,0,0,0.0) 100%);"> <strong> <center> Crear Garantía </center> </strong>
                </div>  
                        <form action="{{ route('Warranty.index') }}" method="post" id="guardado_fecha" function>    
                        @csrf   
                        <div  name="warranty" class=" jumbotron " style="background:#f5f7fc">   
                                <input type="text"  id="tiene_garantia" name="tiene_garantia" hidden>
                                <input type="text", id="project_id" name="project_id" placeholder="" readonly="readonly"  hidden>   
                                <input type="text" id="op_proyecto" for="p_project" name="op_proyecto" readonly="readonly" style="width:30%;" hidden>   
                                <input autocomplete="off" readonly="readonly" name="date_start" placeholder="Fecha_Inicio" type="text" id="datepicker" data-toggle="lost_date_start_warning" data-bs-placement="bottom" title="Te falta Fecha_inicio" data-content="Por favor ingresa la fecha de inicio"> 
                                <input autocomplete="off" readonly="readonly" name="date_end" placeholder="Fecha_Final" type="text" id="datepicker2" data-toggle="lost_date_end_warning" data-bs-placement="bottom" title="Te falta Fecha_final" data-content="Por favor ingresa la fecha final">   
                                <input autocomplete="off" readonly="readonly" name="user_id"  value="9999"  type="text" id="user_id" hidden>
                                <script src="{{ asset('js/warranty_js/Warranty_have_js.js') }}" defer></script>   
                        </form> 
                                <input  onclick="guardado_de_garantia()", value="guardar" class="btn btn-success" readonly="readonly"> 
                        </div>        
            </div>
                                <input type="text" id="fecha_inicio_final_garantia"  hidden>
            <div id="div_garantia_tiene">   
            <div  class="col-sm-12" style="background: rgb(0,0,0);background: linear-gradient(90deg, rgba(0,0,0,0.0) 0%, rgba(237,237,237,1) 50%, rgba(0,0,0,0.0) 100%);"> <strong> <center> Garantía creada </center> </strong>
                <div style="width:100%; height:180px;">
                <div>
                <label for="status"><strong>Status:</strong></label >
                    <br>
                    
                   <b><label id="status" style="width:250px;height:30px margin-left:300px;"></label></b>
                    <br>
                    
                    <label for="fecha_inicio_creada"><strong>Fecha inicio</strong></label>
                    <br>
                    <input disabled type="text" id="fecha_inicio_creada" style="width:250px;height:30px;  text-align: center;">
                    <br>
                    <label for="fecha_final_creada"><strong>Fecha Final</strong></label>
                    <br>
                    <input disabled type="text" id="fecha_final_creada" style="width:250px;height:30px;  text-align: center;">
                    <br>

                    
                </div>

                    
                </div>
            </div>

{{-- /////////////////////////////////////////////////////////////////// final de select /////////////////////////////////////////////////////////////////////// --}}  




            
            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Error con las fechas</h5>
                                </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                La fecha final es mayor a la inicial 
                                <br>
                                Revisa las fechas de nuevo
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="cerrar_modal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
               function cerrar_modal(){
                   $("#modelId").modal("toggle");
                }
            </script>  
{{-- ///////////////////////////////////////////////////// divisiones de pantalla pricipal y final de sección //////////////////////////////////////////////////////// --}}  
                <br>
                @endsection
            </div>   
</div>


