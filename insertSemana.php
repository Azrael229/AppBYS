<?php
    // print_r($_POST);
    $num_sem = isset($_POST['num_sem']) ? $_POST['num_sem'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $year = isset($_POST['year']) ? $_POST['year'] : "";
    // $num_sem = $_POST['num_sem'];
    // print_r($num_sem);
    // print_r($usuario);

    if ($num_sem == "" || $usuario == ""){
        echo "false";
    }
    else{

        require ("conexion.php");
        $sql = "INSERT INTO semana (year, numero_semana, usuario) VALUES ('$year', '$num_sem', '$usuario')";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
    
    }



    function obtener_dias_semana($num_sem, $year) {
      $dias = array();
    
      // Establecer el día de la semana como lunes (1)
      $inicio_semana = new DateTime();
      $inicio_semana->setISODate($year, $num_sem, 1);
    
      // Iterar por cada día de la semana
      for ($i = 0; $i < 7; $i++) {
        // Clonar el objeto DateTime para evitar la modificación del original
        $fecha = clone $inicio_semana;
        // Añadir el número de días correspondiente
        $fecha->add(new DateInterval("P{$i}D"));
        // Formatear la fecha y añadir al array de días
        $dias[] = $fecha->format("Y-m-d");
      }
    
      return $dias;
    } 

  $dias = obtener_dias_semana($num_sem, $year);

  $lun = $dias[0];
  $mar = $dias[1];
  $mie = $dias[2];
  $jue = $dias[3];
  $vie = $dias[4];
  $sab = $dias[5];
  $dom = $dias[6];


        
  require ("conexion.php");

    $sql = "INSERT INTO fechas (fecha,num_sem,usuario,entrada,salida,extras,importeTE) 
    VALUES 
    ('$lun', '$num_sem', '$usuario','00:00','00:00','00:00','0.00'),
    ('$mar', '$num_sem', '$usuario','00:00','00:00','00:00','0.00'),
    ('$mie', '$num_sem', '$usuario','00:00','00:00','00:00','0.00'),
    ('$jue', '$num_sem', '$usuario','00:00','00:00','00:00','0.00'),
    ('$vie', '$num_sem', '$usuario','00:00','00:00','00:00','0.00'),
    ('$sab', '$num_sem', '$usuario','00:00','00:00','00:00','0.00'),
    ('$dom', '$num_sem', '$usuario','00:00','00:00','00:00','0.00')";


    mysqli_query($conexion, $sql);
    mysqli_close($conexion);


  header("Location:index.php");
  // echo "ok";

?>