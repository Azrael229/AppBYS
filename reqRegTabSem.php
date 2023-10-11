<?php

    

    require ("conexion.php");

    // Seleccionando datos de BD con prepared statements
    // $statement = $conexion->prepare("SELECT numero_semana FROM semana WHERE usuario='$varsesion'");
    // $statement->execute();

    // guarda en la variable $res todos los resultados de la solicitud 
    // $res = $statement->fetchAll();

    // imprime los datos del Array en el navegador 
    // foreach ($res as $fila) {
    //     print_r($fila);
    // }

    $sql = "SELECT numero_semana FROM semana WHERE usuario='$varsesion'";

    $resultado = mysqli_query($conexion,$sql);
    $res = $resultado->fetch_all();


    rsort($res);
    // print_r ($res) ;
    // print_r ($varsesion) ;

?>