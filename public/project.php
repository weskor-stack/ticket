<?php
    $mysqli = new mysqli("localhost","root","ftpuser","tmp_info");
    $mysqli2 = new mysqli("localhost","root","ftpuser","project");
    $mysqli3 = new mysqli("localhost","root","ftpuser","customer");

    $resultado = $mysqli->query("SELECT * FROM tmp_project");

    $resultado->data_seek(0);

    $resultado2 = $mysqli->query("SELECT * FROM tmp_customer");

    $resultado2->data_seek(0);

    
    while ($fila = $resultado->fetch_assoc()) {
        $mysqli2->query("SET @user_id = 9999");
        $insert =$mysqli2->query("INSERT INTO project (project_id,`key`,`name`,project_type_id,project_status_id,project_priority_id,`user_id`)
        VALUES (NULL,'".$fila['key_project']."','".$fila['names']."','3','11','3','9999')");
    }

    while ($fila = $resultado2->fetch_assoc()) {
        $mysqli2->query("SET @user_id = 9999");
        $insert =$mysqli3->query("INSERT INTO customer (customer_id,`key`,`name`,`address`,email,phone,status_id,`user_id`)
        VALUES ('".$fila['customer_id']."','".$fila['key_customer']."','".$fila['names']."','-','-','-','1','9999')");
    }

    header("Location: http://192.168.3.8/tickets/");

     exit(); 
?>