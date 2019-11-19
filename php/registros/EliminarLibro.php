<?php
require('../../SQL/conexion.php');
$folio=$_POST['Folio'];
$query='DELETE FROM libro WHERE Folio="'.$folio.'"';
$res=$mysqli->query($query);

echo '<script> alert("Se ha eliminado el libro con folio: '.$folio.'"); </script>';

header('refresh: 0; ../../ListaLibros.php');

?>