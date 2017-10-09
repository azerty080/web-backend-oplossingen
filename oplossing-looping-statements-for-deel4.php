<?php

    $rijen = 10;
    $kolommen = 10;
    $counter = 0;

    for ($i=0; $i <= $rijen; $i++)
    { 
        $kolommenArray = array();

        for ($j=1; $j <= $kolommen; $j++)
        { 
            $kolommenArray[] = $i * $j;
        }

        $rijenArray[ $i ] = $kolommenArray;
    }

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

            <h1>Deel 4</h1>

            <table>
                <?php
                    echo '<thead>';
                    echo '<th>Tafel</th>';
                    for ($k=0; $k <= $rijen; $k++)
                    { 
                        echo '<th>' . $k . '</th>';
                    }
                    echo '</thead>';

                    echo '<tbody>';
                    foreach ($rijenArray as $kolommenArray)
                    {
                        echo '<tr>';
                        echo '<td>' . $counter . '</td>';
                        echo '<td>0</td>';
                        foreach ($kolommenArray as $kolom)
                        {
                            echo '<td class=' . (($kolom % 2 == 0 ) ? '' : 'oneven') . '>' . $kolom . '</td>';
                        }
                        echo '</tr>';
                        $counter++;
                    }
                    echo '</tbody>';
                ?>
            </table>

        </section>

    </body>
</html>
