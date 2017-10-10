<?php

    $pigHealth = 5;
    $maximumThrows = 8;

    $result = array();

    function calculateHit()
    {
        global $pigHealth;

        $hitArray = array();

        $message = '';
        $random = rand(1, 10);

        if ($pigHealth < 0)
        {
            $pigHealth = 0;
        }

        if ($random <= 4)
        {
            $pigHealth--;

            if ($pigHealth == 1)
            {
                $hitArray['message'] = 'Raak! Er is nog maar '. $pigHealth . ' varken over.';
            }
            else
            {
                $hitArray['message'] = 'Raak! Er zijn nog maar '. $pigHealth . ' varkens over.';
            }
        }
        else
        {
            if ($pigHealth == 1)
            {
                $hitArray['message'] = 'Mis! Nog '. $pigHealth .' varken in het team.';
            }
            else
            {
                $hitArray['message'] = 'Mis! Nog '. $pigHealth .' varkens in het team.';
            }

        }

        return $hitArray;
    }


    function launchAngryBird()
    {
        static $calledAmount = 0;
        global $maximumThrows;
        global $pigHealth;

        global $result;

        if ($calledAmount < $maximumThrows)
        {
            $calledAmount++;
            $hitOrMiss = calculateHit();

            $result[] = $hitOrMiss['message'];

            launchAngryBird();
        }
        elseif ($calledAmount == $maximumThrows)
        {
            if ($pigHealth <= 0)
            {
                $result[] = 'Gewonnen!';
            }
            else
            {
                $result[] = 'Verloren!';
            }
        }
    }

    launchAngryBird();

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies gevorderd</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Deel 2</h1>

            <?php

                foreach ($result as $value)
                {
                    echo '<p>';
                    echo $value;
                    echo '</p>';
                }

            ?>

        </section>

    </body>
</html>
