<?php

    session_start();

    if (isset($_POST['submit']))
    {
        $admin = 'emailadres.vanadmin@gmail.com';

        $email = $_POST['email'];
        $formMessage = $_POST['message'];

        $_SESSION['enteredData']['email'] = $_POST['email'];
        $_SESSION['enteredData']['formMessage'] = $_POST['message'];
        $_SESSION['enteredData']['copy'] = $_POST['send-copy'];

        if (isset($_POST['send-copy']))
        {
            $copy = TRUE;
        }
        else
        {
            $copy = FALSE;
        }

        try
        {
            $db = new PDO('mysql:host=localhost;dbname=opdracht_ajax', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $queryString = 'INSERT INTO contact_messages (email, message, time_sent) VALUES ("' . $email . '", "' . $formMessage . '", NOW())';

            $statement = $db->prepare($queryString);

            $statement->bindValue(':email', $email);


            if ($statement->execute())
            {

                $subject = 'Bericht van ' . $email;

                $messageSent = mail($admin, $subject, $message);

                $copySent = TRUE;

                if ($copy)
                {
                    $subject = 'Copy van bericht van ' . $email;

                    $copySent = mail($email, $subject, $message);
                }

                if ($messageSent || $copySent)
                {
                	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
                	{
                		$ajaxMessage = 'succes';

                		echo json_encode($ajaxMessage);
                	}
                	else
                	{
                		$message = 'Je bericht is verzonden';

                    	unset($_SESSION['enteredData']);
                	}
                }
                else
                {
                	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
					{
						$ajaxMessage = 'error';
						
						echo json_encode($ajaxMessage);
					}
					else
					{
						$message = 'Er ging iets mis bij het verzenden van je bericht';
					}
                }
            }
            else
            {
                $message = 'Er ging iets mis';
            }
        }
        catch (Exception $e)
        {
            $message = 'Er ging iets mis ' . $e->getMessage();
        }

        $_SESSION['message'] = $message;
    }

    header('location: contact-form.php');

?>