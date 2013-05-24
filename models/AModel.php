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
	
	private $faq_category;
	
	private $faq_question;
	private $faq_answer;
	public function getFaq_category() {
		return $this->faq_category;
	}
	
	
	
	
	public function getFaq_question() {
		return $this->faq_question;
	}
	
	/**
	 * @return the $faq_answer
	 */
	public function getFaq_answer() {
		return $this->faq_answer;
	}
	
	/**
	 * @param field_type $faqcategory_id
	 */
	public function setFaq_category($faq_category) {
		$this->faq_category = $faq_category;
	}
	
	/**
	 * @param field_type $faqid
	 */
	
	
	
	/**
	 * @param field_type $faq_question
	 */
	public function setFaq_question($faq_question) {
		$this->faq_question = $faq_question;
	}
	
	/**
	 * @param field_type $faq_answer
	 */
	public function setFaq_answer($faq_answer) {
		$this->faq_answer = $faq_answer;
	}
	
	public function fetchfaq()
	{
		$data['columns']	= array('faq_question','faq_answer');
		$data['tables']		= 'faqs';
		$data['conditions']=array(array('faq_category ="'.$this->faq_category.'"'),true);
		return $result=$this->_db->select($data);
	}
	
    public function __construct()
    {
    	parent::__construct();
        //$this->_db
    }
    public function uniqueUserName($userName)
    {
    	
    	$data['columns']	= array('user_name');
    	$data['tables']		= 'users';
    	$temp = $this->_db->select($data);
    	
    	$myResult=array();
    	$i =0;
    	while($row = $temp->fetch(PDO::FETCH_ASSOC)) {
    		$myResult[] = $row['user_name'];
    		$i++;
    	}
    	
    	if($myResult != null)
    	{
    		
    	
    		if(in_array($userName, array_values($myResult)))
    		{
    			 
    			return 1;
    			
    		}
    		else {
    			
    			return 0;
    			
    		}
    		
    	}
    	
    }
    
    
   /* public function assignTest()
    {
    	$data['tables']		= 'test';
    	$data['columns']	= array('id', 'name');
    	$result=$this->_db->select($data);
    	$myResult=array();
    	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    		$myResult[]=$row;
    	}
    	return $myResult;
     }
    */
}

?>
