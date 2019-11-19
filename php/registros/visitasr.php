<?php
require('../../SQL/conexion.php');


$fecha=time(); 
                  $fecha = $fecha-(60 * 60 * 7); 
                  $fechaActual = date("Y-m-d", $fecha );


$tipoVisita=$_POST['visita'];
	if($tipoVisita=="grupal"){
		$Grado=$_POST['Grado'];
		$Grupo=$_POST['Grupo'];
		$Profesor=$_POST['ProfesorEncargado'];
		$Materia=$_POST['Materia'];
		$sql1='INSERT INTO visitas(Tipo_vista, Grupo_y_grado, Matricula, Profesor_a_cargo, Materia, fecha_visita) VALUES ("Grupal","'.$Grado.$Grupo.'","","'.$Profesor.'","'.$Materia.'" , "'.$fechaActual.'")';
		$res=$mysqli->query($sql1);

		echo $sql1;

		header('refresh: 0; ../../Visitas.php');
	}else if ($tipoVisita=="individual"){
		$Matricula=$_POST['Matricula'];
		$Nombre=$_POST['Nombre'];
		$Grado=$_POST['Grado'];
		$Turno=$_POST['Turno'];
		

		$sql2=('INSERT INTO visitas(Tipo_vista, Grupo_y_grado, Matricula, Profesor_a_cargo, Materia, fecha_visita) VALUES ("Individual","'.$Grado.'","'.$Matricula.'","","", "'.$fechaActual.'")');
		$res2=$mysqli->query($sql2);

		header('refresh: 0; ../../Visitas.php');
		
	}
?>