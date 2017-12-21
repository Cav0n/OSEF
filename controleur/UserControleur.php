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

        try {
            switch ($action) {
                case NULL:
                    UserModele::RechercheNews();
                    break;

                case "Auth";
                    UserModele::Auth();
                    break;

                case "Connexion":
                    UserModele::Connexion();
                    break;

                case "Register":
                    UserModele::Register();
                    break;
            }
        }
        catch (PDOException $e) {
        $dVueErreur[] = "Base de données: ".$e;
        require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueErreur[] = $e2;
            require($rep . $vues['erreur']);
        }
    }
}