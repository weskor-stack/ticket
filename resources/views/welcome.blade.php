<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Automatyco</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ asset('css/site.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/menu2.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <style>

        /* The Modal (background) */
        .modal-update {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;

        font-family: Arial, Helvetica, sans-serif;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }

        progress {
          border-radius: 7px; 
          width: 80%;
          height: 22px;
          margin-left: 0%;
          box-shadow: 1px 1px 4px rgba( 0, 0, 0, 0.2 );
        }
        progress::-webkit-progress-bar {
          background-color: yellow;
          border-radius: 7px;
        }
        progress::-webkit-progress-value {
          background-color: blue;
          border-radius: 7px;
          box-shadow: 1px 1px 5px 3px rgba( 255, 0, 0, 0.8 );
        }
        progress::-moz-progress-bar {
          /* style rules */
        }

        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #3498db;
          width: 80px;
          height: 80px;
          -webkit-animation: spin 2s linear infinite; /* Safari */
          animation: spin 2s linear infinite;
          margin: 0 auto;
        }

        /* Safari */
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
    </style>

</head>
<body>
    <input type="checkbox" id="active">
    <label for="active" class="menu-btn"><span></span></label>
    <label for="active" class="close"></label>
    <div class="wrapper">
      <ul>
        <li><a href="{{ route('tickets.index') }}">Ticket</a></li>
        <!-- <li><a href="#">Order</a></li>
        <li><a href="#">Report</a></li> -->
        <li><a href="{{ route('employees.index') }}">Employee</a></li>
        <li><a href="{{ route('Warranty.index') }}">Warranty</a></li>
        <li><a href="#" onclick="myFunction()">Actualizar Base de Datos</a></li>
      </ul>
    </div>
    <div class="content">
        <div class="title">
            <img src="{{ asset('images/logoAutomatyco3.png') }}">
        </div>
    </div>  

    <script>
        function myFunction() {
          // alert("hola");
          var modal = document.getElementById('myModal2');
          modal.style.display = 'block'; 
          window.location.href = 'http://localhost/ticket/public/productos.php';
        }
        
    </script>
    <!-- The Modal -->
    <div id="myModal" class="modal-update">

      <!-- Modal content -->
      <div class="modal-content" style="text-align:center;"> 
          <span class="close" hidden>&times;</span>
          <h1>Actualizando base de datos:</h1> <br>
          <h2>Esta actualización puede tardar varios minutos.</h2>
          <h3 style="color:red;">¡¡¡Favor de no cerrar el navegador!!!</h3>
          <span id="countdown" SIZE=24></span> <br><br>
          <progress id="file" max="147"> 100% </progress>
          <img src="{{ asset('images/logoAutomatyco3.png') }}" style="width: 350px; height: 150px;">

          <script type="text/javascript">
            // setTimeout( function() { window.location.href = "http://localhost/ticket/public/tables_tmp.php"; }, 1000 );
          </script>
      </div>

    </div>

    <!-- The Modal -->
    <div id="myModal2" class="modal-update">

      <!-- Modal content -->
      <div class="modal-content" style="text-align:center;"> 
          <span class="close" hidden>&times;</span>
          <h1>Buscando actualizaciones en la base de datos</h1> <br>
          <h2>Esta actualización puede tardar varios minutos.</h2>
          <h3 style="color:red;">¡¡¡Favor de no cerrar el navegador!!!</h3> <br><br>

          <div class="loader"></div>
          
          <div id="datos2"></div>
          
          <img src="{{ asset('images/logoAutomatyco3.png') }}" style="width: 350px; height: 150px;">
      </div>

    </div>

    <script>
        function funcion_datos(){
          console.log('<?php echo datosTablas(); ?>');
          setTimeout( function() { window.location.href = 'http://localhost/ticket/public/tables_tmp.php'; }, 1000 );
        }
    </script>
    
    <?php
      $mysqli = new mysqli("localhost","root","","ticket");
      $resultado = $mysqli->query("SELECT * FROM material");
      $resultado->data_seek(0);

      $mysqli2 = new mysqli("localhost","root","","tmp_info");
      $resultado2 = $mysqli2->query("SELECT * FROM tmp_material");
      $resultado2->data_seek(0);

      $fila = $resultado->fetch_assoc();

      if (empty($fila)) {
        # code...
        // echo("<script>alert('tabla vacia');</script>");
        echo("<script>
              // Get the modal
              var modal = document.getElementById('myModal');

              // Get the button that opens the modal
              // var btn = document.getElementById('myBtn');

              // Get the <span> element that closes the modal
              var span = document.getElementsByClassName('close')[0];

              // When the user clicks the button, open the modal 
              // btn.onclick = function() {
              //     modal.style.display = 'block';
              // }

              // When the user clicks on <span> (x), close the modal
              span.onclick = function() {
                  modal.style.display = 'none';
              }

              // When the user clicks anywhere outside of the modal, close it
              // window.onclick = function(event) {
              //     if (event.target == modal) {
              //         modal.style.display = 'none';
              //     }                                                                                               
              // }

              setTimeout(function(){
                  //alert('Hola Mundo');
                  modal.style.display = 'block';
              }, 0);

              window.onload = updateClock;

              var totalTime = 147;
              var tiempo = 0;

              function updateClock() {
                  document.getElementById('countdown').innerHTML = totalTime+' segundos';
                  document.getElementById('file').value = tiempo;
                  if(totalTime==0){
                      console.log('Final');
                      modal.style.display = 'none';
                      // (document.getElementsByClassName('close').removeAttribute('hidden',''));
                  }else{
                      totalTime-=1;
                      tiempo+=1;
                      setTimeout('updateClock()',1000);
                  }
              }

              setTimeout( function() { window.location.href = 'http://localhost/ticket/public/tables_tmp.php'; }, 1000 );
          </script>");
       
      }
      else{
        /*echo("<script>
                  // Get the modal
                  var modal = document.getElementById('myModal2');
                  setTimeout(function(){
                    // alert('Hola Mundo');
                    modal.style.display = 'block';
                    
                    console.log('<?php echo datosTablas(); ?>');
                    setTimeout( function() { window.location.href = 'http://localhost/ticket/public/productos.php'; }, 1000 );
                    
                  }, 5000);

                  setTimeout(function(){
                    // alert('Hola Mundo');
                    modal.style.display = 'none';
                }, 147000);
              </script>");*/

    // $con = mysqli_connect("localhost","root","","tmp_info");

    
        // while ($fila = $resultado->fetch_assoc()) {
        //   // UPDATE `material` SET `name` = 'FIJACION PARA SENSORe' WHERE `material`.`material_id` = 2
        //   while ($fila2 = $resultado2->fetch_assoc()) {
        //     // UPDATE `material` SET `name` = 'FIJACION PARA SENSORe' WHERE `material`.`material_id` = 2
        //     // UPDATE material SET stock = $fila2['key'] WHERE material_id = $fila['material_id']
        //     if($fila2['key'] == $fila['key']){
        //       $update =$mysqli->query("UPDATE material SET stock = '".$fila2['key']."' WHERE material_id = '".$fila['material_id']."'");
        //     }else{
        //       echo("<script>alert('tno hay material con esa información');</script>");
        //     }
        //   }
        // }
      }
      function datosTablas(){
        $mysqli2 = new mysqli("localhost","root","","tmp_info");
        $tmp_tools = $mysqli2->query("SELECT * FROM tmp_products WHERE `kind_item` = 'HERRAMIENTAS'");
        $tmp_tools->data_seek(0);

        $tmp_materials = $mysqli2->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES'");
        $tmp_materials->data_seek(0);

        $index =0;
        while ($fila = $tmp_materials->fetch_assoc()) {
            echo $index."  -  "."key_product = " . $fila['key_product'] ." "."name = " . $fila['names'].
            " "."unit_measure = " . $fila['unit_measure']." "."inventary = " . $fila['inventary'].
            " "."kind_item = " . $fila['kind_item']." "."line = " . $fila['line']." "."sub_line = " . $fila['sub_line'].
            " "."coust = " . $fila['coust']."<br>";

            $index++;
        }
        
      }
    
      // header("Location: http://localhost/ticket/public/productos.php");

      // exit();
    ?>
</body>
</html>