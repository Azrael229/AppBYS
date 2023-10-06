<?php
// para conectar con la BD del hosting 
// ('mysql:host=localhost;dbname=BD_solusoft', 'israelprogramador', '744920lovepass')

// para conectar con la BD de localhost
// ('mysql:host=localhost;dbname=gastos_bys', 'root', '')

try{
    $conexion = new PDO('mysql:host=localhost;dbname=BD_solusoft', 'israelprogramador', '744920lovepass');
    // echo "Conexión OK";
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();

}

?>