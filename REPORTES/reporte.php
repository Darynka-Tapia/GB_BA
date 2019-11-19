<?php
	
	require 'Classes/PHPExcel.php';
	require 'conexion.php';
	$mes=$_POST['mes'];
	$año=$_POST['año'];

	$sql = 'select 	
	(select COUNT(p.Folio1) FROM prestamo_respaldo p where p.Folio1>0 and MONTH(p.fecha_fin)="'.$mes.'" and YEAR(p.fecha_fin)="'.$año.'") as CantLibros1, 
    (select COUNT(p.Folio2) FROM prestamo_respaldo p where p.Folio2>0 and MONTH(p.fecha_fin)="'.$mes.'" and YEAR(p.fecha_fin)="'.$año.'") as CantLibros2, 	
    (SELECT COUNT(L.Folio) from libro L) AS CantidaLibros, 
    (SELECT COUNT(v.Tipo_vista) FROM visitas v where v.Tipo_vista="Individual" and MONTH(v.fecha_visita)="'.$mes.'" and YEAR(v.fecha_visita)="'.$año.'") as PrestamosInternos';
	$resultado = $mysqli->query($sql);
	
	$fila = 14;
	$gdImage = imagecreatefrompng('images/gro.png');//Logotipo


	$objPHPExcel = new PHPExcel();
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Miguevp")->setDescription("Reporte de Libros");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Libros");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));

	$estiloBorde = array( 
	  'borders' => array(
	    'outline' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	    )
	  )
	);
$objPHPExcel->getActiveSheet()->getStyle('A11:H20')->applyFromArray($estiloBorde);
$objPHPExcel->getActiveSheet()->getStyle('A8:H8')->applyFromArray($estiloBorde);
$objPHPExcel->getActiveSheet()->getStyle('A9:H9')->applyFromArray($estiloBorde);

