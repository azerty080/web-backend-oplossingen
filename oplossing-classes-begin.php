<?php

    spl_autoload_register('myAutoloader');

    function myAutoloader($className)
    {
        $path = 'D:\Documents\School\3de jaar\Back End\oplossingen\classes/';

        include $path . $className . '.php';
    }

    require_once 'D:\Documents\School\3de jaar\Back End\oplossingen\classes\Percent.php';

    $new = 150;
    $unit = 100;

    $percent = new Percent($new, $unit);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht classes: begin</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <style>
                .table-result table
                {
                    border:1px solid lightgrey;
                    border-collapse:collapse;
                    max-width:350px;
                }

                .table-result td
                {
                    border:1px solid lightgrey;
                    padding:12px;
                }
            </style>

            <table>
                <caption><?php echo "Hoe staat " . $new . " in verhouding tot " . $unit . "?" ?></caption>
                <thead></thead>
                <tfoot></tfoot>
                <tbody> 
                    <tr>
                        <td>Relatief</td>
                        <td><?php echo $percent->relative ?></td>
                    </tr>
                    <tr>
                        <td>Procentueel</td>
                        <td><?php echo $percent->hundred . "%" ?></td>
                    </tr>
                    <tr>
                        <td>Nominaal</td>
                        <td><?php echo $percent->nominal ?></td>
                    </tr>
                </tbody>
            </table>
            
        </section>

    </body>
</html>