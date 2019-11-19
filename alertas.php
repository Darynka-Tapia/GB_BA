<?php
               require('SQL/conexion.php');
               $sql = "SELECT * from admin where categoria='Super Administrador'";
               $cont=0;
               $rs1 = $mysqli->query($sql);
                while ($row1 = $rs1->fetch_array(MYSQLI_ASSOC)) {
                  $cont++;
                }
                if($cont>0){
                    echo $cont;
                }else{
                  echo '<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="Registrar.php">
              <span class="text-success">
                <small>
                  <i class="fa fa-pencil" aria-hidden="true"></i><b>Agregar usario</small></b></small>
              </span>
            </a>';
                }


                $fechaActual=date("Y-m-d");
                echo $fechaActual;
                
          ?>