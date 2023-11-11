<?php

session_start();
    // error_reporting(0);        
    $varsesion = $_SESSION['usuario'];
    
if ($varsesion == "" || $varsesion == NULL){
    header("Location:login.php");
    die();
}


require('fpdf/fpdf.php');
require('reqUnaSemana.php');
require('funciones.php');



$pdf = new FPDF('L','mm','letter',true);
$pdf->AddPage();
$pdf->SetFont('Arial','',9);



$pdf->Image("img/LOGO B&S2...png", 30,07, 35,0, "png");

// Titulo del reporte y encabezado la variable con el id del nuemro de semana 
$pdf->Cell(0, 2, "BASCULAS Y SOLUCIONES DE MEXICO", 0,1,"C");
$pdf->Ln();

$pdf->Cell(0, 2, "REPORTE DE GASTOS Y TIEMPO EXTRA", 0,1,"C");
$pdf->Ln();
$pdf->Ln();

//datos del usuario y semana
$pdf->SetX(80);
$pdf->Cell(20, 4, "NOMBRE:", 0,0,"");

$res = reqUsuario($varsesion);
foreach($res as $row):
    $pdf->Cell(20, 4, $row['nombre'], 0,0,"");
    $pdf->Ln();
endforeach;
$pdf->SetX(80);
$pdf->Cell(20, 4, "SEMANA:", 0,0,"");
$pdf->Cell(20, 4, $id_num_sem, 0,0,"");

    $semDel = semanaDEL($id_num_sem);
$pdf->Cell(10, 4, "DEL:", 0,0,"");
$pdf->Cell(40, 4, $semDel, 0,0,"");

    $semAL = semanaAL($id_num_sem);
$pdf->Cell(8, 4, "AL:", 0,0,"");
$pdf->Cell(20, 4, $semAL, 0,0,"");
$pdf->Ln();
$pdf->Ln();

//Encabezados
$pdf->SetFillColor(222,222,222);
$pdf->Cell(150, 4, "ACTIVIDADES", 1, 0,"C",1);
$pdf->Cell(100, 4, "GASTOS", 1, 0,"C",1);
$pdf->Ln();

$pdf->Cell(20, 4, "Fecha", 1, 0,"C",1);
$pdf->Cell(35, 4, "Cliente", 1, 0,"C",1);
$pdf->Cell(20, 4, "Ubicación", 1, 0,"C",1);
$pdf->Cell(15, 4, "OS", 1, 0,"C",1);
$pdf->Cell(20, 4, "Horario 24h", 1, 0,"C",1);
$pdf->Cell(20, 4, "Tiempo Extra", 1, 0,"C",1);
$pdf->Cell(20, 4, "Importe T.E.", 1, 0,"C",1);
$pdf->Cell(30, 4, "Descripción", 1, 0,"C",1);
$pdf->Cell(30, 4, "Notas", 1, 0,"C",1);
$pdf->Cell(20, 4, "Forma Pago", 1, 0,"C",1);
$pdf->Cell(20, 4, "Importe", 1, 0,"C",1);
$pdf->Ln();


//  [ID] [fecha] [num_sem] [usuario] [entrada] [salida] [extras] [importeTE]

// columna fecahs
    $pdf->SetFillColor(222,222,222);

    $fechaFMT = colfechas($resultado[0][1]);
    $pdf->Cell(20, 16, $fechaFMT, 1, 0,"C",1);
    $pdf->Ln();
    //martes
    $fechaFMT = colfechas($resultado[1][1]);
    $pdf->Cell(20, 16, $fechaFMT, 1, 0,"C",1);
    $pdf->Ln();
    //miercoles
    $fechaFMT = colfechas($resultado[2][1]);
    $pdf->Cell(20, 16, $fechaFMT, 1, 0,"C",1);
    $pdf->Ln();
    //jueves
    $fechaFMT = colfechas($resultado[3][1]);
    $pdf->Cell(20, 16, $fechaFMT, 1, 0,"C",1);
    $pdf->Ln();
    //viernes
    $fechaFMT = colfechas($resultado[4][1]);
    $pdf->Cell(20, 16, $fechaFMT, 1, 0,"C",1);
    $pdf->Ln();
    //sabado
    $fechaFMT = colfechas($resultado[5][1]);
    $pdf->Cell(20, 16, $fechaFMT, 1, 0,"C",1);
    $pdf->Ln();
    //domingo
    $fechaFMT = colfechas($resultado[6][1]);
    $pdf->Cell(20, 16, $fechaFMT, 1, 0,"C",1);
    $pdf->Ln();




