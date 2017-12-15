<?php
    
    session_start();

	$message = '';

    if (isset($_SESSION['notification']['message']))
    {
        $message = $_SESSION['notification']['message'];
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login form</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

        	<p><?php echo $message ?></p>

            <h1>Inloggen</h1>
            <form action="login-process.php" method="POST">
                <ul>
                    <li>
                        <label for="email">e-mail</label>
                        <input type="text" name="email" id="email">
                    </li>
                    <li>
                        <label for="password">paswoord</label>
                        <input type="password" name="password" id="password">
                    </li>
                </ul>
                <input type="submit" name="submit" value="Inloggen">
            </form>


            <p>Nog geen account? Maak er dan eentje aan op de <a href="http://oplossingen.web-backend.local/oplossing-file_upload/registratie-form.php">registratiepagina</a>.</p>

        </section>

    </body>
</html>
