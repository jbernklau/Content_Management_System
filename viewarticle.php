<?php 
	require_once 'conn.php';
	require_once 'outputfunctions.php';
	require_once 'header.php';
	?><div id="body-content"><?php
	outputStory($_GET['article']);
	showComments($_GET['article'], TRUE);
	require_once 'footer.php';
	
?>
</div>

<link rel="stylesheet" type="text/css" href="css/main.css" media="screen"/>
	