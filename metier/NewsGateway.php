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

    public static function NombreNews() :int
    {
        global $login, $password, $base;
        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        $query = 'SELECT count(titre) FROM news';
        $con->executeQuery($query);
        $results = $con->getResults();

        return $results[0]['count(titre)'];
    }

    public static function Journaliste() :array
    {
        global $login, $password, $base;
        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);
        $tabNews = array();

        $query = 'SELECT titre, url, categorie, description FROM news ORDER BY date';
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
        $results[1] = $tabNews;
        $results[2] = $i;

        return $results;
    }

    public static function Ajouter($titre, $description, $adresse, $categorie, $date)
    {
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        $query = 'SELECT titre FROM news WHERE titre=:titre';
        $con->executeQuery($query, array(
            ':titre' => array($titre, PDO::PARAM_STR)));
        $results = $con->getResults();

        if($results != NULL){
            return "Une news avec ce titre existe déjà dans la base.";
        }

        else {
            $query = 'INSERT INTO news VALUES(:titre,:adresse,:categorie,:description, :date)';
            $con->executeQuery($query, array(
                ':titre' => array($titre, PDO::PARAM_STR),
                ':adresse' => array($adresse, PDO::PARAM_STR),
                ':categorie' => array($categorie, PDO::PARAM_STR),
                ':description' => array($description, PDO::PARAM_STR),
                ':date' => array($date, PDO::PARAM_STR)));
        }
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