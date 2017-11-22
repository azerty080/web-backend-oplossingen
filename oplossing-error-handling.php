<?php

    session_start();

    $isValid = FALSE;

    try
    {
        if (isset($_POST['submit']))
        {
            if (isset($_POST['code']))
            {
                if (strlen($_POST['code']) == 8)
                {
                    $isValid = TRUE;
                }
                else
                {
                    throw new Exception('VALIDATION-CODE-LENGTH');
                }
            }
            else
            {
                throw new Exception('SUBMIT-ERROR');
            }
        }
    }
    catch (Exception $e)
    {
        $messageCode = $e->getMessage();

        $message = array();

        $createMessage = FALSE;

        switch ($messageCode)
        {
            case 'SUBMIT-ERROR':
                $message['type'] = 'error';
                $message['text'] = 'Er werd met het formulier geknoeid';
                break;
            
            case 'VALIDATION-CODE-LENGTH':
                $message['type'] = 'error';
                $message['text'] = 'De kortingscode heeft niet de juiste lengte';

                $createMessage = TRUE;
                break;
        }

        if ($createMessage)
        {
            createMessage($message);
        }

        logToFile($message);
    }

    $message = getMessage();


    function logToFile($message)
    {
        $date = '[' . date('H:i:s', time()).']';
        $ip = $_SERVER['REMOTE_ADDR'];
        $type = $message['type'];
        $text = $message['text'];
        
        $errorMessage = $date . ' - ' . $ip . ' - type:[' . $type . '] - ' . $text . "\n\r";

        file_put_contents('log.txt', $errorMessage, FILE_APPEND);
    }

    function createMessage($message)
    {
        $_SESSION['message'] = $message;
    }

    function getMessage()
    {
        if (isset($_SESSION['message']))
        {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);

            return $message;
        }
        else
        {
            return FALSE;
        }
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht error handling: try catch</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Geef uw kortingscode op</h1>

            <?php

                if ($message)
                {
                    echo "<p class=\"modal " . $message['type'] . " \">" . $message['text'] . "</p>";
                }

            ?>

            <?php if(!$isValid): ?>

                <form action="oplossing-error-handling.php" method="POST">
                    <ul>
                        <li>
                            <label for="code">Kortingscode</label>
                            <input type="text" id="code" name="code">
                        </li>
                    </ul>
                    <input type="submit" name="submit">
                </form>

            <?php else: ?>

                <p>Korting toegekend!</p>

            <?php endif ?>

		</section>

    </body>
</html>