<!DOCTYPE html>
<html lang="en">

<head> 
  <?php
    require('Estructura/head.php');
  ?>
</head>

  <?php
    require('Estructura/Nav.php');
  ?>


<div class="content-wrapper">
    <div class="container-fluid">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Prestamo "primera vez"</div>
        <div class="card-body">

          
          <div class="container-fluid">
          <form class="container" id="needs-validation" method="POST" action="php/registros/prestamos.php" novalidate> <!--Para hacer el formulario (campos)-->
            <div class="row"> <!--Para hacer la fila-->
              <div class="col-0 col-md-4"></div>
              <div class="col-12 col-md-4">
                <center><label for="validationCustom01" >Matricula</label></center>
                <input type="text" id="Matricula" class="Matricula form-control" id="validationCustom01" name="Matricula" required>
              </div>
              <div class="col-0 col-md-4"></div>

            </div>
            <div id="res">
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-12 col-md-12">
                    <center><label for="validationCustom01">Folio Libro </label></center>
                    <input type="text" id="FL1" class="FL1 form-control" id="validationCustom01"  name="Folio" required>
                  </div>
                </div>
                <div id="resf">
                </div>
              </div>
              <div class="col-md-6">
                <div class="row"> <!--Para hacer la fila-->
                  <div class="col-12 col-md-12">
                    <center><label for="validationCustom01">Folio Libro</label></center>
                    <input type="text" id="FL2" class="FL2 form-control" id="validationCustom01" name="Folio2" required>
                  </div>
                </div>
                <div id="resf2">
                </div>
              </div>
            </div><br>
            <div class="row"> <!--Para hacer la fila-->
              <div class="col-12 col-md-6">
                <center><label for="validationCustom01">Fecha de salida</label></center>
                <?php
                  $fecha=time(); 
                  $fecha = $fecha-(60 * 60 * 7); 
                  $fechaActual = date("Y-m-d", $fecha ); 
                  $numDia=date("w", strtotime($fechaActual));

                  if($numDia>=1 and $numDia<4){
                      $mod_date = strtotime($fechaActual."+ 2 days");
                      $fechaDevolucion=date("Y-m-d",$mod_date);
                      //echo 'es lunes, martes, miercoles o jueves';
                  }else if($numDia==6 || $numDia==0){
                      $fechaActual="Hoy no se hacen prestamos";
                      $fechaDevolucion="Hoy no se hacen prestamos";
                      //echo 'es sabado o domingo';
                   }else if ($numDia==5){
                      //echo 'hoy es viernes';
                      $mod_date = strtotime($fechaActual."+ 4 days");
                      $fechaDevolucion=date("Y-m-d",$mod_date);
                  }else if($numDia==4){
                    $mod_date = strtotime($fechaActual."+ 4 days");
                      $fechaDevolucion=date("Y-m-d",$mod_date);
                  }

             
                ?>
                <input type="text" class="form-control" id="validationCustom01" required  value="<?php echo  $fechaActual; ?>" disabled>
                <input type="hidden" class="form-control" id="validationCustom01" required name="Fentrega" value="<?php echo  $fechaActual; ?>">
              </div>
              <div class="col-12 col-md-6">
                <center><label for="validationCustom01">Fecha devolucion</label></center>
                <input type="text" class="form-control" id="validationCustom01" required value="<?php echo $fechaDevolucion;?>" disabled>
                <input type="hidden" class="form-control" id="validationCustom01" required name="Fdevolucion" value="<?php echo $fechaDevolucion;?>" >
              </div> 
            </div>

            <div class="row"> <!--Para hacer la fila-->
              <div class="col-0 col-md-5"></div>
              <div class="col-12 col-md-2"><br>
                <input type="submit" class="btn btn-primary btn-block" value="Realizar">
                
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
      

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/MATRICULA.js"></script>
    <script type="text/javascript" src="js/FL1.js"></script>
    <script type="text/javascript" src="js/FL2.js"></script>
  </div>
</body>

</html>
