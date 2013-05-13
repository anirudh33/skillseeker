<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Examination</title>
<meta charset="utf-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet"
	href="<?php echo SITE_URL;?>/assets/css/reset.css" type="text/css"
	media="all">
<link rel="stylesheet"
	href="<?php echo SITE_URL;?>/assets/css/style.css" type="text/css"
	media="all">
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/cufon-yui.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/cufon-replace.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/script.js"></script>
<!--[if lt IE 7]>
     <link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="screen">
     <script type="text/javascript" src="js/ie_png.js"></script>
     <script type="text/javascript">
        ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');
     </script>
<![endif]-->
<!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>
<script>
 $(document).ready(function() {
	 
	 $(".errpass").hide();
	$(".header2").hide();
	 
 <?php
    if (isset($_REQUEST['msg'])) {
        ?>
	 $(".errpass").show();
	 <?php
    }
    unset($_REQUEST['msg']);
    ?>
 });
 </script>

<body id="page1">
	<div class="wrap">
		<!-- header -->
		<header>