<?php
	$nombre=$_POST['nombre'];
	$cargo=$_POST['cargo'];
	$turno=$_POST['turno'];
	$categoria=$_POST['categoria'];
	$contraseña=$_POST['contraseña'];
	$confirmar=$_POST['confirmar'];
	$pregunta1=$_POST['pregunta1'];
	$pregunta2=$_POST['pregunta2'];

	//echo $nombre.'<br>'.$cargo.'<br>'.$turno.'<br>'.$categoria.'<br>'.$contraseña.'<br>'.$confirmar.'<br>'.$pregunta1.'<br>'.$pregunta2;
	if($contraseña==$confirmar){
		echo "Hago el registro";
	}else{
		echo "Datos Incorrectos";
	}
?>