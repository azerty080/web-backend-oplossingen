<?php

    spl_autoload_register('myAutoloader');

    function myAutoloader($className)
    {
        $path = 'D:\Documents\School\3de jaar\Back End\oplossingen\classes/';

        include $path . $className . '.php';
    }

    require_once 'D:\Documents\School\3de jaar\Back End\oplossingen\classes\Animal.php';
    require_once 'D:\Documents\School\3de jaar\Back End\oplossingen\classes\Lion.php';
    require_once 'D:\Documents\School\3de jaar\Back End\oplossingen\classes\Zebra.php';


    // Animal
    $kermit = new Animal('Kermit', 'male', 100);
    $dikkie = new Animal('Dikkie', 'male', 100);
    $flipper = new Animal('Flipper', 'female', 100);

    $dikkie->changeHealth(-10);
    $flipper->changeHealth(-20);

    // Lion
    $simba = new Lion('Simba', 'male', 150, 'Congo lion');
    $scar = new Lion('Scar', 'female', 100, 'Kenia lion');


    // Zebra
    $stripe = new Zebra('Stripe', 'male', 75,'Quagga' );
    $barcode = new Zebra('Barcode', 'female', 100, 'Selous');

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht classes: extends</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Instanties van de Animal Class</h1>

            <p><?php echo $kermit->getName() ?> is van het geslacht <?php echo $kermit->getGender() ?> en heeft momenteel <?php echo $kermit->getHealth() ?> levenspunten (special move: <?php echo $kermit->doSpecialMove() ?>)</p>
            <p><?php echo $dikkie->getName() ?> is van het geslacht <?php echo $dikkie->getGender() ?> en heeft momenteel <?php echo $dikkie->getHealth() ?> levenspunten (speciale move: <?php echo $dikkie->doSpecialMove() ?>)</p>
            <p><?php echo $flipper->getName() ?> is van het geslacht <?php echo $flipper->getGender() ?> en heeft momenteel <?php echo $flipper->getHealth() ?> levenspunten (speciale move: <?php echo $flipper->doSpecialMove() ?>)</p>


            <p><?php echo $simba->getName() ?> is van het geslacht <?php echo $simba->getGender() ?> en heeft momenteel <?php echo $simba->getHealth() ?>  levenspunten (special move:<?php echo $simba->doSpecialMove() ?>)</p>
            <p><?php echo $scar->getName() ?> is van het geslacht <?php echo $scar->getGender() ?> en heeft momenteel <?php echo $scar->getHealth() ?> levenspunten (special move: <?php echo $scar->doSpecialMove() ?>)</p>


            <p><?php echo $stripe->getName() ?> is van het geslacht <?php echo $stripe->getGender() ?> en heeft momenteel <?php echo $stripe->getHealth() ?> levenspunten (special move: <?php echo $stripe->doSpecialMove() ?>)</p>
            <p><?php echo $barcode->getName() ?> is van het geslacht <?php echo $barcode->getGender() ?> en heeft momenteel <?php echo $barcode->getHealth() ?> levenspunten (special move: <?php echo $barcode->doSpecialMove() ?>)</p>





            <p>De speciale move van <?php echo $simba->getName() ?> (soort: <?php echo $simba->getSpecies() ?> ): <?php echo $simba->doSpecialMove() ?></p>
            <p>De speciale move van <?php echo $scar->getName() ?> (soort: <?php echo $scar->getSpecies() ?> ): <?php echo $scar->doSpecialMove() ?></p>


            <p>De speciale move van <?php echo $stripe->getName() ?> (soort: <?php echo $stripe->getSpecies() ?> ): <?php echo $stripe->doSpecialMove() ?></p>
            <p>De speciale move van <?php echo $barcode->getName() ?> (soort: <?php echo $barcode->getSpecies() ?> ): <?php echo $barcode->doSpecialMove() ?></p>




        </section>
        
        
    </body>
</html>
