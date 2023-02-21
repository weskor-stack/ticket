<?php

    set_time_limit(600);
    header("Access-Control-Allow-Origin: *");

    $con = mysqli_connect("localhost","root","ftpuser","tmp_info");

    // $con = mysqli_connect("localhost","root","","tmp_info");

    $con->query("TRUNCATE tmp_products");
    
    $url="https://192.168.3.200/api/obtener_productos";
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // Set the url
    curl_setopt($curl, CURLOPT_URL,$url);

    // Will return the response, if false it print the response
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    // Execute
    $response =curl_exec($curl);

    if($e = curl_error($curl)) {
        echo ($e);
        } else {
            // Decoding JSON data
            $data_products = json_decode($response, true);
            
            // echo(gettype($data_products).'<br>');

            // echo(count($data_products).'<br><br><br>');

            for ($i=0; $i < count($data_products); $i++) {
                # code...
                // echo($data_products[$i]['clave'].'<br>');
                // echo( $i.' - '.$data_products[$i]['clave'].' '.str_replace(array('"', "'"), '', $data_products[$i]['nombre']).' '.$data_products[$i]['unidadmedida'].' '.$data_products[$i]['inventario'].' '.$data_products[$i]['clasearticulo'].' '.$data_products[$i]['linea'].' '.$data_products[$i]['sublinea'].' '.$data_products[$i]['costoPromedio'].'<br>');
                $sql = "INSERT INTO tmp_products (key_product,names,unit_measure,inventary,kind_item,line,sub_line,coust) VALUES ('".$data_products[$i]['clave']."', '".trim(str_replace(array('"', "'"), '', $data_products[$i]['nombre']))."', '".$data_products[$i]['unidadmedida']."', '".$data_products[$i]['inventario']."', '".$data_products[$i]['clasearticulo']."', '".$data_products[$i]['linea']."', '".$data_products[$i]['sublinea']."', '".$data_products[$i]['costoPromedio']."')";

                $rs = mysqli_query($con, $sql);
            }



        }
    
    curl_close($curl);
    

    echo("<script>
        // alert('Se subieron los archivos');
        // setTimeout( function() { window.location.href = 'http://192.168.3.8/tmp_materials_update.php'; }, 0000 );
        setTimeout( function() { ".header('Location: http://192.168.3.8/tmp_materials_update.php')."; ".exit().";}, 0000 );
    </script>");

    // header("Location: http://localhost/ticket/public/tickets/");

    // exit();    
?>
