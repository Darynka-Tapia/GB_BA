<?php
 session_start();

       if(!isset($_SESSION['Administrador'])){
         header('Location:login.php');
         echo 'No hay sesion iniciada ';
       }else {

ob_start();

  require('SQL/conexion.php');

  //$mysqli = getConnexion();
  error_reporting(E_ALL ^ E_NOTICE);
  $ColorVentana=$_POST['colores1'];
  $ColorVentana=$_POST['colores2'];
 
  //$color=$_GET['color'];
    
                 
    $sql = "SELECT parametro, hexa from coloressistem";

    $res = $mysqli->query($sql);

      while ($row = $res->fetch_array(MYSQLI_ASSOC)) {

       echo '<body class="fixed-nav sticky-footer bg-'.$row["parametro"].'" id="page-top" style="background:#aacda8;">';
       echo' <nav class="navbar navbar-expand-lg navbar-'.$row["parametro"].' bg-'.$row["parametro"].' fixed-top" id="mainNav" style="background: #'.$row["hexa"].'"> ';
       
     }
?> 
 <?php
      $sqlBachi="Select * from logos where NombreLogo='logoBachilleres'";
      $resBachi=$mysqli->query($sqlBachi);
      while ($rowb = $resBachi->fetch_array(MYSQLI_ASSOC)) {
        //echo '<script> alert("Ruta:'.$rowg['RutaLogo'].' "); </script>';
        echo '<img src="'.$rowb['RutaLogo'].'" width="8%" height="8%" style="margin-left: 4%; margin-right: 2%">';
      }
    ?>
    <h5 class="navbar-brand" href="index.php" style="margin-left: 5%">Gestion Bibliotecaria GB-Ba</h5> 
    <?php
      $sqlGro="Select * from logos where NombreLogo='logoGuerrero'";
      $resGro=$mysqli->query($sqlGro);
      while ($rowg = $resGro->fetch_array(MYSQLI_ASSOC)) {
        //echo '<script> alert("Ruta:'.$rowg['RutaLogo'].' "); </script>';
        echo '<img src="'.$rowg['RutaLogo'].'" width="8%" height="8%" style="margin-left: 2%; margin-right: 2%">';
      }
    ?>
      
 
    
  
   
    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"  >
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>


    <div class="collapse navbar-collapse" id="navbarResponsive" >
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
          <a class="nav-link" href="index.php">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="nav-link-text">Inicio</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prestamos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePrest" data-parent="#exampleAccordion">
            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
            <span class="nav-link-text">Prestamos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePrest">
            <li>
              <a href="Primera.php">Primera Vez</a>
            </li>
            <li>
              <a href="Renovaciones.php">Renovaciones</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Devoluciones">
          <a class="nav-link" href="Devoluciones.php">
            <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
            <span class="nav-link-text">Devoluciones</span>
          </a>
        </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Listas de libros">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponent2s" data-parent="#exampleAccordion">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span class="nav-link-text">Listas</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponent2s">
            <li>
              <a href="ListaLibros.php" onclick="espera();" >Libros</a>
            </li>
            <li>
              <a href="ListaMaterias.php">Materias</a>
            </li>
            <li>
              <a href="ListaAlumnos.php">Alumnos</a>
            </li>
            <li>
              <a href="ListaVisitas.php">Visitas</a>
            </li>
            <li>
              <a href="ListaPrestamos.php">Prestamos</a>
            </li>
          </ul>
        </li>
        
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registros">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            <span class="nav-link-text">Registros</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="Libros.php">Libros</a>
            </li>
            <li>
              <a href="Materias.php">Materias</a>
            </li>
            <li>
              <a href="Alumnos.php">Alumnos</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Visitas">
          <a class="nav-link" href="Visitas.php">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">Visitas</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes">
          <a class="nav-link" href="Reportes.php">
          <i class="fa fa-file-text-o" aria-hidden="true"></i>
            <span class="nav-link-text">Reportes</span>
          </a>
        </li>

        


      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>


      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item dropdown">
          <div class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="" aria-haspopup="true" aria-expanded="false">
            <a href="fechasDeudores.php" id="alertas" style="color: #000000;"><label for="alertas" style="cursor: pointer"><i class="fa fa-fw fa-bell"></i></label></a>
            

              <?php
               $sql = "SELECT p.*, a.Nombre_alumno FROM prestamo p INNER JOIN alumno a ON p.Matricula=a.Matricula";
               $ContadorAlertas=0;
               $fechaActual=date("Y-m-d");
               $rs1 = $mysqli->query($sql);
                while ($row1 = $rs1->fetch_array(MYSQLI_ASSOC)) {
                  $query ="call prueba6('".$row1['fecha_fin']."','".$fechaActual."');";
                  //echo $query.'<br>';  
                   $rs = $mysqli->query($query);
                  
                  
                  while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
                    $diasHabiles=$row["Dias"]-$row["SumaSabadoDomingo"];
                    
                        if($diasHabiles>=0){
                           $ContadorAlertas++;
                        }
                       
                   }
                   
                   $mysqli->next_result();

                }

                echo'            <span class="d-lg-none">Alertas
              <span class="badge badge-pill badge-danger">'.$ContadorAlertas.' Deudores</span>
            </span>
            <span class="indicator text-danger d-none d-lg-block" style="margin-left: 5%;">
              <i class="fa fa-fw fa-circle"> <FONT SIZE=3> '.$ContadorAlertas.'</FONT></i>
            </span>';

              ?>
             
          </div>
          
        </li>


        <li class="nav-item dropdown">
          <div class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!--<i class="fa fa-cogs" aria-hidden="true"></i>-->
            <i class="fa fa-cog" aria-hidden="true"></i>
            <span class="d-lg-none">Configuración</span>
          </div>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Perfil de: Usuario</h6>

            <?php
               $sql = "SELECT * from admin where Nombre='".$_SESSION['Administrador']."';";
               
               $rs1 = $mysqli->query($sql);

                while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
                  if($row['categoria']=="usuario"){
                   
                    
                  }else{
                    echo ' 
                    <div class="dropdown-divider"></div>
                      <a class="dropdown-item" data-toggle="modal" data-target="#ModalColor">
                        <span class="text-success">
                          <small>
                            <i class="fa fa-pencil" aria-hidden="true"></i><b>Cambiar Color</small></b></small>

                        </span>
                      </a>

                    <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="Registrar.php">
                        <span class="text-success">
                          <small>
                            <i class="fa fa-pencil" aria-hidden="true"></i><b>Agregar usuario</small></b></small>
                        </span>
                      </a>
                      

                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" data-toggle="modal" data-target="#LogoGro">
                        <span class="text-success">
                          <small>
                            <i class="fa fa-pencil" aria-hidden="true"></i><b>Cambiar logo Guerrero </small></b></small>

                        </span>
                      </a>

                       <div class="dropdown-divider"></div>
                      <a class="dropdown-item" data-toggle="modal" data-target="#LogoBachi">
                        <span class="text-success">
                          <small>
                            <i class="fa fa-pencil" aria-hidden="true"></i></i><b>Cambiar Logo de Bachilleres</b></small>
                        </span>
                      </a>
';
                  }
                }
            ?>
           


            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="InfoPersonal.php">
              <span class="text-success">
                <small>
                  <i class="fa fa-pencil" aria-hidden="true"></i></i><b>Informacion Personal</b></small>
              </span>
              <div class="dropdown-message small">Modificar Nombre</div>
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="Manual/MANUALUSUARIO.pdf">
              <span class="text-danger">
                <small>
                  <i class="fa fa-file-pdf-o" aria-hidden="true"></i></i>Manual de Usuario</small>
              </span>
              
            </a>
            
          </div>
        </li>

         
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesión</a>
        </li>


        <li style="color:#000; cursor:default;">
          <a class="nav-link" data-toggle="modal" data-target="#">
            <span class="all-tittles"><?php echo $_SESSION['Administrador']; ?></span></a>
        </li>
         <figure>
          <img src="imagenes/user03.png" alt="user-picture" class="img-responsive img-circle center-box">
        </figure>

      </ul>
    </div>
  </nav>

<style>
.bord-dark{
  color: #343a40;
}

.bord-light{
  color: #f8f9fa;
}
</style>

<?php
 }
?>