

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    require('EST/head.php');
  ?>
</head>
<body class="bg-dark">
	<?php
		require('Querys/conexion.php')
	?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login <b>- SRYCC</b></div>
      	<div class="card-body">

			<form action="login.php" method="POST">
		      	<div class="form-group" >
		      		<label for="exampleInputEmail1">Correo Electronico</label>
		      		<input 
		      			class="form-control" 
		      			id="exampleInputEmail1" 
		      			type="text" 
		      			name="Identifinat" 
		      			aria-describedby="emailHelp" 
		      			placeholder="Enter email">
			        
			    </div>
				<div class="form-group">
		            <label for="exampleInputPassword1">Contraseña</label>
		            <input 
		            	class="form-control" 
		            	id="exampleInputPassword1" 
		            	type="password" 
		            	name="MotPasse" 
		            	placeholder="Password">
	          	</div>
			      
				<!--<input class="btn btn-primary btn-block mt-4" type="submit" value="Ajouter" name="Ajouter">-->
		      	<input class="btn btn-primary btn-block mt-4" type="submit" value="Entrar" name="Ouvrir">
		    </form>
          <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Registrar usuario </a>
          <a class="d-block small" href="#">Contraseña Olvidada?</a>
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
    $ouvrir=$_POST["Ouvrir"]; 
	$ajouter=$_POST["Ajouter"];

	$em=htmlentities(addslashes($_POST['Identifinat']));
	$pa=htmlentities(addslashes($_POST['MotPasse']));
	$motPasseEncry = password_hash($pa, PASSWORD_DEFAULT);

	if ($ouvrir!="") 
	   { 
		try{
		    $contador=0;
		    $sql="Select * from  usager where ident = ?";

		    $resultado=$base->prepare($sql);
			$resultado->execute(array($em));
			while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
				echo $registro['email'].'<br>'.$registro['contra'].'';

				if(password_verify($_POST['MotPasse'], $registro['pass'])){
					$contador++;
				}
			}

			if($contador>0){
				session_start();
				$_SESSION['usuarios']=$em;
				header('location:PPrincipal.php');
			}else{
				echo '<div class="p-2 pt-3 bg-danger text-white mt-3"><p class="text-center">Usuario y/o contraseña incorrectos</p></div>';

			}

		   }catch(Exception $e){
				die('Error: '.$e->GetMessage()) ;
			}
	}


	if ($ajouter!="") 
	  { 
	 	$sql="Select * from usagers where ident = ?";

		    $Result=$base->prepare($sql);
		    $Result->execute(array($em));

		    $row_count = $Result->rowCount();
				//echo $row_count.' rows selected';
		    if ($row_count>0){
		    	echo '<div class="p-2 pt-3 bg-warning text-dark mt-3"><p class="text-center">Usuario Existente, Ingresa otro por favor</p></div>';
		    	$ajouter="";
		    }else{
		    	$sql = 'insert into usager (ident, pass) values (?, ?)';
			    $Result=$base->prepare($sql); //Objeto PDOStatement 
			    $Result->execute(array($em, $motPasseEncry));
		    	
		    }
		    $Result->closeCursor();
	  }  
    ?>



 <?php
    require('EST/EnScript.php');
  ?>

</body>
</html>