<?php

    $getallen = array('8', '7', '8', '7', '3', '2', '1', '2', '4');

    $getallenUniek = array_unique($getallen);

    rsort($getallenUniek);

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

            <h1>Deel 3</h1>
            <pre><?php echo var_dump($getallenUniek) ?></pre>

        </section>

    </body>
</html>