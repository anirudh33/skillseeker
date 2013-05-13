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
session_start();

/* Including all constants to be used */
require_once getcwd().'/libraries/constants.php';

/* Requiring all essential files */
require_once SITE_PATH . '/libraries/Language.php';
require_once SITE_PATH . '/libraries/Security.php';
//echo "====".$lang->USERNAME;
require_once  SITE_PATH.'/controllers/AController.php';
require_once SITE_PATH . '/controllers/MainController.php';
require_once SITE_PATH . '/controllers/createTestController.php';
require_once SITE_PATH . '/controllers/TestController.php';
//echo "i am here";
/* Method calls from views handled here */
if (isset ( $_REQUEST ['controller'] )) {
		
		if (isset ( $_REQUEST ["method"] )) {
		
			// Creating object of controller to initiate the process
			$object = new $_REQUEST ["controller"] ();
			//print $_REQUEST ["method"];die;
			if (method_exists ( $object, $_REQUEST ["method"] )) {
			
				$object->$_REQUEST ["method"] ();
				if($_REQUEST ["method"]=='fetch')
				{
					echo $_REQUEST ["method"];
				}
			}

	}
}elseif (isset($_SESSION['username'])) {
	$object = new MainController ();
	$object->showUserPanel();
}
else{
/* Showing the main view */
$object = new MainController ();

$object->showView();
}

?>

