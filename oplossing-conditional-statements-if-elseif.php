<?php
    
    $getal = 41;

    $messagePart1 = 'Het getal ligt tussen ';
    $messagePart2 = ' en ';

    if ($getal >= 0 && $getal < 10)
    {
        $message = $messagePart1 . 0 . $messagePart2 . 10;
    }
    elseif ($getal >= 10 && $getal < 20)
    {
        $message = $messagePart1 . 10 . $messagePart2 . 20;
    }
    elseif ($getal >= 20 && $getal < 30)
    {
        $message = $messagePart1 . 20 . $messagePart2 . 30;
    }
    elseif ($getal >= 30 && $getal < 40)
    {
        $message = $messagePart1 . 30 . $messagePart2 . 40;
    }
    elseif ($getal >= 40 && $getal < 50)
    {
        $message = $messagePart1 . 40 . $messagePart2 . 50;
    }
    elseif ($getal >= 50 && $getal < 60)
    {
        $message = $messagePart1 . 50 . $messagePart2 . 60;
    }
    elseif ($getal >= 60 && $getal < 70)
    {
        $message = $messagePart1 . 60 . $messagePart2 . 70;
    }
    elseif ($getal >= 70 && $getal < 80)
    {
        $message = $messagePart1 . 70 . $messagePart2 . 80;
    }
    elseif ($getal >= 80 && $getal < 90)
    {
        $message = $messagePart1 . 80 . $messagePart2 . 90;
    }
    elseif ($getal >= 90 && $getal <= 100)
    {
        $message = $messagePart1 . 90 . $messagePart2 . 100;
    }

    $reverseMessage = strrev($message);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else if</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <p><?php echo $reverseMessage ?></p>
        
        </section>

    </body>
</html>