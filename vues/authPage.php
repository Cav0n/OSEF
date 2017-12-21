<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 17/12/2017
 * Time: 11:48
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
    </header>

    <!-- Main -->
    <div id="main">
        <div class="inner">
            <header>
                <h1>Connexion requise<br /></h1>
                <h2>Veuillez vous connecter pour accéder à cette page.</h2>
            </header>
            <?php $_POST['source']="authPage"; require('Connexion.php');?>
        </div>
        <a href="index.php"></a>
    </div>

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
