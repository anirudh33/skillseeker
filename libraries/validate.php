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
$obj = new validate();
//$arrat = $obj->validator("name","ga999", 'alphanumeric#minlength=4#maxlength=25','alphanumeric Required#Enter Password atleast 4 characters long#Password should not be more than 25 characters long');
// $obj->validator("kgfttdjjjj","546", 'datatype=int#minlength=4#maxlength=25','datatype Required#Enter Password atleast 4 characters long#Password should not be more than 25 characters long');
//$obj->validator("kgfttdjjjj","", 'required#alphanumeric#minlength=4#maxlength=25','Password Required#alphanumeric Required#Enter Password atleast 4 characters long#Password should not be more than 25 characters long');
// $obj->validator("controller","value", 'required#','Pord Required');
//$obj->validator("controller","2010/02/02", 'date=yyyy/mm/dd','date format');
//$obj->validator("controller","2010/02/02", 'date=yyyy/mm/dd','date format');
$obj->validator("controller","12345", 'datatype=int,5','data');
$error=$obj->result();
// echo($error);
echo("<pre>");
print_r($error);
