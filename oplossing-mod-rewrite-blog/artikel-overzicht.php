<?php
    
    session_start();



    $message = '';

    $allArticleData = array();
    $searchData = array();

    $articlesToShow = array();

    $searchItem = '';
    $searchType = '';


    try
    {
        $db = new PDO('mysql:host=localhost;dbname=opdracht_mod_rewrite_blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $queryString = 'SELECT * FROM artikels';

        $statement = $db->prepare($queryString);

        $statement->execute();


        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $allArticleData[] = $row;
        }
    }
    catch (PDOException $e)
    {
        $message = 'Er ging iets mis ' . $e->getMessage();
    }




    if (isset($_SESSION['data']))
    {
        $searchData = $_SESSION['data'];

        foreach ($searchData as $article)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=opdracht_mod_rewrite_blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                $queryString = "SELECT * FROM artikels WHERE titel LIKE '%" . $article['Titel'] . "%'";

                $statement = $db->prepare($queryString);

                $statement->execute();


                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    $articlesToShow[] = $row;
                }
            }
            catch (PDOException $e)
            {
                $message = 'Er ging iets mis ' . $e->getMessage();
            }
        }

        unset($_SESSION['data']);
    }




    if (isset($_SESSION['searchItem']))
    {
        $searchItem = $_SESSION['searchItem'];
        unset($_SESSION['searchItem']);
    }

    if (isset($_SESSION['searchType']))
    {
         $searchType = $_SESSION['searchType'];
         unset($_SESSION['searchType']);
    }





    if (isset($_SESSION['notification']))
    {
        $message = $_SESSION['notification'];
        unset($_SESSION['notification']);
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

            <form action="http://oplossingen.web-backend.local/oplossing-mod-rewrite-blog/artikels/zoeken" method="GET">
                <label for="query-content">Zoeken in artikels:</label>
                <input type="text" name="query-content">
                <input type="submit" value="Zoeken">
            </form>
            
            <form action="http://oplossingen.web-backend.local/oplossing-mod-rewrite-blog/artikels/zoeken" method="GET">
                <label for="query-date">Zoeken op datum:</label>
                <select name="query-date">
                    
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    
                </select>
                <input type="submit" value="Zoeken">
            </form>


            <?php

                if ($searchType == 'word')
                {
                    echo '<h1>Artikels die het woord "' . $searchItem . '" bevatten</h1>';
                }
                elseif ($searchType == 'date')
                {
                    echo '<h1>Artikels van het jaar "' . $searchItem . '"</h1>';
                }



                foreach ($articlesToShow as $article)
                {
                    echo '<article>';
                    echo '<h2>' . $article['Titel'] . ' | ' . $article['Datum'] . '</h2>';
                    echo '<p>' . $article['Artikel'] . '</p>';
                    echo '<p>Kernwoorden: ' . $article['Kernwoorden'] . '</p>';
                    echo '</article>';
                }

            ?>
            



            <h1>Artikels overzicht</h1>                         

            <a href="http://oplossingen.web-backend.local/oplossing-mod-rewrite-blog/artikels/toevoegen">Artikel toevoegen</a>

            <?php echo $message ?>


            <?php

                foreach ($allArticleData as $article)
                {
                    echo '<article>';
                    echo '<h2>' . $article['Titel'] . ' | ' . $article['Datum'] . '</h2>';
                    echo '<p>' . $article['Artikel'] . '</p>';
                    echo '<p>Kernwoorden: ' . $article['Kernwoorden'] . '</p>';
                    echo '</article>';
                }

            ?>

        </section>
   
    </body>
</html>
