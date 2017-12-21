<?php

    session_start();


    if (isset($_SESSION['enteredData']))
    {
        $email = $_SESSION['enteredData']['email'];
        $formMessage = $_SESSION['enteredData']['formMessage'];
        $copy = $_SESSION['enteredData']['copy'];
    }

    if (isset($_SESSION['message']))
    {
        $message = $_SESSION['message'];

        unset($_SESSION['message']);
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact form</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Contacteer ons</h1>

            <?php

                if (isset($message))
                {
                    echo '<p>' . $message . '</p>';
                }

            ?>

            <form action="contact.php" method="POST">
                
                <ul>
                    <li>
                        <label for="email">Emailadres</label>
                        <input type="text" name="email" value="<?php echo (isset($email)) ? $email : '' ?>">
                    </li>
                    <li>
                        <label for="message">Bericht</label>
                        <textarea name="message" cols="30" rows="10"><?php echo (isset($formMessage)) ? $formMessage : '' ?></textarea>
                    </li>
                    <li>
                        <label for="send-copy">Stuur kopie naar mezelf</label>
                        <input type="checkbox" name="send-copy" <?php  echo (isset($copy)) ? 'checked' : ''?>>
                    </li>
                </ul>
                
                <input type="submit" name="submit">
            </form>

        </section>

    </body>
</html>
