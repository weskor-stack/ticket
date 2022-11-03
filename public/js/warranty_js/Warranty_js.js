function info_selected(){
    var combo = document.getElementById("proyecto_cb");
    var crear = document.getElementById("crear");
    var input_nombre_proyecto = document.getElementById("nombre_proyecto2");
    var input_op_proyecto = document.getElementById("op_proyecto");
    var myCollapse = new bootstrap.Collapse(crear); 
    var selected = combo.options[combo.selectedIndex].text;
 //   
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
var Input_project_manager = document.getElementById("project_manager");
var input_fecha_inicio = document.getElementById("Fecha_inicio_vista");
var input_fecha_final = document.getElementById("Fecha_final_vista");
var proyecto_id = $(this).val();
var input_nombre_proyecto2 = document.getElementById("project_id");
var test = String(proyecto_id);


const descomposicion = test.split(",");


var numeric = parseInt(descomposicion[1]);

var nombre_general = String(descomposicion[4].trim()+"  "+descomposicion[5].trim()+"  "+descomposicion[6].trim());

input_status_proyecto.value = descomposicion[3];

if(nombre_general == "Sin nombre  Sin primer apellido  Sin segundo apellido"){
    Input_project_manager.value="Sin project Manager";
}else{
    Input_project_manager.value = nombre_general ;
}


input_fecha_inicio.value = descomposicion[7];
input_fecha_final.value = descomposicion[8];

document.getElementsByName('input_nombre_proyecto2').placeholder=descomposicion[6];
input_nombre_proyecto2.value = numeric;

(document.getElementById('tiene_garantia')).value=descomposicion[9];
//alert(document.getElementById("tiene_garantia").value);


if((document.getElementById("tiene_garantia").value).trim() != "NoWarranty" )
{
    //document.getElementById("fecha_inicio_final_garantia").innerHTML(((descomposicion[9]).trim()+","+(descomposicion[10]).trim()).trim());
    $("#fecha_inicio_final_garantia").val((((descomposicion[9]).trim()+","+(descomposicion[10]).trim()).trim()));
    $("#fecha_inicio_creada").val((descomposicion[10]).trim());
    $("#fecha_final_creada").val((descomposicion[9]).trim());
    let dia_hoy_transform = new Date().toLocaleDateString('en-CA');

    //alert((dia_hoy_transform)+"   "+Date.parse((descomposicion[9]).trim()));
    if(Date.parse(dia_hoy_transform) > Date.parse((descomposicion[9]).trim()))
    {
        //alert("garantia terminada");
        $("#status").text("Inactiva");
        $("#status").css("color","red");
    
    }
    else
    {
        $("#status").text("Activa");
        $("#status").css("color","green");
        //alert("garantia activa");
    }
}
else
{
    //alert("no tiene garantia");
    $("#fecha_inicio_final_garantia").val("No_Warranty");
    
}



});

});


function guardado_de_garantia(){
    function sleep (time) 
    {
        return new Promise((resolve) => setTimeout(resolve, time));
    }

if(String((document.getElementsByName('date_end')[0]).value) == "" && String((document.getElementsByName('date_start')[0]).value) == ""){
    $('[data-toggle="lost_date_start_warning"]').popover("show");
    $('[data-toggle="lost_date_end_warning"]').popover("show");
    sleep(2800).then(() => 
    {
        $('[data-toggle="lost_date_start_warning"]').popover("hide");
        $('[data-toggle="lost_date_end_warning"]').popover("hide");
    });


}else{
    if(String((document.getElementsByName('date_end')[0]).value) == ""){
        $('[data-toggle="lost_date_end_warning"]').popover("show");
        sleep(2800).then(() => 
        {        
            $('[data-toggle="lost_date_end_warning"]').popover("hide");
        });
    }else{
        if(String((document.getElementsByName('date_start')[0]).value) == ""){
                $('[data-toggle="lost_date_start_warning"]').popover("show");
                sleep(2800).then(() => 
                {
                    $('[data-toggle="lost_date_start_warning"]').popover("hide");
                });
            }else{
                if(Date.parse((document.getElementsByName('date_end')[0]).value) < Date.parse((document.getElementsByName('date_start')[0]).value)){
                        $("#modelId").modal("toggle");
                    }else{
                    document.getElementById('guardado_fecha').submit();
                    }}
            }

    }
   
}
      
 


$(document).ready(function(){


    $( function() {
      
        $('#datepicker2').datepicker({ dateFormat: 'yy-mm-dd' });
        
      } );
    $( function() {
      
        $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
    } );
    
    
    
    });



    