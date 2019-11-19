<?php
	require('../../SQL/conexion.php');
	$id=$_POST['Id_Admin'];
	$nombre=$_POST['nombre'];
	$cargo=$_POST['cargo'];
	$turno=$_POST['turno'];
	$sqlIn='UPDATE admin SET Nombre="'.$nombre.'", Cargo="'.$cargo.'", Turno="'.$turno.'" where Id_Admin="'.$id.'"';
	$res=$mysqli->query($sqlIn);
		session_start();
	session_destroy();
	header('location:../../login.php');
	echo 'Cerre Sesion ';
?>