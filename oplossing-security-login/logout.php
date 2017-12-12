<?php

    session_start();

    if(isset($_COOKIE['login']))
    {
        $cookieData = explode(',', $_COOKIE['login']);
        $email = $cookieData[0];
        $hashed_email = $cookieData[1];

        setcookie("login", $email . ',' . $hashed_email, time()-3600);
        $_SESSION['notification']['logout'] = 'U bent uitgelogd. Tot de volgende keer';
    }
    else
    {
        $_SESSION['notification']['logout'] = '';
    }

    header('Location: login-form.php');

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Logout</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

        </section>

    </body>
</html>
