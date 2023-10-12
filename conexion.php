<?php
//para correr la app de manera local
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gastos_bys";


//para correr la app en un hosting
$servernameR = "localhost";
$usernameR = "israelprogramador";
$passwordR = "744920lovepass";
$dbnameR = "BD_solusoft";





// conexion  local 
// $conexion = new mysqli($servername, $username, $password, $dbname);


//conexion Remota 
$conexion = new mysqli($servernameR, $usernameR, $passwordR, $dbnameR);




// Verifica la conexión
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}



?>