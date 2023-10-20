<?php
    // Esta variable viene de semana.view.php al hacer click en eliminar la gasto 
   
    // este GET consigue el id de la URL 
        $idGasto = ($_GET['id']);
        // echo $idFecha;
        
        require ("conexion.php");
    
        $sql = "DELETE FROM gastos WHERE ID = $idGasto";
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
    
        // Redirigir a la página anterior
        header('Location: ' . $_SERVER['HTTP_REFERER']);                                        
   



?>