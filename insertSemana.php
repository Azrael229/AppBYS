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



    // Crea una función que recibe el número de semana y el año
  function obtener_dias_semana($num_sem, $year) {
    // Crea un array vacío para guardar los días
    $dias = array();
    // Usa un bucle for para recorrer los días de la semana
    for ($i = 1; $i <= 7; $i++) {
      // Usa la función date para obtener la fecha correspondiente al día de la semana
      // El primer parámetro es el formato de la fecha, que es "Y-m-d" (año-mes-día)
      // El segundo parámetro es el timestamp, que se obtiene usando la función strtotime
      // La función strtotime convierte una cadena de texto en un timestamp
      // La cadena de texto es "$año-W$semana-$i", que significa el año, la semana y el día dados
      $fecha = date("Y-m-d", strtotime("$year-W$num_sem-$i"));
      // Añade la fecha al array de días
      $dias[] = $fecha;
    }
    // Devuelve el array de días
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