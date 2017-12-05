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
							<li><a href="accueil.html">Home</a></li>
							<li><a href="vues/generic.html">Ipsum veroeros</a></li>
							<li><a href="generic.html">Tempus etiam</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1>Bienvenue sur OSEF<br />
								crée par  <a href="index.php">Lucas B. et Florian B.</a>.</h1>
                                <?php
                                if(isset($_SESSION['role']) && $_SESSION['role'] = "admin"){
                                    echo "<p>[ADMIN MOD] - Ajout de News</p>";
                                }
                                else{
                                    echo "<p>Vous retrouverez sur ce site pleins de news inutiles.</p>";
                                }
                                ?>
							</header>

                            <?php
                            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
                                require('vues/ajoutNews.php');
                            }
                            else {
                                echo '<section class="tiles">';
                                require('vues/News.php');
                                echo '</section>';
                            }
                            ?>

						</div>
                        <a href="index.php">2 <?php $_SESSION['page']=2 ?></a>
					</div>

				<!-- Footer -->
                <footer id="footer">
                    <div class="inner">
                        <?php
                        if (isset($_SESSION['name']) && $_SESSION['role'] != "FAUX") {
                            $name = $_SESSION['name'];
                            echo "<H2>$name</H2>";
                            echo
                            '<section>
                                    <form method="post" action="#">
                                        <ul class="actions">
                                            <li><input type="submit" name="action" value="Deconnexion" class="special" /></li>
                                        </ul>
                                    </form>
							    </section>';
                        }
                        else {
                            echo
                            '<section>
								<h2>Connexion</h2>
								<form method="post" action="#">
									<div class="field">
										<input type="email" name="email" id="email" placeholder="Email" />
									</div>
									<div class="field">
										<input type="password" name="password" id="password" placeholder="Mot de Passe"></input>
									</div>
									<ul class="actions">
										<li><input type="submit" name="action" value="Connexion" class="special" /></li>
									</ul>
								</form>
							</section>';
                        }
                        ?>
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