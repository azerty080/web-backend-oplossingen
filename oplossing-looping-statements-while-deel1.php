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
        
        <h1>Deel 1</h1>
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

    </body>
</html>