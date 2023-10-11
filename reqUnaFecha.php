<?php
    $idFecha = file_get_contents("php://input");

    // print_r($idFecha);
     
    
    require ("conexion.php");

    $statement = $conexion->prepare("SELECT fecha FROM fechas WHERE ID = $idFecha");
    $sql = "SELECT fecha FROM fechas WHERE ID = $idFecha";
    $res = mysqli_query($conexion, $sql);
    $respuesta = mysqli_fetch_object($res);

    

    // print_r($respuesta);
    echo json_encode($respuesta);
?>