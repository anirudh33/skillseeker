<?php 
require_once '/var/www/skillseeker/trunk/libraries/constants.php';
?>

<script type="text/javascript">

function contact()
{
$.ajax({

		type: "POST",
	    url: '../index.php?controller=MainController&method=handleContact',  
	     data: $('#contactform').serialize(),
	       success: function(data){
	    	$('#Directlink1').hide();
		    $("#result").append("Email send successfully.");
	     }
	  });
} 
</script>

<h2 class="cufon cufon-canvas">Contact Us</h2>
<div id="Directlink1">
<form action="#" method="post" id="contactform" >
Name*:<br/><input type="text" name="name"><br/>
<br/><br/>
Username:(if registered your skillseeker username)
<br/><input type="text" name="username"><br/><br/><br/>
Your email address*:
<br/><input type="text" name="email"><br/><br/><br/>
Subject:
<br/>
<textarea rows="5" cols="20" name="subject"></textarea><br/><br>
<input type="button" value="Send Mail" class="btn"  onclick="contact()">

</form>
</div>
<div id="result">
</div>
