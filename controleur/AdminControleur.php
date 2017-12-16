<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 11:07
 */

class AdminControleur
{
    public function __construct($action)
    {
        $dVueErreur = array();
        try {
            global $rep, $vues;
            switch ($action) {
                case "Deconnexion":
                    AdminModele::Deconnexion();
                    break;

                case "AjouterNews":
                    AdminModele::AjouterNews();
                    break;

                case "SupprimerNews":
                    AdminModele::SupprimerNews();
                    break;
            }
        }
        catch(Exception $e){
            $dVueErreur[] = $e;
            require($rep . $vues['erreur']);
        }
    }
}