<?php
	
	$getal = 1;

	if ($getal == 1)
	{
		$dag = 'maandag';
	}
	
	if ($getal == 2)
	{
		$dag = 'dinsdag';
	}
	
	if ($getal == 3)
	{
		$dag = 'woensdag';
	}
	
	if ($getal == 4)
	{
		$dag = 'donderdag';
	}
	
	if ($getal == 5)
	{
		$dag = 'vrijdag';
	}
	
	if ($getal == 6)
	{
		$dag = 'zaterdag';
	}
	
	if ($getal == 7)
	{
		$dag = 'zondag';
	}
	
	$dagUpper = strtoupper($dag);
	$posLaatsteA = strrpos($dagUpper, 'A');

	$dagLowerA = str_replace('A', 'a', $dagUpper);
	$dagLowerLastA = substr_replace($dagUpper, 'a', $posLaatsteA, 1);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht conditional statements</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Deel 2</h1>
            <p><?php echo $dagUpper ?></p>
            <p><?php echo $dagLowerA ?></p>
            <p><?php echo $dagLowerLastA ?></p>

        </section>

    </body>
</html>
