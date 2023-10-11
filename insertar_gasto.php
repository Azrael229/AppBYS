<?php

    //print_r($_POST);
    $concepto = isset($_POST['concepto']) ? $_POST['concepto'] : "";
    
    $total = isset($_POST['total']) ? $_POST['total'] : "";

    $formapago = isset($_POST['formapago']) ? $_POST['formapago'] : "";

    $id_fecha = isset($_POST['id_fecha2']) ? $_POST['id_fecha2'] : "";

    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";



    if ($concepto == "" || $total == "" || $formapago == "" || $id_fecha == "" || $usuario == ""){
        echo "false";
    }
    else{ 
        

        require ("conexion.php");
        
        $sql ="INSERT INTO gastos (concepto, total, tipo_pago, fecha, usuario) 
        VALUES ('$concepto', '$total', '$formapago', '$id_fecha', '$usuario')";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);

        echo "ok";
    }

?>