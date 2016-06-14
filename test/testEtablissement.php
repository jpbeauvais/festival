<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test modele/metier/Etablissement</title>
    </head>
    <body>
        <?php
            use modele\metier\Etablissement;
            
            // chargemeny automatique de la classe demandée
            require("../includes/fonctions.inc.php");
            
            $unEtablissement = new Etablissement('004896AB', 'Collège des Minimes','20 rue Blanci', '30000', 'Nîmes', '+334789356156', 'college-blanci@ac-nimes.fr',1,'Monsieur','Dufeuil', 'Bernard',15);
            echo "<h4>test 1 : instancier un objet Etablissement</h4>";
            echo "<b>Un établissement : </b> $unEtablissement <br/>";
        ?>
    </body>
</html>