//$objPHPExcel->getActiveSheet()->getStyle('A12:E12')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true); 


	$objPHPExcel->getActiveSheet()->mergeCells('B2:H2'); $objPHPExcel->getActiveSheet()->getStyle("B2:H2")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->mergeCells('B3:H3'); $objPHPExcel->getActiveSheet()->getStyle("B3:H3")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->mergeCells('B4:H4'); $objPHPExcel->getActiveSheet()->getStyle("B4:H4")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->mergeCells('B5:H5'); $objPHPExcel->getActiveSheet()->getStyle("B5:H5")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->mergeCells('B6:H6'); $objPHPExcel->getActiveSheet()->getStyle("B6:H6")->getFont()->setBold(true); 


	$objPHPExcel->getActiveSheet()->getStyle('B2:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objPHPExcel->getActiveSheet()->setCellValue('B2', 'DIRECCIÓN GENERAL');
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'DIRECCIÓN ACADÉMICA');
	$objPHPExcel->getActiveSheet()->setCellValue('B4', 'DEPARTAMENTO DE SERVICIOS ESTUDIANTILES');
	$objPHPExcel->getActiveSheet()->setCellValue('B5', 'OFICINA DE BIBLIOTECAS');
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'INFORME MENSUAL DE SERVICIOS BIBLIOTECARIOS');


	$objPHPExcel->getActiveSheet()->setCellValue('A8', 'PLANTEL'); 					$objPHPExcel->getActiveSheet()->getStyle("A8")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->setCellValue('B8', '06');
	$objPHPExcel->getActiveSheet()->setCellValue('C8', 'LOCALIDAD'); 				$objPHPExcel->getActiveSheet()->getStyle("C8")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->setCellValue('D8', 'PETATLAN,GRO.');
	$objPHPExcel->getActiveSheet()->setCellValue('E8', 'NOMBRE DE LA BIBLIOTECA: ');$objPHPExcel->getActiveSheet()->getStyle("E8")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->setCellValue('F8', '“BERTHA VON GLUMER LEYVA”');

	$objPHPExcel->getActiveSheet()->setCellValue('A9', 'CLAVE DE LA BIBLIOTECA:'); 	$objPHPExcel->getActiveSheet()->getStyle("A9")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->setCellValue('B9', ' 12BBE0134M');
	$objPHPExcel->getActiveSheet()->setCellValue('C9', ' SEMESTRE:'); 				$objPHPExcel->getActiveSheet()->getStyle("C9")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->setCellValue('D9', '2018-1');
	$objPHPExcel->getActiveSheet()->setCellValue('E9', 'MES QUE INFORMA:'); 		$objPHPExcel->getActiveSheet()->getStyle("E9")->getFont()->setBold(true);

	switch ($mes) {
    case 1:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Enero');
        break;
    case 2:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Febrero');
        break;
    case 3:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Marzo');
        break;
    case 4:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Abril');
        break;
    case 5:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Mayo');
        break;
    case 6:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Junio');
        break;
    case 7:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Julio');
        break;
    case 8:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Agosto');
        break;
    case 9:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Septiembre');
        break;
    case 10:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Octubre');
        break;
    case 11:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Noviembre');
        break;
    case 12:
        $objPHPExcel->getActiveSheet()->setCellValue('F9', 'Diciembre');
        break;
	}
	
	$objPHPExcel->getActiveSheet()->setCellValue('G9', 'AÑO'); 						$objPHPExcel->getActiveSheet()->getStyle("G9")->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->setCellValue('H9', $año);



	$objPHPExcel->getActiveSheet()->setCellValue('A11', 'LIBROS'); 
	$objPHPExcel->getActiveSheet()->mergeCells('A11:C11'); $objPHPExcel->getActiveSheet()->getStyle("A11:C11")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->setCellValue('A12', 'DONADOS');
		$objPHPExcel->getActiveSheet()->setCellValue('B12', 'COMPRADOS');
		$objPHPExcel->getActiveSheet()->setCellValue('C12', 'CANJEADOS');

	$objPHPExcel->getActiveSheet()->setCellValue('D11', 'PRESTAMOS');
	$objPHPExcel->getActiveSheet()->mergeCells('D11:E11'); $objPHPExcel->getActiveSheet()->getStyle("D11:E11")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->setCellValue('D12', 'INTERNO');
		$objPHPExcel->getActiveSheet()->setCellValue('E12', 'DOMICILIO');

	$objPHPExcel->getActiveSheet()->setCellValue('F11', 'CANTIDAD DE USUARIOS');
	$objPHPExcel->getActiveSheet()->mergeCells('F11:F12'); $objPHPExcel->getActiveSheet()->getStyle("F11:F12")->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->setCellValue('G11', 'EXISTENCIA'); 
	$objPHPExcel->getActiveSheet()->mergeCells('G11:H12'); $objPHPExcel->getActiveSheet()->getStyle("G11")->getFont()->setBold(true);
	
	$objPHPExcel->getActiveSheet()->mergeCells('G13:H13');
	$objPHPExcel->getActiveSheet()->mergeCells('G14:H14');
	$objPHPExcel->getActiveSheet()->mergeCells('G15:H15');
	$objPHPExcel->getActiveSheet()->mergeCells('G16:H16');
	$objPHPExcel->getActiveSheet()->mergeCells('G17:H17');
	$objPHPExcel->getActiveSheet()->mergeCells('G18:H18');
	$objPHPExcel->getActiveSheet()->mergeCells('G19:H19');
	$objPHPExcel->getActiveSheet()->mergeCells('G20:H20');




	/*$objPHPExcel->getActiveSheet()->setCellValue('E1', 'TOTAL');*/
	
	while($row = $resultado->fetch_assoc())
	{
		$Domicilio=$row['CantLibros1'] + $row['CantLibros2'];
		$TotalUsuarios=$Domicilio + $row['PrestamosInternos'];
		
		$objPHPExcel->getActiveSheet()->setCellValue('E17', $Domicilio);
		$objPHPExcel->getActiveSheet()->setCellValue('D16', $row['PrestamosInternos']);
		$objPHPExcel->getActiveSheet()->setCellValue('G19', $row['CantidaLibros']);
		$objPHPExcel->getActiveSheet()->setCellValue('F18', $TotalUsuarios);

		/*$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, '=C'.$fila.'*D'.$fila);*/
		
		$fila++;
		
	}
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");


		switch ($mes) {
    case 1:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Enero '.$año.'.xlsx"');
        break;
    case 2:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Febrero '.$año.'.xlsx"');
        break;
    case 3:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Marzo '.$año.'.xlsx"');
        break;
    case 4:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Abril '.$año.'.xlsx"');
        break;
    case 5:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Mayo '.$año.'.xlsx"');
        break;
    case 6:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Junio '.$año.'.xlsx"');
        break;
    case 7:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Julio '.$año.'.xlsx"');
        break;
    case 8:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Agosto '.$año.'.xlsx"');
        break;
    case 9:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Septiembre '.$año.'.xlsx"');
        break;
    case 10:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Octubre '.$año.'.xlsx"');
        break;
    case 11:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Noviembre '.$año.'.xlsx"');
        break;
    case 12:
        header('Content-Disposition: attachment;filename="INVENTARIO DE LIBROS BIBLIOTECA COBACH Diciembre '.$año.'.xlsx"');
        break;
	}

	header('Cache-Control: max-age=0');
	
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save('php://output');
	
?>