<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    require('Estructura/head.php');
  ?>
</head>


  <!-- Navigation-->
  <?php
    require('Estructura/Nav.php');
  ?>


  <div class="content-wrapper">
    <div class="container-fluid">
      
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Registrar Materias</div>
        <div class="card-body">

      <?php
      error_reporting(E_ALL ^ E_NOTICE);
        $modificar=$_POST['mod'];
        $folio=$_POST['folio'];
        if($modificar=="modificar"){

          $query="select * from asignatura where Id_Asignatura='".$folio."'";
          $res=$mysqli->query($query);
          while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            echo '

                <div class="card mb-3">
                <div class="card-header">
                  <input type="radio" name="radio" onclick="cambiarVisibilidad2()"> Desde Excel </div>
                <div class="no-gutters card-body" id="libro1" style="display:none;">
                
                <div class="container-fluid">
                  <form class="form" method="post" enctype="multipart/form-data" action="Acciones/leerMateria.php">

                                <div class="form-group">
                                    <span class="colNoir col-md-4 ">Subir Archivo Excel: </span>
                                    <div class="col-md-12">
                                        <input id="fname" name="imagen" type="file" placeholder="Upload" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="colNoir col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Realizar Registros</button>
                                    </div>
                                </div>
                        </form>
                </div> 
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-header">
                  <input type="radio" name="radio" onclick="cambiarVisibilidad3()"> Manual </div>
                <div class="no-gutters card-body" id="libro2" style="display:block;">
                
                <div class="container-fluid">
                  <form class="container" id="needs-validation" method="POST" novalidate action="php/registros/ModificarMateria.php"> 

                    <div class="row"> 
                      <div class="col-12 col-md-6">
                        <label for="validationCustom01">TÍTULOS/ACTUALES</label>
                        <input type="text" class="form-control" id="validationCustom01" value="'.$row["Nombre_asignatura"].'" name="Nombre_asignatura">
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="validationCustom01">PIEZAS/VOLÚMENES</label>
                        <input type="text" class="form-control" id="validationCustom01" value="'.$row["Total_libros"].'" name="Total_libros">
                      </div>
                    </div>

                    

                   <br>
                    <div class="form-group">
                      <div class="colNoir col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Modificar</button>
                      </div>
                    </div>
                    <input type="hidden" value="'.$row["Id_Asignatura"].'" name="Id_Asignatura">
                    <input type="hidden" value="Modificar" name="Accion">
                  </form>
                    
                      <a href="Libros.php"><- Volver a registrar una Materia...</a>
                    
                </div> 
                </div>
              </div>

              ';

          }
        }else{
          echo '

              <div class="card mb-3">
              <div class="card-header">
                <input type="radio" name="radio" onclick="cambiarVisibilidad2()"> Desde Excel </div>
              <div class="no-gutters card-body" id="libro1" style="display:none;">
              
              <div class="container-fluid">
                <form class="form" method="post" enctype="multipart/form-data" action="Acciones/leerMateria.php">

                              <div class="form-group">
                                  <span class="colNoir col-md-4 ">Subir Archivo Excel: </span>
                                  <div class="col-md-12">
                                      <input id="fname" name="imagen" type="file" placeholder="Upload" class="form-control" required>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="colNoir col-md-12 text-center">
                                      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                  </div>
                              </div>
                      </form>
              </div> 
              </div>
            </div>

            <div class="card mb-3">
              <div class="card-header">
                <input type="radio" name="radio" onclick="cambiarVisibilidad3()"> Manual </div>
              <div class="no-gutters card-body" id="libro2" style="display:none;">
              
              <div class="container-fluid">
                <form class="container" id="needs-validation" method="POST" novalidate action="php/registros/ModificarMateria.php">

                  <div class="row"> 
                      <div class="col-12 col-md-6">
                        <label for="validationCustom01">TÍTULOS/ACTUALES</label>
                        <input type="text" class="form-control" id="validationCustom01" name="Nombre_asignatura">
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="validationCustom01">PIEZAS/VOLÚMENES</label>
                        <input type="text" class="form-control" id="validationCustom01" name="Total_libros">
                      </div>
                    </div>

                  

                  <br>
                  <div class="form-group">
                      <div class="colNoir col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                      </div>
                  </div>
                  <input type="hidden" value="Registrar" name="Accion">
                </form>
              </div> 
              </div>
            </div>

      ';
        }
      ?>

        </div>
      </div>
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      <?php
        require('Estructura/footer.php');
      ?>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>


        <!-- Logout Modal-->
      <?php
        require('Estructura/ModalCierre.php');
      ?>

      <?php
        require('Estructura/ModalColor.php');
      ?>





        <!-- Bootstrap core JavaScript-->
          <?php
         require('Estructura/script.php');
      ?>
  </div>
</body>

</html>
