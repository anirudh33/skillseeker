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
1			1.1			Keshi				08/05/2013	changed code from 400 to 404 fr validation result
*************************************************************************

*/

require_once 'libraries/DBconnect.php';
require_once 'libraries/validate.php';

class User extends DBConnection
{
    private $_id;
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_userName;
    private $_password;
    private $_timeZoneId;
    private $_countryId;
    private $_status;
    private $_createdOn;
    private $_updatedOn;
	/**
     * @return the $_id
     */
    public function getId()
    {
        return $this->_id;
    }

    public function getEmail()
    {
    	return $this->_email;
    }
    
	/**
     * @return the $_firstName
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

	/**
     * @return the $_lastName
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

	/**
     * @return the $_userName
     */
    public function getUserName()
    {
        return $this->_userName;
    }

	/**
     * @return the $_password
     */
    public function getPassword()
    {
        return $this->_password;
    }

	/**
     * @return the $_timeZoneId
     */
    public function getTimeZoneId()
    {
        return $this->_timeZoneId;
    }

	/**
     * @return the $_countryId
     */
    public function getCountryId()
    {
        return $this->_countryId;
    }

	/**
     * @return the $_status
     */
    public function getStatus()
    {
        return $this->_status;
    }

	/**
     * @return the $_createdOn
     */
    public function getCreatedOn()
    {
        return $this->_createdOn;
    }

	/**
     * @return the $_updatedOn
     */
    public function getUpdatedOn()
    {
        return $this->_updatedOn;
    }

	/**
     * @param field_type $_id
     */
    public function setId($_id)
    {
        $this->_id = $_id;
    }

	/**
     * @param field_type $_firstName
     */
    public function setFirstName($_firstName)
    {
        $this->_firstName = $_firstName;
    }
    public function setEmail($_email)
    {
    	$this->_email = $_email;
    }
	/**
     * @param field_type $_lastName
     */
    public function setLastName($_lastName)
    {
        $this->_lastName = $_lastName;
    }

	/**
     * @param field_type $_userName
     */
    public function setUserName($_userName)
    {
        $this->_userName = $_userName;
    }

	/**
     * @param field_type $_password
     */
    public function setPassword($_password)
    {
        $this->_password = md5($_password);
    }

	/**
     * @param field_type $_timeZoneId
     */
    public function setTimeZoneId($_timeZoneId)
    {
        $this->_timeZoneId = $_timeZoneId;
    }

	/**
     * @param field_type $_countryId
     */
    public function setCountryId($_countryId)
    {
        $this->_countryId = $_countryId;
    }

	/**
     * @param field_type $_status
     */
    public function setStatus($_status)
    {
        $this->_status = $_status;
    }

	/**
     * @param field_type $_createdOn
     */
    public function setCreatedOn($_createdOn)
    {
        $this->_createdOn = $_createdOn;
    }

	/**
     * @param field_type $_updatedOn
     */
    public function setUpdatedOn($_updatedOn)
    {
        $this->_updatedOn = $_updatedOn;
    }


