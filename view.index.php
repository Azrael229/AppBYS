

<?php require("header.php"); ?>



<!---------- Nav Bar ------------------->
<?php require("topbar.php"); ?>
<!----------Fin de Nav Bar ------------->


<!------- titulo gastos 2023 -------------->
    <div class="container text-center" >
        <div class="row">
            <h1>GASTOS 2023</h1>
        </div>

    </div>
<!------- ----------------------------------->
 


<!------- boton añadir archivo semanal -------------->

    <div class="container">
        <div class="row m-4 justify-content-center">  
            <div class="col-3 w-auto">
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>archivo semanal</button>
            </div>
        </div>

    </div>
<!--------------------------------------------------->

  


<!---------------- Modal nueva semana ------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                
            <!---------header------------------------------->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva semana Usuario: <span><?php echo ($varsesion)?></span></h1>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--------- fin de header------------------------------->

            <!---------body  form------------------------------->
            
            <div class="modal-body">
                <form action="" method="POST" id="frmArchSem">

                    <div class="form-floating mb-3">
                        <input required type="number" class="form-control" id="nuemro_semana" name="num_sem" placeholder="Ingresa el número de semana" >
                        <label for="nuemro_semana">Ingresa el número de semana</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="hidden" class="form-control" id="usuario" name="usuario" value="<?php echo ($varsesion)?>" >
                        
                    </div>
                    <br>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="btnformArchSem"type="button" class="btn btn-primary">Guardar</button>              
                    </div>
                
                </form>
            </div>
            <!---------fin de body form------------------------------->

        </div>
    </div>
</div>
<!----------------Fin  Modal Nueva semana------------------------------->




<!------- Tabla dinamica de archivos semanales -------------->

    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-8 list-group list-group-flush shadow p-2 mb-5 bg-body-tertiary rounded">

                <?php foreach($res as $row): ?>
                    <a href="semana.php?id=<?php echo $row[0] ?>" name="<?php echo $row[0] ?>" class="list-group-item list-group-item-action list-group-item-light">Semana <?php echo $row[0] ?></a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>   
<!------- ------------------------------------------>




<script src="cod.js"></script>
<?php require("footer.php"); ?>


