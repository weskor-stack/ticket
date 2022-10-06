<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
   

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  
  
  
  
  
  <!--tomar tiempo fecha inicio-->






    <title>create</title>
</head>
<body>
    <form action="{{ url('/inicio') }}" method="post">
        @csrf
        <label for="proyecto">Nombre_proyecto</label>
        <br>
        <select name="proyecto" id="proyecto" class="custom-select mb-3" style="width:30%;">
            <option selected>Nombre_Proyecto</option>
            <!--poner un for each de cada proyecto-->
            <!--       <option value="@valor_de_la_key">@nombre_proyecto</option>       -->



            @foreach($tickets as $consultas_PR)
           <option value="{{$consultas_PR->proyecto}}">{{$consultas_PR->proyecto}}</option>
           
           @endforeach



        </select>
        
        <input name="fecha_inicio" placeholder="Fecha_Inicio" type="text" id="datepicker">
        <input name="fecha_final" placeholder="Fecha_Final" type="text" id="datepicker2">

    <input type="submit", value="Guardar"> 


    <input id="datepicker" type="text" name="fname"> 
          <script>

$(document).ready(function(){
    $( "#datepicker" ).datepicker();
});
            </script>





    </form>

</body>
</html>




