<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 08/12/2017
 * Time: 16:37
 */
if (isset($_SESSION['admin']) && $_SESSION['admin'] != null) {
    echo "<H2>ADMIN</H2>";
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
		<h2> Connexion</h2>
			<form method="post" action="#">
				<div class="field">
					<input type="email" name="email" id="email" placeholder="Email" />
				</div>
				<div class="field">
					<input type="password" name="mdp" id="mdp" placeholder="Mot de Passe"></input>
				</div>
				<ul class="actions">
					<li><input type="submit" name="action" value="Connexion" class="special" /></li>
				</ul>
			</form>
		</section>';
}
?>