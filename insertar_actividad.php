<?php

    // print_r($_POST);
    $id_fecha = isset($_POST['id_fecha']) ? $_POST['id_fecha'] : "";
    
    $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : "";

    $ubicacion = isset($_POST['ubi']) ? $_POST['ubi'] : "";

    $os = isset($_POST['os']) ? $_POST['os'] : "";

    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";

    $num_sem = isset($_POST['num_sem']) ? $_POST['num_sem'] : "";

    $vehiculo = isset($_POST['vehiculo']) ? $_POST['vehiculo'] : "";


    

    if ($id_fecha == "" || $cliente == "" || $os == "" || $ubicacion == "" || $usuario == "" || $vehiculo == ""){
        echo "false";
    }
    else{ 
        

        require ("conexion.php");

        $sql = "INSERT INTO actividades (cliente, ubicacion, os, ID_fecha, usuario, num_sem, vehiculo) 
        VALUES ('$cliente', '$ubicacion', '$os', '$id_fecha', '$usuario', '$num_sem', '$vehiculo')";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        echo "ok";
    }

?>