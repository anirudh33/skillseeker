<?php
class MainController {
	private static $instance;
	public static function getinstance() {
		if (is_null ( mainentrance::$instance )) {
			self::$instance = new mainentrance ();
		}
		return self::$instance;
	}
	
	/**
	 *Shows main view with list of tables to choose
	 */
	public function showView()
	{
		$pageName="MainPage";
		require_once SITE_PATH. '/views/container.php';
	
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

?>