<?php

    $testArray = array('boom' => 'eik', 'dier' => 'hond');

    function drukArrayAf($array)
    {
        $tekstArray = array();

        echo '<h1>Opdracht functies</h1>';

        foreach ($array as $key => $value)
        {
            $tekstArray[] = '<p>testarray[' . $key . '] heeft waarde ' . $value . '</p>'; 
        }
        
        return $tekstArray;
    }


    function validateHtmlTag($html)
    {
        $isValid = False;

        $htmlStart = '<html>';
        $htmlEnd = '</html>';

        if (strpos($html, $htmlStart) === 0)
        {
            $htmlEndPosition = strlen($html) - strlen($htmlEnd);

            if (stripos($html, $htmlEnd) === $htmlEndPosition)
            {
                $isValid = True;
            }

        }
        else
        {
            $isValid = False;
        }

        return $isValid;
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
        
            <h1>Deel 2</h1>

            <?php foreach(drukArrayAf($testArray) as $value) { echo $value; } ?>

            <p><?php echo (validateHtmlTag('<html>blablabla</html>') ? 'True' : 'False') ?></p>
            <p><?php echo (validateHtmlTag('<hlm>testtesttest<html>') ? 'True' : 'False') ?></p>


        </section>

    </body>
</html>
