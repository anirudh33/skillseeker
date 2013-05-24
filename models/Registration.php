<?php
/*
 **************************** Creation Log *******************************
File Name                   -  Country.php
Project Name                -  skillseeker
Description                 -  Country Model
Version                     -  1.0
Created by                  -  Ramandeep Singh
Created on                  -  May 03, 2013
***************************** Update Log ********************************
Sr.NO.		Version		Updated by           Updated on          Description
-------------------------------------------------------------------------

*************************************************************************

*/
require './libraries/DBconnect.php';
require_once 'models/User.php';
class Registration extends DBConnection
{
	
	public function registerUser($data)
	{
		
		$registrationObj = new User();
		
		$userArray = $registrationObj->GenerateArray($data, "INSERT");
		
		$createdon=date ( 'Y-m-d h:i:s', time () );
		
		$userArray['created_on']=$createdon;
		
		$result = $this->_db ->insert('users', $userArray);
		 
	}
	
}
   