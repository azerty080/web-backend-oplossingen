<?php

	$fruit1 = 'kokosnoot';
	$fruitkarakters = strlen( $fruit1 );
	$letter1 = 'o';
	$position1 = strpos($fruit1, $letter1);



	$fruit2 = 'ananas';
	$letter2 = 'a';
	$position2 = strrpos($fruit2, $letter2);


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

		<h1>Deel 1</h1>
		<p><?php echo $fruitkarakters ?></p>
		<p><?php echo $position1 ?></p>


		<h1>Deel 2</h1>
		<p><?php echo $position2 ?></p>
		<p><?php echo strtoupper( $fruit2 ) ?></p>
		

		<h1>Deel 3</h1>
		<p><?php echo str_replace($lettertje, $cijftertje, $langstewoord) ?></p>

		
	</section>

</body>
</html>