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

    echo($index);

    $mysqli2 = new mysqli("localhost","root","ftpuser","ticket");
    
    // $truncate2 = $mysqli2->query("TRUNCATE tool");
    $resultado = $mysqli->query("SELECT * FROM tmp_tools");

    $resultado->data_seek(0);

    //$index = 1;
    while ($fila = $resultado->fetch_assoc()) {
        $mysqli2->query("SET @user_id = 9999");
        $insert =$mysqli2->query("INSERT INTO tool (tool_id,`key`,`name`,stock,unit_measure_id,status_id,`user_id`)
        VALUES (NULL,'".$fila['key']."','".$fila['name']."','".$fila['stock']."','".$fila['unit_measure_id']."','1','9999')");
    }

    header("Location: http://192.168.3.8/project.php");

     exit(); 
?>