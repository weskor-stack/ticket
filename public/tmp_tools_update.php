<?php
    $mysqli = new mysqli("localhost","root","ftpuser","tmp_info");

    $truncate = $mysqli->query("TRUNCATE tmp_tools");

    $tmp_tools = $mysqli->query("SELECT * FROM tmp_products WHERE `kind_item` = 'HERRAMIENTAS'");

    $tmp_tools->data_seek(0);

    $index = 0;

    while ($fila = $tmp_tools->fetch_assoc()) {

        if ($fila['unit_measure']=='Juego') {
            # code...
            if ($fila['line']=='ELECTRONICO / ELECTRICO') {
                # code...
                if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                    # code...
                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','5','2','".$fila['coust']."')");
                }else{
                    if ($fila['sub_line']=='MANUALES') {
                        # code...
                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','5','35','".$fila['coust']."')");
                    }else{
                        if ($fila['sub_line']=='RODAMIENTOS') {
                            # code...
                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','5','47','".$fila['coust']."')");
                        }else{
                            if ($fila['sub_line']=='MECANICAS') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','5','39','".$fila['coust']."')");
                            }
                        }
                    }
                }
            }else{
                if ($fila['line']=='MECANICAS') {
                    # code...
                    if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                        # code...
                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','13','2','".$fila['coust']."')");
                    }else{
                        if ($fila['sub_line']=='MANUALES') {
                            # code...
                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','13','35','".$fila['coust']."')");
                        }else{
                            if ($fila['sub_line']=='RODAMIENTOS') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','13','47','".$fila['coust']."')");
                            }else{
                                if ($fila['sub_line']=='MECANICAS') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','13','39','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }else {
                    if ($fila['line']=='MECANICO') {
                        # code...
                        if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                            # code...
                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','14','2','".$fila['coust']."')");
                        }else{
                            if ($fila['sub_line']=='MANUALES') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','14','35','".$fila['coust']."')");
                            }else{
                                if ($fila['sub_line']=='RODAMIENTOS') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','14','47','".$fila['coust']."')");
                                }else{
                                    if ($fila['sub_line']=='MECANICAS') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','14','39','".$fila['coust']."')");
                                    }
                                }
                            }
                        }
                    }else{
                        if ($fila['line']=='NEUMATICAS') {
                            # code...
                            if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','16','2','".$fila['coust']."')");
                            }else{
                                if ($fila['sub_line']=='MANUALES') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','16','35','".$fila['coust']."')");
                                }else{
                                    if ($fila['sub_line']=='RODAMIENTOS') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','16','47','".$fila['coust']."')");
                                    }else{
                                        if ($fila['sub_line']=='MECANICAS') {
                                            # code...
                                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','3','16','39','".$fila['coust']."')");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }else{
            if ($fila['unit_measure']=='Kilogramo') {
                # code...
                if ($fila['line']=='ELECTRONICO / ELECTRICO') {
                    # code...
                    if ($fila['sub_line']=='(BORRAR) ELECTRICA ') {
                        # code...
                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','5','2','".$fila['coust']."')");
                    }else{
                        if ($fila['sub_line']=='MANUALES') {
                            # code...
                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','5','35','".$fila['coust']."')");
                        }else{
                            if ($fila['sub_line']=='RODAMIENTOS') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','5','47','".$fila['coust']."')");
                            }else{
                                if ($fila['sub_line']=='MECANICAS') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','5','39','".$fila['coust']."')");
                                }
                            }
                        }
                    }
                }else{
                    if ($fila['line']=='MECANICAS') {
                        # code...
                        if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                            # code...
                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','13','2','".$fila['coust']."')");
                        }else{
                            if ($fila['sub_line']=='MANUALES') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','13','35','".$fila['coust']."')");
                            }else{
                                if ($fila['sub_line']=='RODAMIENTOS') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','13','47','".$fila['coust']."')");
                                }else{
                                    if ($fila['sub_line']=='MECANICAS') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','13','39','".$fila['coust']."')");
                                    }
                                }
                            }
                        }
                    }else {
                        if ($fila['line']=='MECANICO') {
                            # code...
                            if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','14','2','".$fila['coust']."')");
                            }else{
                                if ($fila['sub_line']=='MANUALES') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','14','35','".$fila['coust']."')");
                                }else{
                                    if ($fila['sub_line']=='RODAMIENTOS') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','14','47','".$fila['coust']."')");
                                    }else{
                                        if ($fila['sub_line']=='MECANICAS') {
                                            # code...
                                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','14','39','".$fila['coust']."')");
                                        }
                                    }
                                }
                            }
                        }else{
                            if ($fila['line']=='NEUMATICAS') {
                                # code...
                                if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','16','2','".$fila['coust']."')");
                                }else{
                                    if ($fila['sub_line']=='MANUALES') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','16','35','".$fila['coust']."')");
                                    }else{
                                        if ($fila['sub_line']=='RODAMIENTOS') {
                                            # code...
                                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','16','47','".$fila['coust']."')");
                                        }else{
                                            if ($fila['sub_line']=='MECANICAS') {
                                                # code...
                                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','4','16','39','".$fila['coust']."')");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                if ($fila['unit_measure']=='Pieza') {
                    # code...
                    if ($fila['line']=='ELECTRONICO / ELECTRICO') {
                        # code...
                        if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                            # code...
                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','5','2','".$fila['coust']."')");
                        }else{
                            if ($fila['sub_line']=='MANUALES') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','5','35','".$fila['coust']."')");
                            }else{
                                if ($fila['sub_line']=='RODAMIENTOS') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','5','47','".$fila['coust']."')");
                                }else{
                                    if ($fila['sub_line']=='MECANICAS') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','5','39','".$fila['coust']."')");
                                    }
                                }
                            }
                        }
                    }else{
                        if ($fila['line']=='MECANICAS') {
                            # code...
                            if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                                # code...
                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','13','2','".$fila['coust']."')");
                            }else{
                                if ($fila['sub_line']=='MANUALES') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','13','35','".$fila['coust']."')");
                                }else{
                                    if ($fila['sub_line']=='RODAMIENTOS') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','13','47','".$fila['coust']."')");
                                    }else{
                                        if ($fila['sub_line']=='MECANICAS') {
                                            # code...
                                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','13','39','".$fila['coust']."')");
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($fila['line']=='MECANICO') {
                                # code...
                                if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                                    # code...
                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','14','2','".$fila['coust']."')");
                                }else{
                                    if ($fila['sub_line']=='MANUALES') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','14','35','".$fila['coust']."')");
                                    }else{
                                        if ($fila['sub_line']=='RODAMIENTOS') {
                                            # code...
                                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','14','47','".$fila['coust']."')");
                                        }else{
                                            if ($fila['sub_line']=='MECANICAS') {
                                                # code...
                                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','14','39','".$fila['coust']."')");
                                            }
                                        }
                                    }
                                }
                            }else{
                                if ($fila['line']=='NEUMATICAS') {
                                    # code...
                                    if ($fila['sub_line']=='(BORRAR) ELECTRICA') {
                                        # code...
                                        $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                        VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','16','2','".$fila['coust']."')");
                                    }else{
                                        if ($fila['sub_line']=='MANUALES') {
                                            # code...
                                            $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                            VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','16','35','".$fila['coust']."')");
                                        }else{
                                            if ($fila['sub_line']=='RODAMIENTOS') {
                                                # code...
                                                $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                                VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','16','47','".$fila['coust']."')");
                                            }else{
                                                if ($fila['sub_line']=='MECANICAS') {
                                                    # code...
                                                    $insert =$mysqli->query("INSERT INTO tmp_tools (tool_id,`key`,`name`,stock,tool_classifier_id,unit_measure_id,`line`,sub_line,tool_coust)
                                                    VALUES (NULL,'".$fila['key_product']."','".$fila['names']."','".$fila['inventary']."','6','10','16','39','".$fila['coust']."')");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $index ++;
    }

    // echo($index."<br>");

    $mysqli2 = new mysqli("localhost","root","ftpuser","ticket");

    $resultado2 = $mysqli->query("SELECT * FROM tmp_tools");

    $resultado2->data_seek(0);

    $resultado3 = $mysqli2->query("SELECT * FROM tool");

    $resultado3->data_seek(0);

    $arrayTemporal;
    $arrayStockTemporal;
    $arrayTemporalName;
    $array_tool_classifier_id;
    $array_unit_measure_id;

    $arrayTool;
    $arrayStockTool;
    $arrayToolName;

    $indice=0;
    
    // echo("//////////////////////Temporal - Tools//////////////".'<br>');

    while ($fila = $resultado2->fetch_assoc()) {
        $mysqli2->query("SET @user_id = 9999");
        $arrayTemporal[$indice]= TRIM($fila['key']);
        $arrayStockTemporal[$indice] = TRIM($fila['stock']);
        $arrayTemporalName[$indice] = TRIM($fila['name']);
        $array_tool_classifier_id[$indice] = TRIM($fila['tool_classifier_id']);
        $array_unit_measure_id[$indice] = TRIM($fila['unit_measure_id']);

        $indice++;
    }

    // echo($indice."<br>");
    // echo("//////////////////////Tools//////////////".'<br>');

    $indice=0;

    while ($fila = $resultado3->fetch_assoc()) {
        $mysqli2->query("SET @user_id = 9999");

        $arrayTool[$indice]= TRIM($fila['key']);
        $arrayStockTool[$indice] = TRIM($fila['stock']);
        $arrayToolName[$indice] = TRIM($fila['name']);

        if (in_array($fila['key'],$arrayTemporal)) {
            $update =  "UPDATE `tool` SET `status_id` = '1' WHERE `tool`.`tool_id` = ".$fila['tool_id'];
            $rs = mysqli_query($mysqli2, $update);
            for ($i=0; $i < count($arrayTemporal); $i++) { 
                # code...
                if ($fila['key']==$arrayTemporal[$i]) {
                    # code...
                    if ($fila['stock'] == $arrayStockTemporal[$i]) {
                        # code...
                        if (TRIM($fila['name']) == $arrayTemporalName[$i]) {

                        }else{
                            // echo("El nombre de la herramienta ".$fila['name']." no es igual a la tabla temporal, tabla 'Tool' = ".$fila['name']." tabla 'tmp_tool'= ".$arrayTemporalName[$i]." <br>");
                            $update =  "UPDATE `tool` SET `name` = '".$arrayTemporalName[$i]."' WHERE `tool`.`tool_id` = ".$fila['tool_id'];
                            $rs = mysqli_query($mysqli2, $update);
                        }
                    }else{
                        // echo("El stock de la herramienta ".$fila['key']." no es igual a la tabla temporal, tabla 'Tool' = ".$fila['stock']." tabla 'tmp_tool'= ".$arrayStockTemporal[$i]." <br>");
                        $update =  "UPDATE `tool` SET `stock` = '".$arrayStockTemporal[$i]."' WHERE `tool`.`tmp_tool` = ".$fila['tool_id'];
                        $rs = mysqli_query($mysqli2, $update);
                        if (TRIM($fila['name']) == $arrayTemporalName[$i]) {

                        }else{
                            // echo("El nombre de la herramienta ".$fila['name']." no es igual a la tabla temporal, tabla 'Tool' = ".$fila['name']." tabla 'tmp_tool'= ".$arrayTemporalName[$i]." <br>");
                            $update =  "UPDATE `tool` SET `name` = '".$arrayTemporalName[$i]."' WHERE `tool`.`tool_id` = ".$fila['tool_id'];
                            $rs = mysqli_query($mysqli2, $update);
                        }
                    }
                    // echo("key: ".$arrayTemporal[$i].", Stock: ".$arrayStockTemporal[$i]."<br>");
                }
            }
        }else{
            // echo($indice." - No existe la clave de la herramienta"."<br>");
            // echo($fila['name']." - ".$fila['key']." - ".$fila['status_id']."<br>");
            $update =  "UPDATE `tool` SET `status_id` = '2' WHERE `tool`.`tool_id` = ".$fila['tool_id'];
            $rs = mysqli_query($mysqli2, $update);
            // echo("Cambio: ".$fila['name']." - ".$fila['key']." - ".$fila['status_id']."<br>");
        }
        
        $indice++;
    }

    // echo("Cantidad de registros de la tabla tool: ".count($arrayTool)."<br>");

    // echo("Cantidad de registros de la tabla tmp_tool: ".count($arrayTemporal).'<br>');

    // echo(count($arrayTool)."<br>");

    for ($index=0; $index < count($arrayTemporal); $index++) {
        $mysqli2->query("SET @user_id = 9999");
        if (in_array($arrayTemporal[$index], $arrayTool)) {
            // echo ($index." Existe <br>");
        }else{
            // echo ($index." No Existe ".$arrayTemporal[$index]." <br>");
            $insert =$mysqli2->query("INSERT INTO tool (tool_id,`key`,`name`,stock,unit_measure_id,status_id,`user_id`)
            VALUES (NULL,'".$arrayTemporal[$index]."','".$arrayTemporalName[$index]."','".$arrayStockTemporal[$index]."','".$array_unit_measure_id[$index]."','1','9999')");
        }
    }        
    echo("<script>alert('Se actualizó la base de datos correctamente!!!');</script>");

    echo("<script>
        // alert('Se subieron los archivos');
        setTimeout( function() { window.location.href = 'http://192.168.3.8/tickets/'; }, 0 );
        
    </script>");

    // header("Location: http://localhost/ticket/public/tickets/");

    //  exit(); 
?>