<?php
 require_once("../php/database.php");
$id = $_GET['id'];
 $query= "SELECT *FROM paiement WHERE Matricule=? ";
 $paie=$connexion->prepare($query);
 $paie->execute([$id]);
 $modif=$paie->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../paiement.css">
    <title>Modification</title>
    <link rel="icon" type="image/x-icon" href="../image/logo.univ.png">
<body>
   
    <section>
        <form action="update_paie.php" method="post" >
        <?php
            if(isset($erreur_message)){
            echo ("<p>$erreur_message</p>");
            }
            ?>
            <div class="dif">MODIFICATION</div>

            <fieldset class="cadre1">
            <legend> Paiement de scolarité: </legend>
            <div>
           
                    <label for="nom">Total Payé:</label>
                    <input type="number" id="number" name="number" placeholder="entrez le dernier paiement"value="<?php echo($modif['Dernierpaiem'])?>">
                </div>
                <div>
                    <label for="nom">Versement :</label>
                    <input type="number" id="number1" name="number1" placeholder="entrez le montant"value="<?php echo($modif['Montantpaye'])?>">
                    </div>
                    <div>
                        <label for="number">reste à payer:</label>
                        <input type="number" id="number2" name="number2" placeholder="entrez le reste"value="<?php echo($modif['Restepaye'])?>">
                    </div>
                    <div>
                            <label for="date">date de paiement:</label>
                            <input type="date" id="date" name="date" placeholder="JJ/MM/AAAA"value="<?php echo($modif['Datepaiem'])?>">
                        </div>
            
                
            <label for="utilise">Mode de paiement: </label>
            
            <select name="utilise" id="utilise">
            <option value="" disabled selected hidden>Choisissez votre mode </option>
            <option value="compte bancaire"> compte bancaire</option>
            <option value="chèque">chèque</option>
            <option value="mobile money"> mobile money</option>
            <option value="espèce"> espèce</option>
            </select>
            </fieldset>
            
            <fieldset class="cadre2">
            <legend>Vos coordonnées :</legend>
                    <div>
                    <label for="nom">Matricule</label>
                    <input type="text" id="nom" name="matricule" placeholder="entrez votre matricule" value="<?php echo($modif['Matricule'])?>">
                    </div>
                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" placeholder="entrez votre nom"value="<?php echo($modif['Nom'])?>">
                    </div>
                    <div>
                    <label for="nom">Prénom</label>
                    <input type="text" id="nom" name="prenom" placeholder="entrez votre prénom"value="<?php echo($modif['Prénom'])?>">
                </div>
                <div>
                    <label for="email">e-mail</label>
                    <input type="email" id="email" name="email" placeholder="monadresse@mail.com"value="<?php echo($modif['Mail'])?>">
                </div>
                <div>
                    <label for="nom">Contact</label>
                    <input type="tel" id="nom" name="contact" placeholder="entrez votre contact"value="<?php echo($modif['Contact'])?>">
                </div>
               
            </fieldset>
            <section class="inp">
            <input type="submit" value="Valider" name='value'/>
            <input type="reset" value="Annuler"/>
            <input type="reset" value="Quitter"/>
        </section>
            
            
      </form>
    </section>

    
</body>
</html>