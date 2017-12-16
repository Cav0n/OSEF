<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 12:54
 */

if (isset($_SESSION['admin']) && $_SESSION['admin'] != null) {

}
else {
    echo
    '<section>
		<h2> Enregistrez vous</h2>
			<form method="post" action="#">
				<div class="field">
					<input type="email" name="email" id="email" placeholder="Email" />
				</div>
				<div class="field">
					<input type="text" name="mdp" id="mdp" placeholder="Mot de Passe">
				</div>
				<div class="field">
					<input type="text" name="nom" id="nom" placeholder="Nom">
				</div>
				<ul class="actions">
					<li><input type="submit" name="action" value="Register" class="special" /></li>
				</ul>
			</form>
		</section>';
}
?>