<?php
   
    // esta solicutud pide a la base de datos que guarde en la variable $reslutado todos los dias de la semana X que le pasamos por GET id en la url del navegador y que coincidan con el ID de la semana y el nombre de usuario que actualmente tiene en sesion abierta

    $varsesion = $_SESSION['usuario']; 
    $id_num_sem = ($_GET['id']);

    //  print_r($varsesion);
    //  print_r($id_num_sem );
    
    require ("conexion.php");

    $sql = "SELECT * FROM fechas WHERE num_sem='$id_num_sem' and usuario='$varsesion' ORDER BY fecha ASC";
    // devuelve la respuesta como objeto
    $res = mysqli_query($conexion, $sql);
    // la respuesta en un array fetch_all se debe pedir $resultado[0][1]
    $resultado = mysqli_fetch_all($res);
    mysqli_close($conexion);

    // mysqli_fetch_assoc el valor que devuelve se establece en una variable tipo $resultado['fecha']
    
        
    
    
?>