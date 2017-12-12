<?php

	session_start();



    if (isset($_POST['submit']))
    {
        $enteredEmail = $_POST['email'];
        $enteredPassword = $_POST['password'];


        unset($_SESSION['notification']['message']);


        try
        {
            $db = new PDO('mysql:host=localhost;dbname=opdracht_crud_cms', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $queryString = 'SELECT * FROM users WHERE email = :email';

            $statement = $db->prepare($queryString);

            $statement->bindValue(':email', $enteredEmail);

            $statement->execute();

            
            $userData = array();

            while ($row = $statementUserData->fetch(PDO::FETCH_ASSOC))
            {
                $userData[] = $row;
            }


            if (!empty($userData))
            {
                $salt = $userData[0]['salt'];
                $hashed_password = $userData[0]['hashed_password'];


                $salt = $userData[0]['salt'];
                $hashed_password_reference = hash('sha512', $enteredPassword . $salt);

                if ($hashed_password_reference == $hashed_password)
                {
                    $hashed_email = hash('sha512', $enteredEmail . $salt);

                    setcookie("login", $email . ',' . $hashed_email, time()+2592000);

                    header('Location: dashboard.php');
                }
                else
                {
                    $message = 'Passwoord is incorrect';
                }

            }
            else
            {
                $message = 'Email is not niet in gebruik';
            }

        }
        catch (PDOException $e)
        {
            $message = 'Er ging iets mis ' . $e->getMessage();
        }

        $_SESSION['notification']['message'] = $message;

    }


?>