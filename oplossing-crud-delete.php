<?php

	$message = '';
	$counter = 1;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		if (isset($_POST['delete']))
		{
			$queryStringDelete = 'DELETE FROM brouwers WHERE brouwernr = :brouwernr';

			$statementDelete = $db->prepare($queryStringDelete);

			$statementDelete->bindValue(':brouwernr', $_POST['delete']);

			if ($statementDelete->execute())
			{
				$message = 'De datarij werd goed verwijderd.';
			}
			else
			{
				$message = 'De datarij kon niet verwijderd worden. Probeer opnieuw.';
			}
		}

		$queryStringBrouwers = 'SELECT * FROM brouwers';

		$statementBrouwers = $db->prepare($queryStringBrouwers);

		$statementBrouwers->execute();



		$brouwers = array();

		while ($row = $statementBrouwers->fetch(PDO::FETCH_ASSOC))
		{
			$brouwers[] = $row;
		}

		// Een query uitvoeren
		$statementBrouwers->execute();

		$columnNames[] = '#';

		foreach ($brouwers[0] as $key => $value)
		{
			$columnNames[] = $key;
		}
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
        <title>Opdracht CRUD delete</title>
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

            .deletion
            {
                color: #b94a48;
                background-color: #f2dede;
            }

            .input-icon-button
            {
                border: none;
                background-color:transparent;
                cursor:pointer;
                text-indent:-1000px;
            }

            .delete
            {
                width:16px;
                height:16px;
                background: url("http://web-backend.local/img/icon-delete.png") no-repeat;
            }
        </style>

        <section class="body">
            
            <h1>Overzicht van de brouwers</h1>

            <p><?php echo $message ?></p>

            <form action="oplossing-crud-delete.php" method="POST">
	            <table>
	                <thead>
	                    <tr>
	                        <?php 

	            				foreach ($columnNames as $value)
	            				{
	            					echo '<th>' . $value . '</th>';
	            				}

	            			?>
	            			<th></th>
	                    </tr>
	                </thead>

	                <tbody>
	                	<?php 

	        				foreach ($brouwers as $key => $brouwer)
	        				{
	        					if ($counter % 2 == 0)
	        					{
	        						echo '<tr class="">';
	        					}
	        					else
	        					{
	        						echo '<tr class="odd">';
	        					}

	        					echo '<td>' . $counter . '</td>';
	        					
	        					foreach ($brouwer as $value)
	        					{
	        						echo '<td>' . $value . '</td>';
	        					}

	        					echo '<td><button type="submit" name="delete" class="input-icon-button delete" value="' . $brouwer['brouwernr'] . '"></button></td>';

	        					echo '</tr>';

	        					$counter++;
	        				}

	        			?>
	                </tbody>
	            </table>
        	</form>

        </section>
     
    </body>
</html>
