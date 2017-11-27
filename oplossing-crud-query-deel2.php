<?php

	$message = '';
    $counter = 1;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$queryString = 'SELECT brouwernr, brnaam FROM brouwers';

		$statement = $db->prepare($queryString);

		$statement->execute();



		$brouwers = array();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$brouwers[] = $row;
		}

		// Een query uitvoeren
		$statement->execute();



        $bieren = array();

        if (isset($_GET['brouwernr']))
        {
            $brouwernr = $_GET['brouwernr'];

            $queryStringBieren = 'SELECT naam FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr WHERE brouwers.brouwernr = :brouwernr';

            $statementBieren = $db->prepare($queryStringBieren);
            
            $statementBieren->bindValue(':brouwernr', $brouwernr);


            $statementBieren->execute();


            while ($row = $statementBieren->fetch(PDO::FETCH_ASSOC))
            {
                $bieren[] = $row;
            }
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
            
            <h1>Deel 2</h1>

            <p><?php echo $message ?></p>

            <form action="oplossing-crud-query-deel2.php" method="GET">
                <select name="brouwernr">
                    <?php

                        foreach ($brouwers as $brouwer)
                        {
                            if (isset($_GET['brouwernr']))
                            {
                                $brouwernr = $_GET['brouwernr'];

                                if ($brouwernr == $brouwer['brouwernr'])
                                {
                                    echo '<option value="' . $brouwer['brouwernr'] . '" selected>' . $brouwer['brnaam'] . '</option>';
                                }
                                else
                                {
                                    echo '<option value="' . $brouwer['brouwernr'] . '" >' . $brouwer['brnaam'] . '</option>';
                                }
                            }
                            else
                            {
                                echo '<option value="' . $brouwer['brouwernr'] . '" >' . $brouwer['brnaam'] . '</option>';
                            }
                        }

                    ?>
                </select>

                <input type="submit" name="submit" value="Geef mij alle bieren van deze brouwerij">
            </form>

            <table>
            	<thead>
            		<tr>
            			<th>Aantal</th>
                        <th>Naam</th>
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

        					echo '<td>' . $counter . '</td>';
        					
        					foreach ($bier as $value)
        					{
        						echo '<td>' . $value . '</td>';
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
