<?php
    
    $jaartal = 2017;

    if ($jaartal % 4 == 0)
    {
        $mededeling = 'Dit is een schrikkeljaar';
    }
    else
    {
        $mededeling = 'Dit is geen schrikkeljaar';
    }

    if ($jaartal % 100 == 0)
    {
        if ($jaartal % 400 == 0)
        {
            $mededeling = 'Dit is een schrikkeljaar';
        }
        else
        {
            $mededeling = 'Dit is geen schrikkeljaar';
        }
    }
    else
    {
        $mededeling = "Dit is geen schrikkeljaar"
    }
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Deel1</h1>
            <p><?php echo $jaartal ?></p>
            <p><?php echo $mededeling ?></p>

        </section>

    </body>
</html>