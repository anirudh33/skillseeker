<?php
require_once('validation.class.php');
class validate
{
    private  $obj;
    private $errorMsg="";
    function __construct(){
        $this->obj = new validation();
    }
    function validator($name,$postVar=" ", $authType, $error)
    {
        $auth=explode('#', $authType);
        $err=explode('#', $error);
        $authLength=count($auth);
        $errLength=count($err);
        /* echo"<pre>";
        print_r($err); */
        
       if($authLength==$errLength)
        {
            for($i=0;$i<$authLength;$i++)
            {
                $this->obj->add_fields($name,$postVar, $auth[$i], $err[$i]);
            }
        }
        else{
            $this->errorMsg="Programer's error";
            return $this->errorMsg;
        }

    }
    function result()
    {
        $this->errorMsg=$this->obj->validate();
//         if($this->errorMsg=="")
//         {
//             $this->errorMsg="true";
//         }
        return $this->errorMsg;   
    }
    
   
}
$obj = new validate();
//$arrat = $obj->validator("ga999", 'alphanumeric#minlength=4#maxlength=25','alphanumeric Required#Enter Password atleast 4 characters long#Password should not be more than 25 characters long');
// $obj->validator("kgfttdjjjj","546", 'datatype=int#minlength=4#maxlength=25','datatype Required#Enter Password atleast 4 characters long#Password should not be more than 25 characters long');
//$obj->validator("kgfttdjjjj","", 'required#alphanumeric#minlength=4#maxlength=25','Password Required#alphanumeric Required#Enter Password atleast 4 characters long#Password should not be more than 25 characters long');
// $obj->validator("controller","value", 'required#','Pord Required');
$obj->validator("controller","2010/02/02", 'date=yyyy/mm/dd','date format');
$obj->validator("controller","2010/02/02", 'date=yyyy/mm/dd','date format');
$error=$obj->result();
// echo($error);
echo("<pre>");
print_r($error);
