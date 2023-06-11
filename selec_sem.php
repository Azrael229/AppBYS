<?php

    $id = isset($_POST["ID"]) ? $_POST["ID"] : "";
    // $data = file_get_contents("php.//input");
    print_r($id);


    require ("conexion.php");
    $statement = $conexion->prepare("SELECT * FROM semana WHERE ID = :id");

    $statement->bindParam(":id", $id);
    $statement->execute();
    $resultado = $statement->fetch(PDO::FETCH_ASSOC);

    print_r($resultado);
?>