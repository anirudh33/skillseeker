<?php

/**
 *@author anirudh
 **************************** Creation Log *******************************
* File Name 	- AModel.php
* Description 	- Abstract Model class holding functionalities 
* 					to be provided as a whole to the system
* Version		- 1.0
* Created by	- Anirudh Pandita 
* Created on 	- May 03, 2013
* **********************Update Log ***************************************
* Sr.NO. Version Updated by 		Updated on	 	Description
* -------------------------------------------------------------------------
* 
* ************************************************************************
*/
require_once './libraries/DBconnect.php';
class AModel extends DBConnection
{

    public function AuthenticateUser($user,$pwd)
    {
        
        /*$data['tables']		= 'login';
        $data['conditions']=array(array('user_name ='.$user),true);
        $result=$this->_db->select($data);
        print_r($result);*/
        
        
        $data['tables']		= 'users';
        //$data['conditions']=array(array('user_name ='),true);
        $result=$this->_db->select($data);
        $myResult=array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $myResult[]=$row;
        }
        
        if(!empty($myResult))    
        {   
            if(md5($myResult[0]['password']) === md5($pwd))
            {
                return("1");
            }
            else 
            {
                return("2");
            }
        }
        else 
        {
            return("0");
            }
         
    }
    
}

?>
