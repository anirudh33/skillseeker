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
         echo "hi";
        //$authObject = new Authenticate ();
        //var_dump($authObject);
        /* Validate username password */
        //$authObject->validateLogin ();
    
        /* Getting rid of sql injection */
        $username = mysql_real_escape_string ( $_POST ["userName"] );
        $password = mysql_real_escape_string ( $_POST ["password"] );
        $objInitiateUser = new InitiateUser ();
        $this->setAuthenticationStatus (
            $objInitiateUser->login ( $username, $password) );
    
        if ($this->getAuthenticationStatus () == 1) {
            /* Visitor date, ip, email logged */
            //$authObject->logIP ();
            $this->showUserPanel ();
        }
    }
    
    public function loginController()
    {
        $user_name=$_POST['userName'];
        $password=$_POST['password'];
         //validate here
        $result=$this->_objAmodel->AuthenticateUser($user_name,$password);
        //echo "<pre>";
        //print_r($result);
        if(!empty($result))
        {
            if(md5($result[0]['password']) === md5($password))
            {
                
                   $_SESSION['User']=$_POST['userName'];
                   $_SESSION['Password']=$_POST['password'];
                    $this->showView("userPage");
            }
            else
            {
                //header("Location:http://www.skillseeker.com?msg1=error");
            }
        }
        else
        {
           //header("Location:http://www.skillseeker.com?msg=error");
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
	
	 /* Shows Home page */
	public function showView($pageName="MainPage") {
		//$lang = Language::getinstance ();
	    require_once SITE_PATH."/views/container.php";
	}
	
	public function onRegisterClick()  {
		$pageName="RegisterPage";
		
		require_once SITE_PATH."/views/container.php";
	}
	
	
	
	
	/*
	 * Shows respective User Panel (Admin/Test taker/Test creator) depending on user type logged in
	 */
	public function showUserPanel() 
	{
	    echo "<pre>";
	    print_r($_SESSION);
		$controllerName = ucfirst ( $_SESSION ["userType"] ) . "Controller";
		echo $controllerName;
		$objController = new $controllerName ();
		
		$objController->process ();
	}
	
	 /* Change language called on clicking the desired language on mainview */
	public function setLanguageClick() 
	{
		$objInitiateUser = new InitiateUser ();
		
		$objInitiateUser->setLanguage ( $_REQUEST ["language"] );
	}
	
	
	/* Checks if emailid exists in database*/
	public function ajaxEmailExists() 
	{
		if (isset ( $_POST ['email'] )) {
			$email = $_POST ['email'];
			$obj1 = new Registration ();
			$verify = $obj1->verifyEmail ( $email );
			if ($verify) {
				echo "Email already Exists";				
			}
		}
	}
	
	/* Sets toast messages to be displayed*/
	public function setCustomMessage($messageType, $message) 
	{
		if (isset ( $_SESSION ["$messageType"] )) {
			$_SESSION ["$messageType"] .= $message . "<br>";
		} else {
			$_SESSION ["$messageType"] = $message . "<br>";
		}
	}
	
	/*confirms activation of new user*/
	public function confirm ()
	{
		$email = $_GET['email'];
		$pass = $_GET['passkey'];
		$obj = new Registration();
		$obj->confirmEmail($email, $pass);
	}
	
	/* Called when user submits the registration form */
	public function registerUser() 
	{	
		//print_r($_POST); die;	

		$userObj = new User();
		
		$userObj->registerUser();
		
		/*$authObject = new Authenticate ();
		$authObject->validateRegistration ();
		$email = $_POST ["email"];
		$password = $_POST ["password"];
		$firstname = $_POST ["firstname"];
		$lastname = $_POST ["lastname"];
		$phone = $_POST ["phone"];
		$address = $_POST ["address"];
		$qualification = $_POST ["qualification"];
		$gender = $_POST ["gender"];
		$date = $_POST ["date"];
		$usertype = $_POST ["usertype"];
		$status = '2';
		$profilepicture = addslashes ( file_get_contents ( $_FILES ["profilepicture"] ["tmp_name"] ) );
		$confirm_code = md5 ( uniqid ( rand () ) );
		
		$message = "http://localhost/ulearn/branches/development/index.php?method=confirm&controller=Main&passkey=$confirm_code&email=$email";
		
		$mail = new PHPMailer ();
		$mail->IsSMTP (); // enable SMTP
		$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->Username = "ulearnoss@gmail.com";
		$mail->Password = "root@osscube.com";
		$mail->Subject = "Confirmation Mail from Ulearn";
		$mail->Body = $message;
		$mail->AddAddress ( $email );
		
		
		if (! $mail->Send ()) {			
			$this->setCustomMessage ( "ErrorMessage", "Mail Not Sent" );
		} else {
			$this->setCustomMessage ( "SuccessMessage", "Mail sent," );
		}		
		if ($_POST ["usertype"] == "student") {
			// echo"student";*/
			//print_r($_POST); die;
			//$obj = new Registration ();
			//$obj->newUserRegistration ( $_POST);
			//print_r($_POST);
		
		
			
		/*} elseif ($_POST ["usertype"] == "teacher") {
			$obj = new Registration ();
			$obj->newStudentRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		} elseif ($_POST ["usertype"] == "teacher") {
			$obj = new Registration ();
			$obj->newTeacherRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		}		
	}
	
	/* Logs out the user by destroying session */
}
	public function logout() 
	{
		if (file_exists ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/adminprofile" . $_SESSION ['userID'] . ".jpeg" ) or file_exists ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/studentprofile" . $_SESSION ['userID'] . ".jpeg" ) or file_exists ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/teacherprofile" . $_SESSION ['userID'] . ".jpeg" )) {
			unlink ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/adminprofile" . $_SESSION ['userID'] . ".jpeg" );
			unlink ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/studentprofile" . $_SESSION ['userID'] . ".jpeg" );
			unlink ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/teacherprofile" . $_SESSION ['userID'] . ".jpeg" );
		}
		session_destroy ();
		header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
	/* Messages session variables unset */
	public function unsetMessages() 
	{
		unset ( $_SESSION ["SuccessMessage"] );
		unset ( $_SESSION ["ErrorMessage"] );
		unset ( $_SESSION ["NoticeMessage"] );
		echo '1';
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
