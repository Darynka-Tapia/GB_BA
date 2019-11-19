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
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div id="cargando"><img src="Imagenes/Carga.gif" alt=""></div>
       <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
      <script>
      $(window).load(function () {
      $('#cargando').hide();
      });
      </script>
      <style type="text/css">
      
      #cargando {
      position:absolute;
  color: black;
  background-color: #fff;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 1000;
  text-align: center;
  visibility: visible;
  
      }
      </style>
        <div class="card-header">
          <i class="fa fa-table"></i>Lista de libros</div>
        <div class="card-body">
           <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Materia</th>
                  <th>Folio</th>
                  <th>Titulo</th>
                  <th>Autor</th>
                  <th>Editorial</th>
                  <th>Año</th>
                  <th>Cantidad</th>
                  <th>Acción</th>
                </tr>
              </thead>

              <tbody>
          <?php
               require 'SQL/conexion.php';
                $query="select * from libro";
                $res=$mysqli->query($query);
                while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                  echo '
                    <tr>
                      <th scope="row">'.$row["Materia"].'</th>
                      <td>'.$row["Folio"].' </td>
                      <td>'.$row["Titulo"].'</td>
                      <td>'.$row["Autor"].'</td>
                      <td>'.$row["Editorial"].'</td>
                      <td>'.$row["Año"].'</td>
                      <td>'.$row["Cant_Libros"].'</td>
                      <td>
                        <form action="libros.php" method="POST" name="formulario1" >
                          <input type="hidden" value="'.$row["Folio"].'" name="folio">
                          <input type="hidden" value="modificar" name="mod">
                          
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
                                

                                <form action="php/registros/EliminarLibro.php" method="POST">
                                <input type="hidden" value="'.$row["Folio"].'" name="Folio">
                                  <input class="btn btn-primary" type="submit" value="Realizar" name="eliminar">
                                </form>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                     </td>
                    </tr>

                  ';
                }
          ?>
        </tbody>
        </table>
      </div>


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