    // values the post value from form
    public function GenerateArray($values,$type) {    	
    	$obj = new validate();
        if(array_key_exists('id',$values))
        {
            $this->setId($values['id']);
        }
        if(array_key_exists('first_name',$values))
        {
            $obj->validator("first_name",$values['first_name'], 'required#alphabets','FirstName Required#FirstName should only contain alphabets');
          //  $error=$obj->result();
            
          //  if(isset($error))
           // {
             // print_r($error); die;
          // }
          // else {
            $this->setFirstName($values['first_name']);
          //  }
        }
        if(array_key_exists('last_name',$values))
        {
            $obj->validator("last_name",$values['last_name'], 'required#alphabets','LastName Required#LastName should only contain alphabets');
            $this->setLastName($values['last_name']);
        }
        if(array_key_exists('user_name',$values))
        {
            $obj->validator("user_name",$values['user_name'], 'required#username#minlength=4#maxlength=25','UserName Required#UserName should start with an alphabet#UserName atleast 4 characters long#UserName should not be more than 25 characters long');
            $this->setUserName($values['user_name']);
        }
        if(array_key_exists('email_address',$values))
        { 
        	$obj->validator("email_address",$values['email_address'], 'required#email','Email Required#Email Please enter valid email address');
            $this->setEmail($values['email_address']);
        }
        if(array_key_exists('password',$values) && array_key_exists('repassword',$values) )
        {   
        	$obj->validator("password",$values['password'], 'required#minlength=8#maxlength=25','Password Required#Password atleast 8 characters long#Password should not be more than 25 characters long');
        	if(true){
        		$match = $values['password'] ."#" . $values['repassword'];
        		
        		$obj->validator("confirmpassword",$match, 'match','Password does not match');
        	}
        	$this->setPassword($values['password']);
        }
        
        if(array_key_exists('repassword',$values))
        {
        	//$obj = new validate();
        	$s=$values['password']."#".$values['repassword'];
        	$obj->validator("repassword",$s , 'match','Password doesnot match#password');
        
        	//$error=$obj->result();
        	//print_r($error);
        	//$this->setPassword($values['password']);
        }
        
        
        
        
        if(array_key_exists('time_zone_id',$values))
        {
            $this->setTimeZoneId($values['time_zone_id']);
        }
        if(array_key_exists('country_id',$values))
        {
            $this->setCountryId($values['country_id']);
        }
        if(array_key_exists('status',$values))
        {
            $this->setStatus($values['status']);
        }
        if(array_key_exists('created_on',$values))
        {
            $this->setCreatedOn($values['created_on']);
        }
        if(array_key_exists('updated_on',$values))
        {
            $this->setUpdatedOn($values['updated_on']);
        }
        
    
        $userFormArray = array();
    
        if($this->getId() != null)
        {
            $userFormArray["id"] = $this->getId();
        }
        if($this->getFirstName() != null)
        {
            $userFormArray["first_name"] = $this->getFirstName();
        }
        if($this->getLastName() != null)
        {
            $userFormArray["last_name"] = $this->getLastName();
        }
        if($this->getUserName() != null)
        {
            $userFormArray["user_name"] = $this->getUserName();
        }
        if($this->getPassword() != null)
        {
            $userFormArray["password"] = $this->getPassword();
        }
        if($this->getEmail() != null)
        {
        	$userFormArray["email_address"] = $this->getEmail();
        }
//         if($this->getTimeZoneId() != null)
//         {
//             $userFormArray["time_zone_id"] = $this->getTimeZoneId();
//         }
        if($this->getCountryId() != null)
        {
            if($type == "INSERT")
            {
                $data['columns']	= array('id');
                $data['tables']		= 'country';
                $data['conditions']=array(array('name ="'.$this->getCountryId().'"' ),true);
                $temp = $this->_db->select($data);
                
                $myResult=array();
                while($row = $temp->fetch(PDO::FETCH_ASSOC)) {
                    $myResult[]=$row;
                }
                if($myResult != null)
                {
                    $userFormArray["country_id"] = $myResult[0]['id'];
                }
                
            }
            
            if($type == "SELECT")
            {
                $data['columns']	= array('name');
                $data['tables']		= 'country';
                $data['conditions']=array(array('id ="'.$this->getCountryId().'"' ),true);
                $temp = $this->_db->select($data);
            
                $myResult=array();
                while($row = $temp->fetch(PDO::FETCH_ASSOC)) {
                    $myResult[]=$row;
                }
                if($myResult != null)
                {
                    $userFormArray["country_id"] = $myResult[0]['name'];
                }
            
            }
        }        
       
        if($this->getTimeZoneId()!= null)
        {
        	if($type == "INSERT")
        	{
        		$data['columns']	= array('id');
        		$data['tables']		= 'timezone';
        		$data['conditions']=array(array('time_zone ="'.$this->getTimeZoneId().'"' ),true);
        		$temp = $this->_db->select($data);
        
        		$myResult=array();
        		while($row = $temp->fetch(PDO::FETCH_ASSOC)) {
        			$myResult[]=$row;
        		}
        		if($myResult != null)
        		{
        			$userFormArray["time_zone_id"] = $myResult[0]['id'];
        		}
        
        	}
        	
        	if($type == "SELECT")
        	{
        		$data['columns']	= array('name');
        		$data['tables']		= 'timezone';
        		$data['conditions']=array(array('id ="'.$this->getTimeZoneId().'"' ),true);
        		$temp = $this->_db->select($data);
        
        		$myResult=array();
        		while($row = $temp->fetch(PDO::FETCH_ASSOC)) {
        			$myResult[]=$row;
        		}
        		if($myResult != null)
        		{
        			$userFormArray["time_zone_id"] = $myResult[0]['name'];
        		}
        
        	}
        }
        
        
        if($this->getStatus() != null)
        {
            $userFormArray["status"] = $this->getStatus();
        }
        if($this->getCreatedOn() != null)
        {
            $userFormArray["created_on"] = $this->getCreatedOn();
        }
        if($this->getUpdatedOn() != null)
        {
            $userFormArray["updated_on"] = $this->getUpdatedOn();
        }

     $error=$obj->result();
    
     if ($error==false){
     	
       return $userFormArray;
        }
        else{
        echo "<pre>";
        print_r($error);
        die;
       
        }  
    }
    
