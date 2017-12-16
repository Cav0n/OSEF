<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 11:57
 */

class AdminModele
{
    public static function Deconnexion(){
        global $rep, $vues;
        unset($_SESSION['admin']);
        new UserControleur(NULL);
    }

    public static function AjouterNews(){
        require_once('metier/Admin.php');
        if(isset($_SESSION['admin']) && $_SESSION['admin'] != null)
        {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $adresse = $_POST['adresse'];
            $categorie = $_POST['categorie'];
            global $rep, $vues;
            require_once('metier/NewsGateway.php');
            NewsGateway::Ajouter($titre, $description, $adresse, $categorie);
            new UserControleur(NULL);
        }
        else {
            throw new Exception("Vous n'êtes pas admin!");
        }
    }

    public static function SupprimerNews(){
        require_once('metier/Admin.php');
        if(isset($_SESSION['admin']) && $_SESSION['admin']->isAdmin()) {
            $titre = $_GET['titre'];
            NewsGateway::Supprimer($titre);
            new UserControleur(NULL);
        }
        else {
            throw new Exception("Vous n'êtes pas admin!");
        }
    }
}