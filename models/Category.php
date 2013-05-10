<?php
require_once './libraries/DBconnect.php';
class Category extends DBConnection
{
	private $_id;
	private $_name;
	private $_userId;
	private $_createdOn;
	private $_updatedOn;
	private $_status;
	 
	/**
	 * @return the $_id
	 */
	public function getId() {
		return $this->_id;
	}

	/**
	 * @param field_type $_id
	 */
	public function setId($_id) {
		$this->_id = $_id;
	}

	/**
	 * @return the $_name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @return the $_userId
	 */
	public function getUserId()
	{
		return $this->_userId;
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
	 * @return the $_status
	 */
	public function getStatus()
	{
		return $this->_status;
	}

	/**
	 * @param field_type $_name
	 */
	public function setName($_name)
	{
		$this->_name = $_name;
	}

	/**
	 * @param field_type $_userId
	 */
	public function setUserId($_userId)
	{
		$this->_userId = $_userId;
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

	/**
	 * @param field_type $_status
	 */
	public function setStatus($_status)
	{
		$this->_status = $_status;
	}

        /* function addCategory to add the category in database */
        public function displayCategory()
        {
            //$this->setUserId($_SESSION['userId']);
            //$userId = $this->getUserId();
            //$this->setStatus('A');
            //$status = $this->getStatus();
	   
	    $userId = 4;
            $status = 'A';
	    	$data['columns'] = array('name');
            $data['tables'] = 'category';
            $data['conditions'] = array(array('user_id = '.$userId.' And status ="'.$status.'"'),true);
            $result = $this->_db->select($data);
            $myResult=array();
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $myResult[] = $row;
            }
            if(count($myResult) > 0)
            {
                return $myResult;
            }
            else
            {
                return;
            }
        }
	 
	/* function addCategory to add the category in database */
	public function addCategory()
	{
            $this->setName($_POST['categoryName']);
            $categoryName = $this->getName();
            $this->setUserId($_SESSION['userId']);
            $userId = $this->getUserId();
            $this->setStatus('A');
            $status = $this->getStatus();
	    //$categoryName="c#";
	    //$userId = 2;
        //$status = "A";
	    $data['columns'] = array('name');
            $data['tables'] = 'category';
            $data['conditions'] = array(array('name ="'.$categoryName.'" And user_id = '.$userId.' And status ="'.$status.'"'),true);
            $result = $this->_db->select($data);
            $myResult=array();
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $myResult[]=$row;
            }
	    if(count($myResult) > 0)
            {
	 	return "error";
            }
            else
            {
	 	$insertValue = array('name'=>$categoryName,'user_id'=>$userId,'created_on'=>date('Y-m-d h:i:s', time()));
	 	$this->_db->insert($data['tables'],$insertValue);	
	 	return $categoryName;
            }
		 
	}
	 
	/* function updateCategory to update the category which is allready exist
	 * on the basis of categoty name, userId
	*/
	public function updateCategory()
	{
		// $this->setName($_POST['name']);
		//$categoryName = $this->getName($_POST['name']);
		// $this->setUserId($_SESSION['userId']);
		 //$userId = $this->getUserId();
		 
		// $this->setId($_id);
		// $id = $this->getId();
		//$oldCategoryName = $_POST['hiideninputfield'];
		$oldCategoryName = 'c#';
		$userId = 2;
		$categoryName = 'C sharp';
		$exist=false;
		
		 $data['columns'] = array('id');
		 $data['tables'] = 'category';
		 $data['conditions'] = array(array('name = "'.$oldCategoryName.'" AND user_id = '.$userId),true);
		 $result = $this->_db->select($data);
		 $myResult=array();
		 
		 while($row = $result->fetch(PDO::FETCH_ASSOC))
		 {
		 	$myResult[] = $row;
		 }
		 echo "<pre>";
		 print_r($myResult);
		 	
// 		 $this->setId($myResult[0]['id']);
// 		 $categoryId = $this->getId();
		 $categoryId = $myResult[0]['id'];
		 $data['columns'] = array('name');
		 $data['conditions'] = array(array('name = "'.$categoryName.'" AND user_id = '.$userId),true);
		 $result = $this->_db->select($data);
		 $myResult=array();
		 	
		 while($row = $result->fetch(PDO::FETCH_ASSOC))
		 {
		 	$myResult[] = $row;
		 			 	if($row['name'] == $categoryName)
		 				 	{
		 				 		$exist = true;
		 				 	}
		 		}
		 if($exist)
		 {
		 	return "error";
		 }
		 else
		 {
		 	$updateValue = array('name'=>$categoryName);
		 	$updateCondition = array('id'=>$categoryId,'user_id'=>$userId);
		 	$this->_db->update($data['tables'],$updateValue,$updateCondition);
		 	return $categoryName;
		 }
		 
	}
	 
	/* function deleteCategory used to delete the category from database
	 * on he basis of userId,nameand current status
	*/
	public function deleteCategory()
	{
            // $this->setName($_POST['name']);
            // $categoryName = $this->getName();
            // $this->setUserId($_SESSION['userId']);
            // $userId = $this->getUserId();
            //$this->setStatus('D');
            //$status = $this->getStatus();
             $categoryName='java';
             $userId =1;
             $data['tables'] = 'category';
             $status = 'D';
             $deleteValue = array('status'=>$status);
             $deleteCondition = array('name'=>$categoryName,'user_id'=>$userId);
             $this->_db->update($data['tables'],$deleteValue,$deleteCondition);
             $returnResult = $this->displayCategory();
             return $returnResult;    
	}
}