<?php

    $geld = 100000;
    $rente = 8;
    $jaren = 10;

    function eindGeld($geld, $rente, $jaren)
    {
        static $counter = 1;
        static $historiek = array();

        if ($counter <= $jaren)
        {
            $renteBedrag = floor($geld * ($rente / 100));
            $nieuwGeld = $geld + $renteBedrag;

            $historiek[$counter] = 'Je hebt nu ' . $nieuwGeld . ' euro. De rente was ' . $renteBedrag . ' euro.';

            $counter++;

            return eindGeld($nieuwGeld, $rente, $jaren);
        }
        else
        {
            return $historiek;
        }
    }

    $eindGeld = eindGeld($geld, $rente, $jaren);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht recursive</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Deel 1</h1>

            <?php

                foreach ($eindGeld as $value)
                {
                    echo '<p>';
                    echo $value;
                    echo '</p>';
                }

            ?>

        </section>

    </body>
</html>
