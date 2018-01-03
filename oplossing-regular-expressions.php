<?php

    $regex = '';
    $string = '';
    $result = '';

    if (isset($_POST['submit']))
    {
        $regex = $_POST['regex'];
        $string = $_POST['string'];

        $replacement = '<span>#</span>';

        $result = preg_replace('/' . $regex . '/', $replacement, $string);
    }

    


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht Regular Expressions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>RegEx tester</h1>

            <form action="oplossing-regular-expressions.php" method="POST">
                <ul>
                    <li>
                        <label for="regex">Regular Expression</label>
                        <input type="text" name="regex" id="regex" value="">
                    </li>
                    <li>
                        <label for="string">String</label>                            
                        <textarea type="text" name="string" id="string" value=""></textarea>
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>

            <?php

                if ($result != '')
                {
                    echo '<p>' . $result . '</p>';
                }

            ?>



            <h1>Regex 1</h1>
            <p>/[a-du-zA-DU-Z]/</p>
            <p>Memory can change the shape of a room; it can change the color of a car. And memories can be distorted. They're just an interpretation, they're not a record, and they're irrelevant if you have the facts</p>


            <h1>Regex 2</h1>
            <p>colou?r</p>
            <p>Zowel colour als color zijn correct Engels</p>


            <h1>Regex 3</h1>
            <p>1\d{3}</p>
            <p>1020 1050 9784 1560 0231 1546 8745</p>


            <h1>Regex 4</h1>
            <p>[0-9]{2}[\/\-\.][0-9]{2}[\/\-\.][0-9]{4}</p>
            <p>([0-9]{1,4}[\-\.\/]?)+</p>
            <p>(\d{1,4}\S){3}</p>
            <p>24/07/1978 en 24-07-1978 en 24.07.1978</p>

        </section>
    </body>
</html>
