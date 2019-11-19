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
          <i class="fa fa-pencil" aria-hidden="true"></i> Registrar Usuario</div>
        <div class="card-body">
          <form action="Registrar.php" method="POST" autocomplete="off">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nombre Completo</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Escribir nombre completo" name="nombre" Required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Cargo</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Escribir el cargo del usuario" name="cargo" Required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Turno</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Escribir el turno del usuario"  name="turno" Required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Categoria</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" value="usuario"  name="categoria" Required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Contraseña</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Contraseña" name="contraseña" Required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirma Contraseña</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirmar Contraseña" name="confirmar" Required>
              </div>
            </div>
          </div>

                <?php
                  require('SQL/conexion.php');

                  error_reporting(E_ALL ^ E_NOTICE);
                  $nombre=$_POST['nombre'];
                  $cargo=$_POST['cargo'];
                  $turno=$_POST['turno'];
                  $categoria=$_POST['categoria'];
                  $contraseña=$_POST['contraseña'];
                  $confirmar=$_POST['confirmar'];
                  $ContraseñaEncryptada = password_hash($contraseña, PASSWORD_DEFAULT);


                  //echo $nombre.'<br>'.$cargo.'<br>'.$turno.'<br>'.$categoria.'<br>'.$contraseña.'<br>'.$confirmar.'<br>'.$pregunta1.'<br>'.$pregunta2;
                  if($contraseña=="" and $contraseña==""){

                  }else if($contraseña==$confirmar){
                    $querys="INSERT INTO admin( Nombre, Cargo, Turno, Contraseña, categoria) VALUES ('".$nombre."','".$cargo."','".$turno."','".$ContraseñaEncryptada."','".$categoria."')";
                   
                    $rest = $mysqli->query($querys);
                  }else{
                    echo '<script>';
                    echo 'alert("Contraseñas Diferentes, No se hizo el registro. ");';
                    echo '</script>';
                    /*echo '            
                        <div class="form-group" >
                          <div class="form-row" >
                          <div class="col-md-3"></div>
                            <div class="col-md-6" style="background:#F47E16; color:#FFFFFF"; >
                               <center>Contraseñas Diferentes</center>
                            </div>
                            <div class="col-md-3"></div>
                          </div>
                        </div>';*/
                  }

                ?>
         
          <center><input type="submit" class="btn btn-primary btn-lg" value="Registrar"></center>
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
