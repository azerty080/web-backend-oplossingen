<?php



	

    if (isset($_GET['query-content']))
    {
        $searchType = 'content';
        $searchItem = $_GET['query-content'];
    }
    elseif (isset($_GET['query-date']))
    {
        $searchType = 'datum';
        $searchItem = $_GET['query-date'];
    }












	
	header('Location: http://oplossingen.web-backend.local/oplossing-mod-rewrite-blog/artikels/zoeken/' . $searchType . '/' . $searchItem);

?>