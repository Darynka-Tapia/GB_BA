<?php
	require('../../SQL/conexion.php');
	$mod=$_POST['Accion'];

	$Nombre_asignatura=$_POST['Nombre_asignatura'];
	$Total_libros=$_POST['Total_libros'];
	$Id_Asignatura=$_POST['Id_Asignatura'];

	if ($mod=="Modificar"){
		$SQLM='UPDATE asignatura SET Nombre_asignatura="'.$Nombre_asignatura.'", Total_libros="'.$Total_libros.'" WHERE Id_Asignatura="'.$Id_Asignatura.'"';
		echo $SQLM;
		$res=$mysqli->query($SQLM);
		header('refresh: 0; ../../Materias.php');
	}else if ($mod=="Registrar"){

		$SQLR='INSERT INTO asignatura(Nombre_asignatura, Total_libros) VALUES ("'.$Nombre_asignatura.'","'.$Total_libros.'")';
		echo $SQLR;
		$res=$mysqli->query($SQLR);
		header('refresh: 0; ../../Materias.php');
	}
	
?> 