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
class Registration
{
    private $_id;
    private $_email;
    private $_name;
    private $_username;
    private $_timezone;
    private $_country;
    private $_password;
    private $_repassword;
    private $_captcha;
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
     * @return the $_name
     */
    public function getName()
    {
        return $this->_name;
    }

	/**
     * @return the $_createdOn
     */
    public function getUsername()
    {
        return $this->_username;
    }

	/**
     * @return the $_updatedOn
     */
    public function getTimezone()
    {
        return $this->_timezone;
    }
    public function getCountry()
    {
    	return $this->_timezone;
    }
    public function getPassword()
    {
    	return $this->_timezone;
    }
    public function getTimezone()
    {
    	return $this->_timezone;
    }
	/**
     * @param field_type $_id
     */
    public function setId($_id)
    {
        $this->_id = $_id;
    }

	/**
     * @param field_type $_name
     */
    public function setName($_name)
    {
        $this->_name = $_name;
    }
    public function setEmail($_email)
    {
    	$this->_email = $_email;
    }
	/**
     * @param field_type $_createdOn
     */
    public function setUsername($_username)
    {
        $this->_username = $_username;
    }

	/**
     * @param field_type $_updatedOn
     */
    public function setTimezone($_timezone)
    {
        $this->_timezone = $_timezone;
    }
    


    // values the post value from form
    public function newUserRegistration($values) {
    
        if(in_array($values,'name'))
        {
            $this->setName($values['name']);
        }
        if(in_array($values,'email'))
        {
            $this->setEmail($values['email']);
        }
        if(in_array($values,'username'))
        {
            $this->setUsername($values['username']);
        }
        if(in_array($values,'timezone'))
        {
            $this->setTimezone($values['timezone']);
        }
    
        if(in_array($values,'password'))
        {
        	$this->setPassword($values['password']);
        }
        
        if(in_array($values,'repassword'))
        {
        	$this->setRepassword($values['repassword']);
        }
        
        if(in_array($values,'ct_captcha'))
        {
        	$this->setRepassword($values['ct_captcha']);
        }
        
        $countryFormArray = array();
    
        if($this->getId() != null)
        {
            $countryFormArray["id"] = $this->getId();
        }
        if($this->getName() != null)
        {
            $countryFormArray["name"] = $this->getName();
        }
        if($this->getCreatedOn() != null)
        {
            $countryFormArray["created_on"] = $this->getCreatedOn();
        }
        if($this->getUpdatedOn() != null)
        {
            $countryFormArray["updated_on"] = $this->getUpdatedOn();
        }
        
    return $countryFormArray;
    
    }
}