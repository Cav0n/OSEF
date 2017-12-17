<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 17/12/2017
 * Time: 10:47
 */
?>

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>News OSEF</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="vues/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="vues/assets/css/main.css" />
    <link rel="icon" type="image/png" href="vues/images/ico.png" />
    <!--[if lte IE 9]><link rel="stylesheet" href="vues/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="vues/assets/css/ie8.css" /><![endif]-->
</head>
<body>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href="index.php" class="logo">
                <span class="symbol"><img src="vues/images/logo.svg" alt="" /></span><span class="title">OSEF</span>
            </a>

            <!-- Nav -->
            <nav>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="?action=">Accueil</a></li>
            <li><a href="#">Administration</a></li>
        </ul>
        <?php require('vues/connexion.php'); ?>
        <?php require('vues/register.php'); ?>
    </nav>

    <!-- Main -->
    <div id="main">
        <div class="inner">
            <header>
                <h1>Page d'administration<br /></h1>
                <h2>Bienvenue.</h2>
                <p>Vous pouvez ajouter le flux RSS d'un site a la BDD et changer le nombre de news pas page.</p>
            </header>

            <BR>
            <section>
                <h2>Nombre de News par page</h2>
                <h4><?php if(isset($_POST['erreurNewsParPage'])){echo $_POST['erreurNewsParPage'];} unset($_POST['erreurNewsParPage']); ?></h4>
                <form method="post" action="#">
                    <select name="nbNewsParPage">
                        <?php
                        $nbNews = AdminModele::CompterNews();
                        for($i = 1; $i <= $nbNews; $i++)
                        {
                            echo '<option value="'."$i".'">'."$i".'</option>';
                        }
                        ?>
                    </select>
                    <ul class="actions">
                        <li><button type="submit" name="action" value="ChangerNbNews" class="special">Valider</button></li>
                    </ul>
                </form>
            </section>

            <BR>

            <section>
                <h2>Ajout d'un news</h2>
                <h4><?php if(isset($_POST['erreurNews'])){echo $_POST['erreurNews'];} unset($_POST['erreurNews']); ?></h4>
                <form method="post" action="#">
                    <div class="field">
                        <input type="text" name="titre" id="titre" placeholder="Titre" />
                    </div>
                    <div class="field">
                        <input type="text" name="description" id="description" placeholder="Description">
                    </div>
                    <div class="field">
                        <input type="url" name="adresse" id="adresse" placeholder="Adresse URL">
                    </div>
                    <select name="categorie">
                        <option value="Actus">Actus</option>
                        <option value="High-Tech">High-Tech</option>
                        <option value="Comedie">Comédie</option>
                        <option value="Travail">Travail</option>
                    </select>
                    <BR>
                    <input id="date" type="date" name ="date" class="special">
                    <ul class="actions">
                        <li><button type="submit" name="action" value="AjouterNews" class="special">Ajouter</button></li>
                    </ul>
                </form>
            </section>

            <BR>

            <section>
                <h2>Ajout de flux RSS d'un site</h2>
                <h4><?php if(isset($_POST['erreurAjoutRSS'])){echo $_POST['erreurAjoutRSS'];} unset($_POST['erreurAjoutRSS']); ?></h4>
                <form method="post" action="#">
                    <div class="field">
                        <input type="text" name="nomRSS" id="nomRSS" placeholder="Nom du site">
                    </div>
                    <div class="field">
                        <input type="url" name="adresseRSS" id="adresseRSS" placeholder="Adresse du flux RSS">
                    </div>
                    <ul class="actions">

                        <li><button type="submit" name="action" value="AjouterRSS" class="special">Ajouter</button></li>
                    </ul>
                </form>
            </section>

            <BR>

            <section>
                <h2>Suppression de flux RSS</h2>
                <h4><?php if(isset($_POST['erreurSuppressionRSS'])){echo $_POST['erreurSuppressionRSS'];} unset($_POST['erreurSuppressionRSS']); ?></h4>
                <form method="post" action="#">
                    <table>
                        <tr>
                            <td>Nom</td>
                            <td>URL</td>
                            <td></td>
                        </tr>
                        <?php
                        if (isset($_POST['tabRSS'])) {
                            if ($_POST['nbRSS'] == 0){
                                echo '<H3>Aucun flux RSS dans la base de donnée</H3>';
                            }
                            else {
                                for ($i = 0; $i < $_POST['nbRSS']; $i++) {
                                    $tabRSS = $_POST['tabRSS'];
                                    $nom = $tabRSS[$i]['nom'];
                                    $url = $tabRSS[$i]['url'];
                                    echo "
                                        <tr>
                                        <td>$nom</td>
                                        <td>$url</td>".'
                                        <td><a  href="?action=SupprimerRSS&nomRSS='."$nom" . '&urlRSS=' . "$url" . '"width="50" height="50">Supprimer</a></td>
                                        </tr>';
                                }
                            }
                        }
                        else {
                            echo "Erreur d'affichage des flux RSS";
                        }
                        ?>
                    </table>
                </form>
            </section>

        </div>
    </div>

    <BR>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <section>
                <h2>Suivez-nous</h2>
                <ul class="icons">
                    <li><a href="https://twitter.com/xcav0n" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="https://www.facebook.com/xCav0n" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="https://www.instagram.com/?hl=fr" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="https://github.com/Cav0n" class="icon style2 fa-github"><span class="label">GitHub</span></a></li>
                </ul>
            </section>
            <ul class="copyright">
                <li>&copy; Bernard & Bourzier</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </footer>

</div>

<!-- Scripts -->
<script src="vues/assets/js/jquery.min.js"></script>
<script src="vues/assets/js/skel.min.js"></script>
<script src="vues/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="vues/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="vues/assets/js/main.js"></script>

</body>
</html>
