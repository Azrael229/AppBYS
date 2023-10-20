<?php

    session_start();
    // error_reporting(0);        
    $varsesion = $_SESSION['usuario'];
    
    if ($varsesion == "" || $varsesion == NULL){
        header("Location:login.php");
        die();
    }


    require("reqUnaSemana.php");
    require("funciones.php");
   
    require("semana.view.php");

    
    
    


?>