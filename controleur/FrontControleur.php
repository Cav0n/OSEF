<?php

	class FrontControleur {

		function __construct()
        {
            global $rep, $vues; // nécessaire pour utiliser variables globales
            // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
            session_start();
            //Faire du GET pour obtenir la page
            $_SESSION['page'] = 1;


            //debut

            //on initialise un tableau d'erreur
            $dVueErreur = array();

            try {
                if(isset($_REQUEST['action'])){
                    $action = $_REQUEST['action'];
                }
                else{
                    $action = NULL;
                }

                switch ($action) {

                    //pas d'action, on reinitialise 1er appel
                    case NULL:
                        ControlUser::RechercheNews();
                        break;


                    case "Connexion":
                        ControlUser::Connexion();
                        break;

                    case "Deconnexion":
                        ControlUser::Deconnexion();
                        break;

                    case "Ajout":
                        try{
                            ControlAdmin::AjouterNews();
                        }
                        catch(Exception $e){
                            $dVueErreur[] = $e;
                            require ($rep.$vues['erreur']);
                        }
                        break;

                    case "Supprimer":
                        try{
                            ControlAdmin::SupprimerNews();
                        }
                        catch(Exception $e){
                            $dVueErreur[] = $e;
                            require ($rep.$vues['erreur']);
                        }
                        break;

                    //mauvaise action
                    default:
                        $dVueErreur[] = "Erreur d'appel php";
                        require($rep . $vues['accueil']);
                        break;
                }

            } catch (PDOException $e) {
                //si erreur BD, pas le cas ici
                $dVueErreur[] = "Erreur inattendue!!! ";
                require($rep . $vues['erreur']);

            } catch (Exception $e2) {
                $dVueErreur[] = "Erreur inattendue!!! ";
                require($rep . $vues['erreur']);
            }


            //fin
            exit(0);
        }//fin constructeur
	}//fin class

?>
