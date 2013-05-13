<?php
/*
 **************************** Creation Log *******************************
File Name                   -  TestController.php
Project Name                -  SkillSeeker
Description                 -  Controller File For test
Version                     -  1.0
Created by                  -  Avni Jain
Created on                  -  May 7, 2013
***************************** Update Log ********************************
Sr.NO.		Version		Updated by           Updated on          Description
1            1.0        Mohit Gupta        	 May 10, 2013        Added Link Manipulation Methods
2            1.0        Prateek Saini        May 11, 2013        Added Methods for Taking Test 
-------------------------------------------------------------------------
*/
require_once './libraries/EncryptionDecryption.php';
require_once './libraries/Mail.php';


require_once  SITE_PATH.'/libraries/Language.php';
require_once './models/csvModel.php';
require_once  SITE_PATH.'/models/createTestModel.php';
require_once  SITE_PATH.'/models/UserTestResult.php';




class TestController extends AController {
	
	public function loadView()
	{
	   // print_r($_REQUEST);die;
	    require_once(SITE_PATH.$_REQUEST['page']);
	}	
	/**
	 *@author anirudh
	 *All the after login procedure goes here 
	 *Currently which panel to show that code goes here
	 */
	public function process() {
		if ($_SESSION ['userType'] == 'test') {
			
			$this->showView('/views/userpage.php');			
		} elseif ($_SESSION ['userType'] == 'TestTaker') {
			$this->showView('/views/TestTakerMain.php');					
		} else {
			$this->showView('/views/AdminPanel.php');
		}
	}
	/* 
	 * 
	 * created by-------Mohit Gupta
	 * This function is responsible to save setting  for a test in database.
	 * These settings are useful when test is started.
	*/
	
	public function handleassignTest()
	{
		 
	
		require_once './models/Assign.php';
		$_objCategory = new Assign();
		 
		if(method_exists($_objCategory,'AssignTest'))
		{
			/*Next 4 lines are used for creating hashed link url*/
			   
			$obj_EncryptionDecryption= new EncryptionDecryption();
			$_objCategory->setTest_id("1");
			$_objCategory->setStart_time($_POST['start_time']);
			 
				
			$id=$obj_EncryptionDecryption->encode($_objCategory->getTest_id());
			$time=$obj_EncryptionDecryption->encode($_objCategory->getStart_time());
			
			$test_link="http://www.skillseeker.com/online-test/start/?id=".$id."&time=".$time;
			$_POST['test_link']=$test_link; 
			
			
			$returnValue = $_objCategory->AssignTest(); // call the addCategory of Category.php
			if($returnValue )
			{
				die("Test assigned Sucessfully.");
			}
			else
			{
				die("Test not assigned.Check it out.");
			}
		}
		else
		{
			die("Method ". $methodName." doesn't exist ");
		}
	}
	
	
	public function handleassignLink()
	{
			
	
		require_once './models/Assign.php';
		$_objCategory = new Assign();
			
		if(method_exists($_objCategory,'assignLink'))
		{
			
			$mailer = new Mailer();
			$email_array=explode(",",$_POST['emails']);
			$count=count($email_array);
			for($i=0;$i<$count;$i++)
			{
				$returnValue = $_objCategory->assignLink($email_array[$i]);
				$mailer->sendMail($email_array[$i],$_objCategory->getTest_link());
					 
							
			}
			
			if($returnValue )
			{
				die("Link assigned Sucessfully.");
			}
			else
			{
				die("Link not assigned.Check it out.");
			}
		}
		else
		{
			die("Method ". $methodName." doesn't exist ");
		}
	}
	
