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
        global $rep, $vues; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        session_start();
        //Faire du GET pour obtenir la page


        //debut

        //on initialise un tableau d'erreur
        $dVueErreur = array();

        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
        }
        else {
            $page = 1;
        }

        $listeAction_Admin = array('AjouterNews','SupprimerNews','Deconnexion', 'Administration', 'AjouterRSS', 'SupprimerRSS', 'CompterNews', 'ChangerNbNews');

        try {
            if(isset($_REQUEST['action'])){
                $action = $_REQUEST['action'];
            }
            else{
                $action = NULL;
            }

            if (in_array($action, $listeAction_Admin)){
                if (isset($_SESSION['admin']) && $_SESSION['admin']->isAdmin()){
                    new AdminControleur($action);
                }
                else {
                    new UserControleur("Auth");
                }
            }
            else {
                new UserControleur($action);
            }
        } catch (PDOException $e) {
            $dVueErreur[] = "Base de données: ".$e;
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueErreur[] = $e2;
            require($rep . $vues['erreur']);
        }
    }//fin constructeur
}//fin class

?>