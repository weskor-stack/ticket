
@extends('layouts.app')

@extends('layouts.hover')






    <!--vínculo de mis scripts-->
    
    <script src="warranty_js/Warranty_js.js"></script>
    
    






@section('template_title')
    Ticket
@endsection

 
@section('content')

<div style="width:80%; margin-left:15%;">
<div class="" id="select_proyecto" name="select_proyecto">
 <strong> <center> Selección de proyecto </center> </strong>

 

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="success">
  <strong>Registro guardado!</strong> Tu registro se ha guardado con exito
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif




<!--select de los proyectos-->
<div name="seleccion_proyecto" class="jumbotron text-center" >
            @csrf
            <label for="proyecto_cb">Nombre_proyecto</label>
            <br>
            <select href="#crear"  data-toggle="collapse" multiple name="proyecto_cb" id="proyecto_cb" class="custom-select mb-3" style="width:30%;" onchange="info_selected()"  href="#crear">
                <option disabled selected >Nombre_Proyecto</option>
                <!--la logica de esto es la siguiente, primero se hace unna consulta general de toda la base de datos en la que me voy a basar, despues tengo que buscar todos los datos de las tablas
            a las que le quiero sacar información, para posteriormente hacer una comparación de cuando los datos cargados coincidan poder usar los datos asignandoselos a un value, que me ayuda a imprimir lo que necesito-->
         @foreach($consulta_db as $cons_db)
        
           

                    
                    
           
           
                
                    
           <option value="{{$cons_db->project_id}}, {{$cons_db->name}}, 
           
            @foreach($consulta_Project_Status as $spr)
                @if($spr->project_status_id == $cons_db->project_status_id)
                    {{$spr->name}} 
                @endif
            @endforeach



           @foreach($consulta_project_mannager as $cprmg) 
                @foreach($consulta_empleados as $cons_nombres) 
                    @if($cprmg->project_id == $cons_db->project_id)
                        @if($cons_nombres->employee_id == $cprmg->manager_id) 
                            ,{{$cons_nombres->name}} {{$cons_nombres->last_name}} {{$cons_nombres->second_last_name}}
                        @endif 
                    @endif
                @endforeach
            @endforeach



            @foreach($consulta_fechas as $cons_fechas)
            @if($cons_db->project_id == $cons_fechas->project_id)
                            ,{{$cons_fechas-> date_start}}
                            ,{{$cons_fechas-> date_finish}} 

            @foreach($consulta_garantia as $cons_garantia) 
                @if($cons_garantia->project_id == $cons_db->project_id) 
                    ,{{$cons_garantia->date_end}} 
                @endif 
            @endforeach
            "
            id="proyecto_cb" >- {{$cons_db->key}} /// {{$cons_db->name}} </option>
                    @endif
                 
         @endforeach
         @endforeach
            </select>
            <br>
            <br><br>
            
            <input class="form-control" id="myInput" type="text" placeholder="Buscar datos">
      
            @if(count($errors)>0)

<button class="btn btn-danger" data-toggle="modal" data-target="#myModal">?</button>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                                <h4 class="modal-title">
                                    @if(count($errors)>1)  
                                        Faltan {{count($errors)}} campos por llenar
                                    @else
                                        Falta 1 dato
                                    @endif
                                </h4>
                        </div>
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                <strong>Error!</strong> faltan los datos de:  <a href="#" class="alert-link">{{$error}}</a>.
                            </div>
                            @endforeach
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Entendido</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            @endif
</div>
<div class="collapse" id="crear">
    <!--información del proyecto-->
    <!--mostrar cuando se haya seleccionado un proyecto-->
    <div  class="col-sm-12"> <strong> <center> Información del proyecto </center> </strong> </div>
    <div  name="informacion_proyecto"   style="background:#f5f7fc;">
    <div >  
   <div>
   <div class="row">
        <div class="col-md-8">
            <div class="pb-4">
                  <label for="p_project" id="nombre_proyecto">nombre del proyecto</label>
                  <input type="text", id="nombre_proyecto2" style="width:57%;" placeholder="" readonly="readonly" disabled >
            </div>
            <div class="row">
                 <div class="col-md-2">
                     <label for="p_project">Status de proyecto</label>
                     <input type="text", id="status_input"  placeholder="" readonly="readonly"  disabled>
                </div>
                <div class="col-md-3" style="margin-left:20px;">
                    <label for="p_project">Project Manager  </label>
                    <input type="text", id="project_manager" placeholder="Project Manager" readonly="readonly" style="width:100%;" disabled> </input>
                 </div>
                 <br>
               <div class="row">
                    <div class="col-md-3">
                        <label for="p_project">Fecha inicio</label>
                        <input type="text", id="Fecha_inicio_vista" placeholder="Fecha inicio" readonly="readonly" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="p_project">Fecha final</label>
                        <input type="text", id="Fecha_final_vista" placeholder="Fecha final" readonly="readonly" disabled>
                        
                    </div>
                
            </div>
            
            </div>
        </div>
    </div>


   </div>
    <!--garantía-->   
    <div id="div_de_garantia">
    <div  class="col-sm-12" style="background:white;"> <strong> <center> Crear Garantía </center> </strong> </div>  
    <form action="{{ route('Warranty.index') }}" method="post" function>  
    @csrf
    <div  name="warranty" class=" jumbotron " style="background:#f5f7fc">
            
            <input type="text", id="project_id" name="project_id" placeholder="" readonly="readonly"  hidden>  
            <input type="text" id="op_proyecto" for="p_project" name="op_proyecto" readonly="readonly" style="width:30%;" hidden>
            <input type="text"  id="tiene_garantia" name="tiene_garantia" hidden>
            <input autocomplete="off" readonly="readonly" name="date_start" placeholder="Fecha_Inicio" type="text" id="datepicker">
            <input autocomplete="off" readonly="readonly" name="date_end" placeholder="Fecha_Final" type="text" id="datepicker2">
            <input autocomplete="off" readonly="readonly" name="user_id"  value="9999"  type="text" id="user_id" hidden>
        <script src="{{ asset('js/warranty_js/Warranty_have_js.js') }}" defer>
     
        </script>
    <input type="submit", value="Guardar" class="btn btn-success">
    </form>
    </div>
    <br>
    <tr>
                    <!--hacemos una consulta con respecto a la tabla que estoy creando de tickets para poder revisar los que se han creado
                    también se agregará que se revise el status dependiendo de el que se encuentra en la tabla relacionada-->
                @csrf
            </tbody>
        </table>
        @endsection
        </div>   




</div>












