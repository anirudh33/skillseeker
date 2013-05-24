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
		}
		});
});
$questionCount = 0;
$option = 0;
$questions = "";
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
function krEncodeEntities(s){
	return $("<div/>").text(s).html();
}
function krDencodeEntities(s){
	return $("<div/>").html(s).text();
}
function getQuestion(data){
	$("#questionDisplay").html("");
	$.each(data,function(i, value){
		if(i == "question_name"){
			$("#questionDisplay").append("Question "+data['queno']+"</br>");
			$("#questionDisplay").append("<p>"+value+"</p>");
		}
		if(i == "options"){
			$("#questionDisplay").append("<div>");
			$questions = value; 
			$.each(value,function(j, invalue){
				$str = "<input type = \"radio\" name = \"option"+data['id']+
				"\" "+
				" onClick = \"select1('"+invalue['id']+"') \"";

				if(invalue['name'] == data['answer']){
					$option = invalue['name']; 
					$str += " checked ";
				}
				$str += "value = \""+invalue['id']+"\"/>"+invalue['name'];
				$("#questionDisplay > div").append($str);
			});
			$("#questionDisplay").append("</div>");
		}
	});
}

function nextQuestion(pointer){
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

$(function(){
	
});
</script>
</head>
<body>
<div id = "totalQuestions"><h2>Total Questions <?php echo $_SESSION['maxQuestions']; ?></h2></div>
<div id = "questionDisplay"></div>
<table>
<tr class="instructiontr">
<td><input type="button" value="Previous" onClick = "nextQuestion('previous')" class="btn"></td><td><input type="button" value="Next"
onClick = "nextQuestion('next')" class="btn"></td>
</tr>
<tr class="instructiontr"><td><a href="#" onclick="function()">Display All Question</a></td></tr>
</table>
<div id = "confirmNow"></div>
</body>
</html>