<?php
	require('../../SQL/conexion.php');
	$mod=$_POST['Accion'];

	$Matricula=$_POST['Matricula'];
	$Nombre=$_POST['Nombre'];
	$GradoGrupo=$_POST['GradoGrupo'];
	$Turno=$_POST['Turno'];
	$Generacion=$_POST['Generacion'];

	if ($mod=="Modificar"){
		$SQLM='UPDATE alumno SET Grupo="'.$GradoGrupo.'",Turno="'.$Turno.'",Nombre_alumno="'.$Nombre.'",Generacion="'.$Generacion.'" WHERE Matricula="'.$Matricula.'"';
		echo $SQLM;
		$res=$mysqli->query($SQLM);
		header('refresh: 0; ../../Alumnos.php');
	}else if ($mod=="Registrar"){
		$consulta="select * from alumno where Matricula='".$Matricula."'";
		$resultado=$mysqli->query($consulta);
		if(mysqli_num_rows($resultado) != 0){
			echo "<script> alert('Esa matricula ya esta asignada a un alumno'); </script>";
			header('refresh: 0; ../../Alumnos.php');
		}else{
			$SQLR='INSERT INTO alumno(Matricula, Grupo, Turno, Nombre_alumno, Generacion) VALUES ("'.$Matricula.'","'.$GradoGrupo.'","'.$Turno.'","'.$Nombre.'","'.$Generacion.'")';
			echo $SQLR;
			$res=$mysqli->query($SQLR);

		header('refresh: 0; ../../Alumnos.php');

		}
		
		

	}
		
	
	
?>