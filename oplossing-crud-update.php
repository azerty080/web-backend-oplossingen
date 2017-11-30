<?php

	$message = '';
	$counter = 1;

	$deleteRow = FALSE;
	$idToDelete = 0;

	$updateRow = FALSE;
	$idToUpdate = 0;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		if (isset($_POST['delete']))
		{
			$deleteRow = TRUE;
			$idToDelete = $_POST['delete'];
		}


		if (isset($_POST['edit']))
		{
			$updateRow = TRUE;
			$idToUpdate = $_POST['edit'];

			$queryStringUpdate = 'SELECT brnaam, adres, postcode, gemeente, omzet FROM brouwers WHERE brouwernr = :brouwernr';

			$statementUpdate = $db->prepare($queryStringUpdate);

			$statementUpdate->bindValue(':brouwernr', $_POST['edit']);

			$statementUpdate->execute();

			$brouwersToUpdate = array();

			while ($row = $statementUpdate->fetch(PDO::FETCH_ASSOC))
			{
				$brouwersToUpdate[] = $row;
			}
		}


		if (isset($_POST['confirm-delete']))
		{
			$queryStringDelete = 'DELETE FROM brouwers WHERE brouwernr = :brouwernr';

			$statementDelete = $db->prepare($queryStringDelete);

			$statementDelete->bindValue(':brouwernr', $_POST['confirm-delete']);

			if ($statementDelete->execute())
			{
				$message = 'De datarij werd goed verwijderd.';
			}
			else
			{
				$message = 'De datarij kon niet verwijderd worden. Probeer opnieuw.';
			}
		}


		if (isset($_POST['confirm-update']))
		{
			$queryStringUpdate = 'UPDATE brouwers SET brnaam = :brnaam, adres = :adres, postcode = :postcode, gemeente = :gemeente, omzet = :omzet WHERE brouwernr = :brouwernr';

			$statementUpdate = $db->prepare($queryStringUpdate);

			$statementUpdate->bindValue(':brnaam', $_POST['brnaam']);
			$statementUpdate->bindValue(':adres', $_POST['adres']);
			$statementUpdate->bindValue(':postcode', $_POST['postcode']);
			$statementUpdate->bindValue(':gemeente', $_POST['gemeente']);
			$statementUpdate->bindValue(':omzet', $_POST['omzet']);

			if ($statementUpdate->execute())
			{
				$message = 'Aanpassing succesvol doorgevoerd.';
			}
			else
			{
				$message = 'Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de <a href="mailto:systeembeheerder@gmail.com">systeembeheerder</a> wanneer deze fout blijft aanhouden.';
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
        <title>Opdracht CRUD update</title>
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
                width:16px;
                height:16px;
            }

            .delete
            {
                background: url("http://web-backend.local/img/icon-delete.png") no-repeat;
            }

            .edit
            {
                background: url("http://web-backend.local/img/icon-edit.png") no-repeat;
            }
        </style>

        <section class="body">
            
            <h1>Overzicht van de brouwers</h1>

            <p><?php echo $message ?></p>

			<?php if ( $deleteRow ): ?>
				Bent u zeker dat u deze datarij wilt verwijderen?
				<form action="oplossing-crud-update.php" method="POST">
					<button type="submit" name="confirm-delete" value="<?php $idToDelete ?>">Ja</button>
					<button type="submit">Nee</button>
				</form>
			<?php endif ?>



			<?php if ( $updateRow ): ?>
				<h1>Brouwerij #<?php echo $idToUpdate ?> wijzigen</h1>
				<form>
					<ul>
						<?php
							foreach ($brouwersToUpdate as $key => $brouwer)
							{
								echo "<li>";
								foreach ($brouwer as $fieldName => $data)
								{
									echo '<label for="' . $fieldName . '">' . $fieldName . '</label>';
									echo '<input type="text" id="' . $fieldName . '" name="' . $fieldName . '" value="' . $data . '">';
								}
								echo "</li>";
							}
						?>
					</ul>
					<button type="submit" name="confirm-update" value="<?php $idToUpdate ?>">Update</button>
					<button type="submit">Undo</button>
				</form>
			<?php endif ?>


            <form action="oplossing-crud-update.php" method="POST">
	            <table>
	                <thead>
	                    <tr>
	                        <?php 

	            				foreach ($columnNames as $value)
	            				{
	            					echo '<th>' . $value . '</th>';
	            				}

	            				echo '<th></th>';

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

	        					echo '<td><button type="submit" name="edit" class="input-icon-button edit" value="' . $brouwer['brouwernr'] . '"></button></td>';

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
