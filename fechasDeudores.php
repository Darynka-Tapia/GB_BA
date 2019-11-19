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
          <i class="fa fa-table"></i>Deudores</div>
        <div class="card-body">
           
           <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Matricula</th>
                  <th>Nombre</th>
                  <th>Libro 1</th>
                  <th>Libro 2</th>
                  <th>Fecha inicio</th>
                  <th>Fecha fin</th>
                  <th>Renv.?</th>
                  <th>status de entrega</th>
                </tr>
              </thead>

              <tbody>
          <?php
               require('SQL/conexion.php');
                $sql1="select * from prestamo";
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
                 // echo $sql2."<br>";
                 // $fecha=time(); 
                  $fecha = $fecha-(60 * 60 * 7); 
                  $fechaActual = date("Y-m-d", $fecha );  
                  $fechaActual=date("Y-m-d");
                   $rs2Q = $mysqli->query($sql2Q);
                    while ($row2Q = $rs2Q->fetch_array(MYSQLI_ASSOC)) {
                      /*echo $row2Q['Matricula']." ,"
                          .$row2Q['Nombre_Almno'].", "
                          .$row2Q['folio1']." ,"
                          .$row2Q['folio2']." ,"
                          .$row2Q['fecha_inicio'].", "
                          .$row2Q['fecha_fin']." ,"
                          .$row2Q['Renovacion']." <br>";*/
                      
                      $query ="call prueba6('".$row2Q['fecha_fin']."','".$fechaActual."');";
                      $rs = $mysqli->query($query);
                         while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
                            $diasHabiles=$row["Dias"]-$row["SumaSabadoDomingo"];
                            $Actual="-1";
                              echo  '
                                  <tr>
                                     <td>'.$row2Q["Matricula"].'</td>
                                     <td>'.$row2Q["Nombre_Almno"].'</td>
                                     <td>'.$row2Q["folio1"].'</td>
                                     <td>'.$row2Q["folio2"].'</td>
                                     <td>'.$row2Q['fecha_inicio'].'</td>
                                     <td>'.$row2Q['fecha_fin'].'</td>
                                     <td>'.$row2Q['Renovacion'].'</td>
                                  ';
                                    if($diasHabiles>=0){
                                      echo '<td><span class="badge badge-pill badge-danger">Retardo de '. ($diasHabiles+1).' dias </span><br></td></tr>';
                                    }else if($diasHabiles==$Actual){
                                      echo '<td><span class="badge badge-pill badge-warning">Hoy debe de regresar el libro</span> <br></td></tr>';
                                    }else {
                                        echo '<td><span class="badge badge-pill badge-success">No tiene retardo<br></td></tr>';
                                    }
                                   
                                  
                               }
                               $mysqli->next_result();

                            
                    }
                }
               











                
          ?>
        </tbody>
        </table>
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
