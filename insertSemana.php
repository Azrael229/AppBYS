<?php
    // print_r($_POST);
    $num_sem = isset($_POST['num_sem']) ? $_POST['num_sem'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    
    // $num_sem = $_POST['num_sem'];
    // print_r($num_sem);
    // print_r($usuario);

    
    if ($num_sem == "" || $usuario == ""){
        echo "false";
    }
    else{

        require ("conexion.php");
        $sql = "INSERT INTO semana (numero_semana, usuario) VALUES ('$num_sem', '$usuario')";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
    
        header("Location:index.php");
        // echo "ok";
    }

        



?>