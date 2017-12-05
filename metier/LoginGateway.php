<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 03/12/2017
 * Time: 10:42
 */

class LoginGateway
{

    public function __construct()
    {

    }

    public static function Connect($email, $password): array
    {
        global $rep,$vues;
        require_once('Connexion.php');
        global $login, $mdp, $base;

        $dsn = "mysql:host=localhost;dbname=$base";
        $con = new Connexion($dsn, $login, $mdp);

        $query = 'SELECT role, name FROM users WHERE login=:email AND mdp=:password';

        $con->executeQuery($query, array(
            ':email' => array($email, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)));

        $results = $con->getResults();
        if ($results == null) {
            $loginArray['role'] = "FAUX";
            throw new Exception("Login ou mot de passe incorrect!");
        }
        else {
            foreach ($results as $row) {
                $roleUsers = $row['role'];
                $nameUsers = $row['name'];
            }
            $loginArray['name'] = $nameUsers;
            $loginArray['role'] = $roleUsers;
            $loginArray['email'] = $email;
            return $loginArray;
        }
    }

}