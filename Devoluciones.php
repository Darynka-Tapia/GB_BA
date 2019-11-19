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
          <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Devoluciones</div>
        <div class="card-body">

          
          <div class="container-fluid">
          <form class="container" id="needs-validation" method="POST" action="php/registros/DevolverLibros.php" novalidate> <!--Para hacer el formulario (campos)-->
            <div class="row"> <!--Para hacer la fila-->
              <div class="col-0 col-md-4"></div>
              <div class="col-12 col-md-4">
                <center><label for="validationCustom01" >Matricula</label></center>
                <input type="text" id="MatriculaD" class="MatriculaD form-control" id="validationCustom01" name="MatriculaD" required>
              </div>
              <div class="col-0 col-md-4"></div>

            </div>
            <div id="res">
            </div>
            <br>
            

            <div class="row"> <!--Para hacer la fila-->
              <div class="col-0 col-md-5"></div>
              <div class="col-12 col-md-2"><br>
                <input type="submit" class="btn btn-primary btn-block" value="Devolver">
                
              </div>
              <div class="col-0 col-md-5"></div>

            </div>
          </form>
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
    <script type="text/javascript" src="js/MATRICULAD.js"></script>
  </div>
</body>

</html>
