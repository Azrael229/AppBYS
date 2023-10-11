<?php

    // print_r($_POST);
    $id_fecha = isset($_POST['id_fecha']) ? $_POST['id_fecha'] : "";
    
    $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : "";

    $os = isset($_POST['os']) ? $_POST['os'] : "";

    $hini = isset($_POST['hini']) ? $_POST['hini'] : "";

    $hfin = isset($_POST['hfin']) ? $_POST['hfin'] : "";

    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";


    

    if ($id_fecha == "" || $cliente == "" || $os == "" || $hini == "" || $hfin == "" || $usuario == ""){
        echo "false";
    }
    else{ 
        

        require ("conexion.php");

        $sql = "INSERT INTO actividades (cliente, os, hora_inicial, hora_final, ID_fecha, usuario) 
        VALUES ('$cliente', '$os', '$hini', '$hfin', '$id_fecha', '$usuario')";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        echo "ok";
    }

?>