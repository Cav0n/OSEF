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
        global $rep, $vues;
        $dVueErreur = array();

        try {
            switch ($action) {
                case "Deconnexion":
                    AdminModele::Deconnexion();
                    break;

                case "Administration":
                    AdminModele::Administration();
                    break;

                case "AjouterRSS":
                    AdminModele::AjouterRSS();
                    break;

                case "SupprimerRSS":
                    AdminModele::SupprimerRSS();
                    break;

                case "AjouterNews":
                    AdminModele::AjouterNews();
                    break;

                case "SupprimerNews":
                    AdminModele::SupprimerNews();
                    break;

                case "CompterNews":
                    AdminModele::CompterNews();
                    break;

                case "ChangerNbNews":
                    AdminModele::ChangerNbNewsParPage();
                    break;
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