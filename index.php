<?php
    
    session_start();
    // error_reporting(0);        
    $varsesion = $_SESSION['usuario'];
    
    if ($varsesion == "" || $varsesion == NULL){
        header("Location:login.php");
        die();
    }
    
    
    require("reqRegTabSem.php");
    require("view.index.php");
   

    
?>