<?php
    // print_r($_POST);
    $num_sem = isset($_POST['num_sem']) ? $_POST['num_sem'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    
    // $num_sem = $_POST['num_sem'];
    // print_r($num_sem);


    if ($num_sem == "" || $usuario == ""){
        echo "false";
    }
    else{

        require ("conexion.php");
        $statement = $conexion->prepare("INSERT INTO semana (numero_semana, usuario) VALUES (:num_sem, :usuario)");
        $statement->bindParam(":num_sem", $num_sem);
        $statement->bindParam(":usuario", $usuario);
    
        $statement->execute();
        $conexion = null;
        echo "ok";
    }
?>