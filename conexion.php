<?php
// para conectar con la BD del hosting 
// ('mysql:host=localhost;dbname=BD_solusoft', 'israelprogramador', '744920lovepass')

// para conectar con la BD de localhost
// ('mysql:host=localhost;dbname=gastos_bys', 'root', '')


//     $conexion = new PDO('mysql:host=localhost;dbname=gastos_bys', 'root', '');
//     // echo "Conexión OK";
//    (PDOException $e)
//     echo "Error: " . $e->getMessage();

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




// $conexion = new mysqli($servername, $username, $password, $dbname);
$conexion = new mysqli($servernameR, $usernameR, $passwordR, $dbnameR);


// Verifica la conexión
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}



?>