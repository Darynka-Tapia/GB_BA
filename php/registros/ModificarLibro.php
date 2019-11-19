<?php
	require('../../SQL/conexion.php');
	$mod=$_POST['Accion'];

	$Folio=$_POST['Folio'];
	$Titulo=$_POST['Titulo'];
	$Autor=$_POST['Autor'];
	$Editorial=$_POST['Editorial'];
	$Asignatura=$_POST['Asignatura'];
	$año=$_POST['año'];
	$Cantidad=$_POST['Cantidad'];

	if ($mod=="Modificar"){
		$SQLM='UPDATE libro SET Materia="'.$Asignatura.'", Titulo="'.$Titulo.'", Autor="'.$Autor.'", Editorial="'.$Editorial.'", Año="'.$año.'",Cant_Libros="'.$Cantidad.'" WHERE Folio="'.$Folio.'"';
		echo $SQLM;
		$res=$mysqli->query($SQLM);
		header('refresh: 0; ../../Libros.php');
	}else if ($mod=="Registrar"){

		$SQLR='INSERT INTO libro(Materia, Folio, Titulo, Autor, Editorial, Año, Cant_Libros) VALUES ("'.$Asignatura.'","'.$Folio.'","'.$Titulo.'","'.$Autor.'","'.$Editorial.'","'.$año.'","'.$Cantidad.'")';
		echo $SQLR;
		$res=$mysqli->query($SQLR);
		header('refresh: 0; ../../Libros.php');
	}
	
?> 