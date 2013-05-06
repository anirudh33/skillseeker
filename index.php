<?php
/*
 * Creation Log File Name - index.php 
 * Description - skillseeker index file
 * Version - 1.0 
 * Created by - Anirudh Pandita 
 * Created on - May 3, 2013 
 * *************************************************
 */

/* Starting session  */
ini_set("display_errors","1");
//session_start();

/* Including all constants to be used */
require_once '/var/www/skillseeker/trunk/libraries/constants.php';

/* Requiring all essential files */
require_once SITE_PATH . '/controllers/MainController.php';
//echo "i am here";
/* Method calls from views handled here */
if (isset ( $_REQUEST ['controller'] )) {
	
	
		
		if (isset ( $_REQUEST ["method"] )) {
			
			// Creating object of controller to initiate the process
			$object = new $_REQUEST ["controller"] ();
			
			if (method_exists ( $object, $_REQUEST ["method"] )) {

				
				$object->$_REQUEST ["method"] ();
			}

	}
}

/* Showing the main view */
$object = new MainController ();
$object->showView();

?>

