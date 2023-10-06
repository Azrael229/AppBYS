<?php

    //print_r($_POST);
    $concepto = isset($_POST['concepto']) ? $_POST['concepto'] : "";
    
    $total = isset($_POST['total']) ? $_POST['total'] : "";

    $formapago = isset($_POST['formapago']) ? $_POST['formapago'] : "";

    $id_fecha = isset($_POST['id_fecha2']) ? $_POST['id_fecha2'] : "";



    if ($concepto == "" || $total == "" || $formapago == "" || $id_fecha == ""){
        echo "false";
    }
    else{ 
        

         require ("conexion.php");

        $statement = $conexion->prepare("INSERT INTO gastos (concepto, total, tipo_pago, fecha) VALUES (:concepto, :total, :formapago, :id_fecha)");

        $statement->bindParam(":id_fecha", $id_fecha);
        $statement->bindParam(":concepto", $concepto);
        $statement->bindParam(":total", $total);
        $statement->bindParam(":formapago", $formapago);
        

        $statement->execute();
        $conexion = null;
        echo "ok";
    }

?>