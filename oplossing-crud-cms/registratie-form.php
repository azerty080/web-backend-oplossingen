<?php

    session_start();



    $email = '';
    $password = '';
    $message = array();

    if (isset($_SESSION['registration']))
    {
        $email = $_SESSION['registration']['email'];
        $password = $_SESSION['registration']['password'];
    }

    if (isset($_SESSION['notification']['email']))
    {
        $message[] = $_SESSION['notification']['email'];
    }

    if (isset($_SESSION['notification']['password']))
    {
        $message[] = $_SESSION['notification']['password'];
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registratie form</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Registreren</h1>

            <?php

                foreach ($message as $value)
                {
                    echo '<p>' . $value . '</p>';
                }

            ?>

            <form action="registratie-process.php" method="POST">
                <ul>
                    <li>
                        <label for="email">e-mail</label>
                        <input type="text" name="email" id="email" value="<?php echo $email ?>">
                    </li>
                    <li>
                        <label for="password">paswoord</label>
                        <input type="<?php ($password == '')? 'password' : 'text' ?>" name="password" id="password" value="<?php echo $password ?>">
                        <input type="submit" name="generatePassword" value="Genereer een paswoord">
                    </li>
                </ul>
                <input type="submit" name="submit" value="Registreer">
            </form>

        </section>

    </body>
</html>