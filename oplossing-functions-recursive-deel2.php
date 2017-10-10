<?php

    $geld = 100000;
    $rente = 8;
    $jaren = 10;

    function eindGeld($array)
    {
        if ($array['counter'] <= $array['jaren'])
        {
            $renteBedrag = floor($array['geld'] * ($array['rente'] / 100));
            $array['geld'] += $renteBedrag;

            $array['historiek'][$array['counter']] = 'Je hebt nu ' . $array['geld'] . ' euro. De rente was ' . $renteBedrag . ' euro.';

            $array['counter']++;

            return eindGeld($array);
        }
        else
        {
            return $array;
        }
    }

    $eindGeld = eindGeld( array('geld' => $geld, 'rente' => $rente, 'jaren' => $jaren, 'counter' => 1, 'historiek' =>  array()) );

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
        
            <h1>Deel 2</h1>

            <?php

                foreach ($eindGeld['historiek'] as $value)
                {
                    echo '<p>';
                    echo $value;
                    echo '</p>';
                }

            ?>

        </section>

    </body>
</html>
