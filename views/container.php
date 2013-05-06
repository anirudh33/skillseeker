<?php
require_once(SITE_PATH."/views/header.php");
?>

<!-- content -->
      <section id="content">
      <div id="rightcontainer">

<?php 
if($pageName=="MainPage") {
	require_once(SITE_PATH."/views/MainView.php");
}

elseif ($pageName=="RegisterPage")
{
	require_once(SITE_PATH."/views/register.php");
}
else 
{
	die;
}

?>

</div>
</section>
</div>
</div>
<?php 
require_once(SITE_PATH."/views/footer.php");
?>