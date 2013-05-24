<?php 
require_once '/var/www/skillseeker/trunk/libraries/constants.php';
?>
<html>
<head>
<title>Registration</title>

<link rel="stylesheet" href="<?php echo SITE_URL;?>/assets/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo SITE_URL;?>/assets/css/ui.css" type="text/css" media="all">

<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/register.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery-ui-timepicker-addon.js"></script>


<script>
$(document).ready(function()
{
	$('#Registeruser').hide();
	$('#Directlink').hide();
	$('#Directlink1').hide();
	$("#datepicker").datepicker();
});

function useRegister()
{
	document.getElementById("assign_btn").disabled = true; 
$.ajax({

		type: "POST",
	    url: './index.php?controller=TestController&method=handleassignTest',  
	     data: $('#assigntestform').serialize(),
	       success: function(data){
	    	$('#Directlink1').hide();
		    $("#result").html(data);
		    document.getElementById("assign_btn").disabled = false;
	     }
	  });
} 

$(document).ready(function()
        {
	 
$('#Registeruser').hide();
     $('#Directlink').hide();
     $('#Directlink1').hide();
     $('#datetime').datetimepicker({
			timeFormat: 'HH:mm:ss',
			stepHour: 2,
			stepMinute: 10,
			stepSecond: 10
		});
     
   });
        function useRegister()
        {
             $('#Directlink').hide();
            $('#Registeruser').show();
        }
        function useLink()
        {
            $('#Registeruser').hide();
            $('#Directlink').show();
        }
        function createLink()
        {
            $('#linkpage').hide();
             $('#Directlink').hide();
        $('#Directlink1').show();
}
        
</script>
</head>
<body id="assigntestbody">
<h2>Test Name:</h2>
<br/>
<div id="linkpage">
<br/><br/>
<table style="border:1px solid;border-color:black">
<tr>
<th class="assignth">Create Direct link/embed code</th>
</tr><tr>
<td class="assignth">Make your test available to non-registered
users.</td>
</tr>
<tr>
<td class="assignth"><a href="#" onclick="useLink()">use this option</a></td>
</tr>
</table>
</div><br/><br/><br/><div id="Registeruser">Registered user groups<br/>
put your code to show Registered user groups 
 </div>
<div id="Directlink">Create Direct link/embed code<br/>
<a href="#" onclick="createLink()">Create New Direct link</a>
</div>
<div id="Directlink1">
<form action="#" id="assigntestform">
<table  style="border:1px solid;border-color:black">
<tr ></tr>
<tr><td><h3>Choose what admin will see after completion:</h3></td></tr>
<tr><td ><input type="radio" name="admin_view_type" value="1">off</td></tr>
<tr><td ><input type="radio" name="admin_view_type" value="2">Email score only</td></tr>
<tr><td ><input type="radio" name="admin_view_type" value="3">Email score, and incorrectly answered questions only</td></tr>
<tr><td ><input type="radio" name="admin_view_type" value="4">Email score, and all answered questions</td></tr>
<tr ></tr>
<tr><td><h3>Test Availability</h3></td></tr>
<tr><td>
Start Time:<br><input type="text"  id="datetime" value="" name="start_time"/></td>
<td> Link Expiration Time:<input type="text"  id="datetime" value="" name="expire_time" /></td></tr>
<tr ></tr>
<tr><td><h3>Choose what user will see after completion</h3></td></tr>
<tr ><td><input type="radio" name="user_result_type" value="1">No score, questions or feedback</td></tr>
<tr ><td><input type="radio" name="user_result_type" value="2">Score only</td></tr>
<tr ><td><input type="radio" name="user_result_type" value="3">Score, questions and chosen answers</td></tr>
<tr ><td><input type="radio" name="user_result_type" value="4">Score, questions, chosen answers and show correct answers</td></tr>
<tr ></tr>
<tr><td><h3>Give questions in random order</h3></td></tr>
<tr ><td><input type="radio" name="random" value="S">Off</td></tr>
<tr ><td><input type="radio" name="random" value="R">On</td></tr>
<tr ></tr>
<tr><td><h3>Number of questions to be displayed per page</h3></td></tr>
<tr><td><select name="number_of_question">
  <option value="0" selected="selected">----Select ----</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
</select>
</td></tr>
<tr ></tr>
<tr><td><h3>Test Duration</h3></td><td><input type="number"  name="test_duration"> </td></tr>
<input type="hidden"  value="<?php echo $_REQUEST['test_id'];?>" name="test_id" >

<tr ></tr>
<tr><td><h3>Allow users to go back during test</h3></td></tr>
<tr ><td><input type="radio" name="go_back" value="0">Off</td></tr>
<tr ><td><input type="radio" name="go_back" value="1">On</td></tr>
<tr ></tr>
<tr><td><h3>Set The Passing Marks</h3></td><td><input type="number" name="passing_marks" > </td></tr>
<tr ></tr>
<tr><td><h3>Show 'Brief test settings' before each test starts</h3></td></tr>
<tr ><td><input type="radio" name="instruction" value="0">Off</td></tr>
<tr ><td><input type="radio" name="instruction" value="1">On</td></tr><tr ></tr>
<tr ></tr>
<tr><td><h3>Want to store Email Id or not</h3></td></tr>
<tr ><td><input type="radio" name="opt" value="0">Off</td></tr>
<tr ><td><input type="radio" name="opt" value="1">On</td></tr>
<tr ></tr>
<tr><td><h3>Emails of All Users(to whom u want to assign this test)</h3></td><td><input type="text"  name="emails"> </td></tr>
<tr ></tr>

<tr><td><input type="button" value="save" class="btn" id="assign_btn" onclick="submitAssignTest()"></td></tr>

</table>

</form>
</div>
<div id="result"></div>
</body>
</html>
