

<!DOCTYPE html>
<html lang="es">
<head>
  <?php
    require('Estructura/head.php');
  ?>
</head>

<?php

ob_start();

  require('SQL/conexion.php');

  error_reporting(E_ALL ^ E_NOTICE);
  $ColorVentana=$_POST['colores1'];
  $ColorVentana=$_POST['colores2'];
 
  //$color=$_GET['color'];
    
                 
    $sql = "SELECT parametro, hexa from coloressistem";

     $res = $mysqli->query($sql);

      while ($row = $res->fetch_array(MYSQLI_ASSOC)) {

       echo '<body class="bg-'.$row["parametro"].'" style="background: #'.$row["hexa"].'">';
       
     }     
?>

 <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login <b>GB-Ba</b></div>
        <div class="card-body">

      <form action="login.php" method="POST">
            <div class="form-group" >
              <label for="exampleInputEmail1">Nombre Usuario</label>
              <input 
                class="form-control" 
                id="exampleInputEmail1" 
                type="text" 
                name="usuario" 
                aria-describedby="emailHelp" 
                placeholder="Enter email">
              
          </div>
        <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input 
                  class="form-control" 
                  id="exampleInputPassword1" 
                  type="password" 
                  name="contraseña" 
                  placeholder="Password">
              </div>
            
        <!--<input class="btn btn-primary btn-block mt-4" type="submit" value="Ajouter" name="Ajouter">-->
            <input class="btn btn-primary btn-block mt-4" type="submit" value="Entrar" name="Ouvrir">
        </form>
          <div class="text-center">
         
        </div>
      </div>
    </div>
  </div>
<style>

.Error{
  color: #000000;
  background: #FFF95C;
  width: 100%;
}


</style>

    <?php
    error_reporting(E_ALL ^ E_NOTICE);

  $usuario=$_POST['usuario'];
  $contraseña=$_POST['contraseña'];

        $contador=0;
        $sql2="Select * from  admin where nombre = '".$usuario."';";
        $res2 = $mysqli->query($sql2);

        while ($row = $res2->fetch_array(MYSQLI_ASSOC)) {
          //echo $row['Nombre'].'<br>'.$row['contraseña'].'';

        if(password_verify($contraseña, $row['Contraseña'])){
          $contador++;
          echo $contador;
        }
      }

      if($contador>0){
        session_start();
        $_SESSION['Administrador']=$usuario;
        header('location:index.php');
        //
      }else{
        //echo '<div class="p-2 pt-3 bg-danger text-white mt-3"><p class="text-center">Usuario y/o contraseña incorrectos</p></div>';

      }

 
  
    ?>



 <?php
    require('Estructura/script.php');
  ?>

</body>
</html>

