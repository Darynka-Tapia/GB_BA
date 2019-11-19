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
          <i class="fa fa-table"></i>Lista de Visitas</div>
          <div class="row">
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"><div class="alert alert-primary GText" role="alert" name="GText" id="GText" onclick="grafico()"> <center> Grafico de visitas</center></div></div>
          </div>
            <center>
              <article id="Grafico" class="Grafico" name="Grafico"  style="display: none">
                 <img src="grafico/grafico.php" >    
             </article>
            </center>

            
            <script type="text/javascript">
             function grafico(){
                var Graf = document.getElementById('Grafico');
                var text= document.getElementById('GText');
                if(Graf.style.display == 'none'){
                  
                  Graf.style.display = 'block' ;
                  text.innerHTML='<center> Grafico de visitas ▼ </center>';
                }else{
                  Graf.style.display ='none';
                  text.innerHTML='<center> Grafico de visitas ▲ </center>';
                }
              }
                
            </script>
        <div class="card-body">
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tipo Visita</th>
                      <th>Profesor_a_cargo</th>
                      <th>Materia</th>
                      <th>Matricula</th>
                      <th>Nombre del alumno</th>
                      <th>Grado y grupo</th>
                      <th>Turno</th>
                      <th>Fecha Visita</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                         require 'SQL/conexion.php';
                          $query="Select v.*, a.* from visitas v LEFT JOIN alumno a ON v.Matricula=a.Matricula ORDER BY v.Tipo_vista";
                          $res=$mysqli->query($query);
                          while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                                
                                echo '
                                  <tr>
                                    <th scope="row">'.$row["Tipo_vista"].'</th>
                                    <td>'.$row["Profesor_a_cargo"].' </td>
                                    <td>'.$row["Materia"].' </td>
                                    <td>'.$row["Matricula"].' </td>
                                    <td>'.$row["Nombre_alumno"].' </td>
                                    <td>'.$row["Grupo_y_grado"].'</td>
                                    <td>'.$row["Turno"].' </td>
                                    <td>'.$row["fecha_visita"].' </td>

                                ';
                            
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
