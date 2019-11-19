

    <div class="modal fade" id="ModalColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Qué color de ventana prefiere?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione el color qwue desee utilizar para su mejor visibilidad</div>
          <div class="modal-footer">

            <!--
            <button class="btn btn-white" type="button" data-dismiss="modal" onclick="Claro()">Claro</button>
            <button class="btn btn-dark" type="button" data-dismiss="modal" onclick="Claro()">Obscuro</button>-->
            <form action="index.php" method="POST">
              <input class="btn btn-white btn" type="submit" value="Claro" name="claro">
              <input class="btn btn-dark btn" type="submit" value="Obscuro" name="obscuro">
              <input class="btn btn-success btn" type="submit" value="Verde" name="verde">
            
            <?php
              require('SQL/conexion.php');
               $sql = "SELECT parametro from coloressistem";
                   $res = $mysqli->query($sql);
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                     echo '<input type="hidden" value="'.$row["parametro"].'">';
                   }
              echo '</form>';
            
              $light=$_POST['claro'];
              $dark=$_POST['obscuro'];

              $verde=$_POST['verde'];
              
              if($light!=""){
                $sql = "UPDATE coloressistem SET parametro='light', hexa='f8f9fa' WHERE id=1";
                 $res = $mysqli->query($sql);
                header('refresh: 0; index.php');
              }
              if($dark!=""){
                   $sql = "UPDATE coloressistem SET parametro='dark', hexa='343a40' WHERE id=1";
                 $res = $mysqli->query($sql);
                header('refresh: 0; index.php');
              }
              if($verde!=""){
                   $sql = "UPDATE coloressistem SET parametro='verd',  hexa='aacda8' WHERE id=1";
                 $res = $mysqli->query($sql);
                header('refresh: 0; index.php');
              }
               
            ?>
              
          </div>
        </div>
      </div>
    </div>

    

