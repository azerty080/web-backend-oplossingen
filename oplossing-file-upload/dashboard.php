<?php

    $email = '';
    $hashed_salted_email = '';
    $message = '';

    $isValid = FALSE;


	if(!isset($_COOKIE['login']))
    {
        header('Location: login-form.php');
    }
    else
    {
        $cookieData = explode(',', $_COOKIE['login']);
        $email = $cookieData[0];
        $hashed_email = $cookieData[1];
    }

    try
    {
        $db = new PDO('mysql:host=localhost;dbname=opdracht_file_upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $queryString = 'SELECT * FROM users WHERE email = :email';

        $statement = $db->prepare($queryString);

        $statement->bindValue(':email', $email);

        $statement->execute();
        

        $userData = array();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $userData[] = $row;
        }


        if (!empty($userData))
        {
            $salt = $userData[0]['salt'];
            $hashed_email_reference = hash('sha512', $email . $salt);

            if ($hashed_email_reference == $hashed_email)
            {
                $isValid = TRUE;
            }
            else
            {
                setcookie("login", $email . ',' . $hashed_email, time()-3600);
            }
        }
        else
        {
            $message = 'Dit email adres is nog niet in gebruik';
        }

    }
    catch (PDOException $e)
    {
        $message = 'Er ging iets mis ' . $e->getMessage();
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <?php if ($isValid): ?>

                <h1>Dashboard</h1>
                <a href="http://oplossingen.web-backend.local/oplossing-file_upload/logout.php">uitloggen</a>

            <?php endif ?>


            <?php if ($message != '') { echo '<p>' . $message . '</p>';} ?>


        </section>

    </body>
</html>
