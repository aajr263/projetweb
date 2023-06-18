<?php
session_start();
$id=$_SESSION['inscription']['Matricule'];
$sql= "SELECT n.* FROM inscription i,note n, filière f 
      WHERE n.Matricule=i.Matricule AND f.id_filière=n.id_filière AND n.Matricule=? 
      GROUP BY n.Matière ";
  $selection=$connexion->prepare($sql);  
  $selection->execute([$id]);
  $affichage=$selection->fetchAll() ;
require("../php/database.php");

require("../fpdf/fpdf.php"); 
$title="fiche inscription";
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->SetDrawColor(178,221,221);
$pdf->SetFillColor(0,0,0);
$pdf->SetTitle($title);
$W=$pdf->GetStringWidth(179,45,25);
$pdf->Cell(0,10,$title,1,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',15);
$pdf->SetDrawColor(115,134,79);
$pdf->SetX((150-$W)/2);
$pdf->Cell(70,10,'INFORMATION PERSONNEL' ,1,1,'L');
$pdf->Ln(3);
$pdf->SetFont('Times','',12);

$pdf->SetX((170-$W)/2);
$pdf->SetFont('Times','B',13);
$pdf->Cell(40,10,'Matricule',0,0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10  ,$affichage['Matière'],0,1,'C');


$pdf->Output();
?>
