<?php

    //print_r($_POST);
    $concepto = isset($_POST['concepto']) ? $_POST['concepto'] : "";

    $notas = isset($_POST['notas']) ? $_POST['notas'] : "";
    
    $total = isset($_POST['total']) ? $_POST['total'] : "";

    $formapago = isset($_POST['from_pago']) ? $_POST['from_pago'] : "";

    $id_fecha = isset($_POST['id_fecha2']) ? $_POST['id_fecha2'] : "";

    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";

    $num_sem = isset($_POST['num_sem']) ? $_POST['num_sem'] : "";


    if ($concepto == "" || $total == "" || $formapago == "" || $id_fecha == "" || $usuario == ""){
        echo "false";
    }
    else{ 
        

        require ("conexion.php");
        
        $sql ="INSERT INTO gastos (concepto, notas, total, tipo_pago, fecha, usuario, num_sem) 
        VALUES ('$concepto', '$notas', '$total', '$formapago', '$id_fecha', '$usuario', '$num_sem')";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);

        echo "ok";
    }

?>