<?php
/*
 * *************************** Creation Log ********************************* 
 * File Name - Authenticate.php 
 * Description - Class file for Authentication of users credentials 
 * Version - 1.0 
 * Created by - Anirudh Pandita 
 * Created on - May 03, 2013 
 * *************************************************************************** 
 * Sr.NO. Version 			Updated by Updated on 	Description 
 * ------------------------------------------------------------------------- 
 *
 * **************************************************************************
 */
class Authenticate extends AModel
{    
    /**
     * @var To store any validation error messages to be displayed
     */
    private $_message = "";
    
    /**
     *
     * @var For matching the type of user logged
     * in matches the panel he/she logs in
     */
    protected $_requiredType = "";

    /**
     *
     * @return the $_message
     */
    public function getMessage ()
    {
        return $this->_message;
    }

    /**
     *
     * @param string $_message            
     */
    public function setMessage ($_message)
    {
        $this->_message .= $_message . "<br>";
        $this->setCustomMessage("ErrorMessage", $_message);
    }
    

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
    public function setRequiredType ($requiredType)
    {
    	$this->_requiredType = $requiredType;
    }

    /* Check if user has logged in */
    public function isValidUser ()
    {
        if ($this->sessionExists() == 1) {
            
            return 1;
        } else {
            
            $this->setMessage("Session has expired or doesnt exist");
            
            return 0;
        }
    }
        
    /* Check if user session exists */
    public function sessionExists ()
    {
        if (isset($_SESSION['userID']) and 
            isset($_SESSION['userType']) and 
            $_SESSION['emailID']) {
                        
            if ($this->isRequiredType() == 1) {                
                return 1;
            } else {                
                $this->_message = "You are not authorized to view this page";                
                return 0;
            }
        } else {
            return 0;
        }
    }
    
    /* Check if user in session is of this particular type like Admin in this case */
    public function isRequiredType ()
    {
        if ($_SESSION['userType'] == $this->getRequiredType()) {
            return 1;
        } else {
            return 0;
        }
    }
    
    /* Using PHP filters to validate login form input */
    public function validateLogin ()
    {
        if (array_filter($_POST)) {
            if (! filter_var($_POST["fieldEmail"], FILTER_VALIDATE_EMAIL)) {
                $this->setMessage("Email not valid");
            }
        } else {
            $this->setMessage("Fields cant be left empty");
        }
        
        $msg = $this->getMessage();
        
        if (! empty($msg)) {
            header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?msg=" . $this->getMessage() . "");
            die();
        }
    }

