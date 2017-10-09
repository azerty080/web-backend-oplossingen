<?php

    $tekst = file_get_contents('D:\Documents\School\3de jaar\Back End\cursus\public\cursus\opdrachten\opdracht-looping-statements-foreach\text-file.txt');

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht foreach</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Deel 1</h1>

            <p>
            <?php
                echo $tekst;
            ?>
            </p>

        </section>
      
    </body>
</html>
