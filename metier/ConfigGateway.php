<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 17/12/2017
 * Time: 16:09
 */

class ConfigGateway
{
    public function __construct()
    {

    }

    public static function NbNewsParPage() :int
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

    public static function ModifNbNewsParPage($nb)
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