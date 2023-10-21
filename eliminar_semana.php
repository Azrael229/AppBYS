<?php

    session_start();
    // error_reporting(0);        
    $varsesion = $_SESSION['usuario'];

    if ($varsesion == "" || $varsesion == NULL){
        header("Location:login.php");
        die();
    }

    $num_sem = ($_GET['id']);
    echo $num_sem;
    

    require ("conexion.php");

    $sql = "DELETE FROM actividades WHERE num_sem = $num_sem AND usuario = '$varsesion'";
    mysqli_query($conexion, $sql);
    

    $sql = "DELETE FROM gastos WHERE num_sem = $num_sem AND usuario = '$varsesion'";
    mysqli_query($conexion, $sql);
    
    $sql = "DELETE FROM fechas WHERE num_sem = $num_sem AND usuario = '$varsesion'";
    mysqli_query($conexion, $sql);

    $sql = "DELETE FROM semana WHERE numero_semana = $num_sem AND usuario = '$varsesion'";
    mysqli_query($conexion, $sql);
    
    mysqli_close($conexion);

    // // Redirigir a la página anterior
    header('Location: ' . $_SERVER['HTTP_REFERER']);  







?>