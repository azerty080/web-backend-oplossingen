<?php

	$message = '';
	$counter = 1;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$queryString = 'SELECT * FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr WHERE bieren.naam LIKE "du%" AND brouwers.brnaam LIKE "%a%"';

		$statement = $db->prepare($queryString);

		$statement->execute();



		$bieren = array();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$bieren[] = $row;
		}

		// Een query uitvoeren
		$statement->execute();

		$columnNames[] = '#';

		foreach ($bieren[0] as $key => $value)
		{
			$columnNames[] = $key;
		}

		$message = 'Query succesvol uitgevoerd';
	}
	catch (PDOException $e)
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

    	<style>
            table
            {
                font-size:12px;
                overflow:auto;
            }

            table th,
            table td
            {
                padding:4px;
            }

            table th
            {
                background: #DFDFDF;
                text-align:center;
            }

            table tr
            {
                transition: all 0.2s ease-out;
            }

            table tr:hover
            {
                background-color:lightgreen;
            }

            .odd
            {
                background: #F1F1F1;
            }
        </style>
        
        <section class="body">
            
            <h1>Deel 1</h1>

            <p><?php echo $message ?></p>

            <table>
            	<thead>
            		<tr>
            			<?php 

            				foreach ($columnNames as $value)
            				{
            					echo '<th>' . $value . '</th>';
            				}

            			?>
            		</tr>
            	</thead>

            	<tbody>
        			<?php 

        				foreach ($bieren as $key => $bier)
        				{
        					if ($counter % 2 == 0)
        					{
        						echo '<tr class="">';
        					}
        					else
        					{
        						echo '<tr class="odd">';
        					}

        					echo '<th>' . $counter . '</th>';
        					
        					foreach ($bier as $value)
        					{
        						echo '<th>' . $value . '</th>';
        					}

        					echo '</tr>';

        					$counter++;
        				}

        			?>
            	</tbody>
            </table>
            
        </section>  

    </body>
</html>
