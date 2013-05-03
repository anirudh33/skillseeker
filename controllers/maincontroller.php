<?php

//include_once '/validation.php';
//include_once '/validation.php';
//include_once '/validation.php';
//include_once '/validation.php';
// print_r($_POST);
// print $_REQUEST['action'];

class mainentrance {
	private static $instance;
	public static function getinstance() {
		if (is_null ( mainentrance::$instance )) {
			self::$instance = new mainentrance ();
		}
		return self::$instance;
	}
	function start()
	{
		if($_REQUEST['action']=="login") 
		{
				echo "welcum";
				echo $_POST['username'];	
			
		}
		if($_REQUEST['action']==" ") 
		{
			
		}
		if($_REQUEST['action']=="")
		{
		
		}
		
	}
}
$objMainentrance = mainentrance::getinstance();
if(isset($_REQUEST['action']))
{
	$objMainentrance->start();
}
?>