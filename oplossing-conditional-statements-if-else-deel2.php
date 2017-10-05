<?php
    
    $seconden = 221108521;

    $minuten = $seconden / 60;

    $uren = $minuten / 60;

    $dagen = $uren / 24;

    $weken = $dagen / 7;

    $maanden = $dagen / 31;

    $jaren = $maanden / 12;

    
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

            <h1>Deel 2</h1>

            <h1>Jaren, maanden, weken, dagen, uren, minuten en seconden</h1>

            <p>in <?php echo $seconden ?> seconden</p>

            <ul>
                <li>minuten: <?php echo $minuten ?></li>
                <li>uren: <?php echo $uren ?></li>
                <li>dagen: <?php echo $dagen ?></li>
                <li>weken: <?php echo $weken ?></li>
                <li>maanden (31): <?php echo $maanden ?></li>
                <li>jaren (365): <?php echo $jaren ?></li>
            </ul>

        </section>

    </body>
</html>