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
    function result()
    {
        $this->errorMsg=$this->obj->validate();
        return $this->errorMsg;   
    } 
}