	public function handleFetchLink()
	{	
		$value=$_REQUEST['test_id'];
		require_once './models/Assign.php';
		$_objCategory = new Assign();
			
		if(method_exists($_objCategory,'fetchLink'))
		{
			$returnValue = $_objCategory->fetchLink($value);
			if($returnValue )
			{
				die($returnValue['test_link']);
			}
		}
		else
		{
			die("Method ". $methodName." doesn't exist ");
		}
	}
	
	
	
	
	/********** This function is responsible for uploading csv file onto database.
	It returns error message to the view page in case of inappropriate format in csv file in any line*************/ 
	function upload() 
	{
		if(isset($_SESSION['lang'])){
			$langType=$_SESSION['lang'];
		}
		else
		{
			$langType='en';
		}
		
		
		include './languages/lang.'.$langType.".php";
		
		$lang = new Language($langArr);
		
		/********************** Creation of Model object that is used for insertion of question onto the database*************/ 
		$objcsvModel=new csvModel();
		/********************************** if uploaded file type is csv***********************************************************/
		if($_FILES['questionbank']['type'] == "text/csv")
		{
			
			if(isset($_FILES['questionbank']) && $_FILES['questionbank']['size'] > 0)
			{
				
				$fileName = $_FILES['questionbank']['name'];
				$tmpName  = $_FILES['questionbank']['tmp_name'];
				$fileSize = $_FILES['questionbank']['size'];
				$fileType = $_FILES['questionbank']['type'];
				$chk_ext = explode(".",$fileName);
				$error=""; //string for eeror message
				$row=0;	   //for the count of the number of rows in csv file
				/********* opening the uploaded Csv file in read mode*********************************/
				$handle = fopen($tmpName, "r");
				/******************** reading the csv file line by line*******************************/
				while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
		
					if($row>0)
					{
						$num = count($data);
						//echo $num;die;
						if($num==9) {
							//print "ok";die;
								$id=htmlentities($data[8]);
								$ques=htmlentities($data[0]);
								$opt1=htmlentities($data[1]);
								$opt2=htmlentities($data[2]);
								$opt3=htmlentities($data[3]);
								$opt4=htmlentities($data[4]);
								$opt5=htmlentities($data[5]);
								$ans=htmlentities($data[6]);
								$type=htmlentities($data[7]);
								//$ansarray=array(1,2,3,4,5); // array for options
								if($type=="objective") {
									$quesType=2;
									/*************** check for number of options************/
									if(empty($opt3)&&empty($opt4)&&empty($opt5)) {
										$error.="$lang->ERROR2 .".$row;
										echo $error;
										continue;
									}
									/*if(!in_array($ans,$ansarray)) {
										$error.="$lang->ERROR7.".$row;
										echo $error;
										continue;
									}*/
								}
								else if($type=="true/false") {
									$quesType=1;
									/********************* true/false option validation************************************/
									if(!empty($opt3)&&!empty($opt4)&&!empty($opt5)) {
										$error.="$lang->ERROR3.".$row;
										echo $error;
										continue;
									}
									if($opt1!="true"||$opt1="false"||$opt2!="true"||$opt3="false") {
										$error.="$lang->ERROR4.".$row;
										echo $error;
										continue;
									}
								}
								else {
									$error.="$lang->ERROR5.".$row;
									continue;
								}
								$coloumn=array("name","id");
								$condition=array("id",$id);
								/************* geeting the category id by using model select function*******************/
								$result=$objcsvModel->select("category",$coloumn,$condition);
								$cname=$result[0]['name'];
								$cid=$result[0]['id'];
								/************inserting the question in database by using model insert function************************/
								$condition=array('category_id'=>$cid,'question_name'=>$ques,'answer'=>$ans,'question_type'=>$quesType,'status'=>'1','created_on'=>date('Y-m-d h:i:s', time()));
								$objcsvModel->insert("question_bank",$condition);
								
							$coloumn=array("id");
							$condition=array("question_name","$ques");
		 					$result=$objcsvModel->select("question_bank",$coloumn,$condition);
		 					
		 					$qid=$result[0]['id'];
		 					echo $qid;
							/************inserting the option in database by using model insert function********************/
		 					$condition=array('name'=>$opt1,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					$condition=array('name'=>$opt2,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					$condition=array('name'=>$opt3,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					if(!empty($opt4)) {
		 					$condition=array('name'=>$opt4,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					}
		 					if(!empty($opt5)) {
		 					$condition=array('name'=>$opt5,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					}
							
						}
						else {
						/*************** if number of values are not vaild in csv*************************/
							$error="$lang->ERROR8 .".$row;
							continue;
						}
					}
					$row++; //incrementing the number of rows
				}
			}
		}
		else {
			$error=$lang->ERROR6;
		}
		if($error!="") 
		{
			// to send error back to the view page(upload.php) ,if Exists.
			header("Location:".SITE_URL."/views/upload.php?cid=$error");
		}

	}
	function selectCategory() {
		echo "djfjksd";
	    $coloumn=array("name","id");
	    $condition=array("1","1");
	    $objcsvModel=new csvModel();
	    $result=$objcsvModel->select("category",$coloumn,$condition);
	    //$cname=$result[0]['name'];
	    //$cid=$result[0]['id'];
	    $a ="";
	
	    for($i =0 ; $i< count($result) ;$i ++)
	    {
	    $a.="<option value='".$result[$i]['id']."'>".$result[$i]['name'] ."</option>";
        }
	        die($a);
	        //print_r($a);die;
	        //die($a);
	}
	function createQues() {
		echo "<pre>";
		print_r ( $_POST );
		$objcsvModel = new csvModel ();
		$opArray = $_POST ['opt'];
		if (! in_array ( "on", $opArray )) {
			header ( "Location:" . SITE_URL . "/views/createtest.php?cid='plz check value'" );
		}
		if ($_POST ['questype'] == "objective") {
			$quesType = 2;
		} else {
			$quesType = 1;
		}
		for($i = 0; $i < count ( $_POST ['opt'] ); $i++) {
			if ($_POST ['opt'] [$i] == "on") {
				$ans = $_POST ['opt'] [$i - 1];
			}
		}
		$condition = array ('category_id' => $_POST ['category'], 'question_name' => $_POST ['question'], 'answer' => $ans, 'question_type' => $quesType, 'status' => '1', 'created_on' => date ( 'Y-m-d h:i:s', time () ) );
		$objcsvModel->insert ( "question_bank", $condition );
		$coloumn = array ("id" );
		$condition = array ("question_name", $_POST ['question'] );
		$result = $objcsvModel->select ( "question_bank", $coloumn, $condition );
		
		$qid = $result [0] ['id'];
		
		for($i = 0; $i < count ( $_POST ['opt'] ); $i++) {
			if ($_POST ['opt'] [$i] != "on") {
				$condition = array ('name' => $_POST ['opt'] [$i], 'question_id' => $qid, 'created_on' => date ( 'Y-m-d h:i:s', time () ) );
				$objcsvModel->insert ( "options", $condition );
			}
		}
		header ( "Location:" . SITE_URL . "/views/createtest.php?cid='Your question has been saved'" );
	}
    
     /**
     * *** This function will be called after user click on start test ****
     */

    public function takeTest() {
        $objcsvModel = new csvModel ();
        $objUserTestResult = new UserTestResult();
        
        $_POST ['firstName'] = 'firstName';
        $objUserTestResult->setFirstName($_POST ['firstName']);
        $_POST ['lastName'] = 'lastName';
        $objUserTestResult->setLastName($_POST ['lastName']);
        $_POST ['email'] = 'test@1234.com';
        $objUserTestResult->setEmailAddress($_POST ['email']);

        echo "<pre/>";
/* This section of code will verify user eligibility
 * {
 * 		$coloumn = array("link");
 * 		$condition=array("email_address = \"$_POST[email]\"");
 * 		//print_r($condition);
 * 		//die;
 * 		$result = $objcsvModel->fetchData("assign_details",$coloumn,$condition);
 *      if($link == $result['link'] ){
 *      }
 * }
 */
        $testId = 1;
        $objUserTestResult->setTestId($testId);
        $objcreateTestModel = new CreateTest();
        
        /* This will fetch all the categories and their question from DB*/
        $result = $objcreateTestModel->fetchTestQuestionCategories($testId);
        
        $objcreateTestModel->setId($testId);        
        
        $totalQuestion = $objcreateTestModel->noOfQuestion();
        $questionCount = 0;
        $category = array();
        $categoryQuestionsCount = array();
        $questions = array();
        $userQuestions = array();
        $userQuestionsID = array();
        $userQuestionsAnswers = array();
        
        /* Count the number of questions */
        foreach($result as $key => $value){
            $category[] = $value['category_id'];
            $categoryQuestionsCount[] = $value['no_of_questions'];
            $questionCount += $value['no_of_questions'];
        }
        
        //print($totalQuestion);
        
                
        if($totalQuestion == $questionCount){
            $column = array("id","question_name","answer");
            $inColumn = array("id","name");
            
            
            foreach($category as $key => $value){
                $condition = array("category_id = $value");
                $tempQuestions = $objcsvModel->fetchData('question_bank', $column, $condition);
                
                foreach($tempQuestions as $inKey => $inValue){
                    $inCondition = array("question_id = $inValue[id]");
                    $tempOptions = $objcsvModel->fetchData("options", $inColumn, $inCondition);
                    shuffle($tempOptions);                    
                    $tempQuestions[$inKey] += array("options" => $tempOptions); 
                }
                
                shuffle($tempQuestions);
                $questions[] = $tempQuestions;
            }
            
            foreach($questions as $key => $value ){
                $userQuestions[] = array_rand($value,$categoryQuestionsCount[$key]);
            }
            
            
            
//            $condition = array("category_id = $category[0]");
//            $questions = $objcsvModel->fetchData('question_bank', $column, $condition);

            foreach($userQuestions as $key => $value){
                foreach($value as $inKey => $inValue){
                    $userQuestionsID[] = $questions[$key][$inValue]['id'];
                    $userQuestionsAnswers[] = $questions[$key][$inValue]['answer'];
                }
            }
            if(count($userQuestionsID) == $totalQuestion){
                $objUserTestResult->setQuestions( implode(',', $userQuestionsID) );
                $objUserTestResult->setCorrectAnswers(implode(',', $userQuestionsAnswers));
                $dateTime = new DateTime();
                $objUserTestResult->setCreatedOn($dateTime->format("Y-m-d G:i:s"));
            }
            /* Following line will insert user
             * first name
             * last name
             * email
             * questions allocated
             * answers
             * total marks
             *  
             */
            $objUserTestResult->insertIntoTest();
            
//            print_r($userQuestions);
//            print_r($userQuestionsID);
//            print_r($userQuestionsAnswers);
//            print_r($questions);
//           print_r($category);
//           print_r($categoryQuestions);
//            echo "yes";
        }
        
		print_r($result);
//		print($questionCount);
		die;
	}
}