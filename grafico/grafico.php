<?php
    include('conecta.php');
    include('phplot.php');

    //La variable $data se encarga de almacenar los datos a graficar
    $data=array();

    //Creando una instancia nueva de la clase PHPlot esto es debido a la 
    //creaci�n de una nueva imagen.
    $gra=new PHPlot();

    //Implementaci�n de la consulta    
    $sql="SELECT Tipo_vista, COUNT(Tipo_vista) FROM visitas GROUP BY Tipo_vista";
    $rs=mysql_query($sql, $cn);

    //Obteniendo los valores desde la consulta
    while ($row = mysql_fetch_row($rs)) {
        $data[]=array(utf8_decode($row[0]),$row[1]);
        $cols[]=utf8_decode($row[0]);
    }

    //Enviando los valores al gr�fico
    $gra->SetImageBorderType('plain');
    $gra->SetDataValues($data);
    $gra->SetLineStyles("solid");
    $gra->SetPlotType("bars");

    //Especificando los t�tulos de la imagen
    $gra->SetTitle(utf8_decode("Total de visitas"));
    $gra->SetXTitle("Cantidad");
    $gra->SetYTitle("Tipo de vista");

   

    //Especificando la proyecci�n del �rea
    $gra->SetPlotAreaWorld(NULL,0, NULL, 90);
    $gra->DrawGraph();
?>
