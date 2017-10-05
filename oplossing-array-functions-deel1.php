<?php

    $dieren = array('hond', 'kat', 'vogel', 'hamster', 'olifant');

    $aantalElementen = count($dieren);

    $teZoekenDier = 'hond';

    if(in_array($teZoekenDier, $dieren) == true)
    {
        $message = "Gevonden";
    }
    else
    {
        $message = "Niet gevonden";
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht array functies</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Deel 1</h1>

            <p><?php echo $aantalElementen ?></p>
            <p><?php echo $message ?></p>

        </section>

    </body>
</html>