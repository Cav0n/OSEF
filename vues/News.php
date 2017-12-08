<?php
    if (isset($_SESSION['tabNews'])) {
        $tabNews = $_SESSION['tabNews'];
        $nbNews = $_SESSION['nbNews'];
        $page = $_SESSION['page'];
        for ($i = 0; $i < $nbNews; $i++) {
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
                            </span>';
                            echo "<a href=$lien>
                                <h2>$titre</h2>";
                                echo '<div class="content">';
                                echo $description;
                                echo '</div>
                            </a>
                        </article>';
        }
    }
    ?>