function info_selected(){
    var combo = document.getElementById("proyecto_cb");
    var crear = document.getElementById("crear");
    var input_nombre_proyecto = document.getElementById("nombre_proyecto2");
    var input_op_proyecto = document.getElementById("op_proyecto");
    
    var selected = combo.options[combo.selectedIndex].text;
    var myCollapse = new bootstrap.Collapse(crear); 
if(selected != "Nombre_proyecto"){
    myCollapse.toggle();
    input_op_proyecto.value = selected;
    input_nombre_proyecto.value = selected;
    
}
    //this.value para obtener   

}

$(document).ready(function(){
$('#proyecto_cb').on('change', function(){
//variables
var input_status_proyecto = document.getElementById("status_input");
var input_prioridad_proyecto = document.getElementById("project_manager");
var input_fecha_inicio = document.getElementById("Fecha_inicio_vista");
var input_fecha_final = document.getElementById("Fecha_final_vista");
var proyecto_id = $(this).val();
var input_nombre_proyecto2 = document.getElementById("project_id");
var test = String(proyecto_id);

//constantes
const descomposicion = test.split(",");

//variable de descomposición
var numeric = parseInt(descomposicion);


//meter datos al textbox
input_nombre_proyecto2.value = descomposicion[0];
input_status_proyecto.value = descomposicion[2];
input_prioridad_proyecto.value = descomposicion[3];
input_fecha_inicio.value = descomposicion[4];
input_fecha_final.value = descomposicion[5];

document.getElementsByName('input_nombre_proyecto2').placeholder=descomposicion[6];
input_nombre_proyecto2.value = numeric;
document.getElementById('tiene_garantia').value=descomposicion[6];

});

});


$(document).ready(function(){


    $( function() {
      
        $('#datepicker2').datepicker({ dateFormat: 'yy-mm-dd' });
      } );
    $( function() {
      
        $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
    } );
    
    
    
    });
    