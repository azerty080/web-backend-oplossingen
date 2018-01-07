<?php


	session_start();


    $message = '';

    $data = array();

    $searchType = '';
    $searchItem = '';


    if (isset($_GET['query-content']))
    {
        $searchType = 'word';
        $searchItem = $_GET['query-content'];

        try
        {
            $db = new PDO('mysql:host=localhost;dbname=opdracht_mod_rewrite_blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $queryString = "SELECT * FROM artikels WHERE artikel LIKE '%" . $searchItem . "%'";

            $statement = $db->prepare($queryString);

            $statement->execute();


            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row;
            }
        }
        catch (PDOException $e)
        {
            $message = 'Er ging iets mis ' . $e->getMessage();
        }
    }
    elseif (isset($_GET['query-date']))
    {
        $searchType = 'date';
        $searchItem = $_GET['query-date'];

        try
        {
            $db = new PDO('mysql:host=localhost;dbname=opdracht_mod_rewrite_blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $queryString = "SELECT * FROM artikels WHERE datum LIKE '%" . $searchItem . "%'";

            $statement = $db->prepare($queryString);

            $statement->execute();


            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row;
            }
        }
        catch (PDOException $e)
        {
            $message = 'Er ging iets mis ' . $e->getMessage();
        }
    }



    $_SESSION['searchItem'] = $searchItem;
    $_SESSION['searchType'] = $searchType;
    
    $_SESSION['data'] = $data;

    $_SESSION['notification'] = $message;

    header('Location: http://oplossingen.web-backend.local/oplossing-mod-rewrite-blog/artikels');


?>