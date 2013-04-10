<?php
	define ('SQL_HOST', 'localhost');
	define ('SQL_USER', 'root');
	define('SQL_PASS','');
	define ('SQL_DB', 'blogcms');
	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS);
	mysql_select_db(SQL_DB, $conn) or 
		catch_error();
		
	function catch_error() {
		error_log("Error:Could not select the database: " . mysql_error() .
		"\n",3,'debug.log');
			die ('Could not select the database: ' . mysql_error());
	}
?>