<?php

/**
 * 
 * 
 * @author  : Debanshu KAr
 * @version : 1.0
 */

require_once 'libraries/DBconnect.php';

class Result extends DBConnection
{
	protected $_userId;
	protected $_testId;
	
	/**
	 * @return the $_testId
	 */
	public function getTestId() {
		return $this->_testId;
	}

	/**
	 * @param field_type $_testId
	 */
	public function setTestId($_testId) {
		$this->_testId = $_testId;
	}

	/**
	 * @return the $_userId
	 */
	public function getUserId() {
		return $this->_userId;
	}

	/**
	 * @param field_type $_userId
	 */
	public function setUserId($_userId) {
		$this->_userId = $_userId;
	}

	
	public function ResultUser(){
		
		
		
		
		
		$data['columns']	= array('name','created_on');
		$data['tables']		= 'test';
		$data['conditions']=array(array('user_id ='.$this->getUserId()),true);
		$result=$this->_db->select($data);
		 
	    $row[] = $result->fetch(PDO::FETCH_ASSOC);
	    return $row;
	}
	
	public function viewResult(){
		$data['joins'][] = array(
				'table' => 'test',
				'type'	=> 'inner',
				'conditions' => array('test.id' => 'user_test_result.test_id')
		);
		
		$data['columns']	= array('first_name','marks','total_marks');
		$data['tables']		= 'user_test_result';
		$data['conditions']=array(array('test.name ="'.$this->getTestId().'"'),true);
		$result=$this->_db->select($data);
			
		$row[] = $result->fetch(PDO::FETCH_ASSOC);
		return $row;
		
	}
	
}
?>