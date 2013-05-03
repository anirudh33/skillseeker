<?php
require_once(SITE_PATH."/views/header.php");
?>

<!-- content -->
      <section id="content">
      <div id="rightcontainer">

<?php 
if($pagename=="main") {
	require_once(SITE_PATH."/views/MainView.php");
}?>

</div>
</section>
</div>
</div>
<?php 
require_once(SITE_PATH."/views/footer.php");
?>