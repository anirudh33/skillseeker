<?php
require_once './libraries/EncryptionDecryption.php';
require_once './libraries/Mail.php';


/*
    **************************** Creation Log *******************************
    File Name                   -  lang.en.php
    Project Name                -  ExamGenerator
    Description                 -  Controller File For test
    Version                     -  1.0
    Created by                  -  Avni Jain 
    Created on                  -  May 03, 2013
*/

require_once  '/var/www/skillseeker/trunk/libraries/Language.php';
require_once './models/csvModel.php';
class TestController {
	
	public function loadView()
	{
	   // print_r($_REQUEST);die;
	    require_once(SITE_PATH.$_REQUEST['page']);
	}
	public function process()
	{
		require_once(SITE_PATH."/views/userheader.php");
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
			$id=$obj_EncryptionDecryption->encode($this->getTest_id());
			$time=$obj_EncryptionDecryption->encode($this->getStart_time());
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
					$mailer->sendMail($email_array[$i],$this->getTest_link());
			
			}
			
			$returnValue = $_objCategory->assignLink(); // call the addCategory of Category.php
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
		/********************** Creation of Model object that is used for insertion of question onto the database*************/ 
		$objcsvModel=new csvModel();
		/********************************** if uploaded file type is csv***********************************************************/
		if($_FILES['questionbank']['type'] == "text/csv")
		{
			//echo $lang->ERROR2;die;
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
						if($num==9) {
								$id=htmlentities($data[8]);
								$ques=htmlentities($data[0]);
								$opt1=htmlentities($data[1]);
								$opt2=htmlentities($data[2]);
								$opt3=htmlentities($data[3]);
								$opt4=htmlentities($data[4]);
								$opt5=htmlentities($data[5]);
								$ans=htmlentities($data[6]);
								$type=htmlentities($data[7]);
								$ansarray=array(1,2,3,4,5); // array for options
								if($type=="objective") {
									$quesType=2;
									/*************** check for number of options************/
									if(empty($opt3)&&empty($opt4)&&empty($opt5)) {
										$error.="$lang->ERROR2 .".$row;
										echo $error;
										continue;
									}
									if(!in_array($ans,$ansarray)) {
										$error.="$lang->ERROR7.".$row;
										echo $error;
										continue;
									}
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
								$coloumn=array(name,id);
								$condition=array(id,$id);
								/************* geeting the category id by using model select function*******************/
								$result=$objcsvModel->select("category",$coloumn,$condition);
								$cname=$result[0]['name'];
								$cid=$result[0]['id'];
								/************inserting the question in database by using model insert function************************/
								$condition=array('category_id'=>$cid,'question_name'=>$ques,'answer'=>$ans,'question_type'=>$quesType,'status'=>'1','created_on'=>date('Y-m-d h:i:s', time()));
								$objcsvModel->insert("question_bank",$condition);
								
							$coloumn=array(id);
							$condition=array(question_name,$ques);
		 					$result=$objcsvModel->select("question_bank",$coloumn,$condition);
		 					
		 					$qid=$result[0]['id'];
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
	
}
?>
