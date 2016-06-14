<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test /modele/dao/DaoEtablissement</title>
    </head>
    <body>
        <?php

        use modele\Connexion;
        use modele\dao\DaoEtablissement;
        use modele\metier\Etablissement;

require_once("../includes/fonctions.inc.php");

        $pdo = Connexion::connecter();

        // Test de DaoEtablissement
        echo "<h1>Test de DaoEtablissement</h1>";

        // Etablissement : test enregistrementVersObjet
        echo "<h3>Etablissement : test enregistrementVersObjet</h3>";
        echo "un enregistrement : ";
        $unEnregistrement = Array(
            'id' => '004896AB'
            , 'nom' => 'collège Saint Exupéry'
            , 'adresseRue' => '45 bd de la Révolution'
            , 'codePostal' => '55640'
            , 'ville' => 'Loing'
            , 'tel' => '+3364578963526'
            , 'adresseElectronique' => 'abc@college.fr'
            , 'type' => 1
            , 'civiliteResponsable' => 'monsieur'
            , 'nomResponsable' => 'Darbour'
            , 'prenomResponsable' => 'Jean'
            , 'nombreChambresOffertes' => 10
        );
        var_dump($unEnregistrement);
        $unEtablissement = DaoEtablissement::enregistrementVersObjet($unEnregistrement);
        echo "l'objet correspondant : <br />";
        echo $unEtablissement;

        // Etablissement : test objetVersEnregistrement
        echo "<h3>Etablissement : test objetVersEnregistrement</h3>";
        $unEtablissement = new Etablissement('004896AB', 'Collège des Minimes', '20 rue Blanci', '30000', 'Nîmes', '+334789356156', 'college-blanci@ac-nimes.fr', 1, 'Monsieur', 'Dufeuil', 'Bernard', 15);
        echo $unEtablissement;
        echo "<br />l'enregistrement correspondant : <br />";
        var_dump(DaoEtablissement::objetVersEnregistrement($unEtablissement));

        // Etablissement : test de sélection par id
        echo "<h3>Etablissement : test de sélection par id</h3>";
        $unEtablissement = DaoEtablissement::getOneById('0352072M');
        echo $unEtablissement;

        // Etablissement : test de sélection par id
        echo "<h3>Etablissement : test de sélection par id</h3>";
        $unEtablissement = DaoEtablissement::getOneById('0352072M');
        echo $unEtablissement;

        // Etablissement : test de sélection de tous les enregistrements
        echo "<h3>Etablissement : test de sélection de tous les enregistrements</h3>";
        $lesEtablissements = DaoEtablissement::getAll();
        var_dump($lesEtablissements);

        // Etablissement : test de l'ajout d'un établissement non existant
        echo "<h3>Etablissement : test de l'ajout d'un enregistrement non existant</h3>";
        $unEtablissement = new Etablissement('004896AB', 'Collège des Minimes', '20 rue Blanci', '30000', 'Nîmes', '+334789356156', 'college-blanci@ac-nimes.fr', 1, 'Monsieur', 'Dufeuil', 'Bernard', 15);

        if (DaoEtablissement::insert($unEtablissement)) {
            $unEtablissement = DaoEtablissement::getOneById($unEtablissement->getId());
            if ($unEtablissement) {
                echo "insertion réussie";
            }
        } else {
            echo "insertion échouée";
        }

        // Etablissement : test de la modification d'un établissement existant
        echo "<h3>Etablissement : test de la modification d'un enregistrement existant</h3>";
//        $unEtablissement = new Etablissement('004896AB', 'Collège des Minimes', '20 rue Blanci', '30000', 'Nîmes', '+334789356156', 'college-blanci@ac-nimes.fr', 1, 'Monsieur', 'Dufeuil', 'Bernard', 15);
//        echo "<br />l'établissement avant changement <br />";
//        echo $unEtablissement;
        if ($unEtablissementInitial = DaoEtablissement::getOneById('004896AB')) {
            echo "<br />l'établissement avant changement <br />";
            echo $unEtablissementInitial;
            $unEtablissementInitial->setNom("XXXX");
            if (DaoEtablissement::update($unEtablissementInitial->getId(), $unEtablissementInitial)) {
                if ($unEtablissementLu = DaoEtablissement::getOneById($unEtablissement->getId())) {
                    echo "<br />l'établissement après changement <br />";
                    echo $unEtablissementLu;
                    if ($unEtablissementInitial->getNom() === $unEtablissementLu->getNom()) {
                        echo "modification échouée";
                    } else {
                        echo "modification réussie";
                    }
                }
            }
        } else {
            echo "modification échouée";
        }

        // Etablissement : test de la suppression d'un établissement existant
        echo "<h3>Etablissement : test de la suppression d'un établissement existant</h3>";
        if (DaoEtablissement::delete('004896AB')) {
            if ($unEtablissement = DaoEtablissement::getOneById('004896AB')) {
                echo $unEtablissement;
                echo "suppression échouée";
            } else {
                echo "suppression réussie";
            }
        } else {
            echo "suppression échouée";
        }

        Connexion::deconnecter();
        ?>
    </body>
</html>

