<?php require("header.php"); ?>



<!------- titulo semana -------------->
<div class="container text-center" >
        <div class="row">
            <h1>Semana <?php print_r($id_num_sem); ?></h1>
        </div>

    </div>
<!------- ----------------------------------->

<!------- boton añadir + -------------->
<div class="container">
    <div class="row justify-content-center" >
        <div class="col">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>Nuevo Día</button>
        </div>
    </div>
</div>
<!------- ----------------------------------->

<!---------------- Modal ------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!---------header------------------------------->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Día</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!---------header------------------------------->

            <!---------body------------------------------->          
            <div class="modal-body">
                <form action="" method="POST" id="frm_nuevo_dia">
                    <div class="form-floating mb-3">
                        <input required type="date" class="form-control" id="fecha_dia" name="fecha_dia" placeholder="" >
                        <label for="fecha_dia">Ingresa una fecha </label>
                        <input type="hidden" value="<?php print_r($id_num_sem); ?>" name="id_num_sem">
                   </div> 
                   <br>

                   <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="btn_frm_nvo_dia"type="button" class="btn btn-primary">Guardar</button>
                   </div>
                </form>
            </div>
            <!---------body------------------------------->
                
        </div>
    </div>
</div>
<!---------------- Modal ------------------------------->




<!------- cards dias de la  semana -------------->
<div class="container">
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach($resultado as $row): ?>
        <div class="col">
            <div class="card h-100">
    
                <h5 class="card-title text-center"><?php echo $row['fecha']; ?> </h5>

                <div class="card-header" onclick="add_act_gast();">
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


<!------- boton añadir + -------------->
<div class="container">
    <div class="row justify-content-end">
        <div class="col-4">
            <button type="button" style="width: 150px;" class="btn btn-primary">Generar PDF</button>
        </div>
    </div>
</div>
<!------- ----------------------------------->

<script src="semana.js"></script>

<?php require("footer.php"); ?>