    /* Validates contact us form */
    public function validatecontactme ()
    {
        /* ------------alphabet security----------------- */
        if (preg_match("/^[a-z\-]+$/i", $_POST["name"]) === 0) {
            
            $this->setMessage("Name must be letters");
        }
        
        /* ------------URL security----------------- */
        
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["name"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["email"]) === 1) {
            
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["message"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        
        /* ------------Script security----------------- */
        
        if (preg_match("/(<([^>]+)>)/i", $_POST["name"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["email"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["message"]) === 1) {
            $this->setMessage("script not allowed");
        }
        
        /* ------------Empty field security----------------- */
        if (empty($_POST["name"])) {
            $this->setMessage("Name cant be left empty");
        }
        if (empty($_POST["email"])) {
            $this->setMessage("Email cant be left empty");
        }
        if (empty($_POST["message"])) {
            $this->setMessage("Message cant be left empty");
        }
        
        $msg = $this->getMessage();
        if (! empty($msg)) {
            header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?method=showMainView&controller=Main&msg=" . $this->getMessage() . "");
            die();
        }
    }

    /* Validates add course form */
    public function validateaddcourse ()
    {
        /* ------------alphabet security----------------- */
        if (preg_match("/^[a-z' '0-9',''-''.']+$/i", $_POST["coursename"]) === 0) {
            $this->setMessage("Course Name must be letters or no.");
        }
        
        /* ------------URL security----------------- */
        
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["coursename"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["description"]) === 1) {
            
            $this->setMessage("Url not allowed");
        }
        
        /* ------------Script security----------------- */
        
        if (preg_match("/(<([^>]+)>)/i", $_POST["coursename"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["description"]) === 1) {
            $this->setMessage("script not allowed");
        }
        
        /* ------------Empty field security----------------- */
        if (empty($_POST["coursename"])) {
            $this->setMessage("Course Name cant be left empty");
        }
        
        $msg = $this->getMessage();
        if (! empty($msg)) {
            header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?method=addCourseClick&controller=Teacher");
            die();
        }
    }
    
    /* -----Function to validate write message form of teacher------- */
    public function validateWriteMessage ($str)
    {
        
        /* ------------alphabet security----------------- */
        if (preg_match("/^[a-z' '\-]+$/i", $_POST["subject"]) === 0) {
            $this->setMessage("Subject must be letters");
        }
        
        /* ------------URL security----------------- */
        
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["subject"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["body"]) === 1) {
            
            $this->setMessage("Url not allowed");
        }
        
        /* ------------Script security----------------- */
        
        if (preg_match("/(<([^>]+)>)/i", $_POST["subject"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["body"]) === 1) {
            $this->setMessage("script not allowed");
        }
        
        /* ------------Empty field security----------------- */
        if (empty($_POST["subject"])) {
            $this->setMessage("Subject cant be left empty");
        }
        if (empty($_POST["body"])) {
            $this->setMessage("Body cant be left empty");
        }
        
        if ($str == "Student") {
            $msg = $this->getMessage();
            if (! empty($msg)) {
                header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?method=messageClick&controller=Student&msg=" . $this->getMessage() . "");
                die();
            }
        }
        
        if ($str == "Teacher") {
            $msg = $this->getMessage();
            if (! empty($msg)) {
                header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?method=messageClick&controller=Teacher&msg=" . $this->getMessage() . "");
                die();
            }
        }
    }
    
    /* -------Function to validate edit profile of admin----------------------- */
    public function validateEditProfile ($str)
    
    {
        if (! filter_var($_POST["phone"], FILTER_VALIDATE_INT) and ! empty($_POST["phone"])) {
            
            $this->setMessage("Phone no not valid, enter numbers only");
        }
        /* ------------alphabet security----------------- */
        
        if (preg_match("/^[a-z\-]+$/i", $_POST["firstname"]) === 0) {
            $this->setMessage("firstname must be letters");
        }
        
        if (preg_match("/^[a-z\-]+$/i", $_POST["lastname"]) === 0) {
            $this->setMessage("lastname must be letters ");
        }
        
        /* ------------URL security----------------- */
        
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["firstname"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["lastname"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["phone"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["qualification"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        
        
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["dob"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["address"]) === 1) {
            
            $this->setMessage("Url not allowed");
        }
        
        /* ------------Script security----------------- */
        
        if (preg_match("/(<([^>]+)>)/i", $_POST["lastname"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["phone"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["address"]) === 1) {
            $this->setMessage("script not allowed");
        }
        
        if (preg_match("/(<([^>]+)>)/i", $_POST["qualification"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["gender"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["dob"]) === 1) {
            $this->setMessage("script not allowed");
        }
        
        /* ------------Empty field security----------------- */
        if (empty($_POST["firstname"])) {
            $this->setMessage("Firstname cant be left empty");
        }
        if (empty($_POST["lastname"])) {
            $this->setMessage("Lastname cant be left empty");
        }
        
        if ($str == "Admin") {
            
            $msg = $this->getMessage();
            
            if (! empty($msg)) {
                
                header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?method=editProfileClick&controller=Admin&msg=" . $this->getMessage() . "");
                die();
            }
        } 

        elseif ($str == "Teacher") {
            
            $msg = $this->getMessage();
            
            if (! empty($msg)) {
                header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?method=editProfileClick&controller=Teacher&msg=" . $this->getMessage() . "");
                die();
            }
        } elseif ($str == "Student") {
            
            $msg = $this->getMessage();
            
            if (! empty($msg)) {
                header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?method=editProfileClick&controller=Student&msg=" . $this->getMessage() . "");
                die();
            }
        }
    }
    
    /* Function to validate Registration form data */
    public function validateRegistration ()
    {
        $obj1 = new Registration();
        $verify = $obj1->verifyEmail($_POST["email"]);
        
        if ($verify) {
            
            $this->setMessage("Email already exist");
        }
        /* Function to validate same email and password */
        if (! ($_POST["email"] == $_POST["repeatemail"])) {
            
            $this->setMessage("Email is not same");
        }
        if (! ($_POST["password"] == $_POST["repeatpassword"])) {
            
            $this->setMessage("Password is  not same");
        }
        
        if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $this->setMessage("Email not valid");
        }
        if (! filter_var($_POST["repeatemail"], FILTER_VALIDATE_EMAIL)) {
            $this->setMessage("Email not valid");
        }
        if (! filter_var($_POST["phone"], FILTER_VALIDATE_INT)) {
            $this->setMessage("Phone no not valid, enter numbers only");
        }
        
        /* ------------alphabet security----------------- */
        
        if (preg_match("/^[a-z\-]+$/i", $_POST["firstname"]) === 0) {
            $this->setMessage("firstname must be letters");
        }
        if (preg_match("/^[a-z\-]+$/i", $_POST["lastname"]) === 0) {
            $this->setMessage("lastname must be letters ");
        }
        
        /* ------------URL security----------------- */
        
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["firstname"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["lastname"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["password"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["phone"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["date"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        if (preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i", $_POST["repeatpassword"]) === 1) {
            $this->setMessage("Url not allowed");
        }
        
        /* ------------Script security----------------- */
        
        if (preg_match("/(<([^>]+)>)/i", $_POST["firstname"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["lastname"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["password"]) === 1) {
            $this->setMessage("script not allowed");
        }
        
        if (preg_match("/(<([^>]+)>)/i", $_POST["date"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["phone"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["repeatpassword"]) === 1) {
            $this->setMessage("script not allowed");
        }
        if (preg_match("/(<([^>]+)>)/i", $_POST["repeatemail"]) === 1) {
            $this->setMessage("script not allowed");
        }
        
        $securimage = new Securimage();
        if ($securimage->check($_POST['captcha_code']) == false) {
            $this->setMessage("The security code entered was incorrect");
        }
        
        /* ------------Empty field security----------------- */
        if (empty($_POST["firstname"])) {
            $this->setMessage("Firstname cant be left empty");
        }
        if (empty($_POST["repeatemail"])) {
            $this->setMessage("repeatemail cant be left empty");
        }
        if (empty($_POST["repeatpassword"])) {
            $this->setMessage("repeatpassword cant be left empty");
        }
        
        if (empty($_POST["lastname"])) {
            $this->setMessage("Lastname cant be left empty");
        }
        if (empty($_POST["email"])) {
            $this->setMessage("Email cant be left empty");
        }
        if (empty($_POST["password"])) {
            $this->setMessage("Password cant be left empty");
        }
        if (empty($_POST["date"])) {
            $this->setMessage("Date of birth cant be left empty");
        }
        
        $msg = $this->getMessage();
        if (! empty($msg)) {
            header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?method=registerClick&controller=Main&msg=" . $this->getMessage() . "");
            die();
        }
    }
    
    /* logs ip addresses with date and session */
    public function logIP ()
    {
        $line = date('Y-m-d H:i:s') . "," . session_id() . "," . $_SERVER['REMOTE_ADDR'] . "," . $_SESSION["emailID"];
        file_put_contents(SITE_PATH.'/visitors.log', $line . PHP_EOL, FILE_APPEND);
    }
    
    /* Check if ip, session id, email exists in the log file */
    public function checkIPExists ()
    {
        fopen(SITE_PATH."/visitors.log", "a");
        if (file(SITE_PATH.'/visitors.log') == false) {
            // die ( "file not found" );
        }
        $lines = file(SITE_PATH.'/visitors.log');
        $i = 0;
        $flag = 0;
        
        foreach ($lines as $key => $value) {
            $visitors[] = explode(',', $value);
            
            if (trim($visitors[$i][2], PHP_EOL) == trim($_SERVER['REMOTE_ADDR'], " ")) {
                // @todo check if isset
                if (trim($visitors[$i][3], PHP_EOL) == $_SESSION["emailID"]) {
                    if ($visitors[$i][1] == session_id()) {
                        $dt = $visitors[$i][0];
                        $flag = 0;
                    } elseif (! empty($dt)) {
                        
                        $flag = 1;
                    }
                }
            }
            $i ++;
        }
        if ($flag == 1) {
            $o = new MainController();
            $o->logout();
        }
        $dt = "";
    }
    
    /* Logs IP for registration count and prevents registration if greater than 10 */
    public function addRegistrationCount ($noOfAttempts)
    {
        fopen(SITE_PATH."/register.log", "a");
        $regArray = file(SITE_PATH.'/register.log');
        $i = 0;
        $flag = 0;
        $count = 1;
        
        if (! empty($regArray)) {
            $flag = 1;
            
            foreach ($regArray as $key => $value) {
                
                if (trim($value, PHP_EOL) == $_SERVER["REMOTE_ADDR"]) {
                    
                    $count ++;
                } elseif (trim($value, PHP_EOL) != date("w")) {
                    fopen(SITE_PATH."/register.log", "w");
                }
                
                $i ++;
            }
        }
        if ($count >= $noOfAttempts) {
            
            $this->setMessage("Registration not allowed, max no of attempts 
					to register from a ip are <b>$noOfAttempts</b>");
            $msg = $this->getMessage();
            if (! empty($msg)) {
                header("Location:" . $_SESSION["DOMAIN_PATH"] . "/index.php?msg=" . $this->getMessage() . "");
                die();
            }
        }
        
        /* Logging user ip */
        if ($flag == 1) {
            $register = $_SERVER["REMOTE_ADDR"];
            
            file_put_contents(SITE_PATH.'/register.log', $register . PHP_EOL, FILE_APPEND);
        } else {
            
            file_put_contents(SITE_PATH.'/register.log', date("w") . PHP_EOL, FILE_APPEND);
        }
    }
}
?>