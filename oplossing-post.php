<?php

    $password = 'azerty';
    $username = 'niels';

    $message = '';

    if (isset($_POST['password']) == True && isset($_POST['username']) == True)
    {
        $enteredPassword = $_POST['password'];
        $enteredUsername = $_POST['username'];

        if ($enteredPassword == $password && $enteredUsername == $username)
        {
            $message = 'Welkom';
        }
        else
        {
            $message = 'Er ging iets mis bij het inloggen, probeer opnieuw';
        }
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht post</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            
            <h1>Inloggen</h1>

            <form action="oplossing-post.php" method="post">
                <ul>
                    <li>
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" name="username" id="username">
                    </li>
                    <li>
                        <label for="password">Passwoord</label>
                        <input type="text" name="password" id="password">
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>

            <?php echo $message ?>

        </section>

    </body>
</html>
