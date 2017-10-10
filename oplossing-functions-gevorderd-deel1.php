<?php

    $md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';

    $parameter1 = '2';
    $parameter2 = '8';
    $parameter3 = 'a';

    function findParameter1($hash, $parameter)
    {
        $length = strlen($hash);

        $parameterAmount = substr_count($hash, $parameter);

        $parameterProcent = ($parameterAmount / $length) * 100;

        return $parameterProcent;
    }


    function findParameter2($parameter)
    {
        global $md5HashKey;

        $length = strlen($md5HashKey);

        $parameterAmount = substr_count($md5HashKey, $parameter);

        $parameterProcent = ($parameterAmount / $length) * 100;

        return $parameterProcent;
    }


    function findParameter3($parameter)
    {
        $hash = $GLOBALS['md5HashKey'];

        $length = strlen($hash);

        $parameterAmount = substr_count($hash, $parameter);

        $parameterProcent = ($parameterAmount / $length) * 100;

        return $parameterProcent;
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies gevorderd</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Deel 1</h1>

            <p>Functie 1: De needle <?php echo $parameter1 ?> komt <?php echo findParameter1($md5HashKey, $parameter1) ?>% voor in de hash key <?php echo $md5HashKey ?></p>
            <p>Functie 2: De needle <?php echo $parameter2 ?> komt <?php echo findParameter2($parameter2) ?>% voor in de hash key <?php echo $md5HashKey ?></p>
            <p>Functie 3: De needle <?php echo $parameter3 ?> komt <?php echo findParameter3( $parameter3) ?>% voor in de hash key <?php echo $md5HashKey ?></p>

        </section>

    </body>
</html>
