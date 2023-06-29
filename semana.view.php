<?php require("header.php"); ?>



<!------- titulo semana -------------->
<div class="container text-center" >
        <div class="row">
            <h1>Semana <?php print_r($id_num_sem); ?></h1>
        </div>

    </div>
<!------- ----------------------------------->

<!------- boton añadir + Nuevo dia abre Modal -------------->
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




<!---------------- Modal Form Nuevo dia ------------------------------->
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
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach($resultado as $row): ?>


        <div class="col">
            <div class="card h-100">

                <!-- Sección azul con la fecha  -->
                <h4 class="card-title text-center bg-info-subtle"><?php echo $row['fecha']; ?> </h4>

                <!-- header Actividades accion click = abre modal para agregar actividad -->
                
                <div class="card-header" data-bs-toggle="modal" data-bs-target="#nuevaActividadModal" onclick="escribir_fecha_modal(<?php echo $row['ID']; ?>)">
                                       
                    <h5>Actividades</h5>
                    
                </div>
               
                <div class="card-body">
                    <!-- Este codigo php hace la peticion a la base de datos a todas las actividades de acuerdo al id de fecha  -->
                    <?php
                    $id_fecha = $row['ID']; 
                    require ("conexion.php");
        
                    $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
                    $statement->execute();
                
                    $res = $statement->fetchAll();
                    ?>
                    <table class="table table-hover table table-sm">
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">O.S.</th>
                            <th scope="col">hora inicial</th>
                            <th scope="col">hora final</th>
                        </tr>
                        <?php foreach($res as $fila):?>
                        <tr>
                            <td><?php echo $fila['cliente'] ?></td>
                            <td><?php echo $fila['os'] ?></td>
                            <td><?php echo $fila['hora_inicial'] ?></td>
                            <td><?php echo $fila['hora_final'] ?></td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg></td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </div> 

                <div class="card-header" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <h5>Gastos</h5>
                </div>

                <div class="card-body">
                <?php
                    $id_fecha = $row['ID']; 
                    require ("conexion.php");
        
                    $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
                    $statement->execute();
                
                    $res = $statement->fetchAll();
                    ?>
                    <table class="table table-hover table table-sm">
                        <tr>
                            <th scope="col">Concepto</th>
                            <th scope="col">Total</th>
                            <th scope="col">Forma de Pago</th>
                        </tr>
                        <?php foreach($res as $fila):?>
                        <tr>
                            <td><?php echo $fila['concepto'] ?></td>
                            <td>$ <?php echo $fila['total'] ?>.00</td>
                            <td><?php echo $fila['tipo_pago'] ?></td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg></td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                        
                </div> 

                <div class="card-footer">
                        
                        
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-------FIN cards dias de la  semana ----------------------------------->





<!-- Modal Nueva actividad -------------------------------->

<div class="modal fade" id="nuevaActividadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!---------header------------------------------->
            <!-- el span sirve para pintar por innerHTML la fecha que corresponde al ID del dia esta funcion js se encuantra en: semana.js // function escribir_fecha_modal(ID) -->
            <div class="modal-header">
               
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nueva Actividad a la fecha: <span id="span_fecha_modal"></span> </h1>
                               
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <!---------header------------------------------->
            

            <!---------body formulario------------------------------->  

            <div class="modal-body">
                <form action="" method="POST" id="frm_nueva_actividad">

                    <div class="form-floating mb-3">                                              
                        <input required type="text" class="form-control" id="cliente" name="cliente" placeholder="Cliente" >
                        <label for="cliente">Cliente</label>
                    </div>

                    <div class="form-floating mb-3"> 
                        <input required type="number" class="form-control" id="os" name="os" placeholder="número de orden de servicio" >
                        <label for="os">Número de orden de servicio</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input required type="time" class="form-control" id="hini" name="hini" placeholder="hora inicial" >
                        <label for="hini">hora Inicial</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input required type="time" class="form-control" id="hfin" name="hfin" placeholder="hora Final" >
                        <label for="hini">hora Final</label>
                    </div>

                        <!-- en este input se carga el value, del id de la fecha conla funcion js: function escribir_fecha_modal(ID) del archivo // semana.js  -->
                        <input type="text" value="" id="id_fecha" name="id_fecha">

                                        
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                        <button id="btn_frm_add_actividad" type="button" class="btn btn-primary">Guardar</button>

                    </div>

                </form>
            </div>
            <!---------body------------------------------->          
        </div>
    </div>
</div>

<!--FIN Modal Nueva actividad ----------------------------->



<!------- boton Generar PDF -------------->
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
