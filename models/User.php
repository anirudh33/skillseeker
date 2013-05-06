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

require_once 'libraries/DBconnect.php';

class User extends DBConnection
{
    private $_id;
    private $_firstName;
    private $_lastName;
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
        $this->_password = $_password;
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
    	
        if(array_key_exists('id',$values))
        {
            $this->setId($values['id']);
        }
        if(array_key_exists('first_name',$values))
        {
            $this->setFirstName($values['first_name']);
        }
        if(array_key_exists('last_name',$values))
        {
            $this->setLastName($values['last_name']);
        }
        if(array_key_exists('password',$values))
        {
            $this->setPassword($values['password']);
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
        if($this->getTimeZoneId() != null)
        {
            $userFormArray["time_zone_id"] = $this->getTimeZoneId();
        }
        if($this->getCountryId() != null)
        {
            if($type == "INSERT")
            {
                $data['columns']	= array('id');
                $data['tables']		= 'country';
                $data['conditions']=array(array('name ='.$this->getCountryId() ),true);
                $temp = $this->_db->select($data);
                
                $myResult=array();
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
                $data['conditions']=array(array('id ='.$this->getCountryId() ),true);
                $temp = $this->_db->select($data);
            
                $myResult=array();
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $myResult[]=$row;
                }
                if($myResult != null)
                {
                    $userFormArray["country_id"] = $myResult[0]['name'];
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
    
        return $userFormArray;    
    }
}