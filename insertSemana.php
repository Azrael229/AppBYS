<?php
    // print_r($_POST);
    $num_sem = isset($_POST['num_sem']) ? $_POST['num_sem'] : "";
    // $num_sem = $_POST['num_sem'];
    // print_r($num_sem);


    if ($num_sem == ""){
        echo "false";
    }
    else{

        require ("conexion.php");
        $statement = $conexion->prepare("INSERT INTO semana (numero_semana) VALUES (:num_sem) ");
        $statement->bindParam(":num_sem", $num_sem);
    
        $statement->execute();
        $conexion = null;
        echo "ok";
    }
?>