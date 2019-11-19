<?php

    //include 'ReporteIndividual.php';
    include 'plantillas.php';
    require 'conexion.php';

    /*$matricula=$_POST['Matricula'];
    $folio1=$_POST['Folio'];
    $folio2=$_POST['Folio2'];
    $F_S=$_POST['Fentrega'];
    $F_D=$_POST['Fdevolucion'];
    $Stock=$_POST['Stock'];*/


    $query=  'select 
    (SELECT a.Nombre_alumno FROM prestamo p INNER JOIN alumno a ON p.Matricula=a.Matricula WHERE p.Matricula="'.$matricula.'") as Nombre_Almno,
    (SELECT a.Grupo FROM prestamo p INNER JOIN alumno a ON p.Matricula=a.Matricula WHERE p.Matricula="'.$matricula.'") as grupo,
    (SELECT a.Turno FROM prestamo p INNER JOIN alumno a ON p.Matricula=a.Matricula WHERE p.Matricula="'.$matricula.'") as turno,
                    
    (select l.Folio as lp from libro l  WHERE l.Folio="'.$folio1.'") AS folio1, 
    (select l.Titulo as lp FROM libro l  WHERE l.Folio="'.$folio1.'") AS titulo1, 
    (select l.Autor as lp  FROM libro l  WHERE  l.Folio="'.$folio1.'") AS autor1,
                    
     (select l.Folio as lp2 FROM  libro l  WHERE l.Folio="'.$folio2.'") as folio2,
    (select l.Titulo as lp2 FROM libro l  WHERE l.Folio="'.$folio2.'") as titulo2,
    (select l.Autor as lp2 FROM  libro l  WHERE  l.Folio="'.$folio2.'") as autor2';


    $resultado = $mysqli->query($query);
   
   

    $pdf = new PDF();
    //$pdf->AliasPages();
    $pdf->AddPage();

    $pdf->SetFillcolor(232,232,232);
    $pdf->SetFont('Arial','B',10);

    while($row = $resultado->fetch_assoc())
    {
        $pdf->SetXY(60, 60);$pdf->Cell(0,0,$row['Nombre_Almno'],0,0,'C',1);
        $pdf->SetXY(60, 70);$pdf->Cell(0,0,$row['grupo'],0,0,'C',1);
        $pdf->SetXY(60, 80);$pdf->Cell(0,0,$row['turno'],0,0,'C',1);
        $pdf->SetXY(60, 90);$pdf->Cell(0,0,$row['folio1'],0,0,'C',1);
        $pdf->SetXY(60, 100);$pdf->Cell(0,0,$row['titulo1'],0,0,'C',1);
        $pdf->SetXY(60, 110);$pdf->Cell(0,0,$row['autor1'],0,0,'C',1);
        $pdf->SetXY(60, 120);$pdf->Cell(0,0,$row['folio2'],0,0,'C',1);
        $pdf->SetXY(60, 130);$pdf->Cell(0,0,$row['titulo2'],0,0,'C',1);
        $pdf->SetXY(60, 140);$pdf->Cell(0,0,$row['autor2'],0,0,'C',1);
        //$pdf = $row['Titulo'];$pdf->SetXY(60, 60);$pdf->Write(0,$txt);
    }

    $pdf->Output();

?>
