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

    /// Fonction de connection de la Gateway
    /// Cherche l'email dans la base de donnees
    /// Si l'email n'existe pas, l'email devient "NULL"
    /// Recupère le mot de passe crypté dans la base si l'email existe
    /// Crée un admin avec l'email et le mot de passe crypté
    public static function Connect($email): Admin
    {
        global $login, $password, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $password);

        Validation::sanitizeEmail($email);

        $query = 'SELECT mdp FROM admin WHERE Email=:email';
        $con->executeQuery($query, array(
            ':email' => array($email, PDO::PARAM_STR)));

        $results = $con->getResults();
        if ($results == null) { //Si aucun resultat de la part de la base, l'adresse mail devient "NULL"
            return new Admin("NULL", "");
        }
        else {
            $mdp = $results['0']['mdp'];
            return new Admin($email, $mdp); //Création d'un admin avec l'email rentré par l'utilisateur et le mot de passe crypté dans la base
        }
    }
}