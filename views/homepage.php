<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Examination</title>
<meta charset="utf-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet" href="<?php echo SITE_URL;?>/assets/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo SITE_URL;?>/assets/css/style.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/cufon-replace.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/script.js"></script>
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
<?php
if (isset($_SESSION['username'])) {
	$objSecurity=new Security();
	$objSecurity->secureMultiLogin($_SESSION['username']);
	//require_once(SITE_PATH."/views/userpage.php");
    header("Location:index.php?controller=TestController&method=process");
} else {
    ?>
<script>
 $(document).ready(function() {
	 
	 $(".errpass").hide();
	 
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
 
      <div class="container">
          <h1><a href="#">Online Examination</a></h1>
				<nav>
					<ul>
						<li class="current"><a href="#" class="m1">Home Page</a></li>
						<li><a href="#" class="m2">About Us</a></li>
						<li><a href="#" class="m2">FAQs</a></li>
						<li><a href="#" class="m4">Contact Us</a></li>

					</ul>
				</nav>

			</div>
   </header>
   <br/>
   <div class="container">
      <!-- aside -->
			<aside>

				<h2 id="register">Register</h2>
				<h4>
					New <span>to Online Examination ???</span>
				</h4>

				<p>
					Our easy & secure hosted online testing service keeps your data
					safe, backed up and ready to go 24/7. <br> <br> Register
					free and start creating online tests today.
				
				<a class="blocklink"
				href="index.php?controller=MainController&method=onRegisterClick">Register
				free</a></p>
				<div class="line-separator"></div><br><br>
				<h2 id="login">Login</h2>
				<form method="post"
			action="index.php?controller=MainController&method=handleLogin">
			<label class="homelabel" for="un"><?php if(isset($lang)) {echo $lang->USERNAME;}?></label>
			<input id="un" class="textinput homelogin" type="text"
				name="userName">
			
			<br /> <label class="homelabel" for="pw"><?php echo $lang->PASSWORD;?></label>
			<input id="pw" class="textinput homelogin" type="password"
				name="password">
			<div class="errpass">Invalid Username or Password</div>
			<br /> <input class="submit login" type="submit" value="Log in"> <a
				class="sml" href="#"><?php echo $lang->FORGETPASSWORD;?></a><br>
			<br>
			<div class="line-separator"></div>
		</form>
				<br />
				<br />


				<h3>Categories</h3>
				<ul class="categories">
					<li><span><a
							href="index.php?controller=MainController&method=handleAddCategory">ADD</a></span></li>
					<li><span><a
							href="index.php?controller=MainController&method=handleUpdateCategory">UPDATE</a></span></li>
					<li><span><a
							href="index.php?controller=MainController&method=handleDeleteCategory">DELETE</a></span></li>
					<li><span><a
							href="index.php?controller=MainController&method=handleDisplayCategory">DISPLAY</a></span></li>
					<li><span><a href="#">Loreum</a></span></li>
					<li><span><a href="#">Loreum Information</a></span></li>
					<li><span><a href="#">Loreum</a></span></li>
					<li class="last"><span><a href="#">Loreum</a></span></li>
				</ul>

			</aside>
			<!-- content -->
      <section id="content">
         <div id="banner">
            <h2>Professional <span>Online Examination <span>Since 2013</span></span></h2>
         </div><div class="ic"></div>
         <div class="inside">
            <h2>Recent <span>Articles</span></h2>
            <ul class="list">
               <li><span><img src="images/icon1.png"></span>
                  <h4>About Online Examination</h4>
                  <p align="justify">Eque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempo- 
                  ra incidunt ut labore.Equeporro quisq uam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
               </li>
               <li><span><img src="images/icon2.png"></span>
                  <h4>Branch Office</h4>
                   <p align="justify">Eque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempo- 
                  ra incidunt ut labore.Equeporro quisq uam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
               </li>
               <li class="last"><span><img src="images/icon3.png"></span>
                  <h4>Student’s Time</h4>
                 <p align="justify">Eque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempo- 
                  ra incidunt ut labore.Equeporro quisq uam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
               </li>
            </ul>
           
           
         </div>
      </section>
   </div>
</div>
footer
<footer>
   <div class="container">
      <div class="inside">
         <div class="wrapper">
      
            <div class="aligncenter"><h5><span>Website designed by</span> </h5><a rel="nofollow" href="http://www.osscube.com" class="new_window">OSSCube.com</a><br>
         
          </div>
         </div>
      </div>
   </div>
</footer>

<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
<?php } ?>