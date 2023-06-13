<?php require("header.php"); ?>



<!------- titulo semana -------------->
<div class="container text-center" >
        <div class="row">
            <h1>Semana <?php print_r($id_num_sem); ?></h1>
        </div>

    </div>
<!------- ----------------------------------->


<!------- cards dias de la  semana -------------->
<div class="container">
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach($resultado as $row): ?>
        <div class="col">
            <div class="card h-100">
    
                <h5 class="card-title text-center"><?php echo $row['fecha'] ?> </h5>

                <div class="card-header">
                    <h6>Actividades</h6>
                    
                </div>
        
                <div class="card-body">
        
                    <?php
                    $id_fecha = $row['ID']; 
                    require ("conexion.php");
        
                    $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
                    $statement->execute();
                
                    $res = $statement->fetchAll();
                    ?>
        
                    <?php foreach($res as $fila):?>
                    <p> <?php echo $fila['cliente'] ?></p>
                    <?php endforeach;?>
                </div> 

                <div class="card-header">
                    <h6>Gastos</h6>
                </div>

                <div class="card-body">
                <?php
                    $id_fecha = $row['ID']; 
                    require ("conexion.php");
        
                    $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
                    $statement->execute();
                
                    $res = $statement->fetchAll();
                    ?>
        
                    <?php foreach($res as $fila):?>
                    <p> <?php echo $fila['concepto'] ?></p>
                    <?php endforeach;?>
                </div> 

                <div class="card-footer">
                        
                        
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!------- ----------------------------------->





<?php require("footer.php"); ?>
