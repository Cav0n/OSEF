<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 11:57
 */

class AdminModele
{
    public static function Deconnexion()
    {
        unset($_SESSION['admin']);
        new UserControleur(NULL);
    }

    public static function Administration()
    {
        global $rep, $vues;
        $results = self::ListeRSS();
        $_POST['tabRSS'] = $results[1];
        $_POST['nbRSS'] = $results[2];
        require($rep.$vues['administration']);
    }


    public static function AjouterRSS(){
        unset($_POST['erreurRSS']);
        $adresse = $_POST['adresseRSS'];
        $nom = $_POST['nomRSS'];
        $_POST['erreurAjoutRSS'] = FluxGateway::Ajouter($adresse, $nom);
        new AdminControleur("Administration");
    }

    public static function ListeRSS(){
        $results = FluxGateway::RechercherTout();
        return $results;

    }

    public static function SupprimerRSS()
    {
        $nom = $_GET['nomRSS'];
        $url = $_GET['urlRSS'];
        $_POST['erreurSuppressionRSS'] = FluxGateway::Supprimer($nom, $url);
        new AdminControleur("Administration");
    }

    public static function AjouterNews()
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

    public static function SupprimerNews()
    {
        $titre = $_GET['titre'];
        NewsGateway::Supprimer($titre);
        new UserControleur(NULL);
    }

    public static function CompterNews() : int
    {
        $result = NewsGateway::NombreNews();
        return $result;
    }

    public static function ChangerNbNewsParPage()
    {
        $nb = $_POST['nbNewsParPage'];
        ConfigGateway::ModifNbNewsParPage($nb);
        new AdminControleur("Administration");
    }
}