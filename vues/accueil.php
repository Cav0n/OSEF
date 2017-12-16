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
            <li><a href="accueil.html">Accueil</a></li>
            <li><a href="vues/generic.html">Ajouts</a></li>
        </ul>
        <?php require('vues/connexion.php'); ?>
        <?php require('vues/register.php'); ?>
    </nav>

    <!-- Main -->
    <div id="main">
        <div class="inner">
            <header>
                <h1>Bienvenue sur OSEF<br />
                    crée par  <a href="index.php">Lucas B. et Florian B.</a>.</h1>
                    <p>Vous retrouverez sur ce site pleins de news inutiles.</p>
            </header>
            <section class="tiles">
                <?php require('vues/news.php'); ?>
            </section>
            <section>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] != null) require('vues/ajoutNews.php'); ?>
            </section>

        </div>
        <a href="index.php"></a>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <?php $nbNews = $_POST['nbNews'];
        $nbNewsParPage = $_POST['nbNewsParPage'];
        $nbPage = ceil($nbNews / $nbNewsParPage);
        for($i=1; $i<=$nbPage; $i++){
            echo '<a href="?page='."$i".'">'."$i".' </a>';
        }
        ?>
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