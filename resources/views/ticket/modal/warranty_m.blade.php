<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


</head>
<body>






<div id="dialogo3" class="modal fade" role="dialog">

<div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
        <div class="modal-header">

                 <h4 class="modal-title">{{ __('Add warranty')}}</h4>
        </div>
        <div class="modal-body">

            
<form action="{{ route('Warranty.index') }}" method="post" function>
@csrf
                    <p><strong>{{ __('Add warranty for')}}: <br>- <span id="nombre_proyecto_modal" class="text-warning"> </span></strong> </p><br> 
                    <label for="fecha_inicio"> <strong>{{ __('Start date')}} </strong></label> 
                    <br>
                    <input type="text" id="save_data_modal" name="project_id" hidden>
                    
                    <input type="date" id="fecha_inicio_combobx" name="date_start" required  ><br><br>
                    
                    <label for="fecha_final_combobx"><b>{{ __('End date')}}</b></label><br>
                    <input type="date" id="fecha_final_combobx" name="date_end" required >
                    <input autocomplete="off" readonly="readonly" name="user_id"  value="9999"  type="text" id="user_id" hidden>
                    <br>

          

                    
                  

                   
        </div>
         <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel')}}</button> 
                    <button  class="btn btn-success" onclick="save_data()">{{ __('Save')}}</button>                    
                    
                    <script src="{{ asset('tickets_js/Tickets_js.js') }}" defer></script>


                    <script>
                      
      
                      
  

                      $(document).ready(function(){
                        
                    $('#project_id_s').on('change', function(){

                      var nombre_proyecto_form = document.getElementById('project_id_s'); 
                      var id_project = ((nombre_proyecto_form.value).split(','))[0];
                      document.getElementById('save_data_modal').setAttribute("value",id_project);
                      
                      document.getElementById('nombre_proyecto_modal').innerHTML = (nombre_proyecto_form.options[nombre_proyecto_form.selectedIndex].text);
                      

                    });
                      

                      $('#fecha_inicio_combobx').on('change', function(){
                      var fecha_inicio_txt = document.getElementById('fecha_inicio_combobx').value;
                      var fecha_inicio_split = fecha_inicio_txt.split('-');
                      var fecha_inicio_acomodo = String(fecha_inicio_split[0]+"/"+fecha_inicio_split[1]+"/"+fecha_inicio_split[2]);
                      

                     // alert(fecha_inicio_acomodo);

                      //alert(hola);
                      //alert(typeof(hola));
                      //var hola_spliteado = hola.split('-');
                      //alert(hola_spliteado);
                      //alert("Dia = "+hola_spliteado[2]+" mes = "+hola_spliteado[1]+" año = "+hola_spliteado[0]);

                    });
                  $('#fecha_final_combobx').on('change', function(){
                      var fecha_final_txt = document.getElementById('fecha_final_combobx').value;
                      var fecha_final_split = fecha_final_txt.split('-');
                      var fecha_final_acomodo = String(fecha_final_split[0]+"/"+fecha_final_split[1]+"/"+fecha_final_split[2]);
                     // alert(fecha_final_acomodo);



                  });


       
               
                  
                  });
                    
                  function save_data() {
                    alert(nombre_proyecto_form.value);
                                        }
                    </script>
         </div>
        </form>    
    </div>
 </div>
</div> 
</body>
</html>

