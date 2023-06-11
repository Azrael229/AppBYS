<?php


    require ("conexion.php");
    $id = isset($_POST["ID"]) ? $_POST["ID"] : "";
    // $data = file_get_contents("php.//input");
    print_r($id);

    $statement = $conexion->prepare("SELECT * FROM semana WHERE ID = :id");
    $statement->bindParam(":id", $id);
    $statement->execute();
    $resulatdo = $statement->fetch(PDO::FETCH_ASSOC);
    print_r($resulatdo);
?>