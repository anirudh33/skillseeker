<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="../misc/prototypes/html/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$("#questionDisplay").ready(function(){
	$.ajax({
		url : "../index.php?controller=TestController&method=getQuestion",
		type: "post",
		data: "&questionPointer=",
		success : function(data){
			data = jQuery.parseJSON(data);
			getQuestion(data);
// 			clearQuestionDisplay();

// 			if($perPageQuestion > 1){
// 				if($questionCount == 1){
// 					getQuestion(data);
// 				}				
//     			nextQuestion('next');			
// 			}
// 			else{
// 				getQuestion(data);
// 			}
		}
		});
});
$maxQuestion = <?php echo $_SESSION['maxQuestions']; ?>;
$perPageQuestion = <?php echo $_SESSION['perPageQuestion']; ?>;
$maxPages = <?php echo $_SESSION['numberOfPages']; ?>;
$currQuestionsStart = 1;
$currQuestionsEND = 0;
$questionCount = 1;
$pageCount = 1;
$option = 0;
$questions = "";
$dispQuestion = 0;
$dispPage = 1;

function select1($value){
// 	alert($id);
// 	alert($("#"+$id).val());
//	alert($questions);

	$.each($questions,function(i, value){
		if($value == value['id']){
			$option = value['name'];
		}
	});

	//$option = $invalue['name'];
}

function clearQuestionDisplay(){
	$("#questionDisplay").html("");
}

function getQuestion(data){
	
	$.each(data,function(i, value){
		//alert(i);
		//if(i == "question_name"){
			$("#questionDisplay").append("Question "+value['queno']+"</br>");
			$("#questionDisplay").append("<p>"+value['question_name']+"</p>");
		//}
		//if(i == "options"){
			$("#questionDisplay").append("<div id = \""+value['id']+"\">");
			//$questions = data['options'];//value;
			 
			$.each(value['options'],function(j, invalue){
				$str = "<input type = \"radio\" name = \"option"+value['id']+
				"\" "+
				" onClick = \"select1('"+invalue['id']+"') \"";

				if(invalue['name'] == value['answer']){
					$option = invalue['name']; 
					$str += " checked ";
				}
				$str += "value = \""+invalue['id']+"\"/>"+invalue['name'];
				$("#questionDisplay > [id="+value['id']+"]").append($str);
				$("#questionDisplay > [id="+value['id']+"]").append("</br>");
			});
			$("#questionDisplay").append("</div>");
			$("#questionDisplay").append("</br>");
		//}
	});
	if($pageCount == 1){
		$("#prevButton").hide();
	}
// 	else if($questionCount == $perPageQuestion){
// 		$("#prevButton").hide();
// 	}
	else{
		$("#prevButton").show();
	}
	if($pageCount == $maxPages){
		$("#nxtButton").hide();
		$("#confirmFinish").show();
	}
	else{
		$("#nxtButton").show();
	}
}

function nextQuestion(pointer){

//	if($questionCount != 1 || $perPageQuestion == 1){
		clearQuestionDisplay();
//	}
// 	if($questionCount == 1 && $perPageQuestion == 1){
// 		$currQuestionsEND++;
// 	}
// 	//if($questionCount == 1){
// 	if(pointer == 'next'){
// 		$currQuestionsEND += $perPageQuestion;
// 		$dispPage++;
// 	}
// 	if(pointer == 'previous'){
// 		$tempCount = $questionCount % $perPageQuestion;
		//alert($tempCount);
		//alert($perPageQuestion);
		//alert($questionCount);
// 		$questionCount = $questionCount - $tempCount - $perPageQuestion;
// 		$currQuestionsStart = $questionCount;
// 		$currQuestionsEND = $currQuestionsStart + $perPageQuestion;
		//$questionCount =  $tempCount + $perPageQuestion;
		//alert($questionCount);		
// 	}
// 	if(pointer == 'previous'){
// 		$currQuestionsStart -= $perPageQuestion;
// 		if($questionCount == $maxQuestion && $perPageQuestion != 1){
// 			$questionCount -= $perPageQuestion;
// 		}else if($currQuestionsStart <= 0){
// 			$currQuestionsStart = $perPageQuestion;
// 		}
// 		$dispPage--;		
// 	}

	if($currQuestionsEND >= $maxQuestion){
		$currQuestionsEND = $maxQuestion;
	}
	else if($currQuestionsEND <= 0){
		$currQuestionsEND = 0;
		$currQuestionsStart = 1;
	}
// 	else if($currQuestionsStart <= 0 && $currQuestionsEND <= 0){
// 		$currQuestionsEND = 0;
// 		$currQuestionsStart = 1;
// 	}
	//}
	//else{
	//	$currQuestionsEND += $perPageQuestion;
	//}
	//while($currQuestionsStart < $currQuestionsEND){			    
	    	
	if(pointer == 'next'){
		if($pageCount == $maxPages+1){
			//alert("You Have Cheated !!!");
		}
		else{
			$pageCount++;
		}		
	}
	else if(pointer == 'previous'){
		if($pageCount == 0){
			//alert("You Have Cheated !!!");
		}
		else{
			$pageCount--;
		}		
	}
	if($questionCount >= 1 && $questionCount <= $maxQuestion){	
    	$.ajax({
    		url : "../index.php?controller=TestController&method=getQuestion",
    		type: "post",
    		data: "&questionPointer="+pointer+"&option="+$option,
    		success : function(data){
    			if(data == "max"){
    				$("#confirmNow").html("<input type = \"button\" value='Confirm Finish' id='confirmFinishButton'/>");
    			}
    			else{
    				data = jQuery.parseJSON(data);
    				getQuestion(data);
    			}
    		}
    		});
    	$option = "NULL";
	}
	//alert($currQuestionsStart);
// 	if(pointer == 'next'){
// 	    $currQuestionsStart++;
// 	}
// 	else if(pointer == 'previous')
// 		$currQuestionsStart++;
// 	pointer = 'next'
		//$currQuestionsEND--;
	//if($currQuestionsEND == 1){
		//$currQuestionsEND = 0;
	//}
	//}
	//alert($dispQuestion);
	//alert($questionCount);
}

$(function(){
	
});
function confirmFinish(){
	$("#confirmFinish").val("Finish");
	$("#confirmFinish").attr("onClick","finish()");
}
function finish(){
	$value = confirm("Do yoy want to submit !!!");
	if($value == true){
		//alert("ok");
	}
}
</script>
<style type="text/css">
#confirmFinish{
	display : none;
}
.minWidth{
	min-width: 85px;
}
</style>
</head>
<body>
<div id = "totalQuestions"><h2>Total Questions <?php echo $_SESSION['maxQuestions']; ?></h2></div>
<div id = "questionDisplay"></div>
<table>
<tr class="instructiontr">
<td><div class = "minWidth">
<?php if($_SESSION['goBack'] == 1){ ?>
<input id = "prevButton" type="button" value="Previous" onClick = "nextQuestion('previous')" class="btn"></div>
<?php }?>
</td>
<td><div class = "minWidth"><input id = "confirmFinish" type="button" value="Confirm Finish" onClick = "confirmFinish()" class="btn"></div></td>
<td><div class = "minWidth"><input id = "nxtButton" type="button" value="Next" onClick = "nextQuestion('next')" class="btn"></div></td>
</tr>
</table>
<a href="#" onclick="function()">Display All Question</a>
<div id = "confirmNow"></div>
</body>
</html>