<?php 
require_once './models/csvModel.php';
class testController {
	
	function upload() 
	{

		$objcsvModel=new csvModel();
		if($_FILES['questionbank']['type'] == "text/csv")
		{

			if(isset($_FILES['questionbank']) && $_FILES['questionbank']['size'] > 0)
			{
				
				$fileName = $_FILES['questionbank']['name'];
				$tmpName  = $_FILES['questionbank']['tmp_name'];
				$fileSize = $_FILES['questionbank']['size'];
				$fileType = $_FILES['questionbank']['type'];
				$chk_ext = explode(".",$fileName);
				$error="";
				$row=0;
				$handle = fopen($tmpName, "r");
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
								
								if($type=="objective") {
									$quesType=2;
									/*************** check for number of options************/
									if(empty($opt3)&&empty($opt4)&&empty($opt5)) {
										$error.="<br/> Option count is less than three in row .".$row;
										echo $error;
										break;
									}
								}
								else if($type=="true/false") {
									$quesType=1;
									/********************* true/false option validation************************************/
									if(!empty($opt3)&&!empty($opt4)&&!empty($opt5)) {
										$error.="Please specify correct option as per type(True/False) in row .".$row;
										echo $error;
										break;
									}
									if($opt1!="true"||$opt1="false"||$opt2!="true"||$opt3="false") {
										$error.="Type(True/False) have other than true/false in their option in row .".$row;
										echo $error;
										break;
									}
								}
								else {
									$error.="<br/> Invaild ques type in row.".$row;
									continue;
								}
								$coloumn=array(name,id);
								$condition=array(id,$id);
								$result=$objcsvModel->select("category",$coloumn,$condition);
								$cname=$result[0]['name'];
								$cid=$result[0]['id'];
								$condition=array('category_id'=>$cid,'question_name'=>$ques,'answer'=>$ans,'question_type'=>$quesType,'status'=>'1','created_on'=>date('Y-m-d h:i:s', time()));
								$objcsvModel->insert("question_bank",$condition);
								
							$coloumn=array(id);
							$condition=array(question_name,$ques);
		 					$result=$objcsvModel->select("question_bank",$coloumn,$condition);
		 					
		 					$qid=$result[0]['id'];
		 					$condition=array('name'=>$opt1,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					$condition=array('name'=>$opt2,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					$condition=array('name'=>$opt3,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					$condition=array('name'=>$opt4,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
		 					$condition=array('name'=>$opt5,'question_id'=>$qid,'created_on'=>date('Y-m-d h:i:s', time()));
		 					$objcsvModel->insert("options",$condition);
							
						}
						else {
							//if($num==)
						}
					}
					$row++;
				}
			}
		}	
		if($error!="") 
		{
			header("Location:");
		}

	}
	
}



?>
