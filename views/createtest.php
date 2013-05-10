<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all">
<script
	src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Create Test</title>
<script language="javascript">
var i=0;
$(document).ready(function() {
	
	$('#category').load('../index.php?controller=TestController&method=selectCategory', function(data) {
		$("#category").html($.trim(data));
		
		});
	
	
	});
        function addRow1() { 
            //alert("bdfjhd");
        	var inp = $("#name");
            //var inp=("#name").val();
            //alert(inp);
        	if (inp.val().length > 0) {
        		$("#ques1").show();
        	}
        	else {
            	alert("Plz Enter Test Name!!!");
        	}

        }
        function addRow() {
            i ++;
$("#ques").append('<div id='+i+'><tr><td><textarea rows="1" name="opt[]" cols="10"></textarea></td><td><input type="radio" name="opt[]"/></td><td><a href="javascript:void(0)" onclick="removerow()"><img src="../assets/images/delete1.png" height="34px" alt="halo"/></a></td></tr></div>');

        }
        function addMore() { 
        	$("#more").show();
        	        }
        function removerow(i) { 
        	alert(i);
        	        }
       
        </script>
</head>
<body id="createtestbody">
<div></div>
<form action="../index.php?controller=TestController&method=createQues" method="post">
<h2>Create Test</h2>
Name:<br/> 
<input type="text" name="name" id="name" size="10"><br/>
<br />

Category <select name="category" id="category">

</select>
<br/>

<INPUT type="button" class="btn" value="Create Test" onclick="addRow1()" />

<div id="ques1" style="display: none;">
<!-- <INPUT type="button" id="btn" value="Create Question" onclick="addRow()" /> -->
	
	<h2>Insert Question</h2>

	<table id="table_insert">
	
		<tr>	<td>Question</td>
			<td><textarea  id="question" name="question" rows="7" cols="30"></textarea></td></tr>
		
		<tr>
			<td>Question Type</td>
			<td><select name="questype"><option>multiple choice</option>
					    <option>true/false</option>
					    <option>Quiz/Practicle</option>
					    </select></td>
		</tr>
		
		
		</table>
<table id="ques" border="5">
		<tr>
			<td bordercolor=""><INPUT type="button" class="btn" value="Add Options" onclick="addRow()" /></td>
		
		<tr>
		<th>Option</th>
		<th>Answer</th>
		
		<th>Remove</th>
		</tr>
		
	</table>
	<div id="more" style="display: none;">Add Ajax code here to add more question</div>
	<INPUT type="submit" class="btn" value="submit" />
	<INPUT type="button" class="btn" value="Add More Questions" onclick="addMore()" />
	</div>
	<?php if(isset($_REQUEST['cid'])) echo $_REQUEST['cid'];?>
</body>
</html>
