
     
$(document).ready(function(){

 

    let dia_hoy_transform = new Date().toLocaleDateString('en-CA');
    document.getElementById("texto_fecha_hoy_garantia").innerHTML = dia_hoy_transform;
    
    if((document.getElementById("project_id_s").value) == "Project"){
        (document.getElementById("status_warranty_principal")).setAttribute("hidden","");
    }




});
$(document).ready(function()
{

     //definir el dia en proceso
     
     let dia_hoy_transform = new Date().toLocaleDateString('en-CA');
     dia_hoy = Date.parse(dia_hoy_transform);
     
     alert(dia_hoy);

function sleep (time) 
{
    return new Promise((resolve) => setTimeout(resolve, time));
}




 //mandar a llamar el valor de la esfera de colores
     var color_garantia = document.getElementById('status_warranty_color');


 //clases para las activaciones
     var clase_on = "spinner-grow text-success";
     var clase_warning = "spinner-grow text-warning";
     var clase_off = "spinner-grow text-danger";


    
     var btn_creacion_garantia = document.getElementById("boton_de_creacion_garantia");
     var control_tabla = String(document.getElementById('project_id_s').value);
     const control_tabla_transformada = (control_tabla).split(',');

     //alert(control_tabla[1]);


    id_del_proyecto = document.getElementById("project_id_s");



 



    //document.getElementById("project_id_s").selectedIndex = "Proyecto";
    id_del_proyecto.addEventListener('change', function()
    //$('#project_id_s').on('change', function()
    {


        document.getElementById("project_id").value = id_del_proyecto.value;
        

        if( (document.getElementById("project_id_s").value) != "Project" )
        {
            (document.getElementById("status_warranty_principal")).removeAttribute("hidden","");
            
        }




     
      
        //alert(control_tabla_transformada[0]+" "+control_tabla_transformada[1]);
        var btn_creacion_garantia = document.getElementById("boton_de_creacion_garantia");
        var control_tabla = String(document.getElementById('project_id_s').value);
        const control_tabla_transformada = (control_tabla).split(',');
      
        document.getElementById("project_id").setAttribute('value',control_tabla_transformada[0]);
        
        if(control_tabla_transformada[1] == undefined)
            {
                //alert("no tiene garantia hecha");
                
                (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-warning");
                document.getElementById("texto_status_garantía").innerHTML = "Sin definir";
                document.getElementById("texto_fecha_final_garantia").innerHTML = "Fecha sin definir";
                (document.getElementById("texto_status_garantía")).setAttribute("class","text-warning");
                color_garantia.setAttribute("class",clase_warning);
                color_garantia.setAttribute("title","Garantía no dada de alta");
                (document.getElementById("boton_de_creacion_garantia")).removeAttribute("hidden","");
                (document.getElementById("boton_de_creacion_garantia")).setAttribute("class","animate pop btn btn-warning");
            }
        else
            {
                (document.getElementById("boton_de_creacion_garantia")).setAttribute("class","animate fade btn btn-warning");
                sleep(290).then(() => 
                {
                    (document.getElementById("boton_de_creacion_garantia")).setAttribute("hidden","");
                });
                    
                    
                    
                    
                if(Date.parse(control_tabla_transformada[1]) > dia_hoy_transform)
                {
                   
                        (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-success");
                        document.getElementById("texto_status_garantía").innerHTML = "Activa";
                        document.getElementById("texto_fecha_final_garantia").innerHTML = control_tabla_transformada[1];
                        (document.getElementById("texto_status_garantía")).setAttribute("class","text-success");
                        color_garantia.setAttribute("class",clase_on);
                        color_garantia.setAttribute("title","Garantía activa");
                }
                else
                {
                    alert(dia_hoy+"  "+control_tabla_transformada[1]);
                        (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-danger");
                        document.getElementById("texto_fecha_final_garantia").innerHTML = control_tabla_transformada[1];
                        (document.getElementById("texto_status_garantía")).setAttribute("class","text-danger");
                        document.getElementById("texto_status_garantía").innerHTML = "Finalizada";
                        color_garantia.setAttribute("class",clase_off);
                        color_garantia.setAttribute("title","Garantía terminada");
                }
            }
        
        
        

    });

//coment
   
    if(document.getElementById("project_id").value =! undefined){
        
        document.getElementById("project_id").setAttribute('value',((localStorage.getItem("salida_ticket").split(','))[4]));
        //alert(((localStorage.getItem("salida_ticket").split(','))[4]));
        if(control_tabla_transformada[1] == undefined)
            {
                //alert("no tiene garantia hecha");
                (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-warning");
                document.getElementById("texto_status_garantía").innerHTML = "Sin definir";
                document.getElementById("texto_fecha_final_garantia").innerHTML = "Fecha sin definir";
                (document.getElementById("texto_status_garantía")).setAttribute("class","text-warning");
                color_garantia.setAttribute("class","spinner-grow text-warning");
                color_garantia.setAttribute("title","Garantía no dada de alta");
                (document.getElementById("boton_de_creacion_garantia")).removeAttribute("hidden","");
                (document.getElementById("boton_de_creacion_garantia")).setAttribute("class","animate pop btn btn-warning");
                
            }
        else
            {
                (document.getElementById("boton_de_creacion_garantia")).setAttribute("class","animate fade btn btn-warning");
                sleep(290).then(() => 
                {
                    (document.getElementById("boton_de_creacion_garantia")).setAttribute("hidden","");
                });
                    
                    
                    
                    
                if(Date.parse(control_tabla_transformada[1]) > dia_hoy)
                {
                        (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-success");
                        document.getElementById("texto_status_garantía").innerHTML = "Activa";
                        document.getElementById("texto_fecha_final_garantia").innerHTML = control_tabla_transformada[1];
                        (document.getElementById("texto_status_garantía")).setAttribute("class","text-success");
                        color_garantia.setAttribute("class",clase_on);
                        color_garantia.setAttribute("title","Garantía activa");
                }
                else
                {
                        (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-danger");
                        document.getElementById("texto_fecha_final_garantia").innerHTML = control_tabla_transformada[1];
                        (document.getElementById("texto_status_garantía")).setAttribute("class","text-danger");
                        document.getElementById("texto_status_garantía").innerHTML = "Finalizada";
                        color_garantia.setAttribute("class",clase_off);
                        color_garantia.setAttribute("title","Garantía terminada");
                }
            }
     }


});






