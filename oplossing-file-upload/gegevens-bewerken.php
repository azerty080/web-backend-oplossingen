<?php

	session_start();

	$message = '';
	$queryMessage = '';
	$isValid = FALSE;


	if (isset($_SESSION['notification']['image']))
	{
		unset($_SESSION['notification']['image']);
	}


	if (isset($_SESSION['imagePath']))
	{
		unset($_SESSION['imagePath']);
	}


	if (isset($_FILES['profile_picture']))
	{
		$image = $_FILES['profile_picture'];

		$fileName = $image['name'];
		$tmp_name = $image['tmp_name'];
		$fileError = $image['error'];

		if ($fileError == 0)
		{
			if (exif_imagetype($tmp_name) == IMAGETYPE_PNG || exif_imagetype($tmp_name) == IMAGETYPE_JPEG || exif_imagetype($tmp_name) == IMAGETYPE_GIF)
			{
				$uploadName = date('Ymdhis') . '_' . $fileName;

				$path = '../oplossing-file-upload/img/' . $uploadName;

				if (!file_exists($path))
				{
					move_uploaded_file($tmp_name, $path);
				    $message = 'Image added';

				    $_SESSION['imagePath'] = $path;

				    $isValid = TRUE;
				}
				else
				{
					$uploadName = date('Ymdhis') . '_' . $fileName;

					$path = '../oplossing-file-upload/img/' . $uploadName;

					if (!file_exists($path))
					{
						move_uploaded_file($tmp_name, $path);
					    $message = 'Image added';

					    $_SESSION['imagePath'] = $path;

					    $isValid = TRUE;
					}
					else
					{
					    $message = 'File already exists';
					}
				}
			}
			else
			{
				$message = 'The uploaded file is not a png, jpg or gif';
			}

			$_SESSION['tmp_img_path'] = $tmp_name;
			
		}
		elseif ($fileError == 1)
		{
			$message = 'File size too large';
		}
		elseif ($fileError == 4)
		{
			$message = 'No file selected to upload';
		}
	}
	else
	{
		$message = 'Something bad happend, try again';
	}



	if ($isValid)
	{
		if (isset($_POST['email']))
		{
			$email = $_POST['email'];
			$last_login_time = date('Y-m-d');

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
		        	$queryStringUpdate = 'UPDATE users SET last_login_time = :last_login_time, profile_picture = :profile_picture WHERE email = :email';

			        $statementUpdate = $db->prepare($queryStringUpdate);

			        $statementUpdate->bindValue(':last_login_time', $last_login_time);
			        $statementUpdate->bindValue(':profile_picture', $path);
			        $statementUpdate->bindValue(':email', $email);

			        if ($statementUpdate->execute())
			        {
			        	$queryMessage = 'Database succesvol geupdate';
			        }
			        else
			        {
			        	$queryMessage = 'Database niet succesvol geupdate';
			        }
		        }
		        else
		        {
		            $queryStringInsert = 'INSERT INTO users (email, last_login_time, profile_picture) VALUES (:email, :last_login_time, :profile_picture)';

			        $statementInsert = $db->prepare($queryStringInsert);

			        $statementInsert->bindValue(':last_login_time', $last_login_time);
			        $statementInsert->bindValue(':profile_picture', $path);
			        $statementInsert->bindValue(':email', $email);

			   		if ($statementInsert->execute())
			        {
			        	$queryMessage = 'Gegevens succesvol toegevoegd';
			        }
			        else
			        {
			        	$queryMessage = 'Gegevens niet succesvol toegevoegd';
			        }
		        }

		    }
		    catch (PDOException $e)
		    {
		        $queryMessage = 'Er ging iets mis ' . $e->getMessage();
		    }
		}
	}


	$_SESSION['notification']['message'] = $queryMessage;
	$_SESSION['notification']['image'] = $message;


	header('Location: gegevens-wijzigen-form.php');



?>