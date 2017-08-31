<?php

require('fpdf/fpdf.php');
$conn = new mysqli("localhost","root","","personas");
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.png',100,80,100);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título    
    // Salto de línea
    $this->Ln(30);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de págin
     $this->Cell(0,6,"URBE Diplomado Webmaster - ".date("d-m-Y"),0,0,"C");
    }

}

// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
    $pdf->SetFont("Arial","",11);
    $pdf->Cell(50,6,"Hola Mundo!",1,1,"C");

    $sql = "select * from personas";
    $query = $conn->query($sql);

    while ($rs = mysqli_fetch_array($query)) {
         $pdf->Cell(50,6,$rs["nombre"],1,1,"C");
         $pdf->Ln(6);
    }

$pdf->Output();
?>







