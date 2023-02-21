<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tables Tmp</title>
</head>
<body>
    <?php
        set_time_limit(600);
        header("Access-Control-Allow-Origin: *");
    
        $con = mysqli_connect("localhost","root","ftpuser","tmp_info");
    
        // $con = mysqli_connect("localhost","root","","tmp_info");
        
        $con->query("TRUNCATE tmp_customer");
        $con->query("TRUNCATE tmp_employee");
        $con->query("TRUNCATE tmp_material");
        $con->query("TRUNCATE tmp_products");
        $con->query("TRUNCATE tmp_project");
        $con->query("TRUNCATE tmp_tools");

        $url_products="https://192.168.3.200/api/obtener_productos";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // Set the url
        curl_setopt($curl, CURLOPT_URL,$url_products);

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

                echo("Productos= ".count($data_products).'<br><br><br>');

                for ($i=0; $i < count($data_products); $i++) {
                    # code...
                    // echo($data_products[$i]['clave'].'<br>');
                    // echo( $i.' - '.$data_products[$i]['clave'].' '.str_replace(array('"', "'"), '', $data_products[$i]['nombre']).' '.$data_products[$i]['unidadmedida'].' '.$data_products[$i]['inventario'].' '.$data_products[$i]['clasearticulo'].' '.$data_products[$i]['linea'].' '.$data_products[$i]['sublinea'].' '.$data_products[$i]['costoPromedio'].'<br>');
                    $sql_products = "INSERT INTO tmp_products (key_product,names,unit_measure,inventary,kind_item,line,sub_line,coust) VALUES ('".$data_products[$i]['clave']."', '".str_replace(array('"', "'"), '', $data_products[$i]['nombre'])."', '".$data_products[$i]['unidadmedida']."', '".$data_products[$i]['inventario']."', '".$data_products[$i]['clasearticulo']."', '".$data_products[$i]['linea']."', '".$data_products[$i]['sublinea']."', '".$data_products[$i]['costoPromedio']."')";

                    $rs = mysqli_query($con, $sql_products);

                    if ($i == count($data_products)-1) {
                        # code...
                        echo("Se guardaron todos los registros de los productos <br><br><br>");
                    }
                }



            }
        
        curl_close($curl);

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        $project = file_get_contents("https://192.168.3.200/api/obtener_proyectos", false, stream_context_create($arrContextOptions));
        $customers = file_get_contents("https://192.168.3.200/api/obtener_clientes", false, stream_context_create($arrContextOptions));
        $employee = file_get_contents("https://192.168.3.200/api/obtener_empleado", false, stream_context_create($arrContextOptions));

        $data_employee = json_decode($employee);
        $data_customer = json_decode($customers);
        $data_project = json_decode($project);


        echo("Proyectos= ".count($data_project).'<br><br><br>');

        for ($i=0; $i < count($data_project); $i++) { 
            # code...
            // echo($i.' - '.$data_project[$i]->idProyecto.' '.$data_project[$i]->codigoProyecto.' '.$data_project[$i]->nombre.'<br>');
            $sql_project = "INSERT INTO tmp_project (project_id,key_project,names) VALUES ('".$data_project[$i]->idProyecto."', '".$data_project[$i]->codigoProyecto."', '".$data_project[$i]->nombre."')";

            $rs_project = mysqli_query($con, $sql_project);

            if ($i == count($data_project)-1) {
                # code...
                echo("Se guardaron todos los registros de los proyectos <br><br><br>");
            }
        }

        echo("Clientes= ".count($data_customer).'<br><br><br>');

        for ($i=0; $i < count($data_customer); $i++) { 
            # code...
            // echo($i.' - '.$data_customer[$i]->idcliente.' '.$data_customer[$i]->clave.' '.$data_customer[$i]->nombre.'<br>');
            $sql_customer = "INSERT INTO tmp_customer (customer_id,key_customer,names) VALUES ('".$data_customer[$i]->idcliente."', '".$data_customer[$i]->clave."', '".$data_customer[$i]->nombre."')";
    
            $rs_customer = mysqli_query($con, $sql_customer);

            if ($i == count($data_customer)-1) {
                # code...
                echo("Se guardaron todos los registros de los clientes <br><br><br>");
            }
        }


        echo("Empleados= ".count($data_employee).'<br><br><br>');

        for ($i=0; $i < count($data_employee); $i++) { 
            # code...
            // echo($i.' - '.$data_employee[$i]->idEmpleado.' '.$data_employee[$i]->nombre.' '.$data_employee[$i]->apellidoPaterno.'<br>');
                
            $sql_employee = "INSERT INTO tmp_employee (employee_id,names,last_name,second_last_name, puestoEmpleado,email,department,boss_ids,boss_name,boss_last_name,boss_second_last_name,puesto_jefe,boss_department,boss_email) VALUES ('".$data_employee[$i]->idEmpleado."', '".$data_employee[$i]->nombre."', '".$data_employee[$i]->apellidoPaterno."','".$data_employee[$i]->apellidoMaterno."','".$data_employee[$i]->puestoEmpleado."','".$data_employee[$i]->correoEmpleado."','".$data_employee[$i]->departamentoEmpleado."','".str_replace(array("No asignado"), 0, $data_employee[$i]->idJefe)."','".$data_employee[$i]->nombreJefe."','".$data_employee[$i]->apellidoPaternoJefe."','".$data_employee[$i]->apellidoMaternoJefe."','".$data_employee[$i]->puestoJefe."','".$data_employee[$i]->departementoJefe."','".$data_employee[$i]->correoJefe."')";
    
            $rs_employee = mysqli_query($con, $sql_employee);

            if ($i == count($data_employee)-1) {
                # code...
                echo("Se guardaron todos los registros de los empleados <br><br><br>");
            }
        }

        header("Location: http://192.168.3.8/tmp_materials.php");

        exit(); 
    ?>
</body>
</html>