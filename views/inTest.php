<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript"
	src="../misc/prototypes/html/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript"
	src="../assets/js/jquery.countdown.min.js"></script>
<script type="text/javascript">
$("#questionDisplay").ready(function(){
	$.ajax({
		url : "../index.php?controller=TestController&method=getQuestion",
		type: "post",
		data: "&questionPointer=",
		success : function(data){
			data = jQuery.parseJSON(data);
			getQuestion(data);
			setTable();
			var currentDate = new Date();
			//alert(<?php echo $_SESSION['testDuration']; ?>);
			  $('div#clockTimer').countdown(<?php echo $_SESSION['testDuration']; ?> *  60 * 1000+ currentDate.valueOf(), function(event) {
			    $this = $(this);
			    switch(event.type) {
			      case "seconds":
			      case "minutes":
			      case "hours":
			        $this.find('span#'+event.type).html(event.value);
			        break;
			      case "finished":
			        $this.fadeTo('slow', .5);
			        break;
			    }
			  });

			
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
$questions = new Array();
$dispQuestion = 0;
$dispPage = 1;
$markCounter = 0;
$marked = new Array(<?php echo $_SESSION['maxQuestions']; ?>);
$questionPage = new Array(<?php echo $_SESSION['maxQuestions']; ?>);


function setTable(){
	for($i = 1 ; $i <= $maxQuestion ; $i++ ){
	$("#allQuestions").append("Question "+$i);
	$markInput = "<input id = \"answered"+$i+"\" disabled = \"true\" type = \"checkbox\" onClick = \"markQuestion("+$i+")\"";
//		if($marked[value['queno']] == 1){
//			$markInput += " checked ";
//		}
	$markInput += "/>";							
	$("#allQuestions").append($markInput);
	$("#allQuestions").append("</br>");
	}
}

function select1($optionID,$questionID,$custonQuestionID){
// 	alert($value);
// 	alert($("#"+$id).val());
//	alert($questions[0]);

// 	$.each($questions,function(i, value){
// 		alert(value['id']);
// 		if($value == value['id']){			
			$option = $("#option"+$optionID).val();
// 			alert($option);
			$.ajax({
				async: false,
	    		url : "../index.php?controller=TestController&method=setQuestionOption",
	    		type: "post",
	    		data: "&questionID="+$questionID+"&option="+$option,
	    		success : function(data){

		    		$("#answered"+$custonQuestionID).prop("checked",true);
		    		//alert("done");
// 	    			if(data == "max"){
// 	    				$("#confirmNow").html("<input type = \"button\" value='Confirm Finish' id='confirmFinishButton'/>");
// 	    			}
// 	    			else{
// 	    				data = jQuery.parseJSON(data);
// 	    				getQuestion(data);
// 	    			}
 	    		}
 	    		});
			
			
// 		}
// 	});

	//$option = $invalue['name'];
}

function clearQuestionDisplay(){
	$("#questionDisplay").html("");
}

function markQuestion($questionID){	
	if($("#"+$questionID).prop("checked")){
		$marked[$questionID] = 1;
		$questionPage[$questionID] = $pageCount;
		$markCounter++;		
	}
	else{
		$marked[$questionID] = 0;
		$markCounter--;				
	}
	$("#markedQuestion").html("");
	$.each($marked,function(i,value){
		if(value > 0){
		$("#markedQuestion").append("<input type = \"button\" onClick = \"getMarkedQuestion("+i+")\" value = \"Q"+i+"\" /> ");		
		$("#markedQuestion").append(" ");
		}
		});
	$("#elementMarked").html($markCounter);
}

function getMarkedQuestion($questionID){
	//alert($questionPage[$questionID]);
	if($questionPage[$questionID] > $pageCount){
    	while($questionPage[$questionID] > $pageCount){
    		clearQuestionDisplay();
    		nextQuestion('next');
    	}
	}
	else{
    	while($questionPage[$questionID] < $pageCount){
    		clearQuestionDisplay();
    		nextQuestion('previous');
    	}
	}
}

function getQuestion(data){
	
	$.each(data,function(i, value){
		//alert(i);
		//if(i == "question_name"){
			$("#questionDisplay").append("Question "+value['queno']);
			$("#questionDisplay").append("</br>");
			$markInput = "<input id = \""+value['queno']+"\" type = \"checkbox\" onClick = \"markQuestion("+value['queno']+")\"";
			if($marked[value['queno']] == 1){
				$markInput += " checked ";
			}
			$markInput += "/> Mark";
			$("#questionDisplay").append($markInput);
			$("#questionDisplay").append("</br>");
			$("#questionDisplay").append("<p>"+value['question_name']+"</p>");

// 			$("#allQuestions").append("Question "+value['queno']);			
// 			$markInput = "<input id = \"answered"+value['queno']+"\" disabled = \"true\" type = \"checkbox\" onClick = \"markQuestion("+value['queno']+")\"";
// // 			if($marked[value['queno']] == 1){
// // 				$markInput += " checked ";
// // 			}
// 			$markInput += "/>";
// 			$("#allQuestions").append("</br>");						
// 			$("#allQuestions").append($markInput);
		//}
		//if(i == "options"){
			$("#questionDisplay").append("<div id = \""+value['id']+"\">");
			//$questions[i] = value['options'];//value;
			 
			$.each(value['options'],function(j, invalue){
				$str = "<input type = \"radio\" name = \"option"+value['id']+
				"\" "+
				"id = \"option"+invalue['id']+
				"\" "+
				" onClick = \"select1('"+invalue['id']+"','"+value['id']+"','"+value['queno']+"') \"";

				if(invalue['name'] == value['answer']){
					$option = invalue['name']; 
					$str += " checked ";
				}
				$str += "value = '"+invalue['name']+"'/>"+invalue['name'];
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
        	async: false,
    		url : "../index.php?controller=TestController&method=getQuestion",
    		type: "post",
    		data: "&questionPointer="+pointer,
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
		
		$.ajax({
        	async: false,
    		url : "../index.php?controller=TestController&method=fetchResult",
    		type: "post",
    		data: "",
    		success : function(data){
    			
    		}
    		});
	}
}
</script>
<style type="text/css">
#confirmFinish {
	display: none;
}

.minWidth {
	min-width: 85px;
}
div#clockTimer { color: white; }
div#clockTimer p { background: #333; float: left; height: 40px; width: 40px; }
div#clockTimer p span { display: block; font-size: 30px; font-weight: bold; padding: 3px 0 0; }
div#clockTimer div.space { color: #ccc; display: block; line-height: 1.7em; font-size: 40px; float: left; height: 48px; width: 15px; }
</style>
</head>
<body>
	<div id="totalQuestions" style="float: left; width: 300px;">
		<h2>Total Questions <?php echo $_SESSION['maxQuestions']; ?></h2>
		<h3>
			Question Marked
			<div id="markedQuestion"></div>
		</h3>
		<h3>
			Marked
			<div id="elementMarked"></div>
		</h3>
		<div id="clockTimer">
			<p>
				<span id="hours"></span>
			</p>
			<div class="space">:</div>
			<p>
				<span id="minutes"></span>
			</p>
			<div class="space">:</div>
			<p>
				<span id="seconds"></span>
			</p>
		</div>
	</div>
	<div id="questionWrapper" style="float: left; width: 400px;">
		<div id="questionDisplay"></div>
		<table>
			<tr class="instructiontr">
				<td><div class="minWidth">
<?php if($_SESSION['goBack'] == 1){ ?>
<input id="prevButton" type="button" value="Previous"
							onClick="nextQuestion('previous')" class="btn">
					</div>
<?php }?>
</td>
				<td><div class="minWidth">
						<input id="confirmFinish" type="button" value="Confirm Finish"
							onClick="confirmFinish()" class="btn">
					</div></td>
				<td><div class="minWidth">
						<input id="nxtButton" type="button" value="Next"
							onClick="nextQuestion('next')" class="btn">
					</div></td>
			</tr>
		</table>
	</div>
	<div id="allQuestions"></div>
	<!-- <a href="#" onclick="function()">Display All Question</a> -->
	<div id="confirmNow"></div>
</body>
</html>