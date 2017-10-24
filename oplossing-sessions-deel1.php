<?php

    session_start();

    if (isset($_POST['email']))
    {
        $_SESSION['email'] = $_POST['email'];
    }


    if (isset($_POST['nickname']))
    {
        $_SESSION['nickname'] = $_POST['nickname'];
    }

    $field = isset($_GET['field']) ? $_GET['field'] : '';

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

            <h1>Deel 1: registratiegegevens</h1>

            <form method="POST">
                <ul>
                    <li>
                        <label for="email">e-mail</label>
                        <input type="text" name="email"<?php echo ($field == 'email') ? 'autofocus' : '' ?>>
                    </li>
                    <li>
                        <label for="nickname">nickname</label>
                        <input type="text" name="nickname"<?php echo ($field == 'nickname') ? 'autofocus' : '' ?>>
                    </li>
                </ul>
                <input type="submit" value="Volgende">
            </form>

        </section>
        
    </body>
</html>
