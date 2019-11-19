<?php 

if(!isset($_POST['MatriculaD'])) exit('No se recibió el valor a buscar');

require '../SQL/conexion2.php';

function MatriculaD()
{
	
	$mysqli = getConnexion();
	$MatriculaD = $mysqli->real_escape_string($_POST['MatriculaD']);

	if($MatriculaD==""){
	 		  
	  
	}else {

		$query = "
                select 
                	pr.Id_Prestamo,
					pr.Matricula,
					pr.folio1,
					pr.folio2,
				    (SELECT a.Nombre_alumno FROM prestamo p INNER JOIN alumno a ON p.Matricula=a.Matricula WHERE p.Matricula=".$MatriculaD.") as Nombre_Almno,
				    (SELECT a.Grupo FROM prestamo p INNER JOIN alumno a ON p.Matricula=a.Matricula WHERE p.Matricula=".$MatriculaD.") as grupo,
				    (SELECT a.Turno FROM prestamo p INNER JOIN alumno a ON p.Matricula=a.Matricula WHERE p.Matricula=".$MatriculaD.") as turno,
				    (select l.Titulo as lp FROM prestamo p INNER JOIN libro l on p.Folio1=l.Folio WHERE p.Matricula=".$MatriculaD.") AS libro1, 
				    (select l.Autor as lp FROM prestamo p INNER JOIN libro l on p.Folio1=l.Folio WHERE p.Matricula=".$MatriculaD.") AS autor1, 
				    (select l.Titulo as lp2 FROM prestamo p INNER JOIN libro l on p.Folio2=l.Folio WHERE p.Matricula=".$MatriculaD.") as libro2,
				    (select l.Autor as lp2 FROM prestamo p INNER JOIN libro l on p.Folio2=l.Folio WHERE p.Matricula=".$MatriculaD.") as autor2,
				    pr.fecha_inicio, 
				    pr.fecha_fin,
				    pr.Renovacion
				FROM prestamo pr WHERE pr.Matricula=".$MatriculaD."";
		
		$res = $mysqli->query($query);
		
		if(mysqli_num_rows($res) != 0){
	  			  
		  	while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
		  			$fecha=time(); 
		  			$fecha = $fecha-(60 * 60 * 7); 
                  $fechaActual = date("Y-m-d", $fecha );  
                  $fechaActual=date("Y-m-d");
                  $fechaActual='2018-08-13';
                  $query ="call prueba6('".$row['fecha_fin']."','".$fechaActual."');";
                      $rs = $mysqli->query($query);
                         while ($rowFecha = $rs->fetch_array(MYSQLI_ASSOC)) {
                            $diasHabiles=$rowFecha["Dias"]-$rowFecha["SumaSabadoDomingo"];
                            $Actual="-1";
                           
                            if($diasHabiles>=0){
                               echo 'Debe $'. (($diasHabiles+1)*5).' por '.($diasHabiles+1).' dias de retrazo';
                               echo '
                             	<input type="hidden" name="id" value="'.$row["Id_Prestamo"].'">
						  		  	<div class="row"> <!--Para hacer la fila-->
						              <div class="col-12 col-md-6">
						                <label for="validationCustom01">Nombre</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['Nombre_Almno'].'">
						              </div>
						              <div class="col-6 col-md-3">
						                <label for="validationCustom01">Grado y grupo</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Grado" value="'.$row['grupo'].'">
						              </div>
						              <div class="col-6 col-md-3">
						                <label for="validationCustom01">Turno</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Turno" value="'.$row['turno'].'">
						              </div>
				            		</div> 

				            		<br>
				            		<div class="row"> 
				            			
										<div class="col-md-6" style="border:2px solid #E2DBDB; padding-bottom: 2%;">
							                <div class="row">
							                  <div class="col-12 col-md-12">
							                    <center><label for="validationCustom01">Folio Libro </label></center>
							                    <input type="text" id="FL1" class="FL1 form-control" id="validationCustom01"  name="Folio" value="'.$row['folio1'].'">
							                  </div>
							                </div>
							                <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Titulo</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['libro1'].'">
								              </div>
								            </div>
								            <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Autor</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['autor1'].'">
								              </div>
								            </div>
							            </div>


							            <div class="col-md-6" style="border:2px solid #E2DBDB; padding-bottom: 2%;">
							                <div class="row"> <!--Para hacer la fila-->
							                  <div class="col-12 col-md-12">
							                    <center><label for="validationCustom01">Folio Libro</label></center>
							                    <input type="text" id="FL2" class="FL2 form-control" id="validationCustom01" name="Folio2" value="'.$row['folio2'].'">
							                  </div>
							                </div>
							                 <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Titulo</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['libro2'].'">
								              </div>
								            </div>
								            <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Autor</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['autor2'].'">
								              </div>
								            </div>
								            
							            </div>
				            		</div>
				           
						  		';

                            }else if($diasHabiles==$Actual){
                            	echo 'Debe $'. (($diasHabiles+1)*5).' por '.($diasHabiles+1).' dias de retrazo';
                             	echo '
                             	<input type="hidden" name="id" value="'.$row["Id_Prestamo"].'">
						  		  	<div class="row"> <!--Para hacer la fila-->
						              <div class="col-12 col-md-6">
						                <label for="validationCustom01">Nombre</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['Nombre_Almno'].'">
						              </div>
						              <div class="col-6 col-md-3">
						                <label for="validationCustom01">Grado y grupo</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Grado" value="'.$row['grupo'].'">
						              </div>
						              <div class="col-6 col-md-3">
						                <label for="validationCustom01">Turno</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Turno" value="'.$row['turno'].'">
						              </div>
				            		</div> 

				            		<br>
				            		<div class="row"> 
				            			
										<div class="col-md-6" style="border:2px solid #E2DBDB; padding-bottom: 2%;">
							                <div class="row">
							                  <div class="col-12 col-md-12">
							                    <center><label for="validationCustom01">Folio Libro </label></center>
							                    <input type="text" id="FL1" class="FL1 form-control" id="validationCustom01"  name="Folio" value="'.$row['folio1'].'">
							                  </div>
							                </div>
							                <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Titulo</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['libro1'].'">
								              </div>
								            </div>
								            <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Autor</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['autor1'].'">
								              </div>
								            </div>
							            </div>


							            <div class="col-md-6" style="border:2px solid #E2DBDB; padding-bottom: 2%;">
							                <div class="row"> <!--Para hacer la fila-->
							                  <div class="col-12 col-md-12">
							                    <center><label for="validationCustom01">Folio Libro</label></center>
							                    <input type="text" id="FL2" class="FL2 form-control" id="validationCustom01" name="Folio2" value="'.$row['folio2'].'">
							                  </div>
							                </div>
							                 <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Titulo</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['libro2'].'">
								              </div>
								            </div>
								            <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Autor</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['autor2'].'">
								              </div>
								            </div>
								            
							            </div>
				            		</div>
				           
						  		';

                            }else {
                              	echo 'Debe $0 por 0 dias de retrazo';
                              	echo '
                             	<input type="hidden" name="id" value="'.$row["Id_Prestamo"].'">
						  		  	<div class="row"> <!--Para hacer la fila-->
						              <div class="col-12 col-md-6">
						                <label for="validationCustom01">Nombre</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['Nombre_Almno'].'">
						              </div>
						              <div class="col-6 col-md-3">
						                <label for="validationCustom01">Grado y grupo</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Grado" value="'.$row['grupo'].'">
						              </div>
						              <div class="col-6 col-md-3">
						                <label for="validationCustom01">Turno</label>
						                <input type="text" class="form-control" id="validationCustom01" required name="Turno" value="'.$row['turno'].'">
						              </div>
				            		</div> 

				            		<br>
				            		<div class="row"> 
				            			
										<div class="col-md-6" style="border:2px solid #E2DBDB; padding-bottom: 2%;">
							                <div class="row">
							                  <div class="col-12 col-md-12">
							                    <center><label for="validationCustom01">Folio Libro </label></center>
							                    <input type="text" id="FL1" class="FL1 form-control" id="validationCustom01"  name="Folio" value="'.$row['folio1'].'">
							                  </div>
							                </div>
							                <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Titulo</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['libro1'].'">
								              </div>
								            </div>
								            <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Autor</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['autor1'].'">
								              </div>
								            </div>
							            </div>


							            <div class="col-md-6" style="border:2px solid #E2DBDB; padding-bottom: 2%;">
							                <div class="row"> <!--Para hacer la fila-->
							                  <div class="col-12 col-md-12">
							                    <center><label for="validationCustom01">Folio Libro</label></center>
							                    <input type="text" id="FL2" class="FL2 form-control" id="validationCustom01" name="Folio2" value="'.$row['folio2'].'">
							                  </div>
							                </div>
							                 <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Titulo</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['libro2'].'">
								              </div>
								            </div>
								            <div class="row"> 
								              <div class="col-12 col-md-12">
								                <label for="validationCustom01">Autor</label>
								                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['autor2'].'">
								              </div>
								            </div>
								            
							            </div>
				            		</div>
				           
						  		';



                                    }
                                   
                                  
                               }
                               $mysqli->next_result();



		  	}
	  	}else{
	  		
	  	}
	  	

	}


}

	
MatriculaD();
?>