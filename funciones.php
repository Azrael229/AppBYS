<?php

// funcion que devuelve la fecha en formato lunes 9 octubre 2023
function fechaFMT($fecha){
    
    $fecha1 = strtotime($fecha);                          
    setlocale(LC_ALL, "es-Mx.UTF-8");

    return strftime("%A", $fecha1)." ".strftime("%d", $fecha1)." ".strftime("%B", $fecha1)." ".strftime("%Y", $fecha1);
}
    
// funcion que devuelve la fecha en formato  9 octubre 2023
function semanaDEL($id_num_sem){
    $año = 2023;
    $fecha = date("Y-m-d", strtotime($año."W".$id_num_sem."1"));

    $fecha1 = strtotime($fecha);                          
    setlocale(LC_ALL, "es-Mx.UTF-8");

    return strftime("%d", $fecha1)." ".strftime("%B", $fecha1)." ".strftime("%Y", $fecha1);

}

// funcion que devuelve la fecha en formato  9 octubre 2023
function semanaAL($id_num_sem){
    $año = 2023;
    $fecha = date("Y-m-d", strtotime($año."W".$id_num_sem."7"));

    $fecha1 = strtotime($fecha);                          
    setlocale(LC_ALL, "es-Mx.UTF-8");

    return strftime("%d", $fecha1)." ".strftime("%B", $fecha1)." ".strftime("%Y", $fecha1);

}

// funcion que devuelve la fecha en formato lunes 9 
function colfechas($fecha){
    
    $fecha1 = strtotime($fecha);                          
    setlocale(LC_ALL, "es-Mx.UTF-8");

    return strftime("%A", $fecha1)." ".strftime("%d", $fecha1);
}


// funcion que multiplica las horas extras por el valor
function multiplicar($hora, $valor) {
    $hora_array = explode(':', $hora);
    $hora_decimal = $hora_array[0] + ($hora_array[1] / 60);

    $valor1 = $hora_decimal * $valor;
    setlocale(LC_MONETARY, 'es_MX');
    return number_format($valor1, 2);
}

function diff_entrada($timeE) {
    $date1 = new DateTime($timeE);
    $date2 = new DateTime('08:00');
    $interval = $date1->diff($date2);
    return $interval->format('%H:%I');
}

function diff_salida($timeS) {
    $date1 = new DateTime($timeS);
    $date2 = new DateTime('18:00');
    $interval = $date1->diff($date2);
    return $interval->format('%H:%I');
}

function sumar_horas($hora1, $hora2) {
    $horas1 = explode(':', $hora1);
    $horas2 = explode(':', $hora2);
    $horas = $horas1[0] + $horas2[0];
    $minutos = $horas1[1] + $horas2[1];
    if ($minutos >= 60) {
        $horas++;
        $minutos -= 60;
    }
    return sprintf('%02d:%02d', $horas, $minutos);
}

//una peticion a la BD tabla actividades condicional ID_fecha usada en reportePDF.php
function reqActividad($id_fechaPos1){
    
    require ("conexion.php");
    $sql = "SELECT * FROM actividades WHERE ID_fecha = $id_fechaPos1";
    return mysqli_query($conexion, $sql);
    mysqli_close($conexion);


}
// el resultado devuelve un objeto el cual se debe recuperar con un loop
// $resultado = reqActividad(29);
// foreach ($resultado as $fila):
//     echo $fila['cliente'];
// endforeach;


//una peticion a la BD tabla fecahs condicional ID usada en reportePDF.php para pintar los horarios, horas extras e importe de horas extras
function reqHorasfecha($id_fechaPos1){

    require ("conexion.php");
    $sql = "SELECT * FROM fechas WHERE ID = $id_fechaPos1";
    return mysqli_query($conexion, $sql);
    mysqli_close($conexion);


}

//Esta funcion devuelve la sumatoria de las horas Extars de la semana X segun le pasemos el parametro a la funcion con la variable $id_num_sem se utiliza en el archivo reporte PDF en la tabla de reslutados 
function sumSemanalTE($id_num_sem){

    require ("conexion.php");

    $sql = "SELECT extras FROM `fechas` WHERE num_sem = $id_num_sem";

    $res = mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    $resultado = mysqli_fetch_all($res);

    $var1 = $resultado[0];
    $var2 = $resultado[1];
    $var3 = $resultado[2];
    $var4 = $resultado[3];
    $var5 = $resultado[4];
    $var6 = $resultado[5];
    $var7 = $resultado[6];


    $hora1 = strval($var1[0]);
    $hora2 = strval($var2[0]);
    $hora3 = strval($var3[0]);
    $hora4 = strval($var4[0]);
    $hora5 = strval($var5[0]);
    $hora6 = strval($var6[0]);
    $hora7 = strval($var7[0]);

    $horas1 = explode(':', $hora1);
    $horas2 = explode(':', $hora2);
    $horas3 = explode(':', $hora3);
    $horas4 = explode(':', $hora4);
    $horas5 = explode(':', $hora5);
    $horas6 = explode(':', $hora6);
    $horas7 = explode(':', $hora7);

    $horas =    $horas1[0] +
                $horas2[0] +
                $horas3[0] +
                $horas4[0] +
                $horas5[0] +
                $horas6[0] +
                $horas7[0];

  $minutos =  $horas1[1] +
              $horas2[1] +
              $horas3[1] +
              $horas4[1] +
              $horas5[1] +
              $horas6[1] +
              $horas7[1];

  if ($minutos >= 60) {
      $horas++;
      $minutos -= 60;
  }
  return sprintf('%02d:%02d', $horas, $minutos);

}

function reqUsuario($varsesion){

    require ("conexion.php");
    $sql = "SELECT * FROM `usuarios` WHERE usuario = '$varsesion'";
    return mysqli_query($conexion, $sql);
    mysqli_close($conexion);

}

function sumaGastosTot($id_num_sem){
    require ("conexion.php");
    $sql = "SELECT SUM(total) FROM gastos, fechas WHERE gastos.fecha = fechas.ID AND fechas.num_sem = '$id_num_sem'";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result);
    return number_format($row[0],2);
}

function sumaGastosEfec($id_num_sem){
    require ("conexion.php");

    $sql = "SELECT SUM(total) FROM gastos, fechas WHERE gastos.fecha = fechas.ID AND gastos.tipo_pago = 'efectivo' AND fechas.num_sem = '$id_num_sem'";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result);
    return number_format($row[0],2);
}

function sumaGastosVale($id_num_sem){
    require ("conexion.php");

    $sql = "SELECT SUM(total) FROM gastos, fechas WHERE gastos.fecha = fechas.ID AND gastos.tipo_pago = 'vale' AND fechas.num_sem = '$id_num_sem'";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result);
    return number_format($row[0],2);
}

    //  Este codigo formatea la hora a 5 digitos
    
    // $hora_inicial = $fila['hora_inicial'];
    // $hora_inifmt = str_pad(substr($hora_inicial, 0, 5), 4, '0', STR_PAD_LEFT);
    // $hora_final = $fila['hora_final'];
    // $hora_finfmt = str_pad(substr($hora_final, 0, 5), 4, '0', STR_PAD_LEFT);
    