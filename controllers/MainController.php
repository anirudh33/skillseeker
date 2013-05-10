<?php

/*
 * *************************** Creation Log ******************************* 
 * File Name 	- MainController.php 
 * Description 	- Main Controller 
 * Version - 1.0 
 * Created by	- Anirudh Pandita 
 * Created on - May 03, 2013 
 * **********************Update Log *************************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 *
 * ************************************************************************
 */

require_once 'models/Registration.php';

require_once  SITE_PATH.'/models/AModel.php';
require_once  SITE_PATH.'/libraries/initiateuser.php';
require_once  SITE_PATH.'/controllers/TestController.php';

class MainController 
{
    private $_objAmodel;
    public function __construct()
    {
        $this->_objAmodel=new AModel();
    }
    
    /* Starts login procedure by fetching username, password from POST */
    public function handleLogin() {
         
        //$authObject = new Authenticate ();
        //var_dump($authObject);
        /* Validate username password */
        //$authObject->validateLogin ();
    
        /* Getting rid of sql injection */
        $username = mysql_real_escape_string ( $_POST ["userName"] );
        $password = mysql_real_escape_string ( $_POST ["password"] );
        $objInitiateUser = new InitiateUser ();
        $a=$objInitiateUser->login ( $username, $password) ;
    //echo $a;die;
        if ($a == 1) {
            /* Visitor date, ip, email logged */
            //$authObject->logIP ();
            $objSecurity= new Security();
            $objSecurity->logSessionId($username);
            
            $this->showView ("userPage");
        }
        else {
            require_once(SITE_PATH);
        }
    }
    
   
    
      
	 /* Any messages to be shown to user */
	private $_message = '';
	
	/*
	 * If user login information validated set to 1 otherwise 0
	 */
	private $_authenticationStatus = 0;
	
	 /* Gets the value of variable private $_authenticationStatus */
	public function getAuthenticationStatus() {
	    echo $this->_authenticationStatus;
		return $this->_authenticationStatus;
	}
	
	 /* Sets the value of variable private $_authenticationStatus */
	public function setauthenticationStatus($authenticationStatus) {
		$this->_authenticationStatus = $authenticationStatus;
	}
	
	 /* Gets the value of variable private private $_message */
	public function getMessage() {
		return $this->_message;
	}
	
	 /* Sets the value of variable private private $_message */
	public function setMessage($message) {
		$this->_message = $message;
		$this->setCustomMessage ( "ErrorMessage", $_message );
	}
	
	 /* Shows Home page */
	public function showView($pageName="MainPage") {
		//$lang = Language::getinstance ();
	    require_once SITE_PATH."/views/container.php";
	}
	
	public function onRegisterClick()  {
		$pageName="RegisterPage";
		
		require_once SITE_PATH."/views/container.php";
	}
	public function onAssigntestClick()  {
		$pageName="AssignTest";
	
		require_once SITE_PATH."/views/container.php";
	}
	
	
	
	/*
	 * Shows respective User Panel (Admin/Test taker/Test creator) depending on user type logged in
	 */
	public function showUserPanel() 
	{
	    //echo"jghjhgjh";
		$controllerName = ucfirst ( $_SESSION ["userType"] ) . "Controller";
		print $controllerName;
		$objController = new $controllerName ();
		
		$objController->process ();
	}
	
	 /* Change language called on clicking the desired language on mainview */
	public function setLanguageClick() 
	{
		$objInitiateUser = new InitiateUser ();
		
		$objInitiateUser->setLanguage ( $_REQUEST ["language"] );
	}

	
	/* Called when user submits the registration form */
	public function registerUser() 
	{	
		//print_r($_POST); die;	

		$userObj = new User();
		
		$userObj->registerUser();
	}

	public function logout() 
	{
		unlink ("./tmp/" . $_SESSION ['username'] . ".txt" );
		session_destroy ();
		header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
	
	
	// added by sanchit
	
	/* function creates object of Category class and calls the addCategory method of Category class */
	public function handleAddCategory()
	{
	
		require_once './models/Category.php';
		$_objCategory = new Category();
		//$methodName = $_REQUEST["method"];
		if(method_exists($_objCategory,'addCategory'))
		{
			$returnValue = $_objCategory->addCategory(); // call the addCategory of Category.php
			if($returnValue != "error")
			{
				die($returnValue);
			}
			else
			{
				die($returnValue);
			}
		}
		else
		{
			echo " Method ". $methodName." doesn't exist ";
		}
	}
	
	/* function creates object of Category class and calls the updateCategory method of Category class */
	public function handleUpdateCategory()
	{
		require_once './models/Category.php';
		$_objCategory = new Category();
		// $methodName = $_REQUEST["method"];
		if(method_exists($_objCategory,'updateCategory'))
		{
			$returnValue = $_objCategory->updateCategory(); // call the updateCategory of Category.php
			if($returnValue != "error")
			{
				die($returnValue);
			}
			else
			{
				die($returnValue);
			}
		}
		else
		{
			echo " Method ". $methodName." doesn't exist ";
		}
	}
	
	/* function creates object of Category class and calls the deleteCategory method of Category class */
	public function handleDeleteCategory()
	{
		require_once './models/Category.php';
		$_objCategory = new Category();
		// $methodName = $_REQUEST["method"];
		if(method_exists($_objCategory,'deleteCategory'))
		{
			$returnValue = $_objCategory->deleteCategory(); // call the deleteCategory of Category.php
			if(is_string($returnValue))
			{
				die($returnValue);
			}
			else
			{
				die($returnValue);
			}
		}
		else
		{
			echo " Method ". $methodName." doesn't exist ";
		}
	}
	
	public function uniqueUserNameCheck()
	{
		if(isset($_POST['text']))
		{
			$objAmodel = new AModel();
			$userUniqueName = $objAmodel->uniqueUserName($_POST['text']);
			//print_r($userUniqueName); die;
			if($userUniqueName == 1)
			{
				echo ("true");
				die;
	
			}
			else
			{
				echo ("false");
				die;
			}
		}
	}
	
	/* function creates object of Category class and calls the displayCategory method of Category class */
	public function handleDisplayCategory()
	{
		require_once './models/Category.php';
		$_objCategory = new Category();
		//$methodName = $_REQUEST["method"];
		if(method_exists($_objCategory,'displayCategory'))
		{
			$returnValue = $_objCategory->displayCategory(); // call the displayCategory of Category.php
			if(is_string($returnValue))
			{
				die($returnValue);
			}
			else
			{
				die($returnValue);
			}
		}
		else
		{
			echo " Method ". $methodName." doesn't exist ";
		}
	}
}
