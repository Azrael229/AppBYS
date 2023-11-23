<?php
    
    require ("funciones.php");

    // print_r($_POST);
    // estos post vienen del modal formulario #modalHorarios archivo semana.view.php => aqui se reciben la hora de entrada y salida de cada dia para establecer el total de horas extras y su costo para enviarlos a la BD
    $id_fecha = isset($_POST['id_fecha_horarios']) ? $_POST['id_fecha_horarios'] : "";
    
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";

    $salida = isset($_POST['h_salida']) ? $_POST['h_salida'] : "";

    $entrada = isset($_POST['h_entrada']) ? $_POST['h_entrada'] : "";

    $fecha_nueva = $_POST['input_fecha'];
    $fechaFMT = fechaFMT($fecha_nueva);


    if (strstr($fechaFMT, "domingo") !== false || strstr($fechaFMT, "sábado") !== false || strstr($fechaFMT, "Sunday") !== false || strstr($fechaFMT, "Saturday") !== false) {

        //funcion que determina el total de horas extras trabajadas el dia exclusivo para fines de semana
        $resultadoT_finde = finde_sumar_horas($entrada,$salida);
        

        // solicita a la BD atravez de esta funcion reqUsuario declarada en el archivo funciones.php todos los datos del usuario y dentro del foreach se multiplica el valor del tiempo extra del usuario popr el total de horas extras dando el costo del tiempo extra del dia 
        $res = reqUsuario($usuario);
        
        foreach($res as $row):
        $importeTE_finde = multiplicar_finde($resultadoT_finde, $row['valorTE']);
        endforeach;


        // echo ($resultadoT.' total horas extras finde'.'<br>');
        // echo ($usuario.'<br>');
        // echo ($row['valorTE'].' costo de la hora extra'.'<br>');
        // echo ($importeTE.' horas x costo'.'<br>');
        // die("parada");


        // se actualiza y se envia a la BD la hora de entrada y slida tambien el total de horas extras y el costo total de las horas extras del dia      
        require ("conexion.php");

        $sql = "UPDATE fechas SET entrada = '$entrada', salida = '$salida', extras = '$resultadoT_finde', importeTE = '$importeTE_finde'  WHERE ID = $id_fecha";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    } 
    else if ($id_fecha == "" || $usuario == "" || $entrada == "" || $salida == "") {
        
        echo "false";

    } else{ 
        
        //funciones que devuelve la diferencia en horas de $timeE (hora de entrada) - 8:00 (horario de entrada normal de lunes a viernes)
        //funcion que devuelve la diferencia en horas de $timeS (hora de salida) - 18:00 (horario de salida normal de lunes a viernes)
        $resultadoE = diff_entrada($entrada);
        $resultadoS = diff_salida($salida);


        //funcion que suma los resultados anteriores para determinar el total de horas extras del dia 
        $resultadoT = sumar_horas($resultadoE, $resultadoS);
        

        // solicita a la BD atravez de esta funcion reqUsuario declarada en el archivo funciones.php todos los datos del usuario y dentro del foreach se multiplica el valor del tiempo extra del usuario popr el total de horas extras dando el costo del tiempo extra del dia 
        // funcion que multiplica las horas extras por el valor declarada en funciones.php

        $res = reqUsuario($usuario);
        foreach($res as $row):
        $importeTE = multiplicar($resultadoT, $row['valorTE']);
        endforeach;

        // se actualiza y se envia a la BD la hora de entrada y slida tambien el total de horas extras y el costo total de las horas extras del dia
        
        require ("conexion.php");

        $sql = "UPDATE fechas SET entrada = '$entrada', salida = '$salida', extras = '$resultadoT', importeTE = '$importeTE'  WHERE ID = $id_fecha";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

        


        
        
    





    

?>