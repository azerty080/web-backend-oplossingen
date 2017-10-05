<?php

	$fruit = 'ananas';
	$letter = 'a';
	$position = strrpos($fruit, $letter);

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

		<h1>Deel 2</h1>
		<p><?php echo $position ?></p>
		<p><?php echo strtoupper( $fruit ) ?></p>

	</section>

</body>
</html>