<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 12:59
 */

class RegisterGateway
{
    public static function Register(String $email,String $mdp,String $nom){
        $mdphash = password_hash($mdp,PASSWORD_DEFAULT);
        global $rep, $vues;
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);
        $query = 'INSERT INTO admin VALUES(:email,:mdp,:nom)';
        $con->executeQuery($query, array(
            ':email' => array($email, PDO::PARAM_STR),
            ':mdp' => array($mdphash, PDO::PARAM_STR),
            ':nom' => array($nom, PDO::PARAM_STR)));
    }

}