<?php
require('fpdf/fpdf.php');
require('reqUnaSemana.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

// Titulo del reporte y encabezado la variable con el id del nuemro de semana 
$pdf->Cell(190, 6, "Reporte de Gastos Semana: $id_num_sem   Israel Navarrete", "B",1,"C");
$pdf->Ln();


////////////////////////////  1    /////////////////////////////////
$pdf->SetXY(10,23);

if (isset ($resultado[0][1])) { 

    $fechaPos1 = $resultado[0][1];

    $pdf->Cell(190, 4, $fechaPos1, 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

    if (isset ($resultado[0][0])) {

        $id_fechaPos1 = $resultado[0][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fechaPos1");
            $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetX(10);
        foreach($res as $fila):

            $pdf->Cell(30, 4, $fila['cliente'] , 1, 0,"C",0);
            $pdf->Cell(15, 4, $fila['os'], 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_inicial'] , 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_final'], 1, 0,"C",0);
            $pdf->Ln();
            
        endforeach;

        $id_fechaPos1 = $resultado[0][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fechaPos1");
        $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetY(35);
        foreach($res as $fila):

        $pdf->SetX(105);
        $pdf->Cell(40, 4, $fila['concepto'] , 1);
        $pdf->Cell(15, 4, $fila['tipo_pago'], 1);
        $pdf->Cell(25, 4, $fila['total'], 1);
        $pdf->Cell(15, 4, "" , 1);
        $pdf->Ln();

        endforeach;
    }
}else { 

    $pdf->Cell(190, 4, "fecha sin registros", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

}


////////////////////////////   2     ///////////////////////////////////////////

$pdf->SetXY(10,59);

if (isset ($resultado[1][1])) { 

    $pdf->Cell(190, 4, $resultado[1][1], 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

    if (isset ($resultado[1][0])) {

        $id_fecha = $resultado[1][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
            $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetX(10);
        foreach($res as $fila):

            $pdf->Cell(30, 4, $fila['cliente'] , 1, 0,"C",0);
            $pdf->Cell(15, 4, $fila['os'], 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_inicial'] , 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_final'], 1, 0,"C",0);
            $pdf->Ln();
            
        endforeach;

        $id_fecha = $resultado[1][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
        $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetY(71);
        foreach($res as $fila):

        $pdf->SetX(105);
        $pdf->Cell(40, 4, $fila['concepto'] , 1);
        $pdf->Cell(15, 4, $fila['tipo_pago'], 1);
        $pdf->Cell(25, 4, $fila['total'], 1);
        $pdf->Cell(15, 4, "" , 1);
        $pdf->Ln();

        endforeach;
    }
}else { 

    $pdf->Cell(190, 4, "fecha sin registros", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

}

// //////////////////////////////    3   /////////////////////////////////////
$pdf->SetXY(10,95);

if (isset ($resultado[2][1])) { 

    $pdf->Cell(190, 4, $resultado[2][1], 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

    if (isset ($resultado[2][0])) {

        $id_fecha = $resultado[2][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
            $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetX(10);
        foreach($res as $fila):

            $pdf->Cell(30, 4, $fila['cliente'] , 1, 0,"C",0);
            $pdf->Cell(15, 4, $fila['os'], 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_inicial'] , 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_final'], 1, 0,"C",0);
            $pdf->Ln();
            
        endforeach;

        $id_fecha = $resultado[2][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
        $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetY(107);
        foreach($res as $fila):

        $pdf->SetX(105);
        $pdf->Cell(40, 4, $fila['concepto'] , 1);
        $pdf->Cell(15, 4, $fila['tipo_pago'], 1);
        $pdf->Cell(25, 4, $fila['total'], 1);
        $pdf->Cell(15, 4, "" , 1);
        $pdf->Ln();

        endforeach;
    }
}else { 

    $pdf->Cell(190, 4, "fecha sin registros", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

}

// //////////////////////////   4   ///////////////////////////////////////////

$pdf->SetXY(10,131);

if (isset ($resultado[3][1])) { 

    $pdf->Cell(190, 4, $resultado[3][1], 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

    if (isset ($resultado[3][0])) {

        $id_fecha = $resultado[3][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
            $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetX(10);
        foreach($res as $fila):

            $pdf->Cell(30, 4, $fila['cliente'] , 1, 0,"C",0);
            $pdf->Cell(15, 4, $fila['os'], 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_inicial'] , 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_final'], 1, 0,"C",0);
            $pdf->Ln();
            
        endforeach;

        $id_fecha = $resultado[3][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
        $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetY(143);
        foreach($res as $fila):

        $pdf->SetX(105);
        $pdf->Cell(40, 4, $fila['concepto'] , 1);
        $pdf->Cell(15, 4, $fila['tipo_pago'], 1);
        $pdf->Cell(25, 4, $fila['total'], 1);
        $pdf->Cell(15, 4, "" , 1);
        $pdf->Ln();

        endforeach;
    }
}else { 

    $pdf->Cell(190, 4, "fecha sin registros", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

}

// /////////////////////   5    ///////////////////////////////////////////////
$pdf->SetXY(10,167);

if (isset ($resultado[4][1])) { 

    $pdf->Cell(190, 4, $resultado[4][1], 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

    if (isset ($resultado[4][0])) {

        $id_fecha = $resultado[4][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
            $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetX(10);
        foreach($res as $fila):

            $pdf->Cell(30, 4, $fila['cliente'] , 1, 0,"C",0);
            $pdf->Cell(15, 4, $fila['os'], 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_inicial'] , 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_final'], 1, 0,"C",0);
            $pdf->Ln();
            
        endforeach;

        $id_fecha = $resultado[4][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
        $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetY(179);
        foreach($res as $fila):

        $pdf->SetX(105);
        $pdf->Cell(40, 4, $fila['concepto'] , 1);
        $pdf->Cell(15, 4, $fila['tipo_pago'], 1);
        $pdf->Cell(25, 4, $fila['total'], 1);
        $pdf->Cell(15, 4, "" , 1);
        $pdf->Ln();

        endforeach;
    }
}else { 

    $pdf->Cell(190, 4, "fecha sin registros", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

}

// //////////////////    6    ////////////////////////////////////////////////////////
$pdf->SetXY(10,203);

if (isset ($resultado[5][1])) { 

    $pdf->Cell(190, 4, $resultado[5][1], 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

    if (isset ($resultado[5][0])) {

        $id_fecha = $resultado[5][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
            $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetX(10);
        foreach($res as $fila):

            $pdf->Cell(30, 4, $fila['cliente'] , 1, 0,"C",0);
            $pdf->Cell(15, 4, $fila['os'], 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_inicial'] , 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_final'], 1, 0,"C",0);
            $pdf->Ln();
            
        endforeach;

        $id_fecha = $resultado[5][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
        $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetY(215);
        foreach($res as $fila):

        $pdf->SetX(105);
        $pdf->Cell(40, 4, $fila['concepto'] , 1);
        $pdf->Cell(15, 4, $fila['tipo_pago'], 1);
        $pdf->Cell(25, 4, $fila['total'], 1);
        $pdf->Cell(15, 4, "" , 1);
        $pdf->Ln();

        endforeach;
    }
}else { 

    $pdf->Cell(190, 4, "fecha sin registros", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

}

// ///////////////     7     ////////////////////////////////////////////////////////////
$pdf->SetXY(10,239);

if (isset ($resultado[6][1])) { 

    $pdf->Cell(190, 4, $resultado[6][1], 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

    if (isset ($resultado[6][0])) {

        $id_fecha = $resultado[6][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
            $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetX(10);
        foreach($res as $fila):

            $pdf->Cell(30, 4, $fila['cliente'] , 1, 0,"C",0);
            $pdf->Cell(15, 4, $fila['os'], 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_inicial'] , 1, 0,"C",0);
            $pdf->Cell(25, 4, $fila['hora_final'], 1, 0,"C",0);
            $pdf->Ln();
            
        endforeach;

        $id_fecha = $resultado[6][0]; 
        require ("conexion.php");

        $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
        $statement->execute();

        $res = $statement->fetchAll();

        $pdf->SetY(251);
        foreach($res as $fila):

        $pdf->SetX(105);
        $pdf->Cell(40, 4, $fila['concepto'] , 1);
        $pdf->Cell(15, 4, $fila['tipo_pago'], 1);
        $pdf->Cell(25, 4, $fila['total'], 1);
        $pdf->Cell(15, 4, "" , 1);
        $pdf->Ln();

        endforeach;
    }
}else { 

    $pdf->Cell(190, 4, "fecha sin registros", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(95, 4, "Actividades", 1, 0,"C",0);
    $pdf->Cell(95, 4, "Gastos", 1, 0,"C",0);
    $pdf->Ln();
    $pdf->Cell(30, 4, "Cliente", 1, 0,"C",0);
    $pdf->Cell(15, 4, "OS", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Ini", 1, 0,"C",0);
    $pdf->Cell(25, 4, "Hora Fin", 1, 0,"C",0);
    $pdf->Cell(40, 4, "Concepto", 1,0,"C",0);
    $pdf->Cell(15, 4, "Pago", 1,0,"C",0);
    $pdf->Cell(25, 4, "Total", 1,0,"C",0);
    $pdf->Cell(15, 4, "" ,1,0,"C",0);
    $pdf->Ln();

}
$pdf->Output();


?>