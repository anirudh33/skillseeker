<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all">
</head>
<body id="uploadbody">
<?php require_once '/var/www/skillseeker/trunk/libraries/constants.php'; ?>
<?php require_once  '/var/www/skillseeker/trunk/libraries/Language.php';?>
<form action="<?php echo SITE_URL?>/index.php?controller=TestController&method=upload" enctype="multipart/form-data" method="post">
<p>
<?php //echo $lang->SPECIFIYFILE?><br>
<input type="file" id="browse" name="questionbank" size="30">
</p>
<div>
<input type="submit" id="submitbtn" class="btn" value="upload">
<div>
<?php 
if(isset($_REQUEST['cid'])) {
	echo $lang->ERROR1;
	//echo "Errors in csv file";
	echo $_REQUEST['cid'];
}
?>
</div>
</div>
</form>
</body>
</html>