

<?php require("header.php"); ?>


<!---------- Nav Bar ------------------->
<?php require("topbar.php"); ?>
<!----------Fin de Nav Bar ------------->



<!------- titulo semana -------------->
<div class="container text-center" >
    <!-- esta variable viene del archvio reqUnaSemana.php -->
    <div class="row">
        <h1>Semana <?php print_r($id_num_sem); ?></h1>
    </div>
</div>
<!------- ----------------------------------->


<!------- boton Generar PDF y Nuevo dia-------------->
    <div class="container">
        <div class="row m-4 ">
            <div class="col">
                <!-- boton nuevo dia -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo Día</button>
            </div>

                <!-- boton generar PDF -->
                <!-- esta variable viene del archvio reqUnaSemana.php -->
            <div class="col">
                <a href="reportePDF.php?id=<?php print_r($id_num_sem);?>" name="" target="_blank" class="btn btn-primary">Generar PDF</a>
            </div>
        </div>
    </div>
<!------- ----------------------------------->




<!---------------- Modal Form Nuevo dia ------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!---------header------------------------------->
            <!-- esta variable viene del archvio reqUnaSemana.php -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Día Usuario: <?php echo($varsesion); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!---------header------------------------------->

            <!---------body------------------------------->          
            <div class="modal-body">

                <form action="" method="POST" id="frm_nuevo_dia">

                    <div class="form-floating mb-3">

                        <input required type="date" class="form-control" id="fecha_dia" name="fecha_dia" placeholder="" >
                        <label for="fecha_dia">Ingresa una fecha </label>

                        <!-- esta variable viene del archvio reqUnaSemana.php -->
                        <input type="hidden" value="<?php print_r($id_num_sem); ?>" name="id_num_sem">
                        <input type="hidden" value="<?php echo($varsesion); ?>" name="usuario">
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

<!-- row-cols-1 row-cols-md-3 gy-5 -->


<!------- cards dias de la  semana -------------->

