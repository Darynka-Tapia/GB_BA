<?php

require('../../SQL/conexion.php');
	$libro1=$_POST['libro1'];
	$libro2=$_POST['libro2'];
	$Fdevolucion=$_POST['Fdevolucion'];
	$Folio=$_POST['Folio'];
	$Folio2=$_POST['Folio2'];
	$Fentrega=$_POST['Fentrega'];
	$MatriculaR=$_POST['MatriculaR'];
	$id=$_POST['id'];
	echo $Fdevolucion.' '.$Folio.' '.$Folio2.' '.$Fentrega.' '.$MatriculaR.' '.$id;

	if (isset($_POST['libro1']) && isset($_POST['libro2'])){
		

		$sqlLL='UPDATE prestamo SET 
		   		fecha_inicio="'.$Fentrega.'", 
		   		fecha_fin="'.$Fdevolucion.'", 
		   		Folio1="'.$Folio.'", 
		   		Folio2="'.$Folio2.'", 
		   		Renovacion="Si"
		   		 WHERE Matricula ="'.$MatriculaR.'"';
		   		$res=$mysqli->query($sqlLL);
		   		echo $sqlLL;
		$sqlLLi='INSERT INTO prestamo_respaldo(fecha_inicio, fecha_fin, Folio1, Folio2, Renovacion, Matricula) VALUES ("'.$Fentrega.'","'.$Fdevolucion.'","'.$Folio.'","'.$Folio2.'","Si","'.$MatriculaR.'")';
		$res=$mysqli->query($sqlLLi);
		echo $sqlLLi;
		echo "<script> alert('Renuevo ambos libros '); </script>";
		header('refresh: 0; ../../Renovaciones.php');
	}else if(isset($_POST['libro1']) || isset($_POST['libro2'])){

		if (isset($_POST['libro1'])) {
		   $sqlL1='UPDATE prestamo SET 
		   		fecha_inicio="'.$Fentrega.'", 
		   		fecha_fin="'.$Fdevolucion.'", 
		   		Folio1="'.$Folio.'", 
		   		Folio2="", 
		   		Renovacion="Si"
		   		 WHERE Matricula ="'.$MatriculaR.'"';
		   		$res=$mysqli->query($sqlL1);
		   		echo $sqlL1;


		  	$sqlLLi='INSERT INTO prestamo_respaldo(fecha_inicio, fecha_fin, Folio1, Folio2, Renovacion, Matricula) VALUES ("'.$Fentrega.'","'.$Fdevolucion.'","'.$Folio.'","","Si","'.$MatriculaR.'")';
			$res=$mysqli->query($sqlLLi);
			echo $sqlLLi;
		   	echo "<script> alert('Renuevo Libro 1 '); </script>";
			header('refresh: 0; ../../Renovaciones.php');
		}else if (isset($_POST['libro2'])) {
		   $sqlL2='UPDATE prestamo SET 
		   		fecha_inicio="'.$Fentrega.'", 
		   		fecha_fin="'.$Fdevolucion.'", 
		   		Folio1="", 
		   		Folio2="'.$Folio2.'", 
		   		Renovacion="Si"
		   		 WHERE Matricula ="'.$MatriculaR.'"';
		   		$res=$mysqli->query($sqlL2);
		   		echo $sqlL1;
		   	$sqlLLi='INSERT INTO prestamo_respaldo(fecha_inicio, fecha_fin, Folio1, Folio2, Renovacion, Matricula) VALUES ("'.$Fentrega.'","'.$Fdevolucion.'","","'.$Folio2.'","Si","'.$MatriculaR.'")';
			$res=$mysqli->query($sqlLLi);
			echo $sqlLLi;
		   	echo "<script> alert('Renuevo Libro 2 '); </script>";
			header('refresh: 0; ../../Renovaciones.php');

		}
	}else {
		echo "<script> alert('Debe seleccionar al menos un libro para renovar'); </script>";
		header('refresh: 0; ../../Renovaciones.php');
	}


		

?>