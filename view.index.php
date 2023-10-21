

<?php require("header.php"); ?>



<!---------- Nav Bar ------------------->
<?php require("topbar.php"); ?>
<!----------Fin de Nav Bar ------------->


<!------- titulo gastos 2023 -------------->
    <div class="container text-center" >
        <div class="row">
            <?php $year = 2023;?>
            <h1>GASTOS <?php echo $year;?></h1>
        </div>

    </div>
<!------- ----------------------------------->
 


<!------- boton añadir archivo semanal -------------->

    <div class="container">
        <div class="row m-4 justify-content-center">  
            <div class="col-3 w-auto">
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>Nueva Semana</button>
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
                <form action="insertSemana.php" method="POST" >

                    <div class="form-floating mb-3">
                        <input required type="number" class="form-control" id="nuemro_semana" max="52" name="num_sem" placeholder="Ingresa el número de semana" >
                        <label for="nuemro_semana">Ingresa el número de semana</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="hidden" class="form-control" id="usuario" name="usuario" value="<?php echo ($varsesion)?>" >
                        <input type="hidden" class="form-control" id="year" name="year" value="<?php echo $year;?>" >
                        
                    </div>
                    <br>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>              
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
            
            <!-- <div class="col-8 list-group list-group-flush shadow p-2 mb-5 bg-body-tertiary rounded"> -->
            
                
                
                <table class="table table-hover  table-sm " >
                    
                    <?php foreach($res as $row): ?>
                        <thead class="table">
                            <th scope="col" class="text-left">
                                <a href="semana.php?id=<?php echo $row[0] ?>"  class="list-group-item list-group-item-action list-group-item-light">Semana <?php echo $row[0] ?> </a>

                            </th>

                            <th scope="col" class="text-center"  >
                                <span onclick="confirmar(<?php echo $row[0] ?>)" class="list-group-item list-group-item-action list-group-item-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>
                                </span>
                            <script>
                                function confirmar(num){
                                    if (confirm("ATENCION: Se borrarán todos los días de esta semana incluyendo registro de avtividades, horarios y gastos")) {
                                    // Código para continuar
                                    window.location.href = "eliminar_semana.php?id="+num;
                                    
                                    } else{
                                        window.close();
                                    }
                                }
                            </script>
                                
                                
                                
                            </th>
                            
                        </thead>
                    <?php endforeach; ?>
                </table>
        </div>
    </div>   
<!------- ------------------------------------------>




<!-- <script src="cod.js"></script> -->
<?php require("footer.php"); ?>


