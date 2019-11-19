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
          <i class="fa fa-table"></i>Lista de Prestamos </div>
        <div class="card-body">
          <div class="alert alert-warning" role="alert">
            Aquí se muestra la lista de todos los prestamos realizados desde que se comenzo a utilizar este sistema. Para ver la lista de prestamos que estan Vigentes a la fecha Favor de dar click en el boton de Campana que se encuentra en la parte superior derecha a un lado de configuración.
          </div>
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre del alumno</th>
                      <th>Fecha de prestamo</th>
                      <th>Fecha de entrega</th>
                      <th>Nombre  del libro 1</th>
                      <th>Nombre  del libro 2</th>
                      <th>Renovacion</th>

                    </tr>
                  </thead>

                  <tbody>
                    <?php
                         require 'SQL/conexion.php';
                          $sql1="select * from prestamo_respaldo";
                $resQ1 = $mysqli->query($sql1);

                while ($row1Q = $resQ1->fetch_array(MYSQLI_ASSOC)) {
                  $sql2Q = "
                    select 
                      pr.Matricula,
                      (SELECT a.Nombre_alumno FROM prestamo p INNER JOIN alumno a ON p.Matricula=a.Matricula WHERE p.Matricula=".$row1Q['Matricula'].") as Nombre_Almno,
                      (select l.Titulo as lp FROM prestamo p INNER JOIN libro l on p.Folio1=l.Folio WHERE p.Matricula=".$row1Q['Matricula']." ) AS folio1, 
                      (select l.Titulo as lp2 FROM prestamo p INNER JOIN libro l on p.Folio2=l.Folio WHERE p.Matricula=".$row1Q['Matricula']." ) as folio2,
                        pr.fecha_inicio, 
                        pr.fecha_fin,
                        pr.Renovacion
                    FROM prestamo pr WHERE pr.Matricula=".$row1Q['Matricula'].";
                  ";

                   $rs2Q = $mysqli->query($sql2Q);
                               while ($row2Q = $rs2Q->fetch_array(MYSQLI_ASSOC)) { 
                                echo '
                                  <tr>
                                    <th scope="row">'.$row2Q["Matricula"].'</th>
                                    <td>'.$row2Q["fecha_inicio"].' </td>
                                    <td>'.$row2Q["fecha_fin"].' </td>
                                    <td>'.$row2Q["folio1"].' </td>
                                    <td>'.$row2Q["folio2"].' </td>
                                    <td>'.$row2Q["Renovacion"].'</td>
                                  </tr>
                                ';
                              }
                            
                          } 
                        
                    ?>
                  </tbody>
                </table>
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
</div>
</body>

</html>
