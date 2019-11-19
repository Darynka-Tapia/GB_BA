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

		for($i=3; $i<=$numRows; $i++){
			$nombre = $objPHPExcel->getActiveSheet()-> getCell('A'.$i)->getCalculatedValue();
			$Precio = $objPHPExcel->getActiveSheet()-> getCell('B'.$i)->getCalculatedValue();
			$existencia = $objPHPExcel->getActiveSheet()-> getCell('C'.$i)->getCalculatedValue();
			$otro = $objPHPExcel->getActiveSheet()-> getCell('D'.$i)->getCalculatedValue();
			$otro1 = $objPHPExcel->getActiveSheet()-> getCell('E'.$i)->getCalculatedValue();
			$otro2 = $objPHPExcel->getActiveSheet()-> getCell('F'.$i)->getCalculatedValue();
			$otro3 = $objPHPExcel->getActiveSheet()-> getCell('G'.$i)->getCalculatedValue();

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
			
			$querys="SELECT * FROM excel ";
			$rest = $mysqli->query($querys);
			
				$sql='INSERT INTO libro (Materia, Folio, Titulo, Autor, Editorial, Año, Cant_Libros) VALUE ("'.$nombre.'", "'.$Precio.'", "'.$existencia.'", "'.$otro.'", "'.$otro1.'", "'.$otro2.'", "'.$otro3.'")';
				$result = $mysqli->query($sql);
				$si++;
			
			
		}

	//echo '</table>';

		echo '<script> alert("Se han echo '.$si.' registros"); </script>';

		header('refresh: 0; ../Libros.php');



?>