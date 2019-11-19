<?php

require('../../SQL/conexion.php');
	
	$MatriculaD=$_POST['MatriculaD'];
	echo $MatriculaR;

		$sql='DELETE FROM prestamo WHERE Matricula="'.$MatriculaD.'"';
		$mysqli->query($sql);
		echo "<script> alert('Se han devuelto los libros y se pago la deuda'); </script>";
		header('refresh: 0; ../../Renovaciones.php');
	


		

?>