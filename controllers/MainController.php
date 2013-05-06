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


require_once  './models/AModel.php';

class MainController 
{
    private $_objAmodel;
    public function __construct()
    {
        $this->_objAmodel=new AModel();
    }
    

    
    public function loginController()
    {
        $user_name=$_POST['userName'];
        $password=$_POST['password'];
         //validate here
        $reslut=$this->_objAmodel->AuthenticateUser($user_name,$password);
        
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
	public function showView() {
		//$lang = Language::getinstance ();
		$pageName="MainPage";
		require_once SITE_PATH."/views/container.php";
	}
	
	 /* Starts login procedure by fetching username, password from POST */
	public function initiateLogin() {
	    
		$authObject = new Authenticate ();
		var_dump($authObject);
		/* Validate username password */
		//$authObject->validateLogin ();
		
		/* Getting rid of sql injection */
		$fieldEmail = mysql_real_escape_string ( $_POST ["fieldEmail"] );
		$fieldPassword = mysql_real_escape_string ( $_POST ["fieldPassword"] );		
		$objInitiateUser = new InitiateUser ();		
		$this->setAuthenticationStatus ( 
				$objInitiateUser->login ( $fieldEmail, $fieldPassword ) );
		
		if ($this->getAuthenticationStatus () == 1) {
			/* Visitor date, ip, email logged */
			$authObject->logIP ();
			$this->showUserPanel ();
		}
	}
	
	/*
	 * Shows respective User Panel (Admin/Test taker/Test creator) depending on user type logged in
	 */
	public function showUserPanel() 
	{
		$controllerName = ucfirst ( $_SESSION ["userType"] ) . "Controller";
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
		$authObject = new Authenticate ();
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
			// echo"student";
			$obj = new Registration ();
			$obj->newStudentRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		} elseif ($_POST ["usertype"] == "teacher") {
			$obj = new Registration ();
			$obj->newTeacherRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		}		
	}
	
	/* Logs out the user by destroying session */
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
}
?>
