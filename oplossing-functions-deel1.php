<?php

    function berekenSom($getal1, $getal2)
    {
        $som = $getal1 + $getal2;

        return $som;
    }

    function vermenigvuldig($getal1, $getal2)
    {
        $product = $getal1 * $getal2;

        return $product;
    }

    function isEven($getal)
    {
        $isEven = False;

        if ($getal % 2 == 0 )
        {
            $isEven = True;
        }
        else
        {
            $isEven = False;
        }

        return $isEven;
    }

    function lengthUpper($string)
    {
        $length = strlen($string);
        $upper = strtoupper($string);

        $lengthUpper = array($length, $upper);

        return $lengthUpper;
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Deel 1</h1>

            <p><?php echo berekenSom(3, 5) ?></p>
            <p><?php echo vermenigvuldig(3, 5) ?></p>
            <p><?php echo (isEven(3) ? 'True' : 'False') ?></p>
            <p><?php echo (isEven(4) ? 'True' : 'False') ?></p>
            <p><?php echo var_dump(lengthUpper('TestWaarde')) ?></p>

        </section>

    </body>
</html>
