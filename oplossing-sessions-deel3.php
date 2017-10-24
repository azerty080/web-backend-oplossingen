<?php

    session_start();

    $email = '';
    $nickname = '';

    if (isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
    }

    if (isset($_SESSION['nickname']))
    {
        $nickname = $_SESSION['nickname'];
    }

    $straat = isset($_SESSION['straat']) ? $_SESSION['straat'] : '';
    $nummer = isset($_SESSION['nummer']) ? $_SESSION['nummer'] : '';
    $gemeente = isset($_SESSION['gemeente']) ? $_SESSION['gemeente'] : '';
    $postcode = isset($_SESSION['postcode']) ? $_SESSION['postcode'] : '';


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht sessions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Overzichtspagina</h1>

            <form method="POST">
                <ul>
                    <li>
                        e-mail: <?php echo $email ?> | <a href="http://oplossingen.web-backend.local/oplossing-sessions-deel1.php?field=email">wijzig</a>
                    </li>
                    <li>
                        nickname: <?php echo $nickname ?> | <a href="http://oplossingen.web-backend.local/oplossing-sessions-deel1.php?field=nickname">wijzig</a>
                    </li>
                    <li>
                        straat: <?php echo $straat ?> | <a href="http://oplossingen.web-backend.local/oplossing-sessions-deel2.php?field=straat">wijzig</a>
                    </li>
                    <li>
                        nummer: <?php echo $nummer ?> | <a href="http://oplossingen.web-backend.local/oplossing-sessions-deel2.php?field=nummer">wijzig</a>
                    </li>
                    <li>
                        gemeente: <?php echo $gemeente ?> | <a href="http://oplossingen.web-backend.local/oplossing-sessions-deel2.php?field=gemeente">wijzig</a>
                    </li>
                    <li>
                        postcode: <?php echo $postcode ?> | <a href="http://oplossingen.web-backend.local/oplossing-sessions-deel2.php?field=postcode">wijzig</a>
                    </li>
                </ul>
            </form>

        </section>
        
    </body>
</html>