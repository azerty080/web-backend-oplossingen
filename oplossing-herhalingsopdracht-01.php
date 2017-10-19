<?php

	$iframeSrc = '';
	$iframeHeight = 150;
	$iframeWidth = 300;
	$bestanden = array();

	$voorbeeldPath = 'D:\Documents\School\3de jaar\Back End\cursus\public\cursus\voorbeelden';
	$opdrachtPath = 'D:\Documents\School\3de jaar\Back End\cursus\public\cursus\opdrachten';
	$path = '';

	if (isset($_GET['link']))
	{
		switch ($_GET['link']) {
			case 'cursus':
				$iframeSrc = 'http://web-backend.local/cursus/web-backend-cursus.pdf';
				$iframeHeight = 750;
				$iframeWidth = 1000;
				break;

			case 'voorbeelden':
				$bestanden = scandir($voorbeeldPath);
				$path = 'http://web-backend.local/cursus/voorbeelden/';
				break;

			case 'opdrachten':
				$bestanden = scandir($opdrachtPath);
				$path = 'http://web-backend.local/cursus/opdrachten/';
				break;
		
			default:
				break;
		}
	}

	function showList($array, $path)
	{
		echo '<ul>';
		foreach ($array as $value)
		{
			echo '<li><a href="' . $path . $value . '">' . $value . '</li>';
		}
		echo '</ul>';
	}

	function searchFiles()
	{
		$voorbeeldBestanden = scandir('D:\Documents\School\3de jaar\Back End\cursus\public\cursus\voorbeelden');
		$opdrachtBestanden = scandir('D:\Documents\School\3de jaar\Back End\cursus\public\cursus\opdrachten');

		$alleBestanden = array_merge($voorbeeldBestanden, $opdrachtBestanden);
		$gevondenTermen = array();
		$message = '';

		if (empty($_GET['search-query']) === False)
		{
			foreach ($alleBestanden as $value)
			{
				if (strpos($value, $_GET['search-query']) !== False)
				{
					$gevondenTermen[] = $value;
				}
			}

			if (count($gevondenTermen) > 0)
			{
				$message = $_GET['search-query'];
			}
			else
			{
				$message = 'Er zijn geen zoekresultaten gevonden voor ' . $_GET['search-query'];
			}

		}
		else
		{
			$message = 'Geef een zoekterm in';
		}

		echo '<h1>' . $message . '</h1>';

		foreach ($gevondenTermen as $value)
		{
			echo '<p>' . $value . '</p>';
		}

	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht herhalingsopdracht 01</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

        <section class="body">
        
			<h1>Indexpagina</h1>

			<a href="oplossing-herhalingsopdracht-01.php?link=cursus">Cursus</a>
			<a href="oplossing-herhalingsopdracht-01.php?link=voorbeelden">Voorbeelden</a>
			<a href="oplossing-herhalingsopdracht-01.php?link=opdrachten">Opdrachten</a>

			<form action="oplossing-herhalingsopdracht-01.php" method="GET">
				<label id="search-query">Zoek naar:</label>
				<input type="text" name="search-query" id="search-query" placeholder="Geef een zoekterm in">

				<input type="submit">
			</form>

			<?php searchFiles(); ?>

			<h2>Inhoud</h2>

			<?php

				if ($iframeSrc != '')
				{
					echo '<iframe src="' . $iframeSrc . '" height="' . $iframeHeight . 'px" width="' . $iframeWidth . 'px"></iframe>';
				}
				else
				{
					showList($bestanden, $path);
				}
			?>

		</section>

    </body>
</html>
