<?php
	

// Includes all files from modules directory
foreach ( glob( dirname(__FILE__) . '/modules/*.php') as $file ) {
	include $file;
}


?>