<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 11:09
 */

class LoginGateway
{
    public function __construct()
    {

    }

    public static function Connect($email): Admin
    {
        global $rep,$vues;
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        //NETTOYAGE DE l'EMAIL A FAIRE ET DU MDP
        $query = 'SELECT mdp FROM admin WHERE Email=:email';
        $con->executeQuery($query, array(
            ':email' => array($email, PDO::PARAM_STR)));

        $results = $con->getResults();
        if ($results == null) {
            return new Admin("NULL", "");
        }
        else {
            $mdp = $results['0']['mdp'];
            return new Admin($email, $mdp);
        }
    }
}