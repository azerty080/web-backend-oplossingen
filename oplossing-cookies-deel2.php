<?php

    $txtFile = file_get_contents('D:\Documents\School\3de jaar\Back End\oplossingen\cookies.txt');

    $txtArray = explode(',', $txtFile);

    $gebruikersnaam = '';
    $paswoord = '';
    $remember = False;

    if (isset($_POST['gebruikersnaam']))
    {
        $gebruikersnaam = $_POST['gebruikersnaam'];
    }

    if (isset($_POST['paswoord']))
    {
        $paswoord = $_POST['paswoord'];
    }

    if (isset($_POST['remember']))
    {
        $remember = True;
    }



    $errorMessage = False;

    if (!isset($_COOKIE['authenticated']))
    {
        if (isset($_POST['submit']))
        {
            if ($txtArray[0] == $gebruikersnaam && $txtArray[1] == $paswoord)
            {
                $isAuthenticated = True;
                $errorMessage = False;

                if ($remember == True)
                {
                    setcookie('authenticated', True, time() + 2592000);
                }
                else
                {
                    setcookie('authenticated', True, 0);
                }
            }
            else
            {
                $errorMessage = True;
            }
        }
    }
    else
    {
        $errorMessage = False;
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
                <li>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Mij onthouden</label>
                </li>
            </ul>
            <input type="submit" name="submit">
        </form>

    </section>

    </body>
</html>