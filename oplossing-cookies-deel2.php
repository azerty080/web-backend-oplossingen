<?php

    $txtFile = file_get_contents('D:\Documents\School\3de jaar\Back End\oplossingen\cookies.txt');

    $txtArray = explode(',', $txtFile);

    $gebruikersnaam = '';
    $paswoord = '';

    if (isset($_POST['gebruikersnaam']))
    {
        $gebruikersnaam = $_POST['gebruikersnaam'];
    }

    if (isset($_POST['paswoord']))
    {
        $paswoord = $_POST['paswoord'];
    }


    $isAuthenticated = False;
    $errorMessage = False;

    if (!isset($_COOKIE['authenticated']))
    {
        if (isset($_POST['submit']))
        {
            if ($txtArray[0] == $gebruikersnaam && $txtArray[1] == $paswoord)
            {
                setcookie('authenticated', True, time() + 360);
                $isAuthenticated = True;
            }
            else
            {
                $errorMessage = True;
            }
        }
    }
    else
    {
        $isAuthenticated = False;
        $errorMessage = False;
    }


    if (isset($_GET['cookie']))
    {
        if ($_GET['cookie'] == 'delete')
        {
            unset($_COOKIE['authenticated']);
        }
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht cookies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
    
    <section class="body">

        <h1>Deel 2</h1>

        <?php if (!$isAuthenticated): ?>
                    
            <h1>Inloggen</h1>

            <?php if ($errorMessage): ?>

                <div class="modal error">Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.</div>

            <?php endif ?>

            <form method="POST">
                <ul>
                    <li>
                        <label for="gebruikersnaam">gebruikersnaam</label>
                        <input type="text" id="gebruikersnaam" name="gebruikersnaam">
                    </li>
                    <li>
                        <label for="paswoord">paswoord</label>
                        <input type="text" id="paswoord" name="paswoord">
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>

        <?php else: ?>

            <h1>Dashboard</h1>
                    
            <p>U bent ingelogd.</p>
            <p><a href="http://oplossingen.web-backend.local/oplossing-cookies-deel1.php?cookie=delete">Uitloggen</a></p>

            

        <?php endif ?>

    </section>
    </body>
</html>