<html>
<head>
    <head>
        <title>ERREUR</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="vues/assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="vues/assets/css/main.css" />
        <link rel="icon" type="image/png" href="vues/images/ico.png" />
        <!--[if lte IE 9]><link rel="stylesheet" href="vues/assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="vues/assets/css/ie8.css" /><![endif]-->
    </head>
</head>

<body>

<h1>ERREUR: Un mécanicien... du quartier répare actuellement le site. Pour le chasser appuyer sur F5 ou retour en arrière.</h1>
<?php

if (isset($dVueErreur)) {
    foreach ($dVueErreur as $value){
        echo $value;
    }
}
?>



</body>
</html>