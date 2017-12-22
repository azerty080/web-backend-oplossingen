<?php

    session_start();


    if (isset($_SESSION['enteredData']))
    {
        $email = $_SESSION['enteredData']['email'];
        $formMessage = $_SESSION['enteredData']['formMessage'];
        $copy = $_SESSION['enteredData']['copy'];
    }

    if (isset($_SESSION['message']))
    {
        $message = $_SESSION['message'];

        unset($_SESSION['message']);
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact form</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Contacteer ons</h1>

            <?php

                if (isset($message))
                {
                    echo '<p>' . $message . '</p>';
                }

            ?>
            <div id="form-holder">
                <form action="contact.php" method="POST" id="mail-form">
                    
                    <ul>
                        <li>
                            <label for="email">Emailadres</label>
                            <input type="text" id="email" name="email" value="<?php echo (isset($email)) ? $email : '' ?>">
                        </li>
                        <li>
                            <label for="message">Bericht</label>
                            <textarea id="message" name="message" cols="30" rows="10"><?php echo (isset($formMessage)) ? $formMessage : '' ?></textarea>
                        </li>
                        <li>
                            <label for="send-copy">Stuur kopie naar mezelf</label>
                            <input type="checkbox" id="send-copy" name="send-copy" <?php  echo (isset($copy)) ? 'checked' : ''?>>
                        </li>
                    </ul>
                    
                    <input type="submit" name="submit">
                </form>
            </div>

        </section>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>
        
            $(function()
            {
                $('#mail-form')submit(function()
                {
                    var formData = $('#mail-form').serialize();

                    $.ajax({
                        type: "POST",
                        url: "contact-api.php",
                        data: formData,
                        success: function(data) 
                        {
                            data = JSON.parse(data);

                            if (data['type'] == 'success')
                            {
                                $('#form-holder form').fadeOut('slow', function()
                                {
                                    $('#form-holder').append('<p id="modal">Bedankt! Uw bericht is goed verzonden!</p>').hide().fadeIn('slow');
                                });
                            }
                            else if (data['type'] == 'error')
                            {
                                $('#form-holder').prepend('<p id="modal">Oeps, er ging iets mis. Probeer opnieuw!</p>')
                                $('#modal').hide().fadeIn('slow');
                            }
                        }
                    })

                    return false;                       
                })
            })
            
        </script>

    </body>
</html>
