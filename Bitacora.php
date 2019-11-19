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
        <div class="card-header">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i> Bitacora</div>
        <div class="card-body">
          
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
