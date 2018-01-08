<?php


    var_dump($_GET);


    function __autoload($className)
    {
        include_once 'classes/' . $className . '.php';
    }



    if (isset($_GET['controller']))
    {
        $controller = $_GET['controller'];
    }
    else
    {
        $controller = 'overview';
    }


    if (isset($_GET['method']))
    {
        $method = $_GET['method'];
    }
    else
    {
        $method = 'method';
    }



    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
    else
    {
        $id = 1;
    }



    $bieren = new Bieren();


    switch($method)
    {
        case 'insert':
            $insert = $bieren->insert();
            break;

        case 'delete':
            $delete = $bieren->delete();
            break;

        case 'update':
            $update = $bieren->update();
            break;
        
        default:
            $overview = $bieren->overview();
    }


?>