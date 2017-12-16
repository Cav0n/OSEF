<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 11:14
 */

class NewsGateway
{
    public function __construct()
    {

    }

    public static function Journaliste() :array
    {
        global $rep, $vues;
        global $login, $password, $base;
        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);
        $query = 'SELECT titre, url, categorie, description FROM news';
        $con->executeQuery($query);
        $results = $con->getResults();
        $i = 0;
        foreach ($results as $row) {
            $tabNews[$i]['titre'] = $row['titre'];
            $tabNews[$i]['lien'] = $row['url'];
            $tabNews[$i]['categorie'] = $row['categorie'];
            $tabNews[$i]['description'] = $row['description'];
            $i++;
        }
        $_POST['nbNews'] = $i;
        $_POST['tabNews'] = $tabNews;
        return $tabNews;
    }

    public static function Ajouter($titre, $description, $adresse, $categorie) {
        global $rep, $vues;
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);
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
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);
        $query = 'DELETE FROM news WHERE titre=:titre ';
        $con->executeQuery($query, array(':titre' => array($titre, PDO::PARAM_STR)));

    }
}