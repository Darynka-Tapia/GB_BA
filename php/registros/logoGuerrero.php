<?php

echo 'Registro imagen';

	require('../../SQL/conexion.php');

	$nombre_imagen=$_FILES['imagen']['name'];
	$tipo_imagen=$_FILES['imagen']['type'];
	$tamano_imagen=$_FILES['imagen']['size'];
	$Logo=$_POST['Guerrero'];

	$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/GB-BA/Imagenes/';

	move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen); 

	echo 
		'LOGO: '.$Logo.'<br>'.
		'url imagen:'.$carpeta_destino.$nombre_imagen.'<br>';

	$sql='UPDATE logos SET RutaLogo="Imagenes/'.$nombre_imagen.'" WHERE NombreLogo="logoGuerrero"';

		$resultado=$mysqli->query($sql);

echo "<script> alert('Se ha modificado el logo de Guerrero '); </script>";
	header('refresh: 0; ../../index.php');
?>