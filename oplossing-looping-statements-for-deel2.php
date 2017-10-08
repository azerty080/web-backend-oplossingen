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

            <h1>Deel 2</h1>

            <table>
                <?php
                    for ($i=0; $i < $rijen ; $i++)
                    { 
                        echo '<tr>';
                        echo '<td>rij</td>';
                        echo '</tr>';
                    }
                ?>
            </table>

            <table>
                <?php
                    for ($i=0; $i < $rijen ; $i++)
                    { 
                        echo '<tr>';
                        for ($j=0; $j < $kolommen ; $j++)
                        { 
                            echo '<td>kolom</td>';
                        }
                        echo '</tr>';
                    }
                ?>
            </table>

        </section>

    </body>
</html>
