<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="../misc/prototypes/html/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
function startTest(){
	$.ajax({
		url : "../index.php?controller=TestController&method=getQuestion",
		type: "post",
		data: $("#startTestForm").serialize(),
		success : function(data){
			
			$("body").html(data);
		}
		});
}
</script>
</head>
<body>
<div id = "questionDisplay"></div>
<table>
<tr class="instructiontr">
<td><input type="button" value="Previous" class="btn"></td><td><input type="button" value="Next" class="btn"></td>
</tr>
<tr class="instructiontr"><td><a href="#" onclick="function()">Display All Question</a></td></tr>
</table>
</body>
</html>