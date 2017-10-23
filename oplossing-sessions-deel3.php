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
    


    if (isset($_GET['session']))
    {
        if($_GET['session'] === 'destroy')
        {
            session_destroy();
            header('Location: oplossing-sessions-deel2.php');
        }
    }


    
    if (isset($_POST['straat']))
    {
        $_SESSION['straat'] = $_POST['straat'];
    }

    if (isset($_POST['nummer']))
    {
        $_SESSION['nummer'] = $_POST['nummer'];
    }

    if (isset($_POST['gemeente']))
    {
        $_SESSION['gemeente'] = $_POST['gemeente'];
    }

    if (isset($_POST['postcode']))
    {
        $_SESSION['postcode'] = $_POST['postcode'];
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
                        <label for="straat">straat</label>
                        <input type="text" id="straat" name="straat" value="<?php echo $straat ?>">
                    </li>
                    <li>
                        <label for="nummer">nummer</label>
                        <input type="number" id="nummer" name="nummer" value="<?php echo $nummer ?>">
                    </li>
                    <li>
                        <label for="gemeente">gemeente</label>
                        <input type="text" id="gemeente" name="gemeente" value="<?php echo $gemeente ?>">
                    </li>
                    <li>
                        <label for="postcode">postcode</label>
                        <input type="text" id="postcode" name="postcode" value="<?php echo $postcode ?>">
                    </li>
                </ul>
                <input type="submit" value="Volgende">
            </form>

            <h1>Destroy session</h1>
            <a href="http://oplossingen.web-backend.local/oplossing-sessions-deel2.php?session=destroy">Destroy session</a>

        </section>
        
    </body>
</html>