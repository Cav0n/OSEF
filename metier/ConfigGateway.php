<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 17/12/2017
 * Time: 16:09
 */

///Gateway permettant la configuration de divers paramètres dans la base
///Uniquement le nombre de news page pour l'instant
class ConfigGateway
{
    public function __construct()
    {

    }

    public static function NbNewsParPage() :int //Fonction pour afficher le nombre de news par page
    {
        global $login, $password, $base;
        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        $query = 'SELECT nbNewsParPage FROM config';
        $con->executeQuery($query);
        $results = $con->getResults();

        $nbNewsParPage = $results[0]['nbNewsParPage'];

        return $nbNewsParPage;
    }

    public static function ModifNbNewsParPage($nb) //Fonction pour modifier le nombre de news par page dans la base
    {
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        //Ajout dans la base
        $query = 'UPDATE config SET nbNewsParPage = :nb';
        $con->executeQuery($query, array(
            ':nb' => array($nb, PDO::PARAM_INT)));
    }
}