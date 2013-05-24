<?php
/*
 * *************************** Creation Log ******************************* 
 * File Name - AController.php 
 * Description - Abstract Controller 
 * Version - 1.0 
 * Created by - Anirudh Pandita 
 * Created on - May 03, 2013 
 * **********************Update Log *************************************** 
 * Sr.NO. Version Updated by 	Updated on 		Description 
 *
 * ************************************************************************
 *
 */
abstract class AController 
{
    /**
     *
     * @var For matching the type of user logged 
     * in matches the panel he/she logs in
     */
    protected $_requiredType = "";

    /**
     *
     * @var User Object (Admin/Teacher/Student) created 
     * to access various methods
     */
    protected $_objUser = "";

    /**
     *
     * @return To get the value of $_requiredType
     */
    public function getRequiredType ()
    {
        return $this->_requiredType;
    }

    /**
     *
     * @param $requiredType Sets
     *            the value of $_requiredType
     */
    protected function setRequiredType ($requiredType)
    {
        $this->_requiredType = $requiredType;
    }

    /**
     * Constructor called for all the controllers except MainController.
     * Performs authentication on ip and invalid requests
     */
    public function __construct ()
    {
        //$authObject = new Authenticate();
       // $authObject->checkIPExists();
        
//         $authObject->setRequiredType($this->getRequiredType());
//         if ($authObject->isValidUser() != 1) {
            
//             $_SESSION["ErrorMessage"] .= $authObject->getMessage() . "<br>";
            
//             header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?msg=" . 
//             $authObject->getMessage() . "");
//         }
     }

    /**
     * Starts the processing in every controller with creation of user
     * to showing the respective view
     */
//     public function process ()
//     {
//         $this->createUser();
        
//         $this->showView();
//     }

     /* Shows Views*/
	/**
	 * @author anirudh
	 * @param string $pageName
	 * @param string $arrPassValue
	 * @param string $header
	 * @param string $footer
	 */
	public function showView($pageName="/views/homepage.php", $arrPassValue='', $header=true,$footer=true) 
	{
		//echo "dbnvjksw";die;
		if (isset ( $_SESSION ['lang'] )) {
			$langType = $_SESSION ['lang'];
		} else {
			$langType = 'en';
		}
		require SITE_PATH . '/languages/lang.' . $langType . ".php";
		$lang = new Language ( $langArr );
		
		if ($header == true) {
			
			if (isset ( $_SESSION ['userType'] )) {
				
				if ($_SESSION ['userType'] == 'test') {
					require_once SITE_PATH . '/views/TestCreatorViews/TestCreatorViewHeaderTop.php';
					require_once SITE_PATH . '/views/headertop.php';
					require_once SITE_PATH . '/views/userheaderbelow.php';
				}
			} else {
				require_once SITE_PATH . '/views/MainViews/MainViewHeaderTop.php';
				require_once SITE_PATH . '/views/headertop.php';
				require_once SITE_PATH . '/views/headerbelow.php';
			}
		}
		
		if (file_exists ( SITE_PATH . $pageName )) {
			if (isset ( $arrPassValue )) {
				$arrData = $arrPassValue;
			}
			require_once SITE_PATH . $pageName;
		} else {
			// require_once SITE_PATH."error.php";
			echo "call error page, file not found:" . SITE_PATH . $pageName;
		}
		
		if ($footer == true) {
			if (isset ( $_SESSION ['userType'] )) {
				if ($_SESSION ['userType'] == 'test') {
					require_once SITE_PATH . '/views/footer.php';
					require_once SITE_PATH . '/views/TestCreatorViews/TestCreatorViewFooter.php';
				}
			} else {
					require_once SITE_PATH . '/views/footer.php';
					require_once SITE_PATH . '/views/MainViews/MainViewFooter.php';
				}
			}
		}
	

    /**
     * Invokes UserFactory to create an object of required type
     * depending on session set which contains userType logging in
     */
    protected function createUser ()
    {
        /* Method of the UserFactory class */
        $this->_objUser = UserFactory::createUser(ucfirst($_SESSION["userType"])); 
        $this->_objUser->setFirstName($_SESSION["emailID"]);
    }
    
    /* Method called on send message click in write message view */ 	
    public function writeMessage ()
    {
        $authObject = new Authenticate();
        $authObject->validateWriteMessage($_GET["controller"]);
        
        $body = $_POST["body"];
        $subject = $_POST["subject"];
        
        $sentto = $_POST["sentto"];
        
        $this->createUser();
        
        if (($this->_objUser->messageSend($body, $subject, $sentto)) == false) {
            $this->setCustomMessage("ErrorMessage", "Problem in sending message");
        } else {
            $this->setCustomMessage("SuccessMessage", "Message sent successfully");
        }
    }

    /**
     * Shows register course view to register for a course to provide educational content
     */
    public function registerCourseClick ()
    {
        $objCourse = new Course();
        $result = $objCourse->fetchCoursename();
        if (! empty($result)) {
            $this->showSubViews("registerCourse", $result);
        } else {
            $message = "You cannnot register<br> No courses exist yet";
            $this->setCustomMessage("ErrorMessage", $message);
        }
    }
    
    /* Method called on message click in message view */
    public function viewMessageClick ()
    {
        $this->createUser();
        list ($messages, $result2) = $this->_objUser->messageShow();
        If (! empty($messages)) {
            $this->showSubViews("viewMessage", $messages, $result2);
        } else {
            $message = "No messages for you<br>Have a good day :)";
            $this->setCustomMessage("NoticeMessage", $message);
        }
    }
    
    /* Method called on subject click in message view */
    public function subjectClick ()
    {
        $aid = $_REQUEST["msgid"];
        $stat = $_REQUEST['stat'];
        $this->createUser();
        if ($stat == '0') {
            $this->_objUser->changestatus($aid);
            list ($messages, $result2) = $this->_objUser->messageBody($aid);
            
            $this->showSubViews("MessageBody", $messages, $result2);
        } else {
            
            list ($messages, $result2) = $this->_objUser->messageBody($aid);
            
            $this->showSubViews("MessageBody", $messages, $result2);
        }
    }

    /**
     *
     * @param unknown $messageType            
     * @param unknown $message
     *            Uses toast to show messages to user
     */
    public function setCustomMessage ($messageType, $message)
    {
        if (isset($_SESSION["$messageType"])) {
            $_SESSION["$messageType"] .= $message . "<br>";
        } else {
            $_SESSION["$messageType"] = $message . "<br>";
        }
    }

    /**
     * Logs out the user by destroying the session and redirecting to main page
     */
    public function logout ()
    {

        session_destroy();
        header("Location:" . SITE_URL. "/index.php");
    }
}
?>
