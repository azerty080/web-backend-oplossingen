<?php

	session_start();


    $message = '';

    $titel = '';
    $artikel = '';
    $kernwoorden = '';
    $datum = '';



    if (isset($_POST['submit']))
    {
    	$titel = $_POST['titel'];
    	$artikel = $_POST['artikel'];
    	$kernwoorden = $_POST['kernwoorden'];
    	$datum = $_POST['datum'];


    	$_SESSION['data']['titel'] = $titel;
    	$_SESSION['data']['artikel'] = $artikel;
    	$_SESSION['data']['kernwoorden'] = $kernwoorden;
    	$_SESSION['data']['datum'] = $datum;


        try
        {
            $db = new PDO('mysql:host=localhost;dbname=opdracht_mod_rewrite_blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


            $queryString = 'INSERT INTO artikels (titel, artikel, kernwoorden, datum) VALUES (:titel, :artikel, :kernwoorden, :datum)';

            $statement = $db->prepare($queryString);

            $statement->bindValue(':titel', $titel);
            $statement->bindValue(':artikel', $artikel);
            $statement->bindValue(':kernwoorden', $kernwoorden);
            $statement->bindValue(':datum', $datum);

            
            if ($statement->execute())
            {
                $message = 'Artikel succesvol toegevoegd';
            }
            else
            {
                $message = 'Er ging iets mis met het toevoegen. Probeer opnieuw.';
            }
        }
        catch (PDOException $e)
        {
            $message = 'Er ging iets mis ' . $e->getMessage();
        }
    }
    else
    {
        $message = 'Ik heb geen flauw idee wat er net gebeurd is';
    }


    $_SESSION['notification'] = $message;

    header('Location: http://oplossingen.web-backend.local/oplossing-mod-rewrite-blog/artikels/toevoegen');

?>