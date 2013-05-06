
<?php
mysql_connect("localhost","root","root")or die("Unable to connect to MySQL");
mysql_select_db("skillseeker");
echo "<pre>";
print_r($_FILES);



if($_FILES['questionbank']['type'] == "text/csv")
{

	if(isset($_FILES['questionbank']) && $_FILES['questionbank']['size'] > 0)
	{

		$fileName = $_FILES['questionbank']['name'];
		$tmpName  = $_FILES['questionbank']['tmp_name'];
		$fileSize = $_FILES['questionbank']['size'];
		$fileType = $_FILES['questionbank']['type'];
		$chk_ext = explode(".",$fileName);
		$row=0;
		$handle = fopen($tmpName, "r");
		while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
						
						if($row>0) 
						{
			 			$num = count($data);
			 			print_r($data);
			 			//echo "<p> $num fields in line $row: <br /></p>\n";
			 			if($num==8) {
			 			for ($c=0; $c < $num; $c++) {
		 				echo htmlentities($data[$c]) . "<br />\n";
		 				$id=htmlentities($data[8]);
		 				$ques=htmlentities($data[0]);
		 				$opt1=htmlentities($data[1]);
		 				$opt2=htmlentities($data[2]);
		 				$opt3=htmlentities($data[3]);
		 				$opt4=htmlentities($data[4]);
		 				$opt5=htmlentities($data[5]);
		 				$ans=htmlentities($data[6]);
		 				$type=htmlentities($data[7]);
		 				$qr="select name,id from category where id='$id'";
		 				//echo $qr;
		 				$result=mysql_query($qr);
		 				while($r=mysql_fetch_array($result)) {
		 				$cname=$r[name];
		 				$cid=$r[id];
		 				}
		 				//print_r($result);die;
		 				print $cname;
		 				print $cid;
		 					$qr1="insert into question_bank values('','$cid','$ques','','2','A','','')";
		 					echo $qr1;
		 					mysql_query($qr1);
		 					$qr3="select id from question_bank where question_name='$ques'";
		 					echo $qr3;
		 					
		 					$result=mysql_query($qr3);
		 					while($r=mysql_fetch_array($result)) {
		 						$qid=$r[id];
		 					}
		 					
		 					$qr2="insert into options values('','$opt1','$qid','A','','')";
		 					echo $qr2;die;
		 					mysql_query($qr);die;
		 					//$qr1="insert into question_bank values('','1','dfsf','ggf','','1','A','','')";
		 				}
			 		}
			 		else {
			 			//if($num==)
			 		}
			 	}
				$row++;
		}
	}
}
	?>