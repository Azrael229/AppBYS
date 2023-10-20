<?php
    
    require ("funciones.php");

    // print_r($_POST);
    $id_fecha = isset($_POST['id_fecha_horarios']) ? $_POST['id_fecha_horarios'] : "";
    
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";

    $salida = isset($_POST['h_salida']) ? $_POST['h_salida'] : "";

    $entrada = isset($_POST['h_entrada']) ? $_POST['h_entrada'] : "";
    

        $resultadoE = diff_entrada($entrada);
        $resultadoS = diff_salida($salida);

    $resultadoT = sumar_horas($resultadoE, $resultadoS);
    
    $res = reqUsuario($usuario);
    foreach($res as $row):
    $importeTE = multiplicar($resultadoT, $row['valorTE']);
    endforeach;



    if ($id_fecha == "" || $usuario == "" || $entrada == "" || $salida == ""){
        echo "false";
    }
    else{ 
        

        require ("conexion.php");

        $sql = "UPDATE fechas SET entrada = '$entrada', salida = '$salida', extras = '$resultadoT', importeTE = '$importeTE'  WHERE ID = $id_fecha";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>