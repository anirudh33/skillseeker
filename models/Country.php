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
class Country
{
    private $_id;
    private $_name;
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
     * @return the $_name
     */
    public function getName()
    {
        return $this->_name;
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
     * @param field_type $_name
     */
    public function setName($_name)
    {
        $this->_name = $_name;
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
    public function GenerateArray($values) {
    
        if(in_array($values,'id'))
        {
            $this->setId($values['id']);
        }
        if(in_array($values,'name'))
        {
            $this->setName($values['name']);
        }
        if(in_array($values,'created_on'))
        {
            $this->setCreatedOn($values['created_on']);
        }
        if(in_array($values,'updated_on'))
        {
            $this->setUpdatedOn($values['updated_on']);
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