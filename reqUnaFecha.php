<?php
    $idFecha = file_get_contents("php://input");

    // print_r($idFecha);
     
    
    require ("conexion.php");

    $statement = $conexion->prepare("SELECT fecha FROM fechas WHERE ID = $idFecha");
    $statement->execute();

    $respuesta = $statement->fetch(PDO::FETCH_ASSOC);

    echo json_encode($respuesta);
    // print_r($respuesta);
?>