//lunes
// fila  actividades Lunes
    $res = reqActividad($resultado[0][0]);
    $pdf->SetXY(30,40);
    foreach($res as $fila):
        $pdf->SetX(30);

        $pdf->Cell(35, 4, $fila['cliente'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['ubicacion'], 1, 0,"C",0);
        $pdf->Cell(15, 4, $fila['os'] , 1, 0,"C",0);
    
        $pdf->Ln();
        
    endforeach;

    //fila Horarios Lunes
    $res = reqHorasfecha($resultado[0][0]);
    $pdf->SetXY(100,40);
    foreach($res as $fila):

        $pdf->Cell(20, 4, 'E     '.$fila['entrada'], 1, 0,"L",0);
        $pdf->Cell(20, 4, $fila['extras'], 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. $fila['importeTE'], 1, 0,"R",0);
        $pdf->SetXY(100,44);
        $pdf->Cell(20, 4, 'S     '.$fila['salida'], 1, 0,"L",0);
        $pdf->Ln();

    endforeach;

    //fila gastos Lunes
    $id_fecha = $resultado[0][0]; 
    require ("conexion.php");

    $sql = "SELECT * FROM gastos WHERE fecha = $id_fecha";
    $res = mysqli_query($conexion, $sql);
    mysqli_close($conexion);


    $pdf->SetXY(160,40);
    foreach($res as $fila):
        $pdf->SetX(160);

        $pdf->Cell(30, 4, $fila['concepto'] , 1, 0,"C",0);
        $pdf->Cell(30, 4, $fila['notas'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['tipo_pago'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. number_format($fila['total'],2), 1, 0,"R",0);
        $pdf->Ln();

    endforeach;
//fin del Lunes



    //  [ID] [fecha] [num_sem] [usuario] [entrada] [salida] [extras] [importeTE]


// fila  actividades martes
    $res = reqActividad($resultado[1][0]);
    $pdf->SetXY(30,56);
    foreach($res as $fila):
        $pdf->SetX(30);

        $pdf->Cell(35, 4, $fila['cliente'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['ubicacion'], 1, 0,"C",0);
        $pdf->Cell(15, 4, $fila['os'] , 1, 0,"C",0);
    
        $pdf->Ln();
        
    endforeach;


    //fila Horarios martes
    $res = reqHorasfecha($resultado[1][0]);
    $pdf->SetXY(100,56);
    foreach($res as $fila):

        $pdf->Cell(20, 4, 'E     '.$fila['entrada'], 1, 0,"L",0);
        $pdf->Cell(20, 4, $fila['extras'], 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. $fila['importeTE'], 1, 0,"R",0);
        $pdf->SetXY(100,60);
        $pdf->Cell(20, 4, 'S     '.$fila['salida'], 1, 0,"L",0);
        $pdf->Ln();

    endforeach;


    //fila gastos MArtes

    $id_fecha = $resultado[1][0]; 
    require ("conexion.php");

    $sql = "SELECT * FROM gastos WHERE fecha = $id_fecha";
    $res = mysqli_query($conexion, $sql);

    $pdf->SetXY(160,56);
    foreach($res as $fila):
    $pdf->SetX(160);
        
        $pdf->Cell(30, 4, $fila['concepto'] , 1, 0,"C",0);
        $pdf->Cell(30, 4, $fila['notas'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['tipo_pago'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. number_format($fila['total'],2), 1, 0,"R",0);

        $pdf->Ln();

    endforeach;
//fin del Martes


//  [ID] [fecha] [num_sem] [usuario] [entrada] [salida] [extras] [importeTE]


// fila  actividades Miercoles
    $res = reqActividad($resultado[2][0]);
    $pdf->SetXY(30,72);
    foreach($res as $fila):
        $pdf->SetX(30);

        $pdf->Cell(35, 4, $fila['cliente'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['ubicacion'], 1, 0,"C",0);
        $pdf->Cell(15, 4, $fila['os'] , 1, 0,"C",0);
    
        $pdf->Ln();
        
    endforeach;


    //fila HorariosMiercoles
    $res = reqHorasfecha($resultado[2][0]);
    $pdf->SetXY(100,72);
    foreach($res as $fila):

        $pdf->Cell(20, 4, 'E     '.$fila['entrada'], 1, 0,"L",0);
        $pdf->Cell(20, 4, $fila['extras'], 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. $fila['importeTE'], 1, 0,"R",0);
        $pdf->SetXY(100,76);
        $pdf->Cell(20, 4, 'S     '.$fila['salida'], 1, 0,"L",0);
        $pdf->Ln();

    endforeach;


    //fila gastos Miercoles
    $id_fecha = $resultado[2][0]; 
    require ("conexion.php");

    $sql = "SELECT * FROM gastos WHERE fecha = $id_fecha";
    $res = mysqli_query($conexion, $sql);

    $pdf->SetXY(160,72);
    foreach($res as $fila):
        $pdf->SetX(160);

        $pdf->Cell(30, 4, $fila['concepto'] , 1, 0,"C",0);
        $pdf->Cell(30, 4, $fila['notas'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['tipo_pago'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. number_format($fila['total'],2), 1, 0,"R",0);

        $pdf->Ln();

    endforeach;
//fin del Miercoles


//  [ID] [fecha] [num_sem] [usuario] [entrada] [salida] [extras] [importeTE]

// fila  actividades Jueves
    $res = reqActividad($resultado[3][0]);
    $pdf->SetXY(30,88);
    foreach($res as $fila):
        $pdf->SetX(30);

        $pdf->Cell(35, 4, $fila['cliente'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['ubicacion'], 1, 0,"C",0);
        $pdf->Cell(15, 4, $fila['os'] , 1, 0,"C",0);
    
        $pdf->Ln();
        
    endforeach;


    //fila Horarios Jueves
    $res = reqHorasfecha($resultado[3][0]);
    $pdf->SetXY(100,88);
    foreach($res as $fila):

        $pdf->Cell(20, 4, 'E     '.$fila['entrada'], 1, 0,"L",0);
        $pdf->Cell(20, 4, $fila['extras'], 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. $fila['importeTE'], 1, 0,"R",0);
        $pdf->SetXY(100,92);
        $pdf->Cell(20, 4, 'S     '.$fila['salida'], 1, 0,"L",0);
        $pdf->Ln();

    endforeach;


    //fila gastos Jueves
    $id_fecha = $resultado[3][0]; 
    require ("conexion.php");

    $sql = "SELECT * FROM gastos WHERE fecha = $id_fecha";
    $res = mysqli_query($conexion, $sql);

    $pdf->SetXY(160,88);
    foreach($res as $fila):
        $pdf->SetX(160);

        $pdf->Cell(30, 4, $fila['concepto'] , 1, 0,"C",0);
        $pdf->Cell(30, 4, $fila['notas'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['tipo_pago'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. number_format($fila['total'],2), 1, 0,"R",0);

        $pdf->Ln();

    endforeach;
//fin del Jueves


//  [ID] [fecha] [num_sem] [usuario] [entrada] [salida] [extras] [importeTE]

// fila  actividades Viernes
    $res = reqActividad($resultado[4][0]);
    $pdf->SetXY(30,104);
    foreach($res as $fila):
        $pdf->SetX(30);

        $pdf->Cell(35, 4, $fila['cliente'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['ubicacion'], 1, 0,"C",0);
        $pdf->Cell(15, 4, $fila['os'] , 1, 0,"C",0);
    
        $pdf->Ln();
        
    endforeach;


    //fila Horarios Viernes
    $res = reqHorasfecha($resultado[4][0]);
    $pdf->SetXY(100,104);
    foreach($res as $fila):

        $pdf->Cell(20, 4, 'E     '.$fila['entrada'], 1, 0,"L",0);
        $pdf->Cell(20, 4, $fila['extras'], 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. $fila['importeTE'], 1, 0,"R",0);
        $pdf->SetXY(100,108);
        $pdf->Cell(20, 4, 'S     '.$fila['salida'], 1, 0,"L",0);
        $pdf->Ln();

    endforeach;


    //fila gastos Viernes
    $id_fecha = $resultado[4][0]; 
    require ("conexion.php");

    $sql = "SELECT * FROM gastos WHERE fecha = $id_fecha";
    $res = mysqli_query($conexion, $sql);

    $pdf->SetXY(160,104);
    foreach($res as $fila):
        $pdf->SetX(160);

        $pdf->Cell(30, 4, $fila['concepto'] , 1, 0,"C",0);
        $pdf->Cell(30, 4, $fila['notas'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['tipo_pago'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. number_format($fila['total'],2), 1, 0,"R",0);

        $pdf->Ln();

    endforeach;
//fin del Viernes


//  [ID] [fecha] [num_sem] [usuario] [entrada] [salida] [extras] [importeTE]

// fila  actividades Sabado
    $res = reqActividad($resultado[5][0]);
    $pdf->SetXY(30,120);
    foreach($res as $fila):
        $pdf->SetX(30);

        $pdf->Cell(35, 4, $fila['cliente'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['ubicacion'], 1, 0,"C",0);
        $pdf->Cell(15, 4, $fila['os'] , 1, 0,"C",0);
    
        $pdf->Ln();
        
    endforeach;


    //fila Horarios Sabado
    $res = reqHorasfecha($resultado[5][0]);
    $pdf->SetXY(100,120);
    foreach($res as $fila):

        $pdf->Cell(20, 4, 'E     '.$fila['entrada'], 1, 0,"L",0);
        $pdf->Cell(20, 4, $fila['extras'], 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. $fila['importeTE'], 1, 0,"R",0);
        $pdf->SetXY(100,124);
        $pdf->Cell(20, 4, 'S     '.$fila['salida'], 1, 0,"L",0);
        $pdf->Ln();

    endforeach;


    //fila gastos Sabado
    $id_fecha = $resultado[5][0]; 
    require ("conexion.php");

    $sql = "SELECT * FROM gastos WHERE fecha = $id_fecha";
    $res = mysqli_query($conexion, $sql);

    $pdf->SetXY(160,120);
    foreach($res as $fila):
        $pdf->SetX(160);

        $pdf->Cell(30, 4, $fila['concepto'] , 1, 0,"C",0);
        $pdf->Cell(30, 4, $fila['notas'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['tipo_pago'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. number_format($fila['total'],2), 1, 0,"R",0);

        $pdf->Ln();

    endforeach;
//fin del Sabado


//  [ID] [fecha] [num_sem] [usuario] [entrada] [salida] [extras] [importeTE]

// fila  actividades Domingo
    $res = reqActividad($resultado[6][0]);
    $pdf->SetXY(30,136);
    foreach($res as $fila):
        $pdf->SetX(30);

        $pdf->Cell(35, 4, $fila['cliente'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['ubicacion'], 1, 0,"C",0);
        $pdf->Cell(15, 4, $fila['os'] , 1, 0,"C",0);
    
        $pdf->Ln();
        
    endforeach;


    //fila Horarios Domingo
    $res = reqHorasfecha($resultado[6][0]);
    $pdf->SetXY(100,136);
    foreach($res as $fila):

        $pdf->Cell(20, 4, 'E     '.$fila['entrada'], 1, 0,"L",0);
        $pdf->Cell(20, 4, $fila['extras'], 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. $fila['importeTE'], 1, 0,"R",0);
        $pdf->SetXY(100,140);
        $pdf->Cell(20, 4, 'S     '.$fila['salida'], 1, 0,"L",0);
        $pdf->Ln();

    endforeach;


    //fila gastos Domingo
    $id_fecha = $resultado[6][0]; 
    require ("conexion.php");

    $sql = "SELECT * FROM gastos WHERE fecha = $id_fecha";
    $res = mysqli_query($conexion, $sql);

    $pdf->SetXY(160,136);
    foreach($res as $fila):
        $pdf->SetX(160);
        
        $pdf->Cell(30, 4, $fila['concepto'] , 1, 0,"C",0);
        $pdf->Cell(30, 4, $fila['notas'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, $fila['tipo_pago'] , 1, 0,"C",0);
        $pdf->Cell(20, 4, '$ '. number_format($fila['total'],2), 1, 0,"R",0);

        $pdf->Ln();

    endforeach;
//fin del Domingo


//Tabla de Resultados

$pdf->SetXY(100,156);

$pdf->SetFillColor(222,222,222);
$pdf->Cell(30, 4, "Tiempo Extra", 1, 0,"C",1);
$pdf->Cell(30, 4, "Importe T.E.", 1, 0,"C",1);

$pdf->SetXY(100,160);
$totTE = sumSemanalTE($id_num_sem, $varsesion);
$pdf->Cell(30, 4, $totTE, 1, 0,"C",0);

$res = reqUsuario($varsesion);
foreach($res as $row):

    $importeTE = multiplicar($totTE, $row['valorTE']);

    $pdf->Cell(30, 4,'$ '. $importeTE, 1, 0,"R",0);

endforeach;





$pdf->SetXY(235,156);
$pdf->Cell(25, 4, "Total Gastos", 1, 0,"C",1);
$pdf->SetXY(235,160);
$sum = sumaGastosTot($id_num_sem, $varsesion);
$pdf->Cell(25, 4, '$ '. $sum, 1, 0,"R",0);


$pdf->SetXY(170,156);
$pdf->Cell(60, 4, "Reembolso Gastos", 1, 0,"C",1);


$pdf->SetXY(170,160);
$pdf->Cell(35, 4, "Facturados en Efectivo", 1, 0,"C",1);
$pdf->SetXY(205,160);
$sum = sumaGastosEfec($id_num_sem, $varsesion);
$pdf->Cell(25, 4, '$ '. $sum, 1, 0,"R",0);

$pdf->SetXY(170,164);
$pdf->Cell(35, 4, "Vale Azul", 1, 0,"C",1);
$pdf->SetXY(205,164);
$sum = sumaGastosVale($id_num_sem, $varsesion);
$pdf->Cell(25, 4, '$ '. $sum, 1, 0,"R",0);




$pdf->SetLineWidth(0.7);
// horizontales
$pdf->Line(10,32,260,32);
$pdf->Line(10,40,260,40);
$pdf->Line(10,56,260,56);
$pdf->Line(10,72,260,72);
$pdf->Line(10,88,260,88);
$pdf->Line(10,104,260,104);
$pdf->Line(10,120,260,120);
$pdf->Line(10,136,260,136);
$pdf->Line(10,152,260,152);
// verticales
$pdf->Line(10,32,10,152);
$pdf->Line(30,40,30,152);
$pdf->Line(100,40,100,152);
$pdf->Line(160,40,160,152);
$pdf->Line(260,32,260,152);




$pdf->Output("I","gastos $varsesion semana $id_num_sem.pdf", true);


?>