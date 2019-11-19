<?php 

if(!isset($_POST['Visitas'])) exit('No se recibió el valor a buscar');

require '../SQL/conexion2.php';

function Visitas()
{
	
	$mysqli = getConnexion();
	$Visitas = $mysqli->real_escape_string($_POST['Visitas']);

  $query="select * from alumno where Matricula='".$Visitas."'";
  $res=$mysqli->query($query);

	if($Visitas==""){
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                
    }	  
	}else {
     /* echo '<div class="col-12 col-md-6">
                              <label for="validationCustom01">Alumno</label>
                              <input type="text" class="form-control" id="validationCustom01" required name="Alumno">
                            </div>
                          
                            <div class="col-6 col-md-3">
                              <label for="validationCustom01">Grado </label>
                              <input type="text" class="form-control" id="validationCustom01" required name="Grado">
                            </div>

                            <div class="col-6 col-md-3">
                              <label for="validationCustom01">Grupo </label>
                              <input type="text" class="form-control" id="validationCustom01" required name="Grupo">
                            </div>';*/
    echo 'Realizo Busqueda Automatica';
	}


}

	
Visitas();
?>