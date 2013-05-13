<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="css/style.css" />
<title>Test Start</title>
<script type="text/javascript" src="../misc/prototypes/html/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
function startTest(){
	$.ajax({
		url : "../index.php?controller=TestController&method=takeTest",
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
<form id = "startTestForm" action = "javascript:void(0)" method = "post">
<table>
<tr class="instructiontr">
<td>First Name:</td><td><input type="text" name="firstName" size="20"/></td></tr>

<tr class="instructiontr"><td>Last Name:</td><td><input type="text" name="lastName" size="20"/></td></tr>
<tr class="instructiontr"><td>Email:</td><td><input type="text" name="email" size="20"/></td></tr>
<tr class="instructiontr"></tr class="instructiontr">
<td><input type="button" value="submit" class="btn" onClick = "startTest()"/>
</td></tr></table>
</form>
</body>
</html>