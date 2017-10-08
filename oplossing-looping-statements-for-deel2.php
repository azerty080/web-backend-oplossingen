<?php

    $rijen = 10;
    $kolommen = 10;

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht for</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

        <style>
            .oneven
            {
                background-color    :   lightgreen;
            }
        </style>

            <h1>Deel 2</h1>

            <table>
                <?php
                    for ($i=0; $i <= $rijen ; $i++)
                    { 
                        $tafel = $i;
                        echo '<tr>';
                        for ($j=0; $j < $kolommen ; $j++)
                        { 
                            echo '<td class=' . (($tafel % 2 == 0 ) ? '' : 'oneven') . '>' . $tafel . '</td>';
                            $tafel += $i;
                        }
                        echo '</tr>';
                    }
                ?>
            </table>

        </section>

    </body>
</html>
