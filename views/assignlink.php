<?php 
$test_id=1;
require_once '/var/www/skillseeker/trunk/libraries/constants.php';
?>
<html>
<head>
<title>Registration</title>

<link rel="stylesheet" href="<?php echo SITE_URL;?>/assets/css/style.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/register.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery.tools.min.js"></script>

<script>
fetchLink();
</script>
</head>
<body id="assigntestbody">
<h3>Assign the Link</h3>
<div id="Directlink1">
<form action="#" id="assignlinkform">
<table  style="border:1px solid;border-color:black">
<tr ><td><h5>Enter the Email Ids(Comma Sperated) </h5></td></tr>
<tr id="link"></tr><tr><td><input type="text" name="emails" ></td></tr>
<tr><td><input type="button" value="save" class="btn" size="150" id="assign_btn" onclick="assignLink()"></td></tr>
</table>
</form>
</div>
<div id="result"></div>
</body>
</html>
