<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 04/12/2017
 * Time: 22:09
 */

echo '
<section>
    <h2>Ajout</h2>
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
			<ul class="actions">
				<li><input type="submit" name="action" value="Ajout" class="special" /></li>
		    </ul>
		</form>
</section>';