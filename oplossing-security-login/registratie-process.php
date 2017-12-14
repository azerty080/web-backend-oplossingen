<?php

	session_start();

	

	if (isset($_POST['generatePassword']))
	{
		$password = generatePassword(9, TRUE, TRUE, TRUE, FALSE);

		$_SESSION['registration']['email'] = $_POST['email'];
		$_SESSION['registration']['password'] = $password;

		header('Location: registratie-form.php');
	}
	elseif (isset($_POST['submit']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$_SESSION['registration']['email'] = $email;
		$_SESSION['registration']['password'] = $password;

		$isValdiEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

		if (!$isValdiEmail)
		{
			unset($_SESSION['notification']['password']);

			$emailMessage = 'Het emailadres dat u hebt ingegeven is ongeldig. Vul een geldig emailadres in aub';

			$_SESSION['notification']['email'] = $emailMessage;

			header('Location: registratie-form.php');
		}
		elseif ($password == '')
		{
			unset($_SESSION['notification']['email']);

			$passwordMessage = 'Het paswoord dat u hebt ingegeven is ongeldig. Vul een geldig paswoord in aub';

			$_SESSION['notification']['password'] = $passwordMessage;

			header('Location: registratie-form.php');
		}
		else
		{
			unset($_SESSION['notification']['email']);
			unset($_SESSION['notification']['password']);

			try
			{
				$db = new PDO('mysql:host=localhost;dbname=opdracht_security_login', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				$queryStringUserData = 'SELECT * FROM users WHERE email = :email';

				$statementUserData = $db->prepare($queryStringUserData);

				$statementUserData->bindValue(':email', $email);

				$statementUserData->execute();

				
				$userData = array();

				while ($row = $statementUserData->fetch(PDO::FETCH_ASSOC))
				{
					$userData[] = $row;
				}


				if (!empty($userData))
				{
					$message = 'Het emailadres ' . $email . ' is al in gebruik, kies een ander';

					header('Location: registratie-form.php');
				}
				else
				{
					$salt = uniqid(mt_rand(), true);

					$hashed_password = hash('sha512', $password . $salt);


					$queryStringAddUser = 'INSERT INTO users(email, salt, hashed_password, last_login_time) VALUES (:email, :salt, :hashed_password, NOW())';

					$statementAddUser = $db->prepare($queryStringAddUser);

					$statementAddUser->bindValue(':email', $email);
					$statementAddUser->bindValue(':salt', $salt);
					$statementAddUser->bindValue(':hashed_password', $hashed_password);


					if ($statementAddUser->execute())
					{
						$hashed_email = hash('sha512', $email . $salt);

						setcookie("login", $email . ',' . $hashed_email, time()+2592000);

						header('Location: dashboard.php');
					}
					else
					{
						$message = 'Er ging iets mis bij het aanmaken van je profiel';

						header('Location: registratie-form.php');
					}
				}

			}
			catch (PDOException $e)
			{
				$message = 'Er ging iets mis ' . $e->getMessage();
			}

			$_SESSION['notification']['message'] = $message;

		}

	}



	function generatePassword($length=7, $hasNumbers=TRUE, $hasUpperLetters=TRUE, $hasLowerLetters=TRUE, $hasSpecialChars=TRUE)
	{
		$password = '';
		$passwordChars = '';

		$passwordCharsArray = array();


		if ($hasNumbers)
		{
			$passwordCharsArray['numbers'] = array(0,1,2,3,4,5,6,7,8,9);
		}

		if ($hasUpperLetters)
		{
			$passwordCharsArray['upperletters'] = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		}

		if ($hasLowerLetters)
		{
			$passwordCharsArray['lowerletters'] = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		}

		if ($hasSpecialChars)
		{
			$passwordCharsArray['specialchars'] = array('+','-','*','/','=','&','@','#','$','%');
		}


		for ($i=0; $i < $length; $i++)
		{ 
			foreach ($passwordCharsArray as $value)
			{
				if (strlen($passwordChars) < $length)
				{
					$randomNbr = rand(0, (count($value) - 1));

					$passwordChars .= $value[$randomNbr];
				}

			}
		}

		$password = str_shuffle($passwordChars);

		return $password;
	}
	

?>