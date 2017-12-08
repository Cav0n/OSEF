<?php
/**
 * Created by PhpStorm.
 * User: flbernard
 * Date: 01/12/17
 * Time: 14:10
 */

class NewsGateway
{
    public function __construct()
    {

    }

    public static function Journaliste() :array
    {
        global $rep, $vues;
        require_once('metier/Connexion.php');
        global $login, $mdp, $base;
        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $mdp);
        $query = 'SELECT titre, lien, categorie, description FROM news';
        $con->executeQuery($query);
        $results = $con->getResults();
        $i = 0;
        foreach ($results as $row) {
            $tabNews[$i]['titre'] = $row['titre'];
            $tabNews[$i]['lien'] = $row['lien'];
            $tabNews[$i]['categorie'] = $row['categorie'];
            $tabNews[$i]['description'] = $row['description'];
            $i++;
        }
        $_SESSION['nbNews'] = $i;
        $_SESSION['tabNews'] = $tabNews;
        return $tabNews;
    }

    public static function Ajouter($titre, $description, $adresse, $categorie) {
        global $rep, $vues;
        require_once('metier/Connexion.php');
        global $login, $mdp, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $mdp);
        $query = 'INSERT INTO news VALUES(:titre,:adresse,:categorie,:description)';
        $con->executeQuery($query, array(
            ':titre' => array($titre, PDO::PARAM_STR),
            ':adresse' => array($adresse, PDO::PARAM_STR),
            ':categorie' => array($categorie, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR)));
    }

    public static function Supprimer($titre)
    {
        global $rep, $vues;
        require_once('metier/Connexion.php');
        global $login, $mdp, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $mdp);
        $query = 'DELETE FROM news WHERE titre=:titre ';
        $con->executeQuery($query, array(':titre' => array($titre, PDO::PARAM_STR)));

    }
}