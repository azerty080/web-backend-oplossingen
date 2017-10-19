<?php

    $timestamp = mktime(22, 35, 25, 1, 21, 1904);

    $date = date('j F Y \, h:i:s a', $timestamp);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht date</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Deel 1</h1>

            <ul>
                <li><?php echo $date ?></li>
            </ul>

        </section>
    </body>
</html>