<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=gastos_bys', 'root', '');
    // echo "Conexión OK";
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();

}

?>