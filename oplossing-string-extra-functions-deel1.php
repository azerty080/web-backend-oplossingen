<?php

	$fruit = 'kokosnoot';
	$fruitkarakters = strlen( $fruit );
	$letter = 'o';
	$position = strpos($fruit, $letter);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Voorbeeld concatenatie</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>

<body  class="web-backend-inleiding">
	
	<section class="body">

		<h1>Deel 1</h1>
		<p><?php echo $fruitkarakters ?></p>
		<p><?php echo $position ?></p>

	</section>

</body>
</html>