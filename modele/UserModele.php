<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 12:38
 */

class UserModele
{
    //function de connection, pour passer en admin
    public static function Connexion(){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        global $rep,$vues;

        try {
            $a = LoginGateway::Connect($email); //appel de la gateway pour se connecter
            if($a->getEmail() != "NULL"){ //Verifie que l'email renvoyer est différent de "NULL"
                $mdphash = $a->getMdp(); //Prend le mot de passe crypté
                if(password_verify($mdp, $mdphash)) //Compare le mot de passe tapé par l'utilisateur et le mot de passe crypté
                {
                    $a->setAdmin(); //Si c'est validé, l'utilisateur devient réellement admin
                    $_SESSION['admin'] = $a; //Mise en place d'une variable de session pour stocker l'admin
                }
                else{
                    $_POST['erreurLogin'] = "Mot de passe incorrect"; //Si la verification de mot de passe echoue, l'indiquer à l'utilisateur
                }
            }
            else{
                $_POST['erreurLogin'] = "Email incorrect"; //Si l'email n'existe pas dans la base, l'indiquer à l'utilisateur
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

        self::RechercheNews(); //Afficher de nouveau la page d'accueil
    }

    public static function Auth()
    {
        global $rep, $vues;
        $_POST['next'] = "adminPage"; //Dire que la prochaine page à afficher est la page d'administration
        require($rep.$vues['authPage']); //Appeler la page d'authentification
    }


    public static function RechercheNews(){
        global $rep, $vues;
        $results = NewsGateway::Journaliste(); //Appelle la fonction Journaliste dans la Gateway de News, qui permet de recuperer les news dans la base
        $_POST['tabNews'] = $results[1]; //Recupère la liste de news
        $_POST['nbNews'] = $results[2]; //Recupère le nombre de news
        require($rep.$vues['accueil']); //Appelle la page d'accueil
    }

    public static function Register(){ //Fonction pour pouvoir s'enregistrer et stocker un mot de passe crypté dans la base [OBSCOLETE]
        global $rep, $vues;
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $nom = $_POST['nom'];
        RegisterGateway::Register($email,$mdp,$nom);
        require($rep.$vues['accueil']);

    }
}