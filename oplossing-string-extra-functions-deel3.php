<?php

	$lettertje = 'e';
	$cijftertje = 3;
	$langstewoord = 'zandzeepsodemineralenwatersteenstralen';

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

		<h1>Deel 3</h1>
		<p><?php echo str_replace($lettertje, $cijftertje, $langstewoord) ?></p>
		
	</section>

</body>
</html>