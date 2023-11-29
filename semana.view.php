

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
                <!-- boton generar PDF -->
                <!-- esta variable viene del archvio reqUnaSemana.php -->
            <div class="col w-auto">
                <a href="reportePDF.php?id=<?php print_r($id_num_sem);?>" name="" target="_blank" class="btn btn-primary">Generar PDF</a>
            </div>
        </div>
    </div>
<!------- ----------------------------------->




<!------- cards dias de la  semana -------------->

<div class="container w-auto">
    <div class="row gy-5">

        <!-- este array viene del archivo reqUnaSemana.php -->
        <?php foreach($res as $row): ?>
            <div class="w-auto">
                <div class="card h-100 shadow p-2 mb-6 bg-body-tertiary rounded m-3 w-auto">


                    <!-- Sección azul con la fecha  ----------------------------->
                        <div class=" bg-primary-subtle p-2 mb-3">
                            <!-- Est Funcion formatea la fecha para que aparezca tipo: lunes 10 octubre 2023  declarada en reqUnaSemana.php -->
                            <?php $fechaFMT = fechaFMT($row['fecha']);?>
                            <h4 class="card-title text-center"><?php echo $fechaFMT ?> </h4>
                        
                            <hr width="90%" style="margin: auto; opacity: 0.08;" class="mb-2">


                            <!--Seccion Azul informacion de horarios y tiempo extra -->

                            <div class="row">
                                <div class="col w-auto">
                                    <!-- boton Horarios => abre modal para ingresar por input los horarios cada dia  -->
                                    <!-- => pasa el ID de la fecha a la funcion idfecha_modahorarios a semana.js -->
                                    <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalHorarios" onclick="idfecha_modahoraios(<?php echo $row['ID'];?>)">Horarios</button>
                                </div>
                            </div>

                            <!-- Aqui se pintan la hora de entrada y la hora de salida  -->
                            <div class="row p-1">
                                <div class="col">Entrada: <strong><span><?php echo $row['entrada']?></span></strong></div>
                                <div class="col">Salida: <strong><span><?php echo $row['salida']?></span></strong></div>         
                            </div>
                            <!-- ----------------------------------------------------- -->
                            <!-- Sección donde aparecen los resultddos del total de horas extras y el importe segun el precio. estas funciones se procesan en el archivo funciones.php -->
                                                    
                            <div class="row p-1">
                                <div class="col">T. Extra: <strong><span><?php echo $row['extras']; ?></span></strong> </div>
                                <div class="col">Total <strong><span>$ <?php echo $row['importeTE']; ?></span></strong> </div>
                            </div>


                        </div>
                    <!-- ---------fin de la seccion Azul -------------------------------------------------->
                                       


                    <!-- header Gris DIV Actividades accion click = abre modal para agregar actividad funcion declarada en semana.js -> reqUnaFecha.php aqui se genera el query-->                 
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

                    <!---------------------------------------------------- Tabla de Actividades ------------------------>
                        <!-- -------------Encabezado ------------------------>
                        <table class="table table-hover table-striped table-sm table-bordered" >

                            <thead class="table-info">
                                <th scope="col" class="text-center">Cliente</th>
                                <th scope="col" class="text-center">Ubicación</th>
                                <th scope="col" class="text-center">O.S.</th>
                                <th scope="col" class="text-center">Vehículo</th>
                                <th scope="col" class="text-center"></th>
                            </thead>

                            <!------------ Datos de tabla ---------------------------------------------->
                            <?php foreach($res as $fila):?>
                                
                            <tr>
                                <td class="text-center"><?php echo $fila['cliente'] ?></td>
                                <td class="text-center"><?php echo $fila['ubicacion'] ?></td>
                                <td class="text-center"><?php echo $fila['os'] ?></td>
                                <td class="text-center"><?php echo $fila['vehiculo'] ?></td>
                                <td class="text-center">
                                    <a href="eliminar_actividad.php?id=<?php echo $fila['ID'] ?>" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                    </a>
                                </td>
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

                    <!-- -------------Encabezados de tabla ------------------------>
                        <table class="table table-hover table-striped table-sm table-bordered">
                            <thead class="table-info">
                                <th scope="col" class="text-center">Concepto</th>
                                <th scope="col" class="text-center">Notas</th>
                                <th scope="col" class="text-center">Total</th>
                                <th scope="col" class="text-center">Forma de Pago</th>
                                <th scope="col" class="text-center"></th>

                            </thead>
                            <!-- -------------Datos de tabla ------------------------>
                            <?php foreach($res as $fila):?>
                            <tr>
                                <td class="text-center"><?php echo $fila['concepto'] ?></td>
                                <td class="text-center"><?php echo $fila['notas'] ?></td>
                                <td class="text-center">$ <?php echo number_format($fila['total'],2) ?></td>
                                <td class="text-center"><?php echo $fila['tipo_pago'] ?></td>
                                <td class="text-center">
                                    <a href="eliminar_gasto.php?id=<?php echo $fila['ID'] ?>" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                    </a>
                                </td>
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
                        <input required type="text" class="form-control" id="cliente" name="cliente" placeholder="Cliente" maxlength="15">
                        <label for="cliente">Cliente</label>
                        <small class="form-text text-muted">Máximo 15 caracteres</small>
                    </div>

                    <div class="form-floating mb-4">
                        <div class="mb-3">
                            <label for="vehiculo" class="form-label">Vehículo</label>
                            <select class="form-select form-select" name="vehiculo" id="vehiculo" required>
                                <option value="HB">Hilux Blanca</option>
                                <option value="N">Nissan</option>
                                <option value="B">Camión Azul</option>
                                <option value="C">Camión Blanco</option>
                                <option value="P">Camión Palomo</option>
                                <option value="HG">Hilux Gris</option>
                                <option value="N/A">No Aplica</option>
                            </select>
                            <small class="form-text text-muted">Utlizado durante la actividad</small>
                        </div>
                    </div>

                    <div class="form-floating mb-4">
                        <input required type="text" class="form-control" id="ubi" name="ubi" placeholder="ubicacion" maxlength="10">
                        <label for="ubi">Ciudad</label>
                        <small class="form-text text-muted">Preferencia Abreviada ej. SLP, Qro, SMA...   Máx 20 caracteres</small>
                    </div>

                    <div class="form-floating mb-3"> 
                        <input required type="number" class="form-control" id="os" name="os" placeholder="número de orden de servicio" oninput="limitarCaracteres()">
                        <label for="os">Número de orden de servicio</label>
                        <small class="form-text text-muted">Últimos 3 números / sin O.S. 0000</small>
                    </div>

                        <!-- en este input se carga el value, del id de la fecha conla funcion js: function escribir_fecha_modal(ID) del archivo // semana.js  -->
                        <input type="hidden" value="" id="id_fecha" name="id_fecha">
                        <input type="hidden" value="<?php echo($varsesion); ?>" id="usuario" name="usuario">
                        <input type="hidden" value="<?php echo($id_num_sem); ?>" id="num_sem" name="num_sem">
                        
                                        
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
                        <input required type="text" class="form-control" id="concepto" name="concepto" placeholder="Concepto" maxlength="15">
                        <label for="concepto">Concepto</label>
                        <small class="form-text text-muted">Máximo 15 caracteres</small>

                    </div>

                    <div class="form-floating mb-3">                                              
                        <input required type="text" class="form-control" id="notas" name="notas" placeholder="notas" maxlength="25">
                        <label for="notas">Notas</label>
                        <small class="form-text text-muted">Máximo 25 caracteres</small>
                    </div>

                    <div class="form-floating mb-3"> 
                        <input required type="number" step="0.01" class="form-control" id="total" name="total" placeholder="Total" >
                        <label for="total">Total mxn</label>
                        <small class="form-text text-muted">Ej. 300.68 ingresa solo 2 decimales</small>
                    </div>


                    <div class="form-floating mb-3 border border-secondary rounded p-2">

                        <div class="row">

                            <div class="mb-4">
                                <span class="">Froma de Pago</span>
                            </div><br>

                        </div>

                        <div class="row">

                            <div class="col form-switch form-switch-inline ms-3">
                                <input type="radio" value="tdc" class="form-check-input" role="switch" name="from_pago" id="btn-check-outlined1" autocomplete="off">
                                <label  for="btn-check-outlined1">TDC</label>
                            </div>

                            <div class="col form-switch form-switch-inline">                              
                                <input type="radio" value="efectivo" class="form-check-input" role="switch" name="from_pago" id="btn-check-outlined" autocomplete="off">
                                <label for="btn-check-outlined">Efectivo</label>        
                            </div>

                            <div class="col form-switch form-switch-inline">
                                <input type="radio" value="vale" class="form-check-input" role="switch" name="from_pago" id="btn-check-outlined2" autocomplete="off">
                                <label  for="btn-check-outlined2">Vale</label>
                            </div>

                        </div>

                    </div>

                        <!-- en este input se carga el value, del id de la fecha conla funcion js: function escribir_fecha_modal(ID) del archivo // semana.js  -->
                        <input type="hidden" value="" id="id_fecha2" name="id_fecha2">
                        <input type="hidden" value="<?php echo($varsesion); ?>" id="usuario" name="usuario">
                        <input type="hidden" value="<?php echo($id_num_sem); ?>" id="num_sem" name="num_sem">


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



            
<!---------------- Modal Form Horarios de semana.view.php  ------------------------------->
<!-- => abre el modal para ingresar en input el horario de entrada y salida del dia  -->
<div class="modal fade" id="modalHorarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!---------header------------------------------->
        
                <!-- esta variable viene del archvio reqUnaSemana.php -->
            <div class="modal-header">
               
                <h1 class="modal-title fs-5" id="exampleModalLabel">Horarios <span id="sp_fech_horario"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!---------header------------------------------->

            <!---------body------------------------------->          
            <div class="modal-body">

                <form action="insertar_horarios.php" method="POST" id="frm_horarios">

                    <div class="form-floating mb-3">
                        <input required type="time" class="form-control" id="h_entrada" name="h_entrada" placeholder="" >
                        <label for="h_entrada">Hora de Entrada</label>
                    </div>   
                      
                    <div class="form-floating mb-3">
                        <input required type="time" class="form-control" id="h_salida" name="h_salida" placeholder="" >
                        <label for="h_salida">Hora de Salida</label>
                    </div>

                    <div class="form-floating mb-3">    
                        <!-- esta variable viene del archvio reqUnaSemana.php -->
                        <!-- estos dos input pintan su valor desde function idfecha_modahoraios(ID) semana.js -->
                        <input type="hidden" value="" name="input_fecha"  id="input_fecha" >
                        <input type="hidden" value="" name="id_fecha_horarios" id="id_fecha_horarios">
                        <input type="hidden" value="<?php echo($varsesion); ?>" name="usuario">

                    </div> 
                   <br>

                   <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                   </div>
                </form>
            </div>
            <!---------body------------------------------->
                
        </div>
    </div>
</div>
<!---------------- Modal ------------------------------->


<script src="semana.js"></script>

<?php require("footer.php"); ?>
