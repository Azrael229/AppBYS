<?php
  // require ("conexion.php");


  // // Crea una función que recibe el número de semana y el año
  // function obtener_dias_semana($semana, $año) {
  //   // Crea un array vacío para guardar los días
  //   $dias = array();
  //   // Usa un bucle for para recorrer los días de la semana
  //   for ($i = 1; $i <= 7; $i++) {
  //     // Usa la función date para obtener la fecha correspondiente al día de la semana
  //     // El primer parámetro es el formato de la fecha, que es "Y-m-d" (año-mes-día)
  //     // El segundo parámetro es el timestamp, que se obtiene usando la función strtotime
  //     // La función strtotime convierte una cadena de texto en un timestamp
  //     // La cadena de texto es "$año-W$semana-$i", que significa el año, la semana y el día dados
  //     $fecha = date("Y-m-d", strtotime("$año-W$semana-$i"));
  //     // Añade la fecha al array de días
  //     $dias[] = $fecha;
  //   }
  //   // Devuelve el array de días
  //   return $dias;
  // } 

  // $dias = obtener_dias_semana(41, 2023);

  // $lun = $dias[0];
  // $mar = $dias[1];
  // $mie = $dias[2];
  // $jue = $dias[3];
  // $vie = $dias[4];
  // $sab = $dias[5];
  // $dom = $dias[6];

  // // Muestra las variables por pantalla
  // echo "Lunes: $lun\n";
  // echo "Martes: $mar\n";
  // echo "Miércoles: $mie\n";
  // echo "Jueves: $jue\n";
  // echo "Viernes: $vie\n";
  // echo "Sábado: $sab\n";
  // echo "Domingo: $dom\n";




// function sumaGastos(){
//   require ("conexion.php");
//   $sql = "SELECT SUM(total) FROM gastos, fechas WHERE gastos.fecha = fechas.ID AND fechas.num_sem = '39'";
//   $result = mysqli_query($conexion, $sql);
//   $row = mysqli_fetch_array($result);
//   return $row[0];

// }

// $sum = sumaGastos();
// echo $sum;

// function reqUsuario($varsesion){

//   require ("conexion.php");
//   $sql = "SELECT * FROM usuarios WHERE usuario = 'israel'";
  
//   return mysqli_query($conexion, $sql);

//   mysqli_close($conexion);

// }
//  $res = reqUsuario('israel');
//   foreach($res as $row):


//   echo ($row['nombre']);
//   echo ($row['valorTE']);


//   endforeach;




    // require ("funciones.php");

//     require ("conexion.php");
//    $sql = "SELECT extras FROM `fechas` WHERE usuario = 'israel' AND num_sem = '39'";
//     $res = mysqli_query($conexion, $sql);
//    mysqli_close($conexion);


//   $resultado = mysqli_fetch_all($res);

//   function sumar_horas($resultado) {
   


//   $var1 = $resultado[0];
//   $var2 = $resultado[1];
//   $var3 = $resultado[2];
//   $var4 = $resultado[3];
//   $var5 = $resultado[4];
//   $var6 = $resultado[5];
//   $var7 = $resultado[6];


//   $hora1 = strval($var1[0]);
//   $hora2 = strval($var2[0]);
//   $hora3 = strval($var3[0]);
//   $hora4 = strval($var4[0]);
//   $hora5 = strval($var5[0]);
//   $hora6 = strval($var6[0]);
//   $hora7 = strval($var7[0]);

  
//   //  var_dump ($hora1); // "1"
//   //   die();


//   $horas1 = explode(':', $hora1);
//   $horas2 = explode(':', $hora2);
//   $horas3 = explode(':', $hora3);
//   $horas4 = explode(':', $hora4);
//   $horas5 = explode(':', $hora5);
//   $horas6 = explode(':', $hora6);
//   $horas7 = explode(':', $hora7);

//   $horas =  $horas1[0] +
//             $horas2[0] +
//             $horas3[0] +
//             $horas4[0] +
//             $horas5[0] +
//             $horas6[0] +
//             $horas7[0];