<div class="container ">
    <div class="row row-cols-md-3 gy-5">

        <!-- este array viene del archivo reqUnaSemana.php -->
        <?php foreach($res as $row): ?>
            <div class="">
                <div class="card h-100 shadow p-3 mb-5 bg-body-tertiary rounded">

                    <!-- Sección azul con la fecha  ----------------------------->
                        <!-- Este codigo formatea la fecha para que aparezca tipo: lunes 10 octubre 2023 -->
                        <?php
                            $fecha = $row['fecha'];
                            $fecha1 = strtotime($fecha);                          
                            setlocale(LC_ALL, "es-Mx.UTF-8");
                            $fechaFMT = strftime("%A", $fecha1)." ".strftime("%d", $fecha1)." ".strftime("%B", $fecha1)." ".strftime("%Y", $fecha1);
                        ?>
                    <h4 class="card-title text-center bg-primary-subtle"><?php echo $fechaFMT ?> </h4>
                    
                    <!-- header Actividades accion click = abre modal para agregar actividad -->
                    
                    <div class="card-header bg-secondary-subtle" data-bs-toggle="modal" data-bs-target="#nuevaActividadModal" onclick="escribir_fecha_modal(<?php echo $row['ID'];?>)">
                                        
                        <h5>Actividades</h5>
                        
                    </div>
                
                    <div class="card-body table-responsive" id="dayCard">
                        <!-- Este codigo php hace la peticion a la base de datos a todas las actividades de acuerdo al id de fecha  -->
                        <?php
                        $id_fecha = $row['ID']; 
                        require ("conexion.php");
                        $sql = "SELECT * FROM actividades WHERE ID_fecha = $id_fecha";
                        $res = mysqli_query($conexion, $sql);
                        
                        ?>

                        <!----------------- Tabla de Actividades ------------------------>
                        <table class="table table-hover table-striped table-sm table-bordered" >
                            <thead class="table-info">
                                <th scope="col" class="text-center">Cliente</th>
                                <th scope="col" class="text-center">Orden de Servicio</th>
                                <th scope="col" class="text-center">hora inicial</th>
                                <th scope="col" class="text-center">hora final</th>
                                <th scope="col" class="text-center"></th>
                            </thead>
                            <?php foreach($res as $fila):?>
                                <?php
                                $hora_inicial = $fila['hora_inicial'];
                                $hora_inifmt = str_pad(substr($hora_inicial, 0, 5), 4, '0', STR_PAD_LEFT);
                                $hora_final = $fila['hora_final'];
                                $hora_finfmt = str_pad(substr($hora_final, 0, 5), 4, '0', STR_PAD_LEFT);
                                ?>
                            <tr>
                                <td class="text-center"><?php echo $fila['cliente'] ?></td>
                                <td class="text-center"><?php echo $fila['os'] ?></td>
                                <td class="text-center"><?php echo $hora_inifmt ?></td>
                                <td class="text-center"><?php echo $hora_finfmt ?></td>
                                <td class="text-center"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg></a></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                        <!-----------------Fin de la Tabla de Actividades ------------------------>
                    </div> 

                    <!--- Card seccion GASTOS ---------------------------------->

                    <div class="card-header bg-secondary-subtle" data-bs-toggle="modal" data-bs-target="#nuevoGastoModal" onclick="escribir_fecha_modal2(<?php echo $row['ID']; ?>)">
                        <h5>Gastos</h5>
                    </div>

                    <div class="card-body table-responsive" id="dayCardGastos">
                    <?php
                        $id_fecha = $row['ID']; 
                        require ("conexion.php");
            
                        $sql = "SELECT * FROM gastos WHERE fecha = $id_fecha";
                        $res = mysqli_query($conexion, $sql);
                        ?>
                        <table class="table table-hover table-striped table-sm table-bordered">
                            <thead class="table-info">
                                <th scope="col" class="text-center">Concepto</th>
                                <th scope="col" class="text-center">Total</th>
                                <th scope="col" class="text-center">Forma de Pago</th>
                                <th scope="col" class="text-center"></th>

                            </thead>
                            <?php foreach($res as $fila):?>
                            <tr>
                                <td class="text-center"><?php echo $fila['concepto'] ?></td>
                                <td class="text-center">$ <?php echo $fila['total'] ?>.00</td>
                                <td class="text-center"><?php echo $fila['tipo_pago'] ?></td>
                                <td class="text-center"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg></a></td>
                            </tr>
                            <?php endforeach;?>
                        </table>  
                    </div> 
                    <!-- Card seccion FOOTER ---------------------------->
                    <div class="card-footer bg-primary-subtle">
                                                
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
               
                <h3 class="modal-title fs-5" id="exampleModalLabel">Agregar Nueva Actividad a la fecha: <span id="span_fecha_modal"></span> </h3>
                               
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
                        <input type="hidden" value="" id="id_fecha" name="id_fecha">
                        <input type="hidden" value="<?php echo($varsesion); ?>" id="usuario" name="usuario">

                                        
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





<!-- Modal Nuevo Gasto -------------------------------->
<div class="modal fade" id="nuevoGastoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!---------header------------------------------->
            <!-- el span sirve para pintar por innerHTML la fecha que corresponde al ID del dia esta funcion js se encuantra en: semana.js // function escribir_fecha_modal(ID) -->
            <div class="modal-header">
               
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Gasto a la fecha: <span id="span_fecha_modal2"></span> </h1>
                               
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <!---------header------------------------------->
            
            <!---------body formulario------------------------------->  

            <div class="modal-body">
                <form action="" method="POST" id="frm_nuevo_gasto">

                    <div class="form-floating mb-3">                                              
                        <input required type="text" class="form-control" id="concepto" name="concepto" placeholder="Concepto" >
                        <label for="cliente">Concepto</label>
                    </div>

                    <div class="form-floating mb-3"> 
                        <input required type="number" class="form-control" id="total" name="total" placeholder="Total" >
                        <label for="os">Total mxn</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input required type="text" class="form-control" id="formapago" name="formapago" placeholder="Forma de Pago" >
                        <label for="hini">Forma de Pago</label>
                    </div>

                        <!-- en este input se carga el value, del id de la fecha conla funcion js: function escribir_fecha_modal(ID) del archivo // semana.js  -->
                        <input type="hidden" value="" id="id_fecha2" name="id_fecha2">
                        <input type="hidden" value="<?php echo($varsesion); ?>" id="usuario" name="usuario">

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                        <button id="btn_frm_add_gasto" type="button" class="btn btn-primary">Guardar</button>

                    </div>

                </form>
            </div>
            <!---------body------------------------------->          
        </div>
    </div>
</div>
<!--FIN Modal Nuevo Gasto ----------------------------->






<script src="semana.js"></script>

<?php require("footer.php"); ?>
