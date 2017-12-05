/**
* Created by PhpStorm.
* User: flbernard
* Date: 24/11/17
* Time: 15:08
*/
<html>
<head>
    <title>Erreur</title>
</head>

<body>

<h1>Erreur.</h1>
<?php

if (isset($dVueEreur)) {
    foreach ($dVueEreur as $value){
        echo $value;
    }
}
?>



</body>
</html>