<?php

    // esta solicutud pide a la base de datos que guarde en la vaiable $reslutado todos los dias de la semana X que le pasamos por GET id en la url del navegador


     $id_num_sem = ($_GET['id']);
    //  print_r($id_num_sem);

    require ("conexion.php");

    $statement = $conexion->prepare("SELECT * FROM fechas WHERE num_sem = $id_num_sem ORDER BY fecha ASC");
    $statement->execute();

    $resultado = $statement->fetchAll();

    // foreach ($resultado as $fila)
    // echo $fila['ID'];

    // print_r($resultado[0][0]);

    // $id_fecha = $resultado[0][0];
    // $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
    // $statement->execute();

    // $resultado2 = $statement->fetchAll();
    // print_r($resultado2);
?>