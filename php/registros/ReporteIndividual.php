<?php

	require 'conexion.php';

				//include ('class/class.php');
				$ValorRecibido=0;
				//$variablephp=Recibe('VarPer');
				//$VFI=Recibe('FI');
				//$VFF=Recibe('FF');

				

				//PDF INDIVIDUAL-----------------------------------------------------------------------------------------------------------
					$fecha_actual=date("d/m/Y");
					//$variablephp=Recibe('VarPer');
					//$VFI=Recibe('FI');
					
					$QUERY='SELECT Titulo FROM libro WHERE Folio="16"'; 
					$res=$mysqli->query($QUERY);
					require('pdf/tfpdf.php');
					ob_start();	
							$pdf = new tFPDF();  
							$pdf->AddPage();
							$pdf->AddFont('Arial','','14',true);
							$pdf->Image('images/reportes.png',0,0);
							
							$pdf->SetFont('Arial','',16);
							$txt = 'Reporte Individual';$pdf->SetXY(80, 45);$pdf->Write(0,$txt);
									
							$pdf->SetFont('Arial','',12);
							$txt = 'Nombre Completo: ';$pdf->SetXY(20, 60);$pdf->Write(0,$txt);

							//$txt=$QUERY;$pdf->SetXY(60, 60);$pdf->Write(0,$txt);
							while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
								$txt = $row['Titulo'];$pdf->SetXY(60, 60);$pdf->Write(0,$txt);
							}
							
							
							$pdf->Output(); 
							ob_end_flush();	
					
				


?>