
<body>
<?php require_once '/var/www/skillseeker/trunk/libraries/constants.php'; ?>
<form action="<?php echo SITE_URL?>/index.php?controller=testController&method=upload" enctype="multipart/form-data" method="post">
<p>
Please specify a file, or a set of files:<br>
<input type="file" id="browse" name="questionbank" size="30">
</p>
<div>
<input type="submit" id="submitbtn" value="upload">
<div>
<?php 
if(isset($_REQUEST['cid'])) {
	echo "Errors in csv file";
	echo $_REQUEST['cid'];
}
?>
</div>
</div>
</form>
</body>
</html>