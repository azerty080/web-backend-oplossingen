<?php

    $dieren1 = array('hond', 'kat', 'hamster', 'vogel', 'olifant', 'leeuw', 'giraf', 'aap', 'vis', 'muis' );

    $dieren2[] = 'hond';
    $dieren2[] = 'kat';
    $dieren2[] = 'hamster';
    $dieren2[] = 'vogel';
    $dieren2[] = 'olifant';
    $dieren2[] = 'leeuw';
    $dieren2[] = 'giraf';
    $dieren2[] = 'aap';
    $dieren2[] = 'vis';
    $dieren2[] = 'muis';


    $voertuigen = array('landvoertuigen' => array('vespa', 'fiets'), 'watervoertuigen' => array('surfplank', 'vlot', 'schoener', 'driemaster'), 'luchtvoertuigen' => array('luchtballon', 'helicopter', 'B52'));

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht arrays basis</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Deel 1</h1>
            <pre><?php echo var_dump($voertuigen) ?></pre>
        
        </section>

    </body>
</html>