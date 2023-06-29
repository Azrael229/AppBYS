<?php

    // print_r($_POST);
    $id_fecha = isset($_POST['id_fecha']) ? $_POST['id_fecha'] : "";
    
    $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : "";

    $os = isset($_POST['os']) ? $_POST['os'] : "";

    $hini = isset($_POST['hini']) ? $_POST['hini'] : "";

    $hfin = isset($_POST['hfin']) ? $_POST['hfin'] : "";

    

    if ($id_fecha == "" || $cliente == "" || $os == "" || $hini == "" || $hfin == ""){
        echo "false";
    }
    else{ 
        

        require ("conexion.php");

        $statement = $conexion->prepare("INSERT INTO actividades (cliente, os, hora_inicial, hora_final, ID_fecha) VALUES (:cliente, :os, :hini, :hfin, :id_fecha)");

        $statement->bindParam(":id_fecha", $id_fecha);
        $statement->bindParam(":cliente", $cliente);
        $statement->bindParam(":os", $os);
        $statement->bindParam(":hini", $hini);
        $statement->bindParam(":hfin", $hfin);

        $statement->execute();
        $conexion = null;
        echo "ok";
    }

?>