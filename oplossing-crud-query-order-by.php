<?php

	$message = '';
	$counter = 1;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		if (isset($_GET['order_by']))
		{
			$order_by = $_GET['order_by'];

			$orderArray = explode('_', $order_by);

			$column = $orderArray[0];
			$order = $orderArray[1];

			switch ($column)
			{
			    case 'Biernummer':
			        $column = 'biernr';
			        break;

			    case 'Bier':
			        $column = 'naam';
			        break;

			    case 'Brouwer':
			        $column = 'brnaam';
			        break;

			    case 'Soort':
			        $column = 'soort';
			        break;

			    case 'Alcoholpercentage':
			        $column = 'alcohol';
			        break;
			}

			$queryString = 'SELECT bieren.biernr, bieren.naam, brouwers.brnaam, soorten.soort, bieren.alcohol FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr INNER JOIN soorten ON bieren.soortnr = soorten.soortnr ORDER BY ' . $column . ' ' . $order;
		}
		else
		{
			$queryString = 'SELECT bieren.biernr, bieren.naam, brouwers.brnaam, soorten.soort, bieren.alcohol FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr INNER JOIN soorten ON bieren.soortnr = soorten.soortnr';
		}

		$statement = $db->prepare($queryString);

		$statement->execute();



		$bieren = array();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$bieren[] = $row;
		}

		// Een query uitvoeren
		$statement->execute();


		$columnNames[] = array();

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



	$correctNames = array();

	foreach ($columnNames as $key => $name)
	{
		switch ($name)
		{
		    case 'biernr':
		        $correctNames[] = 'Biernummer';
		        break;

		   case 'naam':
		        $correctNames[] = 'Bier';
		        break;

		    case 'brnaam':
		        $correctNames[] = 'Brouwer';
		        break;

		    case 'soort':
		        $correctNames[] = 'Soort';
		        break;

		    case 'alcohol':
		        $correctNames[] = 'Alcoholpercentage';
		        break;
		}
	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD query - order by</title>
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

            .order a
            {
                padding-right:20px;
            }

            .ascending a
            {
                background: no-repeat url('http://web-backend.local/img/icon-asc.png') right ;
            }

            .descending a
            {
                background: no-repeat url('http://web-backend.local/img/icon-desc.png') right;
            }
        </style>

        <section class="body">

        	<h1>Overzicht van de bieren</h1>

        	<p><?php echo $message ?></p>

            <table>
                <thead>
                    <tr>
                    	<?php

                    		foreach ($correctNames as $key => $name)
                    		{
                    			echo '<th class="order ' . ((isset($_GET['order_by'])) ? strtolower($order) . 'ending' : '') . '"><a href="http://oplossingen.web-backend.local/oplossing-crud-query-order-by.php?order_by=' . $name . '_ASC">' . $name . '</a></th>';
                    		}

                    	?>
                        <th colspan="2"></th>
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

        					foreach ($bier as $value)
        					{
        						echo '<td>' . $value . '</td>';
        					}

							echo '<td><button type="submit" name="delete" class="input-icon-button delete" value="' . $bier['biernr'] . '"></button></td>';

	        				echo '<td><button type="submit" name="edit" class="input-icon-button edit" value="' . $bier['biernr'] . '"></button></td>';

        					echo '</tr>';

        					$counter++;
        				}

        			?>
                </tbody>

            </table>

        </section>

    </body>
</html>
