<?php 

if(!isset($_POST['BuscarLibro'])) exit('No se recibió el valor a buscar');

require '../SQL/conexion2.php';

function BuscarLibro()
{
	
	$mysqli = getConnexion();
	$BuscarLibro = $mysqli->real_escape_string($_POST['BuscarLibro']);

	if($BuscarLibro==""){
	 		  
	  		$query="select * from libro";
            $res=$mysqli->query($query);

            echo '<table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Materia</th>
                  <th scope="col">Folio</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Autor</th>
                  <th scope="col">Editorial</th>
                  <th scope="col">Año</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>';

                while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                  echo '
                    <tr>
                      <th scope="row">'.$row["Materia"].'</th>
                      <td>'.$row["Folio"].'</td>
                      <td>'.$row["Titulo"].'</td>
                      <td>'.$row["Autor"].'</td>
                      <td>'.$row["Editorial"].'</td>
                      <td>'.$row["Año"].'</td>
                      <td>'.$row["Cant_Libros"].'</td>
                      <td>
                       <form action="form.php" method="POST" name="formulario1" >
                          <input type="hidden" value="'.$row["Folio"].'" name="folio">
                          
                        <button type="submit" class="btn btn-outline-success btn-sm"  name="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        
                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#EliminarLibro">
                              <i class="fa fa-times" aria-hidden="true"></i>
                          </button></form>


                        <div class="modal fade" id="EliminarLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar libro </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">¿Esta seguro que desea eliminar el libro <b>'.$row["Titulo"].'</b> con folio <b>'.$row["Folio"].'</b>?</div>
                              

                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" href="ListaLibros.php">Realizar</a>

                              </div>
                            </div>
                          </div>
                        </div>
                     </td>
                    </tr>
                  ';
                }

                
             echo' </tbody>
            </table>';
	  
	}else {

		$query = "SELECT * FROM libro WHERE 
		Materia like '%".$BuscarLibro."%' or 
		Folio like '%".$BuscarLibro."%' or 
		Titulo like '%".$BuscarLibro."%' or 
		Autor like '%".$BuscarLibro."%' or 
		Editorial like '%".$BuscarLibro."%' or 
		Año like '%".$BuscarLibro."%' or 
		Cant_Libros like '%".$BuscarLibro."%'  " ;
		
		$res = $mysqli->query($query);
		
		if(mysqli_num_rows($res) != 0){
	  			  
		  	echo '<table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Materia</th>
                  <th scope="col">Folio</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Autor</th>
                  <th scope="col">Editorial</th>
                  <th scope="col">Año</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>';

                while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                  echo '
                    <tr>
                      <th scope="row">'.$row["Materia"].'</th>
                      <td>'.$row["Folio"].'</td>
                      <td>'.$row["Titulo"].'</td>
                      <td>'.$row["Autor"].'</td>
                      <td>'.$row["Editorial"].'</td>
                      <td>'.$row["Año"].'</td>
                      <td>'.$row["Cant_Libros"].'</td>
                      <td>
                       <form action="form.php" method="POST" name="formulario1" >
                          <input type="hidden" value="'.$row["Folio"].'" name="folio">
                          
                        <button type="submit" class="btn btn-outline-success btn-sm"  name="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        
                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#EliminarLibro">
                              <i class="fa fa-times" aria-hidden="true"></i>
                          </button></form>


                        <div class="modal fade" id="EliminarLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar libro </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">¿Esta seguro que desea  eliminar el libro <b>'.$row["Titulo"].'</b> con folio <b>'.$row["Folio"].'</b>?</div>
                              

                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" href="ListaLibros.php">Realizar</a>

                              </div>
                            </div>
                          </div>
                        </div>
					           </td>
                    </tr>
                  ';
                }

                
             echo' </tbody>
            </table>';
	  	}else{
	  		echo 'No hay resultados con ese dato';
	  		
	  	}
	  	

	}


}

	
BuscarLibro();
?>