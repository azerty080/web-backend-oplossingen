<?php

    session_start();

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


    if (isset($_SESSION['notification']['image']))
    {
        $imageMessage = $_SESSION['notification']['image'];
    }
    else
    {
        $imageMessage = '';
    }

    if (isset($_SESSION['notification']['message']))
    {
        $queryMessage = $_SESSION['notification']['message'];
    }
    else
    {
        $queryMessage = '';
    }

    if (isset($_SESSION['imagePath']))
    {
        $path = $_SESSION['imagePath'];
    }
    else
    {
        $path = '';
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gegevens wijzigen</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <style>
            
            .profile-picture
            {
                max-width:400px;
                margin: 16px 0px;
                display:block;
            }

        </style>

        <section class="body">

            <?php if ($isValid): ?>

                <p><a href="http://oplossingen.web-backend.local/oplossing-file-upload/dashboard.php">Terug naar dashboard</a> | Ingelogd als <?php echo $email ?> | <a href="http://oplossingen.web-backend.local/oplossing-file-upload/logout.php">uitloggen</a></p>   

                <h1>Gegevens wijzigen</h1>
                

                <form action="gegevens-bewerken.php" enctype="multipart/form-data" method="POST">
                    <ul>
                        <li>
                            <label for="profile_picture">Profielfoto
                                <img class="profile-picture" src="<?php echo ($path == '') ? 'http://web-backend.local/img/elon-musk-koraynergiz.jpg' : $path; ?>" alt="<?php echo ($path == '') ? 'Profielfoto' : $email; ?>">
                            </label>
                            <input type="file" id="profile_picture" name="profile_picture">
                        </li>

                        <li>
                            <label for="email">e-mail</label>
                            <input type="text" id="email" name="email" value="<?php echo $email ?>">
                        </li>
                    </ul>

                    <input type="submit" name="submit" value="Gegevens wijzigen">
                </form>

            <?php endif ?>


            <?php if ($queryMessage != '') { echo '<p>' . $queryMessage . '</p>';} ?>
            <?php if ($imageMessage != '') { echo '<p>' . $imageMessage . '</p>';} ?>
            <?php if ($message != '') { echo '<p>' . $message . '</p>';} ?>


        </section>

    </body>
</html>
