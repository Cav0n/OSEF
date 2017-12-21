<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 11:06
 */


class FrontControleur {

    function __construct()
    {
        global $rep, $vues;
        $dVueErreur = array();

        session_start();

        if(isset($_GET['page'])) //Verification si page deja mis en place
        {
            $page = $_GET['page'];
        }
        else {
            //sinon initialisation a 1
            $page = 1;
        }

        //on initialise la liste des actions admin
        $listeAction_Admin = array('AjouterNews','SupprimerNews','Deconnexion', 'Administration', 'AjouterRSS', 'SupprimerRSS', 'CompterNews', 'ChangerNbNews');

        try {
            //on verifie si il y a une action déjà existante
            if(isset($_REQUEST['action'])){
                $action = $_REQUEST['action'];
            }
            //sinon on l'initialise à NULL
            else{
                $action = NULL;
            }

            if (in_array($action, $listeAction_Admin)){ //si l'action est dans la liste d'action spécifique aux administrateurs
                if (isset($_SESSION['admin']) && $_SESSION['admin']->isAdmin()){ //verifie si l'utilisateur est bien admin
                    new AdminControleur($action); //envoie l'action au controleur admin
                }
                else {
                    new UserControleur("Auth"); //sinon demande a l'utilisateur de se connecter en le renvoyant vers une page pour cela
                }
            }
            else {
                new UserControleur($action); //si l'action n'est pas une action d'administrateur, envoie l'action vers le controleur user
            }
        } catch (PDOException $e) {
            $dVueErreur[] = "Base de données: ".$e;
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueErreur[] = $e2;
            require($rep . $vues['erreur']);
        }
    }
}

?>