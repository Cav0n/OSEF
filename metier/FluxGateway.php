<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 17/12/2017
 * Time: 11:12
 */

class FluxGateway
{
    public static function Ajouter($adresse, $nom)
    {
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        // Verification de l'existence de l'URL dans la base
        $query = 'SELECT url FROM flux WHERE url=:url';
        $con->executeQuery($query, array(
            ':url' => array($adresse, PDO::PARAM_STR)));
        $results = $con->getResults();
        if ($results != NULL) {
            return 'L\'adresse existe déjà dans la base.';
        }

        //Verification de l'existence du nom dans la base
        $query = 'SELECT nom FROM flux WHERE nom=:nom';
        $con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR)));
        $results = $con->getResults();
        if ($results != NULL) {
            return 'Le nom existe déjà dans la base.';
        }

        //Ajout dans la base
        $query = 'INSERT INTO flux VALUES(:url, :nom)';
        $con->executeQuery($query, array(
            ':url' => array($adresse, PDO::PARAM_STR),
            ':nom' => array($nom, PDO::PARAM_STR)));
    }

    public static function RechercherTout(){
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

    public static function Supprimer($nom, $url){
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        $query = 'DELETE FROM flux WHERE url=:url AND nom=:nom';
        $con->executeQuery($query, array(
            ':url' => array($url, PDO::PARAM_STR),
            ':nom' => array($nom, PDO::PARAM_STR)));
    }
}