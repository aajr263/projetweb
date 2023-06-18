<?php
require("./fpdf/fpdf.php");
  $title="RECU DE PAIEMENT";
  $pdf = new FPDF();
  $pdf->AddPage();
 // Titre
  $pdf->SetFont('Arial', 'B', 18);
  $pdf->SetDrawColor(61,113,5);
  $pdf->SetFillColor(0,0,0);
  $pdf->SetTitle($title);
  $w = $pdf->GetStringWidth($title)+6;
  $pdf->SetTextColor(61,113,5);
  $pdf->Cell(0, 10, $title, 1, 1, 'C');
  $pdf->Ln(10);
            
  $pdf->SetFont('Arial','B',15);
  $pdf->Cell(71,5,'Annee Academique',0,0);
  $pdf->cell(59,5,'',0,0);
  $pdf->cell(59,5,'UAIS',0,1,'l');
  $pdf->SetTextColor(0, 0,  0);
  $pdf->SetFont("Arial","",10);
  $pdf->cell(130,5,'2022-2023',0,0);
  $pdf->cell(130,5,"BP 2346 Yamoussokro 003",0,1);
  $pdf->cell(130,5,'',0,0);
  $pdf->cell(130,5,'UNIVERSITE IVIORO-SENEGALAISE',0,0);
  $pdf->Image("image/logo.univ.png",20,40,30,30);

   $pdf->Ln(45);
   $pdf->SetFont('Arial', 'B', 15);
   $pdf->SetDrawColor(61,113,5);
   $pdf->SetX((150-$w)/2);
   $pdf->Cell(21, 10,'Identite', 1, 1, 'L');
   $pdf->Ln(5);
   $pdf->SetFont('Times', '', 12);

   // Affichage du matricule
    $pdf->SetX((170-$w)/2);
    $pdf->SetFont('Times', 'B', 13);
    $pdf->Cell(40, 10, 'Matricule:', 0, 0, 'L');
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(0, 10, $matricule, 0, 1, 'C');

    //  Affichage du nom
    $pdf->SetX((170-$w)/2);
    $pdf->SetFont('Times', 'B', 13);
    $pdf->Cell(40, 10, 'Nom:', 0, 0, 'L');
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(0, 10, $nom, 0, 1, 'C');

      // Affichage du prenom
    $pdf->SetX((170-$w)/2);
    $pdf->SetFont('Times', 'B', 13);
    $pdf->Cell(40, 10, 'Prenom:', 0, 0, 'L');
    $pdf->SetFont('Times', '', 12);
     $pdf->Cell(0, 10, $prenom, 0, 1, 'C');

     // Affichage des information du paiement
       $pdf->Ln(10);
       $pdf->SetFont('Courier', '', 5);
       $pdf->SetFont('Arial', 'B', 15);
       $pdf->SetX((150-$w)/2);
       $pdf->Cell(60, 10, 'Informations Quittance', 1, 1, 'L');
       $pdf->Ln(5);
       $pdf->SetFont('Times', 'B', 13);
       $pdf->SetX((170-$w)/2);
       $pdf->Cell(40, 10, 'Dernier paiement :', 0, 0, 'L');
        $pdf->SetFont('Times', '', 12);
       $pdf->Cell(0, 10, $number, 0, 1, 'C');

        $pdf->SetX((170-$w)/2);
        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell(40, 10, 'Montant Paye :', 0, 0, 'L');
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(0, 10, $number1, 0, 1, 'C');

        $pdf->SetX((170-$w)/2);
        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell(40, 10, 'Reste à payer :', 0, 0, 'L');
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(0, 10,  $number2, 0, 1, 'C');

        $pdf->SetX((170-$w)/2);
        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell(40, 10, 'Date de paiement :', 0, 0, 'L');
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(0, 10, $date, 0, 1, 'C');

 

  $pdf->Output();
?> 