<?php
/**
 * Created by PhpStorm.
 * User: flbernard
 * Date: 01/12/17
 * Time: 14:07
 */

class ControlUser
{
    public function __construct(){

    }

    public static function Deconnexion(){
        global $rep, $vues;
        unset($_SESSION['name']);
        unset($_SESSION['role']);
        unset($_SESSION['email']);
        require($rep.$vues['accueil']);
    }

    public static function Connexion(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        global $rep,$vues;
        require_once('metier/LoginGateway.php');
        try {
            $loginArray = LoginGateway::Connect($email, $password);
            $_SESSION['name'] = $loginArray['name'];
            $_SESSION['role'] = $loginArray['role'];
            $_SESSION['email'] = $loginArray['email'];
        }
        catch(Exception $e){
            $dVueErreur[] = $e;
            require ($rep.$vues['erreur']);
        }
        require ($rep.$vues['accueil']);
    }

    public static function RechercheNews(){
        global $rep, $vues;
        require_once('metier/NewsGateway.php');
        $tabNews = NewsGateway::Journaliste();
        require($rep.$vues['accueil']);
    }
}