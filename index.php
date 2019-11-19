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
          <i class="fa fa-home" aria-hidden="true"></i> Inicio</div>
        <div class="card-body">
          <center>

             <?php
             require 'SQL/conexion.php';
      $sqlBachi="Select * from logos where NombreLogo='logoBachilleres'";
      $resBachi=$mysqli->query($sqlBachi);
      while ($rowb = $resBachi->fetch_array(MYSQLI_ASSOC)) {
        //echo '<script> alert("Ruta:'.$rowg['RutaLogo'].' "); </script>';
       
        echo '<img src="'.$rowb['RutaLogo'].'" width="30%" height="30%">';
      }
    ?>
        <br>
          <p><h5>NOMBRE DE LA BIBLIOTECA: “BERTHA VON GLUMER LEYVA”</p>
          <p>CLAVE DE LA BIBLIOTECA: 12BBE0134M</h5></p>
            
          <b><h2><p>PLANTEL N°. 6</p>
          <p>PETATLÁN, GRO.</p>

         <p> BIBLIOTECA</p></h2></b></center>

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
