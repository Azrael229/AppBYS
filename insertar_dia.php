<?php
    // print_r($_POST);
    $fecha_dia = isset($_POST['fecha_dia']) ? $_POST['fecha_dia'] : "";
    $id_num_sem = isset($_POST['id_num_sem']) ? $_POST['id_num_sem'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";

    // $num_sem = $_POST['num_sem'];
    // print_r($num_sem);


    if ($fecha_dia == "" || $id_num_sem == "" || $usuario == ""){
        echo "false";
    }
    else{

        require ("conexion.php");
        $sql = "INSERT INTO fechas (fecha,num_sem,usuario) 
        VALUES ('$fecha_dia', '$id_num_sem', '$usuario') ";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);

        echo "ok";
    }
?>