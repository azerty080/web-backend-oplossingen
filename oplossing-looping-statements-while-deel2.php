<?php
    
    $boodschappenlijstje = array('bloem', 'eieren', 'melk', 'suiker');
    $arrayLength = count($boodschappenlijstje);
    $counter = 0;

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht while</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">  
        
        <h1>Deel 2</h1>
        <ul>
        <?php
            while ($counter < $arrayLength)
            {
                echo '<li>' . $boodschappenlijstje[$counter] . '</li>';
                $counter++;
            }
        ?> 
        </ul>

    </body>
</html>