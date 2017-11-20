<?php

    spl_autoload_register('myAutoloader');

    function myAutoloader($className)
    {
        $path = 'D:\Documents\School\3de jaar\Back End\oplossingen\classes/';

        include $path . $className . '.php';
    }

    $body = (isset( $_GET['page'] ) ? $_GET['page'] : 'index') . '-body.html';

    $site = new HTMLBuilder('header.partial.php', 'body.partial.php', 'footer.partial.php');
    
?>