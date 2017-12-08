<?php

	class Controleur {

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
                        $this->RechercheNews();
                        break;


                    case "Connexion":
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $this->ValidationLogin($email, $password);
                        break;

                    case "Deconnexion":
                        unset($_SESSION['name']);
                        unset($_SESSION['role']);
                        unset($_SESSION['email']);
                        unset($_SESSION['nbNews']);
                        require($rep . $vues['accueil']);
                        break;

                    case "Ajout":
                        $titre = $_POST['titre'];
                        $description = $_POST['description'];
                        $adresse = $_POST['adresse'];
                        $categorie = $_POST['categorie'];
                        $this->AjouterNews($titre, $description, $adresse, $categorie);
                        break;

                    case "Supprimer":
                        $this->SupprimerNews($_POST['name']);
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


		function ValidationLogin($email, $password){
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

		function RechercheNews(){
			global $rep, $vues;
			require_once('metier/NewsGateway.php');
			$tabNews = NewsGateway::Journaliste();
			require($rep.$vues['accueil']);
		}

		function AjouterNews($titre, $description, $adresse, $categorie){
            global $rep, $vues;
            require_once('metier/NewsGateway.php');
            NewsGateway::Ajouter($titre, $description, $adresse, $categorie);
            require($rep.$vues['accueil']);
		}

		function SupprimerNews($titre){
			global $rep, $vues;
			require_once('metier/NewsGateway.php');
			NewsGateway::Supprimer($titre);
            require($rep.$vues['accueil']);
		}

	}//fin class

?>
