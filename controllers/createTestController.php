<?php
require_once  SITE_PATH.'/models/createTestModel.php';
require_once SITE_PATH.'/libraries/validate.php';
class AddTest
{	private $_obj;
	public function __construct()
	{ 
		$this->_obj=new CreateTest();
	}
	

	public function fetchCategories()
	{
		$userId=1;
		$this->_obj->setUserId($userId);
		$result=$this->_obj->fetchCategories();
		echo json_encode($result);die;
// 		require_once SITE_PATH."/views/testingtest.php";?
	}
	
	public function addTestController()
	{
		$obj = new validate();
		$testName=$_POST['testName'];
		$testCategoryId=$_POST['categoryId'];
		$userId=1;
		
		$obj->validator("Name",$testName, 'required#alphanumeric#maxlength=25','Name Required#Name should only contain alphanumeric values#Name should not be more than 25 chracter long');
		
		// $testDuration=$_POST['testDuration'];
		if(!empty($_POST['random1'])){
			$totalNoOfquestion=$_POST['random1'];
			$obj->validator("Total no of questions",$totalNoOfquestion, 'required#numeric','Total_no_of_questions Required#Total_no_of_questions Must be numeric');
			$error=$obj->result();
            
            if (!array_filter($error,'trim')){
			$this->_obj->setName($testName);
			$this->_obj->setNoOfQuestions($totalNoOfquestion);
			$this->_obj->setUserId($userId);
			$this->_obj->setCategoryId($testCategoryId);
			$reslut=$this->_obj->addTest();
			$count=count($_POST['categories1']);
			$extra=$totalNoOfquestion%$count;
			$noOfQues=$totalNoOfquestion/$count;
			for ($i=0;$i<$count;$i++)
			{	if($i==$count-1)
				$noOfQues+=$extra;
			
			$this->_obj->setCategoryId($_POST['categories1'][$i]);
			$this->_obj->setNoOfQuestions($noOfQues);
				$this->_obj->addTestCategories();
			}
	
	
			}
			else{
				print_r($error);die;
			}
		
		}
			else
			{
			$totalNoOfquestion=0;
			foreach($_POST['random2'] as $key=>$values){
				$obj->validator("Total no of questions",$values, 'numeric','Total_no_of_questions Must be numeric');
			}
			$error=$obj->result();
			
			if (!array_filter($error,'trim')){
				$totalNoOfquestion=array_sum($_POST['random2']);
                echo $totalNoOfquestion;
				$this->_obj->setName($testName);
				$this->_obj->setNoOfQuestions($totalNoOfquestion);
				$this->_obj->setUserId($userId);
				$this->_obj->setCategoryId($testCategoryId);
				$reslut=$this->_obj->addTest();
				foreach($_POST['random2'] as $key=>$values)
				{
					$this->_obj->setCategoryId($_POST['categories2'][$key]);
					$this->_obj->setNoOfQuestions($values);
				$this->_obj->addTestCategories();
			}
	
			}
			else{
				print_r($error);die;
			}
			}
	      
	}
	
	
	
	public function showTestsDetail()
	{ $testId=$_REQUEST['testId'];
	//     	echo "dsafcvsdafcdsafdsfsd";
	$this->_obj->setId($testId);
	$result=$this->_obj->testDetail();
	$temp=array();
	$row = $result->fetch(PDO::FETCH_ASSOC);
	
	$temp[]=$row['name'];
	
	
	
	
	
	echo json_encode($temp);
	
	}
	public function fetchAlltests()
	{
	//echo "hii ";
	$userId=$_POST['userId'];
	$this->_obj->setUserId($userId);
	$result=$this->_obj->fetchTests();
		$tmp=array();$i=0;
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{	foreach($row as $key=>$values)
		{
		$tmp[]=$values;
	}
	}
	echo json_encode($tmp);die;
	//     	print_r($result->fetch(PDO::FETCH_ASSOC));die;
	//     	require_once SITE_PATH."/views/tests.php";
	}
	
	public function testNameAvailability()
	{
	$testName=$_REQUEST['testName'];
	$this->_obj->setName($testName);
	echo $this->_obj->availableTestName();
	
	
	}
	public function fetchTestName()
	{
		$testId=$_REQUEST['testId'];
		$this->_obj->setId($testId);
		echo $this->_obj->fetchName();
		
		
	}
	public function editTest()
	{
		$testName=$_POST['testName'];
		$testCategoryId=$_POST['categoryId'];
		$this->_obj->setId($_REQUEST['testId']);
		$userId=1;
		// $testDuration=$_POST['testDuration'];
		if(!empty($_POST['random1'])){
			$totalNoOfquestion=$_POST['random1'];
			$this->_obj->setName($testName);
			$this->_obj->setNoOfQuestions($totalNoOfquestion);
			$this->_obj->setUserId($userId);
			$this->_obj->setCategoryId($testCategoryId);
			$reslut=$this->_obj->updateTest();
			
			$count=count($_POST['categories1']);
			$extra=$totalNoOfquestion%$count;
			$noOfQues=$totalNoOfquestion/$count;
			for ($i=0;$i<$count;$i++)
			{	if($i==$count-1)
				$noOfQues+=$extra;
					
				$this->_obj->setCategoryId($_POST['categories1'][$i]);
				$this->_obj->setNoOfQuestions($noOfQues);
// 				$this->_obj->addTestCategories();
			}
		
		
			}
			else
			{
				$totalNoOfquestion=0;
				foreach($_POST['random2'] as $key=>$values)
					$totalNoOfquestion+=$values;
					echo $totalNoOfquestion;
					$this->_obj->setName($testName);
					$this->_obj->setNoOfQuestions($totalNoOfquestion);
					$this->_obj->setUserId($userId);
					$this->_obj->setCategoryId($testCategoryId);
					$reslut=$this->_obj->updateTest();
					foreach($_POST['random2'] as $key=>$values)
					{
					$this->_obj->setCategoryId($_POST['categories2'][$key]);
					$this->_obj->setNoOfQuestions($values);
// 					$this->_obj->addTestCategories();
				}
		
				}
				
				header('location:./views/createtest.php');
		
		
	}
	public function fetchQuestionCategory()
	{
		$this->_obj->setId($_REQUEST['testId']);
		$result=$this->_obj->questioncategory();
		$tmp=array();
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{	foreach($row as $key=>$values)
		{
			$tmp[]=$values;
		}
		}
		echo json_encode($tmp);die;
	}
	public function fetchNoOfQuestion()
	{
		$this->_obj->setId($_REQUEST['testId']);
		echo $this->_obj->noOfQuestion();
	}
	public function deleteTest()
	{    
		$this->_obj->setId($_REQUEST['testId']);
		$this->_obj->removeTest();
	}
}