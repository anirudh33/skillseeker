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
    
    function __construct(){
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
        else{
            $this->errorMsg="Programer's error";
            return $this->errorMsg;
        }

    }
    
    //return validation result with error messages
    function result()
    {
        $this->errorMsg=$this->obj->validate();
        return $this->errorMsg;   
    } 
}