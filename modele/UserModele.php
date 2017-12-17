<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 12:38
 */

class UserModele
{
    public static function Connexion(){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        global $rep,$vues;
        try {
            $a = LoginGateway::Connect($email);
            if($a->getEmail() != "NULL"){
                $mdphash = $a->getMdp();
                if(password_verify($mdp, $mdphash))
                {
                    $a->setAdmin();
                    $_SESSION['admin'] = $a;
                }
                else{
                    $_POST['erreurLogin'] = "Mot de passe incorrect";
                }
            }
            else{
                $_POST['erreurLogin'] = "Email incorrect";
            }
        }
        catch(PDOException $e){
            $dVueErreur[] = $e;
            require ($rep.$vues['erreur']);
        }
        catch(Exception $e2){
            $dVueErreur[] = $e2;
            require ($rep.$vues['erreur']);
        }
        self::RechercheNews();
    }

    public static function Auth()
    {
        global $rep, $vues;
        $_POST['next'] = "adminPage";
        require($rep.$vues['authPage']);
    }


    public static function RechercheNews(){
        global $rep, $vues;
        $results = NewsGateway::Journaliste();
        $_POST['tabNews'] = $results[1];
        $_POST['nbNews'] = $results[2];
        require($rep.$vues['accueil']);
    }

    public static function Register(){
        global $rep, $vues;
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $nom = $_POST['nom'];
        RegisterGateway::Register($email,$mdp,$nom);
        require($rep.$vues['accueil']);

    }
}