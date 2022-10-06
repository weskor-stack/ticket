<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link rel="stylesheet" href="{{asset('/css/Css_hover.css')}}" type="text/css" >

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


</head>
<body>



<div  id="contenedor_principal"  class="hola" style="margin-left:0%;" onmouseleave="togeleador()" onmouseover="opacidad()">



        <div  class="btn-group-vertical hola"style="position:fixed; height:100%;">
        
        <img  class="opacidad_inicio" id="logo_a" src="{{ asset('images/logoAutomatyco3.png') }}" style="width:100%; height:60px; margin-top:-100%;" alt="">
        
        
        <a style="bottom:1%; position:absolute; margin-left:0%;" class="btn btn-primary">Regreso <span class="fas fa-user"></span></a>
        <div style="margin-top:80%;" class="panel-group" id="accordion">
          
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" id="boton" onmouseover="prueba_boton()" onmouseout="prueba2_boton()" href="" class="btn btn-primary " style="width:100%;" type="button"> <span style="text-align:left;" >LOCACIONES</span>   <span style="margin-left:12%; position:absolute" class="fas fa-cloud"> </span></a><br>
           <div class="panel panel-default" style="background: rgba(0, 0, 0,0);">
            <div id="collapse1" class="panel-collapse collapse">
                   
                    <button class="btn btn-outline-info" style="margin-top:1%;margin-left:20px; width:90%;">AVIACION</button> <br>
                    <button class="btn btn-outline-info" style="margin-top:5%;margin-left:20px; width:90%;">TOLUCA</button> <br>
                    <button class="btn btn-outline-info" style="margin-top:5%;margin-left:20px; width:90%;">TLAJOMULCO</button> <br>
            </div>
            </div>


            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="boton2" onmouseover="prueba_boton2()" onmouseout="prueba2_boton2()" href="" class="btn btn-primary " style="width:100%;" type="button"><span style="margin-rigth:30%; ">OTRAS COSAS</span>     <span style="margin-left:12%; position:absolute" class="fas fa-file"> </span> </a><br>
            <div class="panel panel-default" style="background: rgba(0, 0, 0,0);">
                <div id="collapse2" class="panel-collapse collapse">
                    <button class="btn btn-outline-info" style="margin-top:1%;margin-left:20px; width:90%;">PANTALLA DE PROYECTOS</button> <br>
                    <button class="btn btn-outline-info" style="margin-top:5%;margin-left:20px; width:90%;">PANTALLA DE CLIENTES</button> <br>
                    
                </div>
            </div>
            
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" id="boton3" onmouseover="prueba_boton3()" onmouseout="prueba2_boton3()" href="" class="btn btn-primary " style="width:100%;" type="button"> <span >SOCIALES</span> <span style="margin-left:18%; position:absolute" class="fas fa-coffee"> </span> </a><br>
            <div class="panel panel-default" style="background: rgba(0, 0, 0, 0);">
                <div id="collapse3" class="panel-collapse collapse" >
                    <button class="btn btn-outline-info" style="margin-top:1%; margin-left:20px; width:90%;">pantalla de tickets</button> <br>
                    <button class="btn btn-outline-info" style="margin-top:5%; margin-left:20px; width:90%;">pantalla de personal</button> <br>
                    <button class="btn btn-outline-info" style="margin-top:5%; margin-left:20px; width:90%;">pantalla de otros</button> <br>
                    <button class="btn btn-outline-info" style="margin-top:5%; margin-left:20px; width:90%;">pantalla de cumpleaños</button> <br>
                    <button class="btn btn-outline-info" style="margin-top:5%; margin-left:20px; width:90%;">pantalla de supervisores</button> <br>
                </div>
            </div>
            

            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" id="boton4" onmouseover="prueba_boton4()" onmouseout="prueba2_boton4()" href="" class="btn btn-primary " style="width:100%;" type="button"> <span >ENTREGAS</span>    <span style="margin-left:18%; position:absolute" class="fas fa-car"> </span></a><br>
            <div class="panel panel-default" style="background: rgba(0, 0, 0,0);">
                <div id="collapse4" class="panel-collapse collapse">
                    <button class="btn btn-outline-info" style="margin-top:1%;margin-left:20px; width:90%;">PANTALLA DE TIEMPOS</button> <br>
                </div>
            </div>
            
               
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" id="boton5" onmouseover="prueba_boton5()" onmouseout="prueba2_boton5()" href="" class="btn btn-primary "  style="width:100%;"type="button"><span >VENTAS</span>  <span style="margin-left:24%; position:absolute" class="fas fa-thumbs-up"> </span> </a><br>
            <div class="panel panel-default" style="background: rgba(0, 0, 0,0);">
                <div id="collapse5" class="panel-collapse collapse">
                    <button class="btn btn-outline-info" style="margin-top:1%;margin-left:20px; width:90%;">SE VENDE MUCHO</button> <br>
                </div>
            </div>
            <p style="     width: 200px; 
  
    opacity:1;"></p>
            </div>
            
        </div>

</div>





<script> 


//    function prueba(){
    
//     contenedor_princ = document.getElementById("contenedor_principal");
//     contenedor_princ.setAttribute('class','container prueba');

//     document.getElementById("caca").setAttribute('style','background:purple;');
  
   
//     }




//    function prueba2(){
    
    

// contenedor_princ = document.getElementById("contenedor_principal");
// contenedor_princ.setAttribute('class','container prueba2');


// document.getElementById("caca").setAttribute('style','background:cyan;');

// setTimeout(() => { }, 500);

// }











function prueba_boton(){
    contenedor_princ = document.getElementById("boton");
    contenedor_princ.setAttribute('class','btn btn-primary prueba_boton');
}
function prueba2_boton(){
    contenedor_princ = document.getElementById("boton");
    contenedor_princ.setAttribute('class','btn btn-primary prueba2_boton');
}



function prueba_boton2(){
    contenedor_princ = document.getElementById("boton2");
    contenedor_princ.setAttribute('class','btn btn-primary prueba_boton');
}
function prueba2_boton2(){
    contenedor_princ = document.getElementById("boton2");
    contenedor_princ.setAttribute('class','btn btn-primary prueba2_boton');
}


function prueba_boton3(){
    contenedor_princ = document.getElementById("boton3");
    contenedor_princ.setAttribute('class','btn btn-primary prueba_boton');
}
function prueba2_boton3(){
    contenedor_princ = document.getElementById("boton3");
    contenedor_princ.setAttribute('class','btn btn-primary prueba2_boton');
}



function prueba_boton4(){
    contenedor_princ = document.getElementById("boton4");
    contenedor_princ.setAttribute('class','btn btn-primary prueba_boton');
}
function prueba2_boton4(){
    contenedor_princ = document.getElementById("boton4");
    contenedor_princ.setAttribute('class','btn btn-primary prueba2_boton');
}


function prueba_boton5(){
    contenedor_princ = document.getElementById("boton5");
    contenedor_princ.setAttribute('class','btn btn-primary prueba_boton');
}
function prueba2_boton5(){
    contenedor_princ = document.getElementById("boton5");
    contenedor_princ.setAttribute('class','btn btn-primary prueba2_boton');
}

function togeleador(){
    
    $('.collapse').collapse("hide");
    img_opacity_control = document.getElementById("logo_a");
    img_opacity_control.setAttribute('class','opacidad_salida');

}
function opacidad(){
    img_opacity_control = document.getElementById("logo_a");
    img_opacity_control.setAttribute('class','opacidad_entrada');
}



</script>


</body>
</html>