<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test modele/Connexion</title>
    </head>
    <body>
        <?php
            use modele\Connexion;
            
            // chargemeny automatique de la classe demandée
            require("../includes/fonctions.inc.php");
            
            $connexion = Connexion::connecter();
            echo "Connexion réussie";
        ?>
    </body>
</html>