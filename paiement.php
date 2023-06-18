<?php
    session_start();
    require("../projet/php/valpaie.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paiement.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <title>universite ivoiro-senegalaise </title>
    <link rel="icon" type="image/x-icon" href="image/logo.univ.png">
<body>
    <?php
     require("../projet/header.php");
    ?>
    <section>
        <form action="" method="post" >
        <?php
            if(isset($erreur_message)){
            echo ("<p>$erreur_message</p>");
            }
            ?>

            <fieldset class="cadre1">
            <legend> Paiement de scolarité: </legend>
            <div>
                    <label for="nom">Total Payé:</label>
                    <input type="number" id="number" name="number" placeholder="entrez le montant total payé">
                </div>
                <div>
                    <label for="nom">Versement:</label>
                    <input type="number" id="number1" name="number1" placeholder="entrez le montant">
                    </div>
                    <div>
                        <label for="number">reste à payer:</label>
                        <input type="number" id="number2" name="number2" placeholder="entrez le reste">
                    </div>
                    <div>
                            <label for="date">Date de paiement:</label>
                            <input type="date" id="date" name="date" placeholder="JJ/MM/AAAA">
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
                    <input type="text" id="nom" name="matricule" placeholder="entrez votre matricule">
                    </div>
                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" placeholder="entrez votre nom">
                    </div>
                    <div>
                    <label for="nom">Prénom</label>
                    <input type="text" id="nom" name="prenom" placeholder="entrez votre prénom">
                </div>
                <div>
                    <label for="email">e-mail</label>
                    <input type="email" id="email" name="email" placeholder="monadresse@mail.com">
                </div>
                <div>
                    <label for="nom">Contact</label>
                    <input type="tel" id="nom" name="contact" placeholder="entrez votre contact">
                </div>
                
            </fieldset>
            <section class="inp">
                <input type="submit" value="valider" name='value'/>
                <input type="reset" value="Annuler"/>
                <input type="reset" value="Quitter"/>
          </section>       
      </form>
    </section>
    <?php
     require("../projet/footer.php");
    ?>
</body>
</html>