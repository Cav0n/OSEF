<?php
global $rep, $vues;
$dVueErreur=array();
if (isset($_POST['tabNews'])) {
    $tabNews = $_POST['tabNews'];
    if(isset($_POST['nbNews']))
    {
        $nbNews = $_POST['nbNews'];
    }
    $nbNewsParPage = ConfigGateway::NbNewsParPage();
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }
    if($nbNews < $nbNewsParPage) {
        $nbNewsParPage = $nbNews;
    }
    for ($i = ($nbNewsParPage*$page-$nbNewsParPage); $i <= ($nbNewsParPage*$page)-1; $i++) {
        if(isset($tabNews[$i])){
            $titre = $tabNews[$i]['titre'];
            $description = $tabNews[$i]['description'];
            $lien = $tabNews[$i]['lien'];
            $categorie = $tabNews[$i]['categorie'];

            //Pour afficher 10 news par pages :
            //News Max : 10*page -1
            //News Min : 10*page -10

            echo '
                        <article class="style1">
                            <span class="image">
                                <img src="vues/images/Actus.jpg" alt="" />
                            </span>'."
                            <a href=$lien>
                                <h2>$titre</h2>".'
                                <div class="content">'."
                                    $description".'
                                </div>
                            </a>
                        </article>';
                        if(isset($_SESSION['admin']) && $_SESSION['admin']->isAdmin()){
                        echo '<a  href="?action=SupprimerNews&titre='."$titre".'"width="50" height="50" >Supprimer</a>';
                        }
        }
    }
}
else{
    $dVueErreur[] = "Impossible de charger les news";
    require($rep.$vues['erreur']);
}
?>