<?php

    $artikels = array(array('titel' => 'Ikea gaat zonnepanelen verkopen in ons land (en je hoeft ze niet zelf te installeren)', 'datum' => '12/10/2017', 'inhoud' => 'Meubelreus Ikea gaat vanaf vandaag zonnepanelen verkopen in ons land. Eerst online en vanaf eind januari ook in de acht Belgische warenhuizen van de Zweedse keten.', 'afbeelding' => 'http://oplossingen.web-backend.local/images/Ikea.jpg', 'afbeeldingbeschrijving' => 'Ikea met zonnepanelen'), array('titel' => 'Radarverklikkers mogen niet te precies zijn', 'datum' => '12/10/2017', 'inhoud' => 'Het federaal verkeersveiligheidsinstituut Vias wil dat apps zoals Coyote en Waze stoppen met de exacte locatie van snelheidscontroles te melden. “Laat hen enkel nog waarschuwen voor een flitspaal in de ruime omgeving”, klinkt het.', 'afbeelding' => 'http://oplossingen.web-backend.local/images/Radarverklikker.jpg', 'afbeeldingbeschrijving' => 'Auto met radarverklikker'), array('titel' => 'Nul begrip voor sluiting Olmense Zoo', 'datum' => '12/10/2017', 'inhoud' => 'De sluiting van de Olmense Zoo heeft gisteren een ongeziene storm aan reacties teweeggebracht. Heel wat mensen steunen de minister in zijn beslissing, maar in Balen en (verre) omgeving kan de beslissing op geen begrip rekenen. Zelfs burgemeester Johan Leysen (CD&V) maakte openlijk bekend dat hij de beslissing van Ben Weyts héél betreurenswaardig en onbegrijpelijk vindt.', 'afbeelding' => 'http://oplossingen.web-backend.local/images/Olmensezoo.jpg', 'afbeeldingbeschrijving' => 'Protesterende vrouw tegen sluiting van de zoo'));

    $artikelsLength = count($artikels);

    $isGETset = False;
    $isExistingWebPage = False;

    if (isset($_GET['id']) == True)
    {
        $isGETset = True;
        $GETid = $_GET['id'];

        if ($GETid > $artikelsLength)
        {
            $isExistingWebPage = False;
        }
        else
        {
            $isExistingWebPage = True;
        }
    }
    else
    {
        $isGETset = False;
    }


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht get</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

        <style>
            .multiple
            {
                float:left;
                width:288px;
                margin:16px;
                padding:16px;
                box-sizing:border-box;
                background-color:#EEEEEE;
            }

            .multiple:nth-child(3n+1)
            {
                margin-left:0px;
            }

            .multiple:nth-child(3n)
            {
                margin-right:0px;
            }

            .single img
            {
                float:right;
                margin-left: 16px;
            }
                            
            .multiple h1
            {
                margin:0;
                font-size:18px;
            }

            .read-more
            {
                text-align:right;
            }

            .read-more:after
            {
                padding-left:6px;
                content:">";
            }
        </style>

        
        <h1>De krant van vandaag</h1>

        <section class="articles">

            <?php
            if ($isGETset)
            {
                if ($isExistingWebPage)
                {
                    $array = $artikels[$GETid];

                    echo '<article class="single">';
                    echo '<h1>' . $array['titel'] . '</h1>';
                    echo '<p>' . $array['datum'] . '</p>';
                    echo '<img src="' . $array['afbeelding'] . '" alt="' . $array['afbeeldingbeschrijving'] . '">';
                    echo '<p>' . $array['inhoud'] . '</p>';
                }
                else
                {
                    echo '<h1>Error: Dit artikel bestaat niet!</h1>';
                }

            }
            else
            {
                foreach ($artikels as $key => $array)
                {
                    $inhoudKort = substr($array['inhoud'], 0, 50) . '...';

                    echo '<article class="multiple">';
                    echo '<h1>' . $array['titel'] . '</h1>';
                    echo '<p>' . $array['datum'] . '</p>';
                    echo '<img src="' . $array['afbeelding'] . '" alt="' . $array['afbeeldingbeschrijving'] . '">';
                    echo '<p>' . $inhoudKort . '</p>';
                    echo '<p class="read-more"><a href="http://oplossingen.web-backend.local/oplossing-get.php?id=' . $key . '">Lees meer</a></p>';
                    echo '</article>';
                }
            }
            ?>



            <form action="oplossing-get.php" method="get">
                <input type="text" name="zoeken" id="zoeken">
                <input type="submit" value="Zoek">
            </form>


            <?php

                $formFilled = False;

                if (isset($_GET['zoeken']) == True)
                {
                    $formFilled = True;
                    $zoekWoord = $_GET['zoeken'];
                }
                else
                {
                    $formFilled = False;
                }

                $zoekWoordInKrant = False;
                $sleutel = 0;

                if ($formFilled == True)
                {
                    foreach ($artikels as $key => $array)
                    {
                        if (strpos($array['inhoud'], $zoekWoord) == True)
                        {
                            $zoekWoordInKrant = True;
                            $sleutel = $key;
                            break;
                        }
                        else
                        {
                            $zoekWoordInKrant = False;
                        }
                    }

                    if ($zoekWoordInKrant == True)
                    {
                        echo '<p><a href="http://oplossingen.web-backend.local/oplossing-get.php?id=' . $sleutel . '">Artikel</a></p>';
                    }
                    else
                    {
                        echo '<p>De zoekterm ' . $zoekWoord . ' komt niet voor in deze krant</p>';
                    }
                }

            ?>

        </section>

    </body>
</html>
