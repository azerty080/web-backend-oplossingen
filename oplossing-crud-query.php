<?php

	$message = '';

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));;
	}
	catch (Exception $e)
	{
		$message = 'Er ging iets mis ' . $e->getMessage();
	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD query</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            
            <h1>Deel 1</h1>

            <p><?php echo $message ?></p>

        </section>  

    </body>
</html>
