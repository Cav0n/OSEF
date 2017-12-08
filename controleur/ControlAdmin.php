<?php
/**
 * Created by PhpStorm.
 * User: flbernard
 * Date: 01/12/17
 * Time: 14:07
 */

class ControlAdmin
{
    public function __construct()
    {

    }

    public static function AjouterNews(){
        require_once('metier/Admin.php');
        if(Admin::isAdmin())
        {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $adresse = $_POST['adresse'];
            $categorie = $_POST['categorie'];
            global $rep, $vues;
            require_once('metier/NewsGateway.php');
            NewsGateway::Ajouter($titre, $description, $adresse, $categorie);
            require($rep.$vues['accueil']);
        }
        else {
            throw new Exception("Vous n'êtes pas admin!");
        }
    }

    public static function SupprimerNews(){
        require_once('metier/Admin.php');
        if(Admin::isAdmin()) {
            $titre = $_POST['name'];
            global $rep, $vues;
            require_once('metier/NewsGateway.php');
            NewsGateway::Supprimer($titre);
            require($rep . $vues['accueil']);
        }
        else {
            throw new Exception("Vous n'êtes pas admin!");
        }
    }

}