<?php
  
    require 'fpdf/fpdf.php';

    class PDF extends FPDF
    {
        
        function Header()
        {
            $this->Image('images/reportes.png', 6, 8, 200);
            $this->SetFont('Arial','B',15);
            $this->Cell(30);

            $this->Ln(20);
        }

        Function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I', 8);
            //$this->Cell(0,10, 'Pagina '$this->PageNo().'/{nb}',0,0,'C' );
        }
    }

?>