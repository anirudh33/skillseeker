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
abstract class AModel
{

    /**
     *
     * @var Holds database instance
     */
    protected $db;

    /**
     * Creating an instance of database
     */
    function __construct ()
    {
        $this->db = DBConnection::Connect();
    }

    /**
     *
     * @param $messageType: Type
     *            of toast to be displayed which
     *            can be ErrorMessage, SuccessMessage, NoticeMessage
     * @param $message: Message
     *            to be displayed
     *            Uses toast to show messages to user
     */
    public function setCustomMessage ($messageType, $message)
    {
        if (isset($_SESSION["$messageType"])) {
            $_SESSION["$messageType"] .= $message . "<br>";
        } else {
            $_SESSION["$messageType"] = $message . "<br>";
        }
    }
}

?>
