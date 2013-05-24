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
require_once SITE_PATH.'/libraries/Mail.php';
require_once  SITE_PATH.'/models/AModel.php';
require_once  SITE_PATH.'/libraries/initiateuser.php';
require_once  SITE_PATH.'/controllers/TestController.php';
require_once  SITE_PATH.'/controllers/AController.php';
require_once SITE_PATH.'/libraries/validate.php';

class MainController extends AController
{
    private $_objAmodel;
    public function __construct()
    {
        $this->_objAmodel=new AModel();
    }
    
    /* Starts login procedure by fetching username, password from POST */
    public function handleLogin() 
	{
        
        /* Validate username password */
		$obj = new validate();
		$obj->validator("userName",$_POST ["userName"], 'required#username#maxlength=25','Username Required# Username is not valid#Username should not be more than 25 chracter long');
		$obj->validator("password",$_POST ["password"], 'required#minlength=5#maxlength=25','Password Required#Password should not be less than 5 characters long#Password should not be more than 25 chracter long');
        //$authObject->validateLogin ();
    		$error=$obj->result();
		if(!empty($error['userName']))
		{			
			header("Location:index.php?user=".$error['userName']);
		}
		else if(!empty($error['password']))
		{
			header("Location:index.php?password=".$error['password']);
		}
		else
		{
        		/* Getting rid of sql injection */
        		$username = $_POST ["userName"];
        		$password = $_POST ["password"];
        		$objInitiateUser = new InitiateUser ();
        		$a=$objInitiateUser->login ( $username, $password) ;
    			//echo $a;die;
        		if ($a == 1) 
			{
            			/* Visitor date, ip, email logged */
            			//$authObject->logIP ();
            			$objSecurity= new Security();
            			$objSecurity->logSessionId($username);
            			$this->showUserPanel();
        		}
        		else 
			{
            			require_once(SITE_PATH);
        		}
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
	
	
	
	public function onRegisterClick()  {
		$pageName="/views/register.php";
		
		$this->showView($pageName);
	}
	public function onAssigntestClick()  {
		$pageName="/views/assigntest.php";
	
		$this->showView($pageName);
	}
	public function onStartTestClick(){
		$pageName="giveTest";
		
		require_once SITE_PATH."/views/container.php";		
	}
	
	/*
	 * Shows respective User Panel (Admin/Test taker/Test creator) depending on user type logged in
	 */
	public function showUserPanel() 
	{
	    //echo"jghjhgjh";
		$controllerName = ucfirst ( $_SESSION ["userType"] ) . "Controller";
		//print $controllerName;
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
	public function handleRegister() 
	{	
		
			$userObj = new Registration();
		
			$userObj->registerUser($_POST);
			header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
			//echo "successful";
	}

	public function logout() 
	{
		unlink ("./tmp/" . $_SESSION ['username'] . ".txt" );
		session_destroy ();
		header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
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
	
	public function handleSearchUser() {
		$userObj = new User();
		if((isset($_POST['first_name']) AND $_POST['first_name'] != "") || (isset($_POST['last_name']) AND  $_POST['last_name'] != "")) {
			$userObj->setFirstName($_POST['first_name']);
			$userObj->setLastName($_POST['last_name']);
			$result = $userObj->searchUser();
			$this->showView('/views/SearchUser.php',$result);
		} else {
			$this->showView('/views/SearchUser.php',array());
		}
		
	}
	
	public function getUserResult() {
		$userObj = new User();
		$userObj->setEmail($_REQUEST['email']);
		$result = $userObj->getUserResult();
		echo trim($result);
	}
	
	public function onClickSearch() {
		$pageName="/views/SearchUser.php";
		$this->showView($pageName,array(),array(),false,false);
	}
	public function handleContact() {
		$pageName="/views/contactus.php";
		$this->showView($pageName,array(),array(),false,false);
	}
	
}
