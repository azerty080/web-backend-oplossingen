<?php

    $dieren = array('hond', 'kat', 'vogel', 'hamster', 'olifant');


    sort($dieren);


    $zoogdieren = array('paard', 'dolfijn', 'schaap');

    $dierenLijst = array_merge($dieren, $zoogdieren);

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

            <h1>Deel 2</h1>

            <pre><?php echo var_dump($dieren) ?></pre>
            <pre><?php echo var_dump($dierenLijst) ?></pre>

        </section>

    </body>
</html>