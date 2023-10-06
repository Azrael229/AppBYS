<?php

    print_r($_POST);
    $concepto = isset($_POST['concepto']) ? $_POST['concepto'] : "";
    
    $total = isset($_POST['total']) ? $_POST['total'] : "";

    $formapago = isset($_POST['formapago']) ? $_POST['formapago'] : "";


    // if ($id_fecha == "" || $cliente == "" || $os == "" || $hini == "" || $hfin == ""){
    //     echo "false";
    // }
    // else{ 
        

    //     require ("conexion.php");

    //     $statement = $conexion->prepare("INSERT INTO actividades (cliente, os, hora_inicial, hora_final, ID_fecha) VALUES (:cliente, :os, :hini, :hfin, :id_fecha)");

    //     $statement->bindParam(":id_fecha", $id_fecha);
    //     $statement->bindParam(":cliente", $cliente);
    //     $statement->bindParam(":os", $os);
    //     $statement->bindParam(":hini", $hini);
    //     $statement->bindParam(":hfin", $hfin);

    //     $statement->execute();
    //     $conexion = null;
    //     echo "ok";
    // }

?>