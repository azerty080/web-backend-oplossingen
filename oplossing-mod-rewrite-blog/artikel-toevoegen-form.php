<?php
    
    session_start();


    $message = '';

    $titel = '';
    $artikel = '';
    $kernwoorden = '';
    $datum = '';



    if (isset($_SESSION['notification']))
    {
        $message = $_SESSION['notification'];
        unset($_SESSION['notification']);
    }


    if (isset($_SESSION['data']))
    {
        $titel = $_SESSION['data']['titel'];
        $artikel = $_SESSION['data']['artikel'];
        $kernwoorden = $_SESSION['data']['kernwoorden'];
        $datum = $_SESSION['data']['datum'];
    }


    

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht mod_rewrite: blog</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Artikel toevoegen</h1>

            <a href="http://oplossingen.web-backend.local/oplossing-mod-rewrite-blog/artikels">Terug naar overzicht</a>

            <p><?php echo $message ?></p>

            <form action="http://oplossingen.web-backend.local/oplossing-mod-rewrite-blog/artikels/toevoegen/confirm" method="POST">
                <ul>
                    <li>
                        <label for="titel">Titel</label>
                        <input type="text" id="titel" name="titel" value="<?php echo $titel ?>">
                    </li>
                    <li>
                        <label for="artikel">Artikel</label>
                        <textarea type="text" id="artikel" name="artikel"><?php echo $artikel ?></textarea>
                    </li>
                    <li>
                        <label for="kernwoorden">Kernwoorden</label>
                        <input type="text" id="kernwoorden" name="kernwoorden" value="<?php echo $kernwoorden ?>">
                    </li>
                    <li>
                        <label for="datum">Datum</label>
                        <input type="date" id="datum" name="datum" value="<?php echo $datum ?>">
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>

        </section>
   
    </body>
</html>
