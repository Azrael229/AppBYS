<?php
    require ("conexion.php");

    // Seleccionando datos de BD con prepared statements
    $statement = $conexion->prepare('SELECT * FROM semana');
    $statement->execute();

    // guarda en la variable $res todos los resultados de la solicitud 
    $res = $statement->fetchAll();

    // imprime los datos del Array en el navegador 
    // foreach ($res as $fila) {
    //     // print_r($fila);
    // }

?>