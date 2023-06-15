<?php
    // print_r($_POST);
    $fecha_dia = isset($_POST['fecha_dia']) ? $_POST['fecha_dia'] : "";
    $id_num_sem = isset($_POST['id_num_sem']) ? $_POST['id_num_sem'] : "";

    // $num_sem = $_POST['num_sem'];
    // print_r($num_sem);


    if ($fecha_dia == "" || $id_num_sem == ""){
        echo "false";
    }
    else{

        require ("conexion.php");
        $statement = $conexion->prepare("INSERT INTO fechas (fecha,num_sem) VALUES (:fecha, :num_sem) ");
        $statement->bindParam(":num_sem", $id_num_sem);
        $statement->bindParam(":fecha", $fecha_dia);
    
        $statement->execute();
        $conexion = null;
        echo "ok";
    }
?>