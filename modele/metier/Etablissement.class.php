<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Etablissement
 *
 * @author btssio
 */
namespace modele\metier;

class Etablissement {

    private $id;
    private $nom;
    private $adresseRue;
    private $codePostal;
    private $ville;
    private $tel;
    private $adresseElectronique;
    private $type;
    private $civiliteResponsable;
    private $nomResponsable;
    private $prenomResponsable;
    private $nombreChambresOffertes;

    function __construct($id, $nom, $adresseRue, $codePostal, $ville, $tel, $adresseElectronique, $type, $civiliteResponsable, $nomResponsable, $prenomResponsable, $nombreChambresOffertes) {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresseRue = $adresseRue;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->tel = $tel;
        $this->adresseElectronique = $adresseElectronique;
        $this->type = $type;
        $this->civiliteResponsable = $civiliteResponsable;
        $this->nomResponsable = $nomResponsable;
        $this->prenomResponsable = $prenomResponsable;
        $this->nombreChambresOffertes = $nombreChambresOffertes;
    }

    public function __toString() {
        $resu = "";
        $resu .= " - id : " . $this->getId();
        $resu .= " - nom : " . $this->getNom();
        $resu .= " - adresseRue : " . $this->getAdresseRue();
        $resu .= " - codePostal : " . $this->getCodePostal();
        $resu .= " - ville : " . $this->getVille();
        $resu .= " - tel : " . $this->getTel();
        $resu .= " - adresseElectronique : " . $this->getAdresseElectronique();
        $resu .= " - type : " . $this->getType();
        $resu .= " - civiliteResponsable : " . $this->getCiviliteResponsable();
        $resu .= " - nomResponsable : " . $this->getNomResponsable();
        $resu .= " - prenomResponsable : " . $this->getPrenomResponsable();
        $resu .= " - nombreChambresOffertes : " . $this->getNombreChambresOffertes();


        return ($resu);
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getAdresseRue() {
        return $this->adresseRue;
    }

    function getCodePostal() {
        return $this->codePostal;
    }

    function getVille() {
        return $this->ville;
    }

    function getTel() {
        return $this->tel;
    }

    function getAdresseElectronique() {
        return $this->adresseElectronique;
    }

    function getType() {
        return $this->type;
    }

    function getCiviliteResponsable() {
        return $this->civiliteResponsable;
    }

    function getNomResponsable() {
        return $this->nomResponsable;
    }

    function getPrenomResponsable() {
        return $this->prenomResponsable;
    }

    function getNombreChambresOffertes() {
        return $this->nombreChambresOffertes;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setAdresseRue($adresseRue) {
        $this->adresseRue = $adresseRue;
    }

    function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setAdresseElectronique($adresseElectronique) {
        $this->adresseElectronique = $adresseElectronique;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setCiviliteResponsable($civiliteResponsable) {
        $this->civiliteResponsable = $civiliteResponsable;
    }

    function setNomResponsable($nomResponsable) {
        $this->nomResponsable = $nomResponsable;
    }

    function setPrenomResponsable($prenomResponsable) {
        $this->prenomResponsable = $prenomResponsable;
    }

    function setNombreChambresOffertes($nombreChambresOffertes) {
        $this->nombreChambresOffertes = $nombreChambresOffertes;
    }

}
