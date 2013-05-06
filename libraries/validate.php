<?php
/*
 * FileName: Validate.php
* Version: 1.0
* Author: Keshi Chander Yadav, Tanu Trehan, Manish
* Date: May 03, 2013
* Description: Validate class
*/

require_once('validation.class.php');
class validate
{
    private  $obj;	//Class Object Reference
    private $errorMsg="";
    
    public function __construct()
    {
        $this->obj = new validation();
    }
    
    /*
	 * Description: function to validate fields
	 * to this function
	 * Param $controler_name field control name goes here
	 * Param $postVar field data to be validated
	 * Param $authType Type of validation required for control
	 * Param $error error message for in case of validation failed
	 */
    function validator($name,$postVar=" ", $authType, $error)
    {
        $auth=explode('#', $authType);
        $err=explode('#', $error);
        $authLength=count($auth);
        $errLength=count($err);
        
       if($authLength==$errLength)
        {
            for($i=0;$i<$authLength;$i++)
            {
                $this->obj->addFields($name,$postVar, $auth[$i], $err[$i]);
            }
        }
        else
        {
            $this->errorMsg="Programer's error";
            echo $this->errorMsg;
         }

    }
    
    
    /**
     * return validation result with error messages
     */
    public function result()
    {
        $this->errorMsg=$this->obj->validate();
        return $this->errorMsg;   
    }
    
    /**
     *  Helps prevent XSS attacks
     */
    public function encodeXSString($string)
    {
    	// Remove dead space.
    	$string = trim ( $string );
    		
    	// Prevent potential Unicode codec problems.
    	$string = utf8_decode ( $string );
    		
    	// HTMLize HTML-specific characters.
    	$string = htmlentities ( $string, ENT_QUOTES );
    	$string = str_replace ( "#", "&#35;", $string );
    	$string = str_replace ( "%", "&#37;", $string );
    
    	return $string;
    }
    
    
    /**
     * Helps prevent XSS attacks
     */
    private function decodeXSString($string) 
    {
    	// Remove dead space.
    	$string = trim ( $string );
    		
    	// Prevent potential Unicode codec problems.
    	$string = utf8_decode ( $string );
    		
    	// HTMLize HTML-specific characters.
    	$string = htmlentities ( $string, ENT_QUOTES );
    	$string = str_replace ( "&#35;", "#", $string );
    	$string = str_replace ( "&#37;", "%", $string );
    	$length = intval ( $length );
    		
    	if ($length > 0)
    	{
    		$string = substr ( $string, 0, $length );
    	}
    	return $string;
    }
    
    
    /**
     * prevent sql injection
     * $param parameter will accept array type
     */
    private function preventSQLInjection($string) {
    	foreach ( $string as $key => $value ) {
    		$value = mysql_real_escape_string ( $value );
    	}
    	return $string;
    }   
}