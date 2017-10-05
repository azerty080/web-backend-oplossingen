<?php
    
    $getal1 = 0;
    $space = ' ,';

    $getal2 = 0;

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht while</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">  
        
        <h1>Deel 2</h1>
        <p>
        <?php
            while ($getal1 < 100)
            {
                echo $getal1, $space;
                $getal1++;
            }
        ?>   
        </p>
        <p>
        <?php
            while ($getal2 < 80)
            {
                if ($getal2 % 3 == 0 && $getal2 > 40) {
                    echo $getal2, $space;
                }
                $getal2++;
            }
        ?>
        </p>



        <ul>
             <li>Maak een array <code>$boodschappenlijstje</code> en plaats hierin enkele boodschapjes.</li>

            <li>Print deze boodschappen af in het HTML-gedeelte en plaats ze in <code>&lt;li&gt;</code>-elementen. Al deze <code>&lt;li&gt;</code>-elementen staan op hun beurt weer in één <code>&lt;ul&gt;</code>.</li>

            <li>Valideer je code met de <a href="http://validator.w3.org/">W3 Validator</a>. Dit doe je door de source-code van je document te bekijken <kbd>ctrl + u</kbd> / <kbd>⌘-Option-U</kbd>, deze te kopiëren en te plakken in de "direct input" tab.</li>

            <li>Als je code niet geldig is, maak je de nodige wijzigingen.</li>
        </ul>



    </body>
</html>