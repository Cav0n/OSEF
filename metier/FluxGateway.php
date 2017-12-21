<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 17/12/2017
 * Time: 11:12
 */

///Gateway pour gerer les flux dans la base
class FluxGateway
{
    public static function Ajouter($adresse, $nom) //Function pour ajouter un flux RSS dans la base
    {
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        // Verification de l'existence de l'URL dans la base
        $query = 'SELECT url FROM flux WHERE url=:url';
        $con->executeQuery($query, array(
            ':url' => array($adresse, PDO::PARAM_STR)));
        $results = $con->getResults();
        if ($results != NULL) { //Verifie si l'adresse n'est pas déjà dans la base
            return 'L\'adresse existe déjà dans la base.';
        }

        //Verification de l'existence du nom dans la base
        $query = 'SELECT nom FROM flux WHERE nom=:nom';
        $con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR)));
        $results = $con->getResults();
        if ($results != NULL) { //Verifie si le nom n'est pas déjà dans la base
            return 'Le nom existe déjà dans la base.';
        }

        //Ajout dans la base
        $query = 'INSERT INTO flux VALUES(:url, :nom)';
        $con->executeQuery($query, array(
            ':url' => array($adresse, PDO::PARAM_STR),
            ':nom' => array($nom, PDO::PARAM_STR)));
    }

    public static function RechercherTout(){ //Fonction pour rechercher tout les flux de la base
        global $login, $password, $base;
        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);
        $tabFlux = array();

        $query = 'SELECT url, nom FROM flux';
        $con->executeQuery($query);
        $results = $con->getResults();

        $i = 0;
        foreach ($results as $row) {
            $tabFlux[$i]['nom'] = $row['nom'];
            $tabFlux[$i]['url'] = $row['url'];
            $i++;
        }
        $results[1] = $tabFlux;
        $results[2] = $i;

        return $results;
    }

    public static function Supprimer($nom, $url){ //Fonction pour supprimer un flux RSS dans la base
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        $query = 'DELETE FROM flux WHERE url=:url AND nom=:nom';
        $con->executeQuery($query, array(
            ':url' => array($url, PDO::PARAM_STR),
            ':nom' => array($nom, PDO::PARAM_STR)));
    }
}