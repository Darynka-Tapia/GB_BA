<?php 

if(!isset($_POST['Matricula'])) exit('No se recibió el valor a buscar');

require '../SQL/conexion2.php';

function Matricula()
{
	
	$mysqli = getConnexion();
	$Matricula = $mysqli->real_escape_string($_POST['Matricula']);

	if($Matricula==""){
	 		  
	  
	}else {

		$query = "SELECT * FROM alumno WHERE 
		Matricula = ".$Matricula." ";
		
		$res = $mysqli->query($query);
		
		if(mysqli_num_rows($res) != 0){
	  			  
		  	while ($row = $res->fetch_array(MYSQLI_ASSOC)) {

		  		echo '
		  		  <div class="row"> <!--Para hacer la fila-->
              <div class="col-12 col-md-6">
                <label for="validationCustom01">Nombre</label>
                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['Nombre_alumno'].'">
              </div>
              <div class="col-6 col-md-3">
                <label for="validationCustom01">Grado y grupo</label>
                <input type="text" class="form-control" id="validationCustom01" required name="Grado" value="'.$row['Grupo'].'">
              </div>

              <div class="col-6 col-md-3">
                <label for="validationCustom01">Turno</label>
                <input type="text" class="form-control" id="validationCustom01" required name="Turno" value="'.$row['Turno'].'">
              </div>

            </div> 
           
		  		';

		  	}
	  	}else{
	  		
	  	}
	  	

	}


}

	
Matricula();
?>