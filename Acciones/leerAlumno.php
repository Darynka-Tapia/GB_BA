<?php
ini_set('max_execution_time', 900);
	require 'Classes/PHPExcel/IOFactory.php';
	
	require 'conexion.php';

	$nombre_excel=$_FILES['imagen']['name'];
	$tipo_excel=$_FILES['imagen']['type'];
	$tamano_excel=$_FILES['imagen']['size'];
	$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ReEx/Acciones';

	move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_excel); 


	$nombreArchivo=$nombre_excel;
	$objPHPExcel = PHPEXCEL_IOFactory::load($nombreArchivo);

	$objPHPExcel->setActiveSheetIndex(0);

	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		$si=0;
		$no=0;
	/*echo '<table>
			<tr>
				<td>Producto</td>
				<td>Precio</td>
				<td>Existencia</td>
				<td>otro</td>
				<td>otro1</td>
				<td>otro2</td>
				<td>otro3</td>
			</tr>
		';*/

		for($i=2; $i<=$numRows; $i++){
			$VAR1 = $objPHPExcel->getActiveSheet()-> getCell('A'.$i)->getCalculatedValue();
			$VAR2 = $objPHPExcel->getActiveSheet()-> getCell('B'.$i)->getCalculatedValue();
			$VAR3 = $objPHPExcel->getActiveSheet()-> getCell('C'.$i)->getCalculatedValue();
			$VAR4 = $objPHPExcel->getActiveSheet()-> getCell('D'.$i)->getCalculatedValue();
			$VAR5 = $objPHPExcel->getActiveSheet()-> getCell('E'.$i)->getCalculatedValue();

			/*echo '<tr>
				<td>'.$nombre.'</td>
				<td>'.$Precio.'</td>
				<td>'.$existencia.'</td>
				<td>'.$otro.'</td>
				<td>'.$otro1.'</td>
				<td>'.$otro2.'</td>
				<td>'.$otro3.'</td>
			</tr>';*/

			//Hacer una sentencia sql en donde busque nombre y si el nombre existe no realizo el insert y si no existe realizo el insert
			
			
				$sql='INSERT INTO alumno(Matricula, Grupo, Turno, Nombre_alumno, Generacion) VALUES ("'.$VAR1.'","'.$VAR3.'","'.$VAR4.'","'.$VAR2.'","'.$VAR5.'")';
				echo $sql;
				$result = $mysqli->query($sql);
				$si++;
			
			
		}

	//echo '</table>';

		//echo '<script> alert("Se han echo '.$si.' registros"); </script>';
		//
		header('refresh: 0; ../Alumnos.php');




?>