
<?php
  $mysqli = new Mysqli('localhost', 'root', '', 'gb-ba');
  if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');

	//$search = $mysqli->real_escape_string($_POST['search']);


	$query = "SELECT DATEDIFF('2018-06-25', fecha) as dias
			  from pruebafechas";

		$res = $mysqli->query($query);

		if(mysqli_num_rows($res) != 0){
	  		
		  	//echo $query;
		  	while ($row = $res->fetch_array(MYSQLI_ASSOC)) {

		  		echo $row["dias"].' ' ;
		  		if($row["dias"] > 2){
		  			echo 'Retardo de '. ($row["dias"]-2). '<br>';
		  		}else if($row["dias"] == 2 || $row["dias"] ==1){
		  			echo ' Tiene '. (2-$row["dias"]). ' días con el libro <br>';
		  		}else if($row["dias"] == 0){
		  			echo 'Hoy debe regresar el libro <br>';
		  		}
		  	}
		}



?>
