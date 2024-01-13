<?php

 


// // Crea una función que recibe el número de semana y el año
// function obtener_dias_semana($num_sem, $year) {
//   // Crea un array vacío para guardar los días
//   $dias = array();
//   // Usa un bucle for para recorrer los días de la semana
//   for ($i = 1; $i <= 7; $i++) {
//     // Usa la función date para obtener la fecha correspondiente al día de la semana
//     // El primer parámetro es el formato de la fecha, que es "Y-m-d" (año-mes-día)
//     // El segundo parámetro es el timestamp, que se obtiene usando la función strtotime
//     // La función strtotime convierte una cadena de texto en un timestamp
//     // La cadena de texto es "$año-W$semana-$i", que significa el año, la semana y el día dados
//     $fecha = date("Y-m-d", strtotime("$year-W$num_sem-$i"));
//     // Añade la fecha al array de días
//     $dias[] = $fecha;
//   }
//   // Devuelve el array de días
//   return $dias;
// } 

// $imp = obtener_dias_semana(1, 2024);
// print_r ($imp);





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

$imp = obtener_dias_semana(1, 2024);
print_r($imp);