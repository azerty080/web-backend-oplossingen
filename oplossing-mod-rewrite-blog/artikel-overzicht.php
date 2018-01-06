<?php
    
    session_start();
/*

    $message = '';

    $titel = '';
    $artikel = '';
    $kernwoorden = '';
    $datum = '';



    if (isset($_SESSION['notification']))
    {
        $message = $_SESSION['notification'];
        unset($_SESSION['notification']);
    }


    if (isset($_SESSION['data']))
    {
        $titel = $_SESSION['data']['titel'];
        $artikel = $_SESSION['data']['artikel'];
        $kernwoorden = $_SESSION['data']['kernwoorden'];
        $datum = $_SESSION['data']['datum'];
    }

*/
    

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht mod_rewrite: blog</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

             <form class="query-content">
                <label for="query-content">Zoeken in artikels:</label>
                <input type="text" name="query-content" id="query-content">
                <input type="submit" value="Zoeken">
            </form>
            
            <form class="query-date">
                <label for="query-date">Zoeken op datum:</label>
                <select name="query-date" id="query-date">
                    
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    
                </select>
                <input type="submit" value="Zoeken">
            </form>

            <h1>Artikels overzicht</h1>                         

            <a href="">Artikel toevoegen</a>

            <article>
                <h2>Kantar: Apple On Track For 'Record Quarter' As iPhone 6 Sales Bump Up Its Market Share Vs. Android | 2014-12-04</h2>
                <p>Apple has been seeing its smartphone market share erode over the last several years as its simple-and-small line up of iPhones competed against model after model of low-priced, big-screened, fancy-featured Android-based handsets. But it looks like its latest iPhone 6 models — with their larger faces, 4G compatibility and Apple Pay support — may be helping it turn the tide a bit.</p>
                <p>Keywords: Computers, Consumer Electronics, Hardware + Software</p>
            </article>

            <article>
                <h2>Gangnam Style Has Been Viewed So Many Times It Broke YouTube's Code | 2014-12-04</h2>
                <p>Whoops! Just a fun bit of trivia for the coders out there: PSY's Gangnam Style has been viewed so many times that it broke YouTube's view counter, making it the very first video to break the reaches of a 32-bit integer.</p>
                <p>Keywords: Popular, YouTube, Psy, Gangnam Style</p>
            </article>

            <article>
                <h2>Stripe Raises Another $70 Million, Doubling Its Valuation To $3.5 Billion | 2014-12-04</h2>
                <p>Ultra-hot payments startup Stripe has brought on $70 million in new funding that will double its valuation less than a year after its last raise. The round, which was first reported by the Financial Times, brings the total amount Stripe has raised to more than $200 million.</p>
                <p>Keywords: Payments, Software, Credit Cards</p>
            </article>

        </section>
   
    </body>
</html>
