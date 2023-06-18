<?php
  session_start();
  require("./fpdf/fpdf.php");
  require("./php/database.php");
  $id=$_SESSION['inscription']['Matricule'];
  $sql= "SELECT n.* FROM inscription i,note n, filière f 
        WHERE n.Matricule=i.Matricule AND f.id_filière=n.id_filière AND n.Matricule=? 
        GROUP BY n.Matière ";
    $selection=$connexion->prepare($sql);  
    $selection->execute([$id]);
    $affichage=$selection->fetchAll() ;
    $title="BULLETIN DE NOTE";
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
  $pdf->Image("image/logo.univ.png",20,30,30,30);
  $pdf->Ln(15);

  //  $pdf->Ln(45);
  //  $pdf->SetFont('Arial', 'B', 15);
  //  $pdf->SetDrawColor(61,113,5);
  //  $pdf->SetX((150-$w)/2);
  //  $pdf->Cell(21, 10,'Identite', 1, 1, 'L');
  //  $pdf->Ln(5);
  //  $pdf->SetFont('Times', '', 12);

  //  // Affichage du matricule
  //   $pdf->SetX((170-$w)/2);
  //   $pdf->SetFont('Times', 'B', 13);
  //   $pdf->Cell(40, 10, 'Matricule:', 0, 0, 'L');
  //   $pdf->SetFont('Times', '', 12);
  //   $pdf->Cell(0, 10, $matricule, 0, 1, 'C');

  //   //  Affichage du nom
  //   $pdf->SetX((170-$w)/2);
  //   $pdf->SetFont('Times', 'B', 13);
  //   $pdf->Cell(40, 10, 'Nom:', 0, 0, 'L');
  //   $pdf->SetFont('Times', '', 12);
  //   $pdf->Cell(0, 10, $nom, 0, 1, 'C');

  //     // Affichage du prenom
  //   $pdf->SetX((170-$w)/2);
  //   $pdf->SetFont('Times', 'B', 13);
  //   $pdf->Cell(40, 10, 'Prenom:', 0, 0, 'L');
  //   $pdf->SetFont('Times', '', 12);
  //    $pdf->Cell(0, 10, $prenom, 0, 1, 'C');


// Nouvelle page A4 (incluant ici logo, titre et pied de page)

// Polices par défaut : Helvetica taille 9
$pdf->SetFont('Helvetica','',9);
// Couleur par défaut : noir
$pdf->SetTextColor(0);
// Compteur de pages {nb}
$pdf->AliasNbPages();


// Sous-titre calées à gauche, texte gras (Bold), police de caractère 11
$pdf->SetFont('Helvetica','B',11);
// couleur de fond de la cellule : gris clair
$pdf->setFillColor(230,230,230);
// Cellule avec les données du sous-titre sur 2 lignes, pas de bordure mais couleur de fond grise
$pdf->Cell(75,6,$_SESSION['inscription']['Matricule'],0,1,'L',1);		
$pdf->Cell(75,6,strtoupper(utf8_decode($_SESSION['inscription']['Nom'].' '.$_SESSION['inscription']['Prénom'])),0,1,'L',1);				
$pdf->Ln(10); // saut de ligne 10mm	



// Fonction en-tête des tableaux en 3 colonnes de largeurs variables
function entete_table($position_entete) {
	global $pdf;
	$pdf->SetDrawColor(183); // Couleur du fond RVB
	$pdf->SetFillColor(221); // Couleur des filets RVB
	$pdf->SetTextColor(0); // Couleur du texte noir
	$pdf->SetY($position_entete);
	// position de colonne 1 (10mm à gauche)	
	$pdf->SetX(10);
	$pdf->Cell(60,8,'Matiere',1,0,'C',1);	// 60 >largeur colonne, 8 >hauteur colonne
	// position de la colonne 2 (70 = 10+60)
	$pdf->SetX(70); 
	$pdf->Cell(60,8,'Notes',1,0,'C',1);
	// position de la colonne 3 (130 = 70+60)
	$pdf->SetX(130); 
	

	$pdf->Ln(); // Retour à la ligne
}
// AFFICHAGE EN-TÊTE DU TABLEAU
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (60 mm)
$position_entete = 70;
// police des caractères
$pdf->SetFont('Helvetica','',9);

$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau
entete_table($position_entete);


// $position_detail = 78; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8)
// $requete2 =  $;
// $result2 = mysqli_query($link, $requete2);
foreach ($affichage as $note) {
	// position abcisse de la colonne 1 (10mm du bord)
	$position_detail=78;
	$pdf->SetY($position_detail);
	$pdf->SetX(10);
	$pdf->MultiCell(60,8,utf8_decode($note['Matière']),1,1,'C');
    // position abcisse de la colonne 2 (70 = 10 + 60)	
	$pdf->SetY($position_detail);
	$pdf->SetX(70); 
	$pdf->MultiCell(60,8,utf8_decode($note['Note']),1, 1,'C');
	// position abcisse de la colonne 3 (130 = 70+ 60)
	

	// on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)	
	$position_detail += 8; 
}


$pdf->Output('BULLETIN DE NOTE','I'); // affichage à l'écran
// Ou export sur le serveur
// $pdf->Output('F', '../test.pdf');
?>
