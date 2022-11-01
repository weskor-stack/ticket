$(document).ready(function(){
    let dia_hoy_transform = new Date().toLocaleDateString('en-CA');
    document.getElementById("texto_fecha_hoy_garantia").innerHTML = dia_hoy_transform;
        if((document.getElementById("project_id_s").value) == "Project")
        {
            (document.getElementById("status_warranty_principal")).setAttribute("hidden","");
        }
});



$(document).ready(function()
{
//función para dar tiempo///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function sleep (time) 
        {
            return new Promise((resolve) => setTimeout(resolve, time));
        }

//se define el día
    let dia_hoy_transform = new Date().toLocaleDateString('en-CA');
    dia_hoy = Date.parse(dia_hoy_transform);

//revisar el valor de la esfera de colores//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var color_garantia = document.getElementById('status_warranty_color');

//variables de las clases///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
    var clase_on = "spinner-grow text-success";
    var clase_warning = "spinner-grow text-warning";
    var clase_off = "spinner-grow text-danger";

//descomposición de tabla y transformada a matriz////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var btn_creacion_garantia = document.getElementById("boton_de_creacion_garantia");
    var control_tabla = String(document.getElementById('project_id_s').value);
    const control_tabla_transformada = (control_tabla).split(',');

//asignación de valor a la variable con respecto a lo que hay en el select///////////////////////////////////////////////////////////////////////////////////////////
    id_del_proyecto = document.getElementById("project_id_s");

    
//document.getElementById("project_id_s").selectedIndex = "Proyecto"; esta línea se activa si se quiere setear a proyecto el slect//////////////////////////////////
//se inicia la condición de detección del select, cuando cambie/////////////////////////////////////////////////////////////////////////////////////////////////////
    id_del_proyecto.addEventListener('change', function()
    {
        document.getElementById("project_id").value = id_del_proyecto.value;
// si el select de proyecto tiene valir distinto al defoult se muestra, si no se oculta/////////////////////////////////////////////////////////////////////////////
        if( (document.getElementById("project_id_s").value) != "Project" )
        {
            (document.getElementById("status_warranty_principal")).removeAttribute("hidden","");
            
        }
        var btn_creacion_garantia = document.getElementById("boton_de_creacion_garantia");
        var control_tabla = String(document.getElementById('project_id_s').value);
        const control_tabla_transformada = (control_tabla).split(',');
        document.getElementById("project_id").setAttribute('value',control_tabla_transformada[0]);

//al seleccionar se actualiza el valor de los indicadores de garantía////////////////////////////////////////////////////////////////////////////////////////////////
        if(control_tabla_transformada[1] == undefined)
        {
//al no tener valores se pone en amarillo y muestra la advertencia///////////////////////////////////////////////////////////////////////////////////////////////////
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
//se oculta el botón si tiene fecha para que no puedan crear garantía////////////////////////////////////////////////////////////////////////////////////////////////
            (document.getElementById("boton_de_creacion_garantia")).setAttribute("class","animate fade btn btn-warning");
            sleep(290).then(() => 
            {
                (document.getElementById("boton_de_creacion_garantia")).setAttribute("hidden","");
            });
            if(Date.parse((control_tabla_transformada[1]).trim()) > dia_hoy)
            {
//al tener datos y que sean mayores a la fecha de el dia en curso se pone en verde e indica que si tiene garantía////////////////////////////////////////////////////                
                (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-success");
                document.getElementById("texto_status_garantía").innerHTML = "Activa";
                document.getElementById("texto_fecha_final_garantia").innerHTML = control_tabla_transformada[1];
                (document.getElementById("texto_status_garantía")).setAttribute("class","text-success");
                color_garantia.setAttribute("class",clase_on);
                color_garantia.setAttribute("title","Garantía activa");
            }
            else
            {
//al tener datos que sean menores al día en curso se manda a un color rojo e indica que no tiene garantía/////////////////////////////////////////////////////////////
                //alert(dia_hoy+"  "+Date.parse((control_tabla_transformada[1]).trim()));
                (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-danger");
                document.getElementById("texto_fecha_final_garantia").innerHTML = control_tabla_transformada[1];
                (document.getElementById("texto_status_garantía")).setAttribute("class","text-danger");
                document.getElementById("texto_status_garantía").innerHTML = "Finalizada";
                color_garantia.setAttribute("class",clase_off);
                color_garantia.setAttribute("title","Garantía terminada");
            }        
        }
    });
//al cargar la página de tener datos hace lo mismo que la parte de seleccionar datos//////////////////////////////////////////////////////////////////////////////////    
    id_de_proyecto_input = document.getElementById("project_id").value ;
    if(control_tabla_transformada[1] == undefined)
        {
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
            if(Date.parse((control_tabla_transformada[1]).trim()) > dia_hoy)
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
                //alert(dia_hoy+"  "+Date.parse((control_tabla_transformada[1]).trim()));
                (document.getElementById("texto_fecha_final_garantia")).setAttribute("class","text-danger");
                document.getElementById("texto_fecha_final_garantia").innerHTML = control_tabla_transformada[1];
                (document.getElementById("texto_status_garantía")).setAttribute("class","text-danger");
                document.getElementById("texto_status_garantía").innerHTML = "Finalizada";
                color_garantia.setAttribute("class",clase_off);
                color_garantia.setAttribute("title","Garantía terminada");
            }
        }       
    //alert("funciona al cargar");
});

