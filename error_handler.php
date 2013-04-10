<?php

//create custom handler
function myHandler($type,$msg,$file,$line,$context){ 
		error_log("[" . date("d-M-Y h:i:s", time()). "]$msg on line $line of $file\n",3,'debug.log');
			return false;
	}
//report all errors
error_reporting(E_ALL);

//set custom handler
set_error_handler("myHandler");



?>