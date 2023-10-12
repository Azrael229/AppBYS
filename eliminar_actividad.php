<?php
    // Esta variable viene de semana.view.php al hacer click en eliminar la actividad 
   
    // este GET consigue el id de la URL 
        $idFecha = ($_GET['id']);
        // echo $idFecha;
        
        require ("conexion.php");
    
        $sql = "DELETE FROM actividades WHERE ID = $idFecha";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
    
        // Redirigir a la página anterior
        header('Location: ' . $_SERVER['HTTP_REFERER']);                                        
   



?>





















<!-- $idFecha = ($_GET['id']);
        // echo $idFecha;
        
        require ("conexion.php");

        $sql = "DELETE FROM actividades WHERE ID = $idFecha";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);

        // Redirigir a la página anterior
        header('Location: ' . $_SERVER['HTTP_REFERER']);  -->