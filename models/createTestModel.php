<?php
require_once './libraries/DBconnect.php';
class CreateTest extends DBConnection
{
	protected $_id;
	protected $_name;
	protected $_categoryId;
	protected $_userId;
	protected $_noOfQuestions;
	protected $_random;
	protected $_testCategories;
	

	/**
	 * @return the $_Id
	 */
	public function getId() {
		return $this->_id;
	}

	/**
	 * @return the $_Name
	 */
	public function getName() {
		return $this->_name;
	}

	/**
	 * @return the $_categoryId
	 */
	public function getCategoryId() {
		return $this->_categoryId;
	}

	/**
	 * @return the $_userId
	 */
	public function getUserId() {
		return $this->_userId;
	}

	/**
	 * @return the $_noOfQuestions
	 */
	public function getNoOfQuestions() {
		return $this->_noOfQuestions;
	}

	/**
	 * @return the $_random
	 */
	public function getRandom() {
		return $this->_random;
	}

	/**
	 * @param field_type $_Id
	 */
	public function setId($_Id) {
		$this->_id = $_Id;
	}

	/**
	 * @param field_type $_Name
	 */
	public function setName($_Name) {
		$this->_name = $_Name;
	}

	/**
	 * @param field_type $_categoryId
	 */
	public function setCategoryId($_categoryId) {
		$this->_categoryId = $_categoryId;
	}

	/**
	 * @param field_type $_userId
	 */
	public function setUserId($_userId) {
		$this->_userId = $_userId;
	}

	/**
	 * @param field_type $_noOfQuestions
	 */
	public function setNoOfQuestions($_noOfQuestions) {
		$this->_noOfQuestions = $_noOfQuestions;
	}

	/**
	 * @param field_type $_random
	 */
	public function setRandom($_random) {
		$this->_random = $_random;
	}
	public function fetchCategories()
	{
		$data['columns']	= array('id','name');
		$data['tables']		= 'category';
		$data['conditions']=array(array('user_id ="'.$this->_userId.'"'),true);
		 $result=$this->_db->select($data);
		 $temp=array();
		 while($row=$result->fetch(PDO::FETCH_ASSOC))
		 	foreach ($row as $key=>$values)
		 	$temp[]=$values;
		 return $temp;
	}
	
	public function fetchTestQuestionCategories($testId)
	{
	    $data['columns']	= array('category_id','no_of_questions');
	    $data['tables']		= 'test_question_category';
	    $data['conditions']=array(array('test_id ="'.$testId.'" AND status="1"'),true);
	    $result=$this->_db->select($data);
	    return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function addTest()
	{
		$userId=1;
		return $this->_db->insert('test', array('id' => '', 'name' => $this->_name,'category_id'=>$this->_categoryId,'no_of_questions'=>$this->_noOfQuestions,'user_id'=>$userId));
	
	
	}
	
	
	public function addTestCategories()
	{
		$data['columns']	= array('id');
		$data['tables']		= 'test';
		$data['conditions']=array(array('name ="'.$this->_name.'" AND status="1"' ),true);
		$result=$this->_db->select($data);
	
		$row=$result->fetch(PDO::FETCH_ASSOC);print_r($row);
		return $this->_db->insert('test_question_category', array('id' => '', 'test_id' => $row['id'],'category_id'=>$this->_categoryId,'no_of_questions'=>$this->_noOfQuestions));
	}
	
	public function availableTestName()
	{
		//print_r($testName);
		$data['columns']	= array('id');
		$data['tables']		= 'test';
		$data['conditions']=array(array('name ="'.$this->_name.'" AND status="1"'),true);
		$result=$this->_db->select($data);
	
		$row=$result->fetch(PDO::FETCH_ASSOC);
	
	
		if(empty($row))
	
			return 1;
		else
			return 0;
	
	
	}
	
	public function fetchTests()
	{
		$data['columns']	= array('name','id');
		$data['tables']		= 'test';
		$data['conditions']=array(array('user_id ="'.$this->_userId.'" AND status="1"'),true);
		return $result=$this->_db->select($data);
	}
	 
	public function testDetail($testId)
	{
		$data['columns']	= array('id','name','category_id');
		$data['tables']		= 'test';
		$data['conditions']=array(array('id ="'.$this->_id.'" AND status="1"'),true);
		return $result=$this->_db->select($data);
	}
	 
	public function questioncategory()
	{
		$data['columns']	= array('category_id');
		$data['tables']		= 'test_question_category';
		$data['conditions']=array(array('test_id ="'.$this->_id.'" AND status="1"'),true);
		return $result=$this->_db->select($data);
	
	}
	public function updateTest()
	{	
		$userId=1;
		$data=array('name' => $this->_name,'category_id'=>$this->_categoryId,'no_of_questions'=>$this->_noOfQuestions,'user_id'=>$userId);
		$where=array('id'=>$this->_id);
		$this->_db->update('test',$data,$where);
		$data=array('status'=>'0');
		$where=array('test_id'=>$this->_id);
		$this->_db->update('test_question_category',$data,$where);
	}
	
	public function updateCategories()
	{
		
	}
	public function fetchName()
	{
		$data['columns']	= array('name');
		$data['tables']		= 'test';
		$data['conditions']=array(array('id ="'.$this->_id.'" AND status="1"'),true);
		 $result=$this->_db->select($data);
		 $row=$result->fetch(PDO::FETCH_ASSOC);
		 return $row['name'];
	}
	
	public function noOfQuestion()
	{
		$data['columns']	= array('no_of_questions');
		$data['tables']		= 'test';
		$data['conditions']=array(array('id ="'.$this->_id.'" AND status="1"'),true);
		$result=$this->_db->select($data);
		$row=$result->fetch(PDO::FETCH_ASSOC);
		return $row['no_of_questions'];
	}
	
	
	public function removeTest()
	{
		$data=array('status'=>'0');
		$where=array('id'=>$this->_id);
		$this->_db->update('test',$data,$where);
	}
	 

}
