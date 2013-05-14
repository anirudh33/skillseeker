
<?php 
/*

 **************************** Creation Log *******************************
File Name                   -  createtest.php
Project Name                -  SkillSeeker
Description                 -  View file for question bank
Version                     -  1.0
Created by                  -  Avni Jain,Amber Sharma
Created on                  -  May 10, 2013

*/
?>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all">
<script
src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<script language="javascript">
var i=0;
$(document).ready(function() 
{
	$('#category').load('./index.php?controller=TestController&method=selectCategory', function(data) 
	{
		$("#category").html($.trim(data));
	});
});
        
        </script>
</head>
<body id="createtestbody">
<div></div>
<form action="./index.php?controller=TestController&method=createQues" method="post" id ="ques">
<h2><?php echo $lang->ADDONE; ?></h2>
<br/>

<br />

<?php echo $lang->CATEGORY;?> <select name="category" id="category">

</select>
<br/>

<INPUT type="button" class="btn" value="<?php echo $lang->ADD; ?>" onclick="addRow1()" />

<div id="ques1" style="display: none;">
<!-- <INPUT type="button" id="btn" value="Create Question" onclick="addRow()" /> -->

<h2><?php echo $lang->INSERTQUES; ?></h2>

<table id="table_insert">

<tr><td><?php echo $lang->QUESTION; ?></td>
<td><textarea id="question" name="question" rows="7" cols="30"></textarea></td></tr>

<tr>
<td><?php echo $lang->QUESTIONTYPE; ?></td>
<td><select name="questype"><option><?php echo $lang->MULTIPLECHOICE; ?></option>
<option><?php echo $lang->TRUEFALSE; ?></option>

</select></td>
</tr>


</table>
<table id="ques" border="5">
<tr>
<td bordercolor=""><INPUT type="button" class="btn" value="<?php echo $lang->ADDOPTION; ?>" onclick="addRow()" /></td>

<tr>
<th><?php echo $lang->OPTION; ?></th>
<th><?php echo $lang->ANSWER; ?></th>
<th><?php echo $lang->REMOVE; ?></th>
</tr>
</table>
<div id="more" style="display: none;">Add Ajax code here to add more question</div>
	<INPUT type="button" class="btn" value="submit" onclick="insertTest()"/>
	<INPUT type="button" class="btn" value="Add More Questions" onclick="addMore()" />
	</div>
