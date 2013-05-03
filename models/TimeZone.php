<?php
/*
 **************************** Creation Log *******************************
File Name                   -  TimeZone.php
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
    private $_timeZone;
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
     * @return the $_timeZone
     */
    public function getTimeZone()
    {
        return $this->_timeZone;
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
     * @param field_type $_timeZone
     */
    public function setTimeZone($_timeZone)
    {
        $this->_timeZone = $_timeZone;
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
        if(in_array($values,'time_zone'))
        {
            $this->setTimeZone($values['time_zone']);
        }
        if(in_array($values,'created_on'))
        {
            $this->setCreatedOn($values['created_on']);
        }
        if(in_array($values,'updated_on'))
        {
            $this->setUpdatedOn($values['updated_on']);
        }
    
        $timeZoneFormArray = array();
    
        if($this->getId() != null)
        {
            $timeZoneFormArray["id"] = $this->getId();
        }
        if($this->getTimeZone() != null)
        {
            $timeZoneFormArray["time_zone"] = $this->getTimeZone();
        }
        if($this->getCreatedOn() != null)
        {
            $timeZoneFormArray["created_on"] = $this->getCreatedOn();
        }
        if($this->getUpdatedOn() != null)
        {
            $timeZoneFormArray["updated_on"] = $this->getUpdatedOn();
        }
    
        return $timeZoneFormArray;
    
    }   
}