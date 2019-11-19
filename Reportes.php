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
          <i class="fa fa-file-text-o" aria-hidden="true"></i> Reporte de "INVENTARIO DE LIBROS BIBLIOTECA COBACH" </div>
        <div class="card-body">
          <form action="REPORTES/reporte.php" method="POST">
           <div class="row">
            <div class="col-md-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Selecciona el mes...</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="mes">
              <option selected>...</option>
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
          </div>
       
         </div>
       </div>
       <div class="row">
         <div class="col-md-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Selecciona el año..</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="año">
              <option selected>...</option>
              <?php
                for ($i=2018; $i<2030; $i++){
                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
              ?>
            </select> </div></div>
          </div>
          <input type="submit" class="btn btn-primary" value="Realizar">
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
  </div>
</body>

</html>
