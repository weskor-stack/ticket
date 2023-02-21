<?php

    $mysqli = new mysqli("localhost","root","ftpuser","tmp_info");

    $truncate = $mysqli->query("TRUNCATE tmp_material");

    $resultado = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='CONEXIONES'");

    $resultado->data_seek(0);

    $index = 0;

    while ($fila = $resultado->fetch_assoc()) {
        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','15','".$fila['coust']."')");

        $index ++;
    }

    $equipo_especial = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='EQUIPO ESPECIAL'  AND `unit_measure`='Pieza'");

        $equipo_especial->data_seek(0);

        $equipo_especial_kit = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='EQUIPO ESPECIAL'  AND `unit_measure`='Kit'");

        $equipo_especial_kit->data_seek(0);

        $cilindros = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='CILINDROS'  AND `unit_measure`='Pieza'");

        $cilindros->data_seek(0);

        $valvulas = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='VALVULAS'  AND `unit_measure`='Pieza'");

        $valvulas->data_seek(0);

        $mangueras_pieza = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='MANGUERAS'  AND `unit_measure`='Pieza'");

        $mangueras_pieza->data_seek(0);

        $mangueras_metro = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='MANGUERAS'  AND `unit_measure`='Metro'");

        $mangueras_metro->data_seek(0);

        $mecanica = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='MECANICA'  AND `unit_measure`='Pieza'");

        $mecanica->data_seek(0);

        $neumatico_unidades_medida = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='UNIDADES DE MANTENIMIENTO'  AND `unit_measure`='Pieza'");

        $neumatico_unidades_medida->data_seek(0);

        $neumatico_fijaciones = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='FIJACIONES'  AND `unit_measure`='Pieza'");

        $neumatico_fijaciones->data_seek(0);

        $neumatico_componentes = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'NEUMATICO' AND `sub_line`='COMPONENTES'  AND `unit_measure`='Pieza'");

        $neumatico_componentes->data_seek(0);

        ////////////////////////////////////////////////////////////////////////////////////////////NEUMATICO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        while ($fila = $equipo_especial->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','22','".$fila['coust']."')");

            $index ++;
        }

        // $index = 1;

        while ($fila = $equipo_especial_kit->fetch_assoc()) {
           $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','5','17','22','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $cilindros->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','9','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $valvulas->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','57','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $mangueras_pieza->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','33','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $mangueras_metro->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','17','33','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $mecanica->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','38','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $neumatico_unidades_medida->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','55','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $neumatico_fijaciones->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','27','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $neumatico_componentes->fetch_assoc()) {
            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','17','13','".$fila['coust']."')");

            $index ++;
        }
        ////////////////////////////////////////////////////////////////////////////////////////////NEUMATICO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////        
        ////////////////////////////////////////////////////////////////////////////////////////////ELECTRONICO / ELECTRICO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $ee_accesorios = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='(BORRAR) ACCESORIOS'");

        $ee_accesorios->data_seek(0);

        $ee_electrica = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='(BORRAR) ELECTRICA'");

        $ee_electrica->data_seek(0);

        $ee_arrancadores = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='ARRANCADORES'");

        $ee_arrancadores->data_seek(0);

        $ee_baterias_cargadores = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='BATERIAS Y CARGADORES'");

        $ee_baterias_cargadores->data_seek(0);

        $ee_botones = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='BOTONES, INTERRUPTORES Y SEÑALIZACION'");

        $ee_botones->data_seek(0);

        $ee_cable_estandar_pieza = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='CABLES ESTANDAR' AND `unit_measure`='Pieza'");

        $ee_cable_estandar_pieza->data_seek(0);

        $ee_cable_estandar_metro = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='CABLES ESTANDAR' AND `unit_measure`='Metro'");

        $ee_cable_estandar_metro->data_seek(0);

        $ee_canaletas = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='CANALETAS'");

        $ee_canaletas->data_seek(0);

        $ee_clemas = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='CLEMAS'");

        $ee_clemas->data_seek(0);
        
        $ee_componentes_pieza = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='COMPONENTES' AND `unit_measure`='Pieza'");

        $ee_componentes_pieza->data_seek(0);

        $ee_componentes_metro = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='COMPONENTES' AND `unit_measure`='Metro'");

        $ee_componentes_metro->data_seek(0);

        $ee_comunicaciones = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='COMUNICACIONES'");

        $ee_comunicaciones->data_seek(0);

        $ee_control_movimiento = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='CONTROL DE MOVIMIENTO'");

        $ee_control_movimiento->data_seek(0);

        $ee_control_vpte = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='CONTROL DE VELOCIDAD, PESAJE, TEMPERATURA Y ENFRIAMIENTO'");

        $ee_control_vpte->data_seek(0);

        $ee_desconectadores = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='DESCONECTADORES'");

        $ee_desconectadores->data_seek(0);

        $ee_computo = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='EQUIPO DE COMPUTO'");

        $ee_computo->data_seek(0);

        $ee_equipo_especial = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='EQUIPO ESPECIAL'");

        $ee_equipo_especial->data_seek(0);

        $ee_plc = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='PLC'");

        $ee_plc->data_seek(0);

        $ee_relevadores = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='RELEVADORES'");

        $ee_relevadores->data_seek(0);

        $ee_robots = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='ROBOTS'");

        $ee_robots->data_seek(0);

        $ee_sensores = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='SENSORES'");

        $ee_sensores->data_seek(0);

        $ee_transformador = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='TRANSFORMADOR'");

        $ee_transformador->data_seek(0);

        $ee_variadores = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'MATERIALES' AND `line`= 'ELECTRONICO / ELECTRICO' AND `sub_line`='VARIADORES DE FRECUENCIA'");

        $ee_variadores->data_seek(0);


        while ($fila = $ee_accesorios->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','1','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $ee_electrica->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','2','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_arrancadores->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','4','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_baterias_cargadores->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','5','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_botones->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','6','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $ee_cable_estandar_pieza->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','7','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $ee_cable_estandar_metro->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','7','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_canaletas->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','8','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $ee_clemas->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','10','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $ee_componentes_pieza->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','13','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $ee_componentes_metro->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','13','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_comunicaciones->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','14','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $ee_control_movimiento->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','17','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_control_vpte->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','18','".$fila['coust']."')");

            $index ++;
        }

        while ($fila = $ee_desconectadores->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','20','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_computo->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','21','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_equipo_especial->fetch_assoc()) {

            if($fila['unit_measure']=='Juego'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','3','5','22','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','5','22','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Pieza'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','22','".$fila['coust']."')");
                    }
                }
            }
            $index ++;
        }

        while ($fila = $ee_plc->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','44','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_relevadores->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','45','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_robots->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','46','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_sensores->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','49','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_transformador->fetch_assoc()) {

            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','53','".$fila['coust']."')");

            $index ++;
        }
        
        while ($fila = $ee_variadores->fetch_assoc()) {
            if($fila['unit_measure']=='Kilogramo'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','5','58','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Pieza'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','5','58','".$fila['coust']."')");
                }
            }
            $index ++;
        }

        ////////////////////////////////////////////////////////////////////////////////////////////ELECTRONICO / ELECTRICO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////HIDRAULICO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $h_hidraulico = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'HIDRAULICO'");

        $h_hidraulico->data_seek(0);

        while ($fila = $h_hidraulico->fetch_assoc()) {
            // $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            // VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','15','".$fila['coust']."')");

            if($fila['sub_line']=='CONEXIONES'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','15','".$fila['coust']."')");
            }else{
                if($fila['sub_line']=='EQUIPO ESPECIAL'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','22','".$fila['coust']."')");
                }else{
                    if($fila['sub_line']=='MANGUERAS'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','33','".$fila['coust']."')");
                    }else{
                        if($fila['sub_line']=='UNIDADES HIDRAULICAS'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','56','".$fila['coust']."')");
                        }else{
                            if($fila['sub_line']=='VALVULAS'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','57','".$fila['coust']."')");
                            }
                        }
                    }
                }
            }
            $index ++;
        }

        ////////////////////////////////////////////////////////////////////////////////////////////HIDRAULICO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////MECANICO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $m_mecanico = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'ESTRUCTURALES'");

        $m_mecanico->data_seek(0);

        $m_fijaciones = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'FIJACIONES'");

        $m_fijaciones->data_seek(0);

        $m_manuales = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'MANUALES'");

        $m_manuales->data_seek(0);

        $m_metales = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'METALES'");

        $m_metales->data_seek(0);

        $m_perfileria = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'PERFILERIA'");

        $m_perfileria->data_seek(0);

        $m_pinturas = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'PINTURA Y SOLVENTES'");

        $m_pinturas->data_seek(0);

        $m_plasticos = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'PLASTICOS'");

        $m_plasticos->data_seek(0);

        $m_rodamientos = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'RODAMIENTOS'");

        $m_rodamientos->data_seek(0);

        $m_tratamientos = $mysqli->query("SELECT * FROM `tmp_products` WHERE `kind_item` = 'MATERIALES' AND `line`= 'MECANICO' AND `sub_line`= 'TRATAMIENTOS'");

        $m_tratamientos->data_seek(0);



        while ($fila = $m_mecanico->fetch_assoc()) {
            // $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            // VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','15','".$fila['coust']."')");

            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','25','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','25','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','25','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','25','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','25','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','25','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }

        while ($fila = $m_fijaciones->fetch_assoc()) {
            // $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            // VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','15','".$fila['coust']."')");

            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','27','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','27','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','27','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','27','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','27','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','27','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }
        
        while ($fila = $m_manuales->fetch_assoc()) {
            // $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            // VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','15','".$fila['coust']."')");

            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','35','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','35','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','35','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','35','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','35','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','35','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }

        while ($fila = $m_metales->fetch_assoc()) {
            // $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            // VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','15','".$fila['coust']."')");

            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','40','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','40','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','40','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','40','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','40','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','40','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }
        
        while ($fila = $m_perfileria->fetch_assoc()) {
            // $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            // VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','15','".$fila['coust']."')");

            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','41','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','41','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','41','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','41','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','41','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','41','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }
        
        while ($fila = $m_pinturas->fetch_assoc()) {
            // $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
            // VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','11','15','".$fila['coust']."')");

            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','42','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','42','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','42','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','42','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','42','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','42','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }
        
        while ($fila = $m_plasticos->fetch_assoc()) {
            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','43','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','43','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','43','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','43','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','43','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','43','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }
        
        while ($fila = $m_rodamientos->fetch_assoc()) {
            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','47','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','47','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','47','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','47','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','47','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','47','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }
        
        while ($fila = $m_tratamientos->fetch_assoc()) {
            if($fila['unit_measure']=='Centimetro'){
                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','1','14','54','".$fila['coust']."')");
            }else{
                if($fila['unit_measure']=='Kilogramo'){
                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','4','14','54','".$fila['coust']."')");
                }else{
                    if($fila['unit_measure']=='Litro'){
                        $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','6','14','54','".$fila['coust']."')");
                    }else{
                        if($fila['unit_measure']=='Metro'){
                            $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','7','14','54','".$fila['coust']."')");
                        }else{
                            if($fila['unit_measure']=='Par'){
                                $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','9','14','54','".$fila['coust']."')");
                            }else{
                                if($fila['unit_measure']=='Pieza'){
                                    $insert =$mysqli->query("INSERT INTO tmp_material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,`line`,sub_line,material_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','4','10','14','54','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }
            }
            $index ++;
        }

        ////////////////////////////////////////////////////////////////////////////////////////////MECANICO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        echo($index);

        // $truncate2 = $mysqli->query("TRUNCATE material");

        $mysqli2 = new mysqli("localhost","root","ftpuser","ticket");

        // $truncate2 = $mysqli2->query("TRUNCATE material");

        $resultado2 = $mysqli->query("SELECT * FROM tmp_material");

        $resultado2->data_seek(0);

        while ($fila = $resultado2->fetch_assoc()) {
            $mysqli2->query("SET @user_id = 9999");
            $insert =$mysqli2->query("INSERT INTO material (material_id,`key`,`name`,stock,material_classifier_id,unit_measure_id,status_id,`user_id`)
            VALUES (NULL,'".$fila['key']."','".$fila['name']."','".$fila['stock']."','".$fila['material_classifier_id']."','".$fila['unit_measure_id']."','1','9999')");
        }

    header("Location: http://192.168.3.8/tmp_tools.php");

     exit(); 
?>