<?php 
session_start();
 require_once("php/database.php");
 $nombetu= "SELECT *FROM inscription";
 $etuaffi=$connexion->prepare($nombetu);
 $etuaffi->execute();
 $affiche=$etuaffi->rowCount();
 $etudiant= $etuaffi->fetchAll();

 $nombadmin= "SELECT *FROM administrateur";
 $adminaffi=$connexion->prepare($nombetu);
 $adminaffi->execute();
 $affi=$adminaffi->rowCount();
 $admin= $adminaffi->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tableau.css">
    <title>Administration</title>
    <link rel="icon" type="image/x-icon" href="image/logo.univ.png">
</head>

<body>
    <div class="side-menu">
        <div id="logo">
          <a href="projet.php"><img src="./image/logo.univ.png" class="UAIS" title="UAIS" ></a>
          <p> UNIVERSITE DE L'AMITIE <br> IVOIRO-SENEGALAISE</p>
        </div>    
        <ul>
            <li><img src="image/dashboard (2).png" alt="">&nbsp; <span>Tableau de bord</span> </li>
            <li><img src="image/reading-book (1).png" alt="">&nbsp;<span>Etudiants</span> </li>
            <li class="not"><a href="./affichadmin.php"><img src="image/personal.png" alt=""></a>&nbsp;<span>administrateur</span> </li>
            <li class="not"> <a href="./note/affichnote.php"><img src="image/edit-button.png" alt=""></a>&nbsp;<span>Notes</span></li>
            <li> <a href="paiement.php"><img src="image/payment.png" alt=""></a>&nbsp;<span> Paiement</span></li>
            <li><img src="image/help-web-button.png" alt="">&nbsp; <span>aide</span></li>
            <li><img src="image/settings.png" alt="">&nbsp;<span>paramètre</span> </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="image/search.png" alt=""></button>
                </div>
                <div class="user">
                    <div class="img-case">
                        <img src="image/user.png" alt="">
                       
                    </div>
                    <?php if(isset($_SESSION['administrateur'])){?>
                     <p><?php echo($_SESSION["administrateur"]["Nom"]. " ".$_SESSION["administrateur"]["Prénom"])?></p>
                     <?php }?>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?php echo($affiche)?></h1>
                        <h3>Etudiants</h3>
                    </div>
                    <div class="icon-case">
                        <img src="image/reading-book (1).png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>1253</h1>
                        <h3>professeurs</h3>
                    </div>
                    <div class="icon-case">
                        <img src="image/teacher2.png" alt="">
                    </div>

                </div>
                <div class="card">
                    <div class="box">
                        <h1> <?php echo($affi)?></h1>
                        <h3>administrateur</h3>
                    </div>
                    <div class="not">
                        <div><img src="image/personal.png" alt=""></div>
                       
                    </div>
                  
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>paiement recent</h2>
                       
                    </div>
                    <table>
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Montant</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                       <tbody>
                            <?php
                            $paie= "SELECT *FROM paiement LIMIT 7";
                            $montant=$connexion->prepare($paie);
                            $montant->execute();
                            $argent =  $montant->fetchAll();
                            foreach($argent as $dar){
                            ?>
                       
                        <tr>
                            <td><?php echo($dar["Matricule"])?></td>
                            <td><?php echo($dar["Nom"]." ".$dar["Prénom"])?></td>
                            <td><?php echo($dar["Montantpaye"])?></td>
                            <td>
                                <a href="./paiement/modifpaie.php?id=<?php echo($dar["Matricule"])?>" class="btn">modifier</a>
                                <a href="./paiement/supprimpaie.php?id=<?php echo($dar["Matricule"])?>" class="btn">supprimer</a>

                            </td>
                        </tr>
                       </tbody>
                       <?php }?>    
                       

                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>Nouveau inscris</h2>
                        <a href="./etudiant/affichetu.php" class="btn">Afficher tout</a>
                    </div>
                    <table>
                       <thead> 
                         <tr>
                                <th>Matricule</th>
                                <th>Nom</th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                            <?php
                             foreach($etudiant as $ins){
                            ?>
                                <td><?php echo($ins["Matricule"])?></td>
                                <td><?php echo($ins["Nom"]." ".$ins["Prénom"])?></td>
                               
                            </tr>
                            <?php }?>
                       </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

