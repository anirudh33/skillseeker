<?php 
require_once '/var/www/skillseeker/trunk/libraries/constants.php';
?>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="<?php echo SITE_URL;?>/assets/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo SITE_URL;?>/assets/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo SITE_URL;?>/assets/css/ui.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/cufon-replace.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/register.js"></script>

<script>

function assignTest()
{
$.ajax({

		type: "POST",
	    url: '../index.php?controller=MainController&method=handleassignTest',  
	     data: $('#assigntestform').serialize(),
	       success: function(data){
	    	$('#Directlink1').hide();
		    $("#result").append(data);
	     }
	  });
} 

$(document).ready(function()
        {
	 
$('#Registeruser').hide();
     $('#Directlink').hide();
     $('#Directlink1').hide();
     $("#datepicker").datepicker();
     
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
<body>
<h2>Test Name:</h2>
<br/>
<div id="linkpage">
<br/><br/>
<table>
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
<form id="assigntestform" action="#" method="post">
<table>
<tr class="assigntesttr">
<td class="assigntesttd">Direct link name:</td><td><input type="text" name="directlink"/>
</td></tr>
<tr class="assigntesttrt"></tr>
<tr><td class="assigntesttr">Email results to me:</td></tr>
<tr><td class="assigntesttd"><input type="radio" name="name[]">off</td></tr>
<tr><td class="assigntesttd"><input type="radio" name="name[]">Email score only</td></tr>
<tr><td class="assigntesttd"><input type="radio" name="name[]">Email score, and incorrectly answered questions only</td></tr>
<tr><td class="assigntesttd"><input type="radio" name="name[]">Email score, and all answered questions</td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Collect user information</td></tr>
<tr><td class="assigntesttd"><input type="checkbox"/>First Name</td></tr>
<tr><td class="assigntesttd"><input type="checkbox"/>Last Name</td></tr>
<tr><td class="assigntesttd"><input type="checkbox"/>Email Address</td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Test Availability</td></tr>
<tr><td><input type="datetime" /></td><td><input type="datetime" /></td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Choose what user will see after completion</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">No score, questions or feedback</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">Score only</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">Score, questions and chosen answers</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">Score, questions, chosen answers and show correct answers</td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Give questions in random order</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">Off</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">On</td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Number of questions to be displayed per page</td></tr>
<tr><td><select name="number">
  <option value="none" selected="selected">----Select ----</option>
  <option >1</option>
  <option >2</option>
  <option >3</option><option >4</option><option >5</option><option >6</option><option >7</option><option >8</option>
<option >9</option><option >10</option>
</select>
</td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Time Limit</td><td><input type="number" > </td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Allow users to go back during test</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">Off</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">On</td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Set The Passing Marks</td><td><input type="number" > </td></tr>
<tr class="assigntesttrt"></tr>
<tr class="assigntesttr"><td>Show 'Brief test settings' before each test starts</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">Off</td></tr>
<tr class="assigntesttd"><td><input type="radio" name="name[]">On</td></tr><tr class="assigntesttrt"></tr>
<tr><td><input type="button" value="save" onclick="assignTest()"></td></tr>
</table>

</form>
</div>
<div id="result"></div>

</body>
</html>