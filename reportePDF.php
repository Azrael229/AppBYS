<?php
require('fpdf/fpdf.php');
require('reqUnaSemana.php');



$pdf = new FPDF();
$pdf->SetFont('Arial','',8);
$pdf->AddPage();

// Titulo del reporte y encabezado la variable con el id del nuemro de semana 
$pdf->Cell(190, 6, "Reporte de Gastos Semana: $id_num_sem   Israel Navarrete", "B",1,"C");
$pdf->Ln(7);

// Este foreach trae todos los dias de la semana que corresponden al ID de semana
foreach($resultado as $row):

    // Encabezado Se pinta la fecha en una celda
    $Y = $pdf->GetY();
    $pdf->SetY($Y+4);
    $pdf->SetX(50);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(95, 4, $row['fecha'], 1,0,"C",1);
    $pdf->Ln();

        //Inicia Seccion de Actividades
            //Encabezado se pinta Actividades
            $pdf->SetX(50);
            $pdf->SetFillColor(182,182,182);
            $pdf->Cell(95, 4, "Actividades", 1, 0,"C",1);
            $pdf->Ln();
            //Encabezado de Tabla
            $pdf->SetX(50);
            $pdf->SetFillColor(182,182,182);
            $pdf->Cell(30, 4, "Cliente", 1, 0,"C",1);
            $pdf->Cell(15, 4, "OS", 1, 0,"C",1);
            $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",1);
            $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",1); 
            $pdf->Ln();

                //Codigo Request para solicitar a la BD las actividades segun el ID que le pasamos
                $id_fecha = $row['ID']; 
                require ("conexion.php");

                $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
                $statement->execute();

                $res = $statement->fetchAll();

            //Este foreach pinta de manera dinamica los registros de actividades de la BD
            foreach($res as $fila):   
                $pdf->SetX(50); 
                $pdf->Cell(30, 4, $fila['cliente'] , 1);
                $pdf->Cell(15, 4, $fila['os'], 1);
                $pdf->Cell(25, 4, $fila['hora_inicial'] , 1);
                $pdf->Cell(25, 4, $fila['hora_final'], 1);
                $pdf->Ln();
            endforeach;  
        //Finaliza Seccion de Actividades


        //Inicia Seccion de Gastos
            //Encabezado se pinta Gastos
            $pdf->SetX(50);
            $pdf->SetFillColor(182,182,182);
            $pdf->Cell(95, 4, "Gastos", 1,0,"C",1);
            $pdf->Ln();

            // //Encabezados de Tabla
            $pdf->SetX(50);
            $pdf->SetFillColor(182,182,182);
            $pdf->Cell(40, 4, "Concepto", 1,0,"C",1);
            $pdf->Cell(15, 4, "Pago", 1,0,"C",1);
            $pdf->Cell(25, 4, "Total", 1,0,"C",1);
            $pdf->Cell(15, 4, "" ,1,0,"C",1);
            $pdf->Ln();

                //Codigo Request para solicitar a la BD las Gastos segun el ID que le pasamos
                $id_fecha = $row['ID']; 
                require ("conexion.php");

                $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
                $statement->execute();
            
                $res = $statement->fetchAll();

            //Este foreach pinta de manera dinamica los registros de Gastos de la BD
            foreach($res as $fila):  
                $pdf->SetX(50);  
                $pdf->Cell(40, 4, $fila['concepto'] , 1);
                $pdf->Cell(15, 4, $fila['tipo_pago'], 1);
                $pdf->Cell(25, 4, $fila['total'], 1);
                $pdf->Cell(15, 4, "" , 1);
                $pdf->Ln();
            endforeach;       
        //Finaliza Seccion de Gastos 
        $pdf->Ln();  
endforeach;

$pdf->Output();

?>