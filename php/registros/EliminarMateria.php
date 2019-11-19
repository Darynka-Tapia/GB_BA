<?php
require('../../SQL/conexion.php');
$folio=$_POST['Folio'];
$query='DELETE FROM asignatura WHERE Id_Asignatura="'.$folio.'"';
$res=$mysqli->query($query);

echo '<script> alert("Se ha eliminado la Materia con seleccionada"); </script>';

header('refresh: 0; ../../ListaMaterias.php');

?>