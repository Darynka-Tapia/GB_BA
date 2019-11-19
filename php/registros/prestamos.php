<?php
	require('../../SQL/conexion.php');
ob_start();
	$matricula=$_POST['Matricula'];
	$folio1=$_POST['Folio'];
	$folio2=$_POST['Folio2'];
	$F_S=$_POST['Fentrega'];
	$F_D=$_POST['Fdevolucion'];
	$Stock=$_POST['Stock'];



	if ($matricula=="" || $folio1==""){
		echo "<script> alert('No puedes dejar campos vacios'); </script> ";
		header('refresh: 0; ../../Primera.php');
	}else {
		$sql="SELECT * FROM prestamo WHERE Matricula='".$matricula."'";
		$res = $mysqli->query($sql);
		//$res=mysqli_num_rows($res);
		if(mysqli_num_rows($res) == 0){
			
			if ($folio1==$folio2){
				echo "<script> alert('No puedes prestar dos libros con el mismo folio'); </script> ";
				header('refresh: 0; ../../Primera.php');
			}else{
				if ($Stock>=1){

						$querys="INSERT INTO prestamo(fecha_inicio, fecha_fin, Folio1, Folio2, Renovacion, Matricula) VALUES ('".$F_S."','".$F_D."','".$folio1."','".$folio2."','No','".$matricula."')";
	                   	$rest = $mysqli->query($querys);
	                   	$querys="INSERT INTO prestamo_respaldo(fecha_inicio, fecha_fin, Folio1, Folio2, Renovacion, Matricula) VALUES ('".$F_S."','".$F_D."','".$folio1."','".$folio2."','No','".$matricula."')";
	                   	$rest = $mysqli->query($querys);





	                   	include 'plantillas.php';
    require 'conexion.php';
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

    $pdf->SetXY(75, 78);$pdf->Cell(0,0,$F_S,0,0,'A',0);
    $pdf->SetXY(75, 84);$pdf->Cell(0,0,$F_D,0,0,'A',0);
    $pdf->SetXY(55, 178);$pdf->Cell(0,0,$matricula,0,0,'A',0);

    while($row = $resultado->fetch_assoc())
    {
        $pdf->SetXY(70, 165);$pdf->Cell(0,0,$row['Nombre_Almno'],0,0,'A',0);
        $pdf->SetXY(45, 188);$pdf->Cell(0,0,$row['grupo'],0,0,'A',0);
        $pdf->SetXY(105, 188);$pdf->Cell(0,0,$row['turno'],0,0,'A',0);
        $pdf->SetXY(40, 103);$pdf->Cell(0,0,$row['folio1'],0,0,'A',0);
        $pdf->SetXY(40, 112);$pdf->Cell(0,0,$row['titulo1'],0,0,'A',0);
        $pdf->SetXY(40, 117);$pdf->Cell(0,0,$row['autor1'],0,0,'A',0);
        $pdf->SetXY(40, 142);$pdf->Cell(0,0,$row['folio2'],0,0,'A',0);
        $pdf->SetXY(40, 150);$pdf->Cell(0,0,$row['titulo2'],0,0,'A',0);
        $pdf->SetXY(40, 155);$pdf->Cell(0,0,$row['autor2'],0,0,'A',0);
        //$pdf = $row['Titulo'];$pdf->SetXY(60, 60);$pdf->Write(0,$txt);
    }

    ob_end_clean();
    $pdf->Output();













	                   	
					echo "<script> alert('Se realizo el resamo'); </script>";
					//header('refresh: 0; ../../Primera.php');
				}else{
					echo "<script> alert('No puedo hacer el registro si no hay libro'); </script>";
					header('refresh: 0; ../../Primera.php');
				}
			}
		}else {
			echo "<script> alert('El alumno debe devolver el libro antes de hacer el prestamo'); </script>";
			header('refresh: 0; ../../Primera.php');
		}
	}
	

   
?>