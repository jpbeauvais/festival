<?php

namespace modele\dao;

use modele\metier\Etablissement;
use modele\Connexion;
use \PDO;

class DaoEtablissement implements Dao {

    public static function enregistrementVersObjet($unEnregistrement) {
        if ($unEnregistrement == null) {
            $retour = null;
        } else {
        $retour = new Etablissement(
                $unEnregistrement['id']
                , $unEnregistrement['nom']
                , $unEnregistrement['adresseRue']
                , $unEnregistrement['codePostal']
                , $unEnregistrement['ville']
                , $unEnregistrement['tel']
                , $unEnregistrement['adresseElectronique']
                , $unEnregistrement['type']
                , $unEnregistrement['civiliteResponsable']
                , $unEnregistrement['nomResponsable']
                , $unEnregistrement['prenomResponsable']
                , $unEnregistrement['nombreChambresOffertes']
        );
        }
        return $retour;
    }

    public static function objetVersEnregistrement($objetMetier) {
        if ($objetMetier == null) {
            $retour = null;
        } else {
        $retour = array(
            ':id' => $objetMetier->getId()
            , ':nom' => $objetMetier->getNom()
            , ':adresseRue' => $objetMetier->getAdresseRue()
            , ':codePostal' => $objetMetier->getCodePostal()
            , ':ville' => $objetMetier->getVille()
            , ':tel' => $objetMetier->getTel()
            , ':adresseElectronique' => $objetMetier->getAdresseElectronique()
            , ':type' => $objetMetier->getType()
            , ':civiliteResponsable' => $objetMetier->getCiviliteResponsable()
            , ':nomResponsable' => $objetMetier->getNomResponsable()
            , ':prenomResponsable' => $objetMetier->getPrenomResponsable()
            , ':nombreChambresOffertes' => $objetMetier->getNombreChambresOffertes()
        );
        }
        return $retour;
    }

    public static function getAll() {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM Etablissement";
        try {
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête PDO
            if ($queryPrepare->execute()) {
                // si la requête réussit :
                // initialiser le tableau d'objets à retourner
                $retour = array();
                // pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    // construir un objet métier correspondant
                    $unObjetMetier = self::enregistrementVersObjet($enregistrement);
                    // ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class() . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public static function getOneById($valeurClePrimaire) {
        $retour = null;
        try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "SELECT * FROM Etablissement WHERE id = ?";
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            if ($queryPrepare->execute(array($valeurClePrimaire))) {
                // si la requête réussit :
                // extraire l'enregistrement retourné par la requête
                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                // construire l'objet métier correspondant
                $retour = self::enregistrementVersObjet($enregistrement);
            }
        } catch (PDOException $e) {
            echo get_class() . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public static function insert($objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "INSERT INTO Etablissement VALUES(:id, :nom, :adresseRue, :codePostal, :ville, :tel, :adresseElectronique, :type, :civiliteResponsable, :nomResponsable, :prenomResponsable, :nombreChambresOffertes)";
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            if ($queryPrepare->execute(self::objetVersEnregistrement($objetMetier))) {
                // si la requête réussit :
                $retour = TRUE;
            }
        } catch (PDOException $e) {
            echo get_class() . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public static function update($idMetier, $objetMetier) {
        $retour = FALSE;
         try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "UPDATE Etablissement SET nom = :nom
                    , adresseRue = :adresseRue
                    , codePostal = :codePostal
                    , ville = :ville
                    , tel = :tel
                    , adresseElectronique = :adresseElectronique
                    , type = :type
                    , civiliteResponsable = :civiliteResponsable
                    , nomResponsable = :nomResponsable
                    , prenomResponsable = :prenomResponsable
                    , nombreChambresOffertes = :nombreChambresOffertes
                    WHERE id = :id";
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            if ($queryPrepare->execute(self::objetVersEnregistrement($objetMetier))) {
                // si la requête réussit :
                $retour = TRUE;
            }
        } catch (PDOException $e) {
            echo get_class() . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public static function delete($idMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "DELETE FROM Etablissement WHERE id = ?";
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            if ($queryPrepare->execute(array($idMetier))) {
                // si la requête réussit :
                $retour = TRUE;
            }
        } catch (PDOException $e) {
            echo get_class() . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

}
