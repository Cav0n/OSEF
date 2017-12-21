<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 11:57
 */

class AdminModele
{
    public static function Deconnexion() //Fonction permettant de se deconnecter
    {
        unset($_SESSION['admin']);
        new UserControleur(NULL);
    }

    public static function Administration() //Fonction pour afficher la page d'administration
    {
        global $rep, $vues;
        $results = self::ListeRSS();
        $_POST['tabRSS'] = $results[1];
        $_POST['nbRSS'] = $results[2];
        require($rep.$vues['administration']);
    }


    public static function AjouterRSS(){ //Fonction pour ajouter un fluxRSS a la base
        unset($_POST['erreurRSS']);
        $adresse = $_POST['adresseRSS'];
        $nom = $_POST['nomRSS'];
        $_POST['erreurAjoutRSS'] = FluxGateway::Ajouter($adresse, $nom);
        new AdminControleur("Administration");
    }

    public static function ListeRSS(){ //Fonction pour rechercher tout les flux dans la base de données
        $results = FluxGateway::RechercherTout();
        return $results;

    }

    public static function SupprimerRSS() //Fonction pour supprimer un flux RSS dans la base
    {
        $nom = $_GET['nomRSS'];
        $url = $_GET['urlRSS'];
        $_POST['erreurSuppressionRSS'] = FluxGateway::Supprimer($nom, $url);
        new AdminControleur("Administration");
    }

    public static function AjouterNews() //Fonction pour ajouter une news dans la base
    {
        unset($_POST['erreurNews']);
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $adresse = $_POST['adresse'];
        $categorie = $_POST['categorie'];
        $date = $_POST['date'];
        $_POST['erreurNews'] = NewsGateway::Ajouter($titre, $description, $adresse, $categorie, $date);
        new AdminControleur("Administration");
    }

    public static function SupprimerNews() //Fonction pour supprimer une news dans la base
    {
        $titre = $_GET['titre'];
        NewsGateway::Supprimer($titre);
        new UserControleur(NULL);
    }

    public static function CompterNews() : int //Fonction pour compter les News
    {
        $result = NewsGateway::NombreNews();
        return $result;
    }

    public static function ChangerNbNewsParPage() //Fonction pour changer le nombre de news par page
    {
        $nb = $_POST['nbNewsParPage'];
        ConfigGateway::ModifNbNewsParPage($nb);
        new AdminControleur("Administration");
    }
}