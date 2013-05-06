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
        /*$data['columns']	= array('user_name', 'password');
        $data['tables']		= 'login';
        $data['conditions']=array(array('user_name ='.$user),true);
        $result=$this->_db->select($data);
        print_r($result);*/
        
        
        $data['tables']		= 'login';
        //$data['conditions']=array(array('user_name ='),true);
        $result=$this->_db->select($data);
        $myResult=array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $myResult[]=$row;
        }
        echo "<pre>";
        print_r($myResult);        
         
    }
    
}

?>