    public function searchUser() {
    	
    	$data['columns']	= array('first_name','last_name','email_address');
    	$data['tables']		= 'user_test_result';
    	
    	$data['joins'][] = array(
    			'table' => 'test',
    			'type'	=> 'inner',
    			'conditions' => array('test.user_id' => 'user_id')
    	);
    	
    	$data['joins'][] = array(
    			'table' => 'test_details',
    			'type'	=> 'inner',
    			'conditions' => array('test_details.test_id' => 'test.id')
    	);
    	
		$data['conditions'] = array (array('test.user_id = 1 AND first_name LIKE "%'.$this->_firstName.'%" AND last_name LIKE "%'.$this->_lastName.'%"'),true);
    	
    	$result = $this->_db->select($data);
    	$userResult=array();
    	
    	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    		$userResult[]=$row;
    	}
    	
    	if($userResult != null)
    	{
    		return $userResult;
    	} else {
    		$userResult[]="No Records Found";
    		return $userResult;
    	}
    }
    
    public function getUserResult() {
    	
    	$data['joins'][] = array(
    			'table' => 'test',
    			'type'	=> 'inner',
    			'conditions' => array('user_test_result.test_id' => 'test.id')
    	);
    	
    	$data['columns']	= array(
    							'user_test_result.first_name', 
    							'user_test_result.last_name',
    							'user_test_result.email_address',
    							'user_test_result.test_id',
    							'user_test_result.marks',
    							'user_test_result.total_marks',
    							'test.name',
    							'test.no_of_questions'
    						);

    	$data['tables']		= 'test';
    	
    	$data['conditions']=array(array('email_address ='.$this->getEmail()),true);
    	
    	$result = $this->_db->select($data);
    	$data;
    	 
    	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    		$percentage = ($row['marks']/$row['total_marks'])*100;
    		$data .= "
    				 	<tr>
    						<td>{$row['first_name']}</td>
    						<td>{$row['last_name']}</td>
    						<td>{$row['name']}</td>
    						<td>{$percentage}</td>
    						<td>{$row['marks']}</td>
    						<td>{$row['no_of_questions']}</td>
    					</tr>
    				 ";
    	}
    	 
    	if($data != null)
    	{
    		return $data;
    	} else {
    		$data .="No Records Found";
    		return data;
    	}
    }
   
}