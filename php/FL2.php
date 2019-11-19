<?php 

if(!isset($_POST['FL2'])) exit('No se recibió el valor a buscar');

require '../SQL/conexion2.php';

function FL2()
{
	
	$mysqli = getConnexion();
	$FL2 = $mysqli->real_escape_string($_POST['FL2']);

	if($FL2==""){
 
	}else {

		$query = "SELECT * FROM libro WHERE 
		folio = ".$FL2." ";
		//echo $query;

		$res = $mysqli->query($query);
		
		if(mysqli_num_rows($res) != 0){
	  			  
		  	//echo $query;
		  	while ($row = $res->fetch_array(MYSQLI_ASSOC)) {

		  		
		  		echo '
		  		<div class="row"> 
	              <div class="col-12 col-md-12">
	                <label for="validationCustom01">Titulo</label>
	                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['Titulo'].'">
	              </div>
	            </div>
	            <div class="row"> 
	              <div class="col-12 col-md-12">
	                <label for="validationCustom01">Autor</label>
	                <input type="text" class="form-control" id="validationCustom01" required name="Nombre" value="'.$row['Autor'].'">
	              </div>
	            </div>
		  		';

		  		$prestdo="select * from prestamo where folio1 = ".$FL2." || folio2 = ".$FL2."";

				$resp = $mysqli->query($prestdo);
		  		if (mysqli_num_rows($resp)>0){
					echo '<p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Este libro ya ha sido prestado </p>'; 
		  		}else{
			  		$query2="select count(titulo) as ntl FROM LIBRO where titulo = '".$row['Titulo']."'";
			  		$ntli=$mysqli->query($query2);
			  			while ($row2 = $ntli->fetch_array(MYSQLI_ASSOC)) {
			  				$NTLibros=$row2['ntl'];
			  				//echo 'Numero total de libros '.$NTLibros.'<br>';
			  			
			  			}
			  		$query3="select 
			  					(select count(p.Id_Prestamo) as lp FROM prestamo p INNER JOIN libro l on p.Folio1=l.Folio WHERE l.Titulo='".$row['Titulo']."' ) AS folio1, 
			  					(select count(p.Id_Prestamo) as lp2 FROM prestamo p INNER JOIN libro l on p.Folio2=l.Folio WHERE l.Titulo='".$row['Titulo']."' ) as folio2";
			  		
			  		$lp=$mysqli->query($query3);
						while ($row3 = $lp->fetch_array(MYSQLI_ASSOC)) {
							$FOLIO1=$row3['folio1'];
							$FOLIO2=$row3['folio2'];
							$LPrest=$FOLIO1+$FOLIO2;
							//echo 'Total de libros prestados '.$LPrest.'<br>';
			  			}
			  		
			  		$librosEnStock=$NTLibros-$LPrest;
			  		echo '<input type="hidden" value ="'.$librosEnStock.'" name="Stock">';
			  		if ($librosEnStock>1){
						echo '<p class="text-success"><i class="fa fa-check" aria-hidden="true"></i> '.$librosEnStock.' libros en stok </p>'; 
			  		}else if ($librosEnStock=1){
						echo '<p class="text-warning"><i class="fa fa-check" aria-hidden="true"></i> '.$librosEnStock.' libro en stok </p>'; 
			  		}if ($librosEnStock=0){
			  		}
		  		}

		  	}
	  	}else{
	  		
					echo '<p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> No existe ese folio </p>'; 
	  	}
	  	

	}


}

	
FL2();
?>