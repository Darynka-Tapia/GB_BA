<!DOCTYPE html>
<html lang="es">

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
          <i class="fa fa-pencil" aria-hidden="true"></i> Modificar Informacion Personal</div>
        <div class="card-body">
          <form action="php/registros/ModificarPersonal.php" method="POST" autocomplete="off">
            <?php
              require('SQL/conexion.php');
              $InfoPersonal='SELECT * FROM admin where Nombre="'.$_SESSION['Administrador'].'"';
              $resulInfo=$mysqli->query($InfoPersonal);
              while ($rowInfo = $resulInfo->fetch_array(MYSQLI_ASSOC)) {
                  echo '<input type="hidden" value="'.$rowInfo["Id_Admin"].'" name="Id_Admin">';

                  ?>
          <div class="form-group">

            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nombre Completo</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?php echo $rowInfo["Nombre"]; ?>" name="nombre" Required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
               <div class="col-md-6">
                <label for="exampleInputLastName">Cargo</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" value="<?php echo $rowInfo["Cargo"]; ?>"  name="cargo" Required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">Turno</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?php echo $rowInfo["Turno"]; ?>"   name="turno" Required>
              </div>
             
            </div>
          </div>
          
        <?php } ?>
          
          <center><input type="submit" class="btn btn-primary btn-lg" value="Modificar"></center>
        </form>
        </div>
      </div>







<script>
  function aler(){
    
  }
</script>






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
