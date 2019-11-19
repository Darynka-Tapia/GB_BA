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
           <i class="fa fa-users" aria-hidden="true"></i> Visitas
        </div>
        <div class="card-body">


          <div class="container-fluid">
                      
            <div class="card mb-3">
              <div class="card-header">
                  <input type="radio" name="radio" onclick="cambiarVisibilidad2()"> <i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-male" aria-hidden="true"></i> Grupal 
              </div>
                <div class="card-body" id="libro1" style="display:none;">
                  <div class="container-fluid">
                    <form class="container" id="needs-validation" method="POST" novalidate action="php/registros/visitasr.php"> <!--Para hacer el formulario (campos)-->

                       <div class="row"> <!--Para hacer la fila-->

                          <div class="col-6 col-md-3">
                              <label for="validationCustom01">Grado </label>
                              <input type="text" class="form-control" id="validationCustom01" required name="Grado" maxlength="2">
                          </div>

                          <div class="col-6 col-md-3">
                              <label for="validationCustom01">Grupo </label>
                              <input type="text" class="form-control" id="validationCustom01" required name="Grupo">
                          </div>

                      </div>

                      <div class="row"> <!--Para hacer la fila-->

                          <div class="col-12 col-md-6">
                              <label for="validationCustom01">Profesor Encargado</label>
                              <input type="text" class="form-control" id="validationCustom01" required name="ProfesorEncargado">
                          </div>

                          <div class="col-12 col-md-6">
                              <label for="validationCustom01">Materia</label>
                              <input type="text" class="form-control" id="validationCustom01" required name="Materia">
                          </div>
                          <input type="hidden" value="grupal" name="visita">

                      </div><br>
                        <div class="form-group">
                          <div class="colNoir col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                          </div>
                       </div>
                    </form>
                  </div>  
                </div>
              </div>
          </div>
                  <div class="container-fluid">
                        <div class="card mb-3">
                      <div class="card-header">
                        <input type="radio" name="radio" onclick="cambiarVisibilidad3()"> <i class="fa fa-male" aria-hidden="true"></i> Individual </div>
                      <div class="card-body" id="libro2" style="display:none;">
                        
                        <div class="container-fluid">
                        <form class="container" id="needs-validation" method="POST" novalidate action="php/registros/visitasr.php"> <!--Para hacer el formulario (campos)-->

                          <div class="row"> 
                            <div class="col-12 col-md-6">
                              <center><label for="validationCustom01" >Matricula</label></center>
                              <input type="number" id="Matricula" class="Matricula form-control" id="validationCustom01" name="Matricula" required min="00000000" max="99999999" step="1" pattern="\d+">
                            </div>
                            

                          </div>
                          <div id="res">
                          </div>
                          <br>
                          <input type="hidden" value="individual" name="visita">
                          <div class="form-group">
                            <div class="colNoir col-md-12 text-center">
                              <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                            </div>
                          </div>


                        </form>
                      </div>  
                      </div>
                    </div>
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


    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/MATRICULA.js"></script>
    <script type="text/javascript" src="js/FL1.js"></script>
    <script type="text/javascript" src="js/FL2.js"></script>
  </div>
</body>

</html>
