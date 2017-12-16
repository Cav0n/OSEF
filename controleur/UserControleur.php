<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 11:07
 */

class UserControleur
{
    public function __construct($action)
    {
        global $rep, $vues;
        $dVueErreur = array();

            switch ($action) {

                case NULL:
                    UserModele::RechercheNews();
                    break;

                case "Connexion":
                    UserModele::Connexion();
                    break;

                case "Register":
                    UserModele::Register();
                    break;
            }
    }
}