//   $minutos =  $horas1[1] +
//               $horas2[1] +
//               $horas3[1] +
//               $horas4[1] +
//               $horas5[1] +
//               $horas6[1] +
//               $horas7[1];

//   if ($minutos >= 60) {
//       $horas++;
//       $minutos -= 60;
//   }
//   return sprintf('%02d:%02d', $horas, $minutos);
// }
//   sumar_horas($resultado);
  // echo ($suma);
  // array(1, 2, 3)


  // print_r ($var1);
  // print_r ($var2);


  // $suma = sumar_horas($var1, $var2);
  //  echo ($suma);















// Establecer el número de semana y el año
$semana = 39;
$año = 2023;

// Obtener la fecha del primer día de la semana
$fecha = date("Y-m-d", strtotime($año."W".$semana."1"));


// $fmt = fechaFMT($fecha);
// echo $fmt;

// for ($i = 0; $i < 7; $i++) {
//    $result = fechaFMT(date("l", strtotime( $fecha . "+" . $i . " days"))) ;

//    var_dump($result. "<br>");
//  };


 for ($i = 0; $i < 7; $i++) {
    $result = date("Y-m-d", strtotime( $fecha . "+" . $i . " days")) . "<br>";
 
    $list = explode("\n", $result);

    // Elimina los elementos vacíos del array resultante
    $list1 = array_filter($list);

    // Imprime el array resultante
    // print_r($list1). "<br>";
   
  };







// Imprimir los días de la semana
// for ($i = 0; $i < 7; $i++) {
//    echo date("l", strtotime( $fecha . "+" . $i . " days")) . "<br>";
// };

/////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////

// function fechaFMT($fecha){
        
//     $fecha1 = strtotime($fecha);                          
//     setlocale(LC_ALL, "es-Mx.UTF-8");

//     return strftime("%A", $fecha1)." ".strftime("%d", $fecha1)." ".strftime("%B", $fecha1)." ".strftime("%Y", $fecha1);
// }

////////////////////////////////////////////////////////////
// function restar_tiempos($tiempo) {
//     $tiempo_array = explode(':', $tiempo);
//     $horas = intval(8 - $tiempo_array[0]);
//     $minutos = intval(60 - $tiempo_array[1]);
//     if ($horas >= 1 || $horas ==0) {
//         $horas -= 1;
        
//     }

//     if ($minutos == 60) {
//         $horas += 1;
//         $minutos = 00;
//     }
//     return sprintf('%02d:%02d', $horas, $minutos);
// };


// $resultado = restar_tiempos('08:10');
// echo $resultado;

// function restar_tiempos($tiempo) {
//     $tiempo_array = explode(':', $tiempo);
//     $horas = intval( $tiempo_array[0]-18);
//     $minutos = intval( $tiempo_array[1]);
//     if ( $horas < 1 ) {
//         $horas = 0;
        
//     }

   
//     return sprintf('%02d:%02d', $horas, $minutos);
// };


// $resultado = restar_tiempos('18:00');
// echo $resultado;

// function diff_salida($timeS) {
//     $date1 = new DateTime($timeS);
//     $date2 = new DateTime('18:00');
//     $interval = $date1->diff($date2);
//     return $interval->format('%H:%I');
// }

// $resultadoS = diff_salida('18:50');
// echo $resultadoS ."<br>";

// function diff_entrada($timeE) {
//     $date1 = new DateTime($timeE);
//     $date2 = new DateTime('08:00');
//     $interval = $date1->diff($date2);
//     return $interval->format('%H:%I');
// }

// $resultadoE = diff_entrada('06:10');
// echo $resultadoE ."<br>" ;

// function sumar_horas($hora1, $hora2) {
//     $horas1 = explode(':', $hora1);
//     $horas2 = explode(':', $hora2);
//     $horas = $horas1[0] + $horas2[0];
//     $minutos = $horas1[1] + $horas2[1];
//     if ($minutos >= 60) {
//         $horas++;
//         $minutos -= 60;
//     }
//     return sprintf('%02d:%02d', $horas, $minutos);
// }

// $resultadoT = sumar_horas($resultadoE, $resultadoS);
// echo $resultadoT;

?>
