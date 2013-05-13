<?php
require_once SITE_PATH . '/libraries/Language.php';
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../assets/js/jquery-1.9.1.js"></script>
<script>
		function getUserResult()
		{	var email_address = $('#view_result').val();
			$.ajax({
		     type: "POST",
		     url: '../index.php?controller=MainController&method=getUserResult',          
		     data: "email_address = " +email_address ,                       
	     	complete: function () {
		     
	        },
	        error: function(){
	           
	        },
	        success: function(data){  
	     		$("#test_result").html(data);
	        }, 
	   });
}
	</script>
</head>
<body>
	<div>
		<h2>Search User Result</h2>
		<div id="search_user">
			<form method="post"
				action="index.php?controller=MainController&method=handleSearchUser">
				<label>First Name</label> <input type="text" name="first_name"> <label>Last
					Name</label> <input type="text" name="last_name"> <input
					type="submit" value="Search"><br />
			</form>
		</div>
		<div id="search_result">
			<table>
			<?php
			
			if (isset ( $arrPassValue ) && !empty($arrPassValue)) {
				foreach ( $arrPassValue as $key => $value ) {
					echo "<tr>";
					foreach ( $value as $key1 => $value1 ) {
						?>
							<td><?php echo $value1 ?></td>
						<?php
					}
					echo "<td><input type='hidden' id='view_result' value='{$arrPassValue[$key]['email_address']}'><a href='javascript:void(0)' onclick='getUserResult();'>View Result</a></td>";
					echo "</tr>";
				}
			}
			?>
			</table>
		</div>
		<div id="user_result">
			<table id="test_result">
			</table>
		</div>
	</div>
</body>
</html>