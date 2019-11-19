<?php
	session_start();

       if(!isset($_SESSION['Administrador'])){
         header('Location:login.php');
         echo 'No hay sesion iniciada ';
       }else {
       	echo 'Bienvenido '.$_SESSION['Administrador'];
       	echo '<a href="SQL/cerrar.php">Cerrar Sesión</a>';

       	require('SQL/conexion.php');
               $sql = "SELECT * from admin where Nombre='".$_SESSION['Administrador']."';";
               
               $rs1 = $mysqli->query($sql);

                while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
                  if($row['categoria']=="usuario"){
                  	echo 'Es un usuario';
                  }else{
                  	echo 'Es un administrador';
                  }
                }





       }





?>