<?php
if (isset ( $_SESSION ['lang'] )) {
	$langType = $_SESSION ['lang'];
} else {
	$langType = 'en';
}
require SITE_PATH . '/languages/lang.' . $langType . ".php";
$lang = new Language ( $langArr );

?>



<?php 
if($pageName=="MainPage" ) {
//     require_once(SITE_PATH."/views/header.php");
       require_once(SITE_PATH."/views/homepage.php");
}

else if ($pageName=="RegisterPage")
{
    
	require_once(SITE_PATH."/views/register.php");
}
else if ($pageName=="AssignTest")
{

	require_once(SITE_PATH."/views/assigntest.php");
}
else if ($pageName=="category")
{

	require_once(SITE_PATH."/views/category.php");
}
else if ($pageName=="userPage")
{
    require_once(SITE_PATH."/views/userpage.php");
   
   
} else {
	die ();
}

?>

</div>
		</section>
	</div>
	</div>
 <?php
// require_once (SITE_PATH . "/views/footer.php");
 ?>