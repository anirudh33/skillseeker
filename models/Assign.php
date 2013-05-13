<?php
require_once './libraries/DBconnect.php';
class Assign extends DBConnection {
	
		private $_id;
		private $_test_id;
		private $_start_time;
		private $_test_duration;
		private $_instruction;
		private $_passing_marks;
		private $_per_page_question;
		private $_test_link;
		private $_go_back;
		private $_link_expiration_time;
		private $_question_order;
		private $_user_result_type;
		private $_admin_result_type;
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
	 * @return the $_test_id
	 */
	public function getTest_id() {
		return $this->_test_id;
	}

		/**
	 * @return the $_start_time
	 */
	public function getStart_time() {
		return $this->_start_time;
	}

		/**
	 * @return the $_test_duration
	 */
	public function getTest_duration() {
		return $this->_test_duration;
	}

		/**
	 * @return the $_instruction
	 */
	public function getInstruction() {
		return $this->_instruction;
	}

		/**
	 * @return the $_passing_marks
	 */
	public function getPassing_marks() {
		return $this->_passing_marks;
	}

		/**
	 * @return the $_per_page_question
	 */
	public function getPer_page_question() {
		return $this->_per_page_question;
	}

		/**
	 * @return the $_test_link
	 */
	public function getTest_link() {
		return $this->_test_link;
	}

		/**
	 * @return the $_go_back
	 */
	public function getGo_back() {
		return $this->_go_back;
	}

		/**
	 * @return the $_link_expiration_time
	 */
	public function getLink_expiration_time() {
		return $this->_link_expiration_time;
	}

		/**
	 * @return the $_question_order
	 */
	public function getQuestion_order() {
		return $this->_question_order;
	}

		/**
	 * @return the $_user_result_type
	 */
	public function getUser_result_type() {
		return $this->_user_result_type;
	}

		/**
	 * @return the $_admin_result_type
	 */
	public function getAdmin_result_type() {
		return $this->_admin_result_type;
	}

		/**
	 * @return the $_createdOn
	 */
	public function getCreatedOn() {
		return $this->_createdOn;
	}

		/**
	 * @return the $_updatedOn
	 */
	public function getUpdatedOn() {
		return $this->_updatedOn;
	}

		/**
	 * @return the $_status
	 */
	public function getStatus() {
		return $this->_status;
	}

		/**
	 * @param field_type $_id
	 */
	public function setId($_id) {
		$this->_id = $_id;
	}

		/**
	 * @param field_type $_test_id
	 */
	public function setTest_id($_test_id) {
		$this->_test_id = $_test_id;
	}

		/**
	 * @param field_type $_start_time
	 */
	public function setStart_time($_start_time) {
		$this->_start_time = $_start_time;
	}

		/**
	 * @param field_type $_test_duration
	 */
	public function setTest_duration($_test_duration) {
		$this->_test_duration = $_test_duration;
	}

		/**
	 * @param field_type $_instruction
	 */
	public function setInstruction($_instruction) {
		$this->_instruction = $_instruction;
	}

		/**
	 * @param field_type $_passing_marks
	 */
	public function setPassing_marks($_passing_marks) {
		$this->_passing_marks = $_passing_marks;
	}

		/**
	 * @param field_type $_per_page_question
	 */
	public function setPer_page_question($_per_page_question) {
		$this->_per_page_question = $_per_page_question;
	}

		/**
	 * @param field_type $_test_link
	 */
	public function setTest_link($_test_link) {
		$this->_test_link = $_test_link;
	}

		/**
	 * @param field_type $_go_back
	 */
	public function setGo_back($_go_back) {
		$this->_go_back = $_go_back;
	}

		/**
	 * @param field_type $_link_expiration_time
	 */
	public function setLink_expiration_time($_link_expiration_time) {
		$this->_link_expiration_time = $_link_expiration_time;
	}

		/**
	 * @param field_type $_question_order
	 */
	public function setQuestion_order($_question_order) {
		$this->_question_order = $_question_order;
	}

		/**
	 * @param field_type $_user_result_type
	 */
	public function setUser_result_type($_user_result_type) {
		$this->_user_result_type = $_user_result_type;
	}

		/**
	 * @param field_type $_admin_result_type
	 */
	public function setAdmin_result_type($_admin_result_type) {
		$this->_admin_result_type = $_admin_result_type;
	}

		/**
	 * @param field_type $_createdOn
	 */
	public function setCreatedOn($_createdOn) {
		$this->_createdOn = $_createdOn;
	}

		/**
	 * @param field_type $_updatedOn
	 */
	public function setUpdatedOn($_updatedOn) {
		$this->_updatedOn = $_updatedOn;
	}

		/**
	 * @param field_type $_status
	 */
	public function setStatus($_status) {
		$this->_status = $_status;
	}


	public function AssignTest()
	{
		$this->setAdmin_result_type($_POST['admin_view_type']);
    	$this->setGo_back($_POST['go_back']);
    	$this->setInstruction($_POST['instruction']);
    	$this->setLink_expiration_time($_POST['expire_time']);
    	$this->setPassing_marks($_POST['passing_marks']);
    	$this->setPer_page_question($_POST['number_of_question']);
    	$this->setQuestion_order($_POST['random']);
    	$this->setStatus('A');
    	$this->setTest_duration($_POST['test_duration']);
    	$this->setUser_result_type($_POST['user_result_type']);
    	$this->setTest_link($_POST['test_link']);
		
		 $data['tables'] = 'test_details';
		 $insertValue = array('test_id'=>$this->getTest_id(),
		 		'admin_result_type_id'=>$this->getAdmin_result_type(),
		 		'user_result_type_id'=>$this->getUser_result_type(),
		 		'test_duration'=>$this->getTest_duration(),
		 		'test_start_time'=>$this->getStart_time(),
		 		'go_back'=>$this->getGo_back(),
		 		'passing_marks'=>$this->getPassing_marks(),
		 		'instructions'=>$this->getInstruction(),
		 		'link_expire_time'=>$this->getLink_expiration_time(),
		 		'per_page_question'=>$this->getPer_page_question(),
		 		'question_order'=>$this->getQuestion_order(),
		 		'status'=>$this->getStatus(),
		 		'test_link'=>$this->getTest_link(),
		 		'created_on'=>date('Y-m-d h:i:s', time()));
		 $this->_db->insert($data['tables'],$insertValue);
		 return "true";
	}

	public function fetchLink($test_id)
	{
		$this->setTest_id($test_id);
		$data['columns']	= array('test_link');
		$data['tables'] = 'test_details';
		$data['conditions']=array(array('test_id ="'.$this->getTest_id().'"'),true);
		$result=$this->_db->select($data);
		$row=$result->fetch(PDO::FETCH_ASSOC);
		return $row;
		 
	}
	

	public function assignLink($email)
	{
		
		
		$this->setTest_link($_POST['link']);
		$email_array=explode(",",$_POST['emails']);
		$data['tables'] = 'assign_details';
		 $count=count($email_array);
		 $insertValue = array('link'=>$this->getTest_link(),
		 		'email_address'=>$email,'status'=>'1',
		 		'created_on'=>date('Y-m-d h:i:s', time()));
		 $this->_db->insert($data['tables'],$insertValue);
		return true;
			
	}
	
	
}

?>