<?php

    $tekst = file_get_contents('D:\Documents\School\3de jaar\Back End\cursus\public\cursus\opdrachten\opdracht-looping-statements-foreach\text-file.txt');

    $alfabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

    $tekstChars = str_split($tekst, 1);

    rsort($tekstChars);

    $tekstChars = array_reverse($tekstChars);

    $charCount = array();

    foreach ($tekstChars as $value)
    {
        if (in_array(strtolower($value), $alfabet) == True)
        {
            if (isset($charCount[ $value ]) == True)
            {
                $charCount[ $value ]++;
            }
            else
            {
                $charCount[ $value ] = 1;
            }
        }
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht foreach</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Deel 2</h1>

            <pre>
            <?php
                echo var_dump($charCount);
            ?>
            </pre>

        </section>
      
    </body>
</html>
