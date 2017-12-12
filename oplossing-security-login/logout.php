<?php

    session_start();

    if(isset($_COOKIE['login']))
    {
        $cookieData = explode(',', $_COOKIE['login']);
        $email = $cookieData[0];
        $hashed_email = $cookieData[1];

        setcookie("login", $email . ',' . $hashed_email, time()-3600);
        $_SESSION['notification']['message'] = 'U bent uitgelogd. Tot de volgende keer';
    }
    else
    {
        $_SESSION['notification']['message'] = '';
    }

    header('Location: login-form.php');

?>