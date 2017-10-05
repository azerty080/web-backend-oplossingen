<?php

    $getallen = array(1, 2, 3, 4, 5);

    $vermenigvuldiging = $getallen[0] * $getallen[1] * $getallen[2] * $getallen[3] * $getallen[4];

    $oneven = '';
    $space = ' ';

    if ($getallen[0] % 2 != 0)
    {
        $oneven .= $getallen[0] . $space;
    }

    if ($getallen[1] % 2 != 0)
    {
        $oneven .= $getallen[1] . $space;
    }

    if ($getallen[2] % 2 != 0)
    {
        $oneven .= $getallen[2] . $space;
    }

    if ($getallen[3] % 2 != 0)
    {
        $oneven .= $getallen[3] . $space;
    }

    if ($getallen[4] % 2 != 0)
    {
        $oneven .= $getallen[4] . $space;
    }


    $getallenRev = array(5, 4, 3, 2, 1);

    $indexSom[] = $getallen[0] + $getallenRev[0];
    $indexSom[] = $getallen[1] + $getallenRev[1];
    $indexSom[] = $getallen[2] + $getallenRev[2];
    $indexSom[] = $getallen[3] + $getallenRev[3];
    $indexSom[] = $getallen[4] + $getallenRev[4];

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
        
            <h1>Deel 2</h1>
            <p><?php echo $vermenigvuldiging ?></p>
            <p><?php echo $oneven ?></p>
            <pre><?php echo var_dump($indexSom) ?></pre>
        
        </section>

    </body>
</html>