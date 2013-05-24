<?php
require_once SITE_PATH . '/libraries/Language.php';
?>
<style type="text/css">
div.search_result table,div.search_result th,div.search_result tr,div.search_result td {
	border: 1px solid black;
	padding: 5px;
}
</style>
<script type="text/javascript" src="../assets/js/jquery-1.9.1.js"></script>
<script>
		function getUserResult(email_address)
		{	
			$.ajax({
		     type: "POST",
		     url: '../index.php?controller=MainController&method=getUserResult',          
		     data: "email=" +email_address ,                       
	        error: function(){
	           alert("error");
	        },
	        success: function(data){  
	        	$("#search_result").html("");
	     		$("#test_result").html(data);
	        }, 
	   });
}
	</script>
<section id="content">
	<div>
		<h2>Search User Result</h2>
		<div class="search_user">
			<form method="post"
				action="index.php?controller=MainController&method=handleSearchUser">
				<label>First Name</label> <input type="text" name="first_name"> <label>Last
					Name</label> <input type="text" name="last_name"> <input
					type="submit" value="Search"><br />
			</form>
		</div>
		<div class="search_result" id="search_result">
			<table id="searchUserTable">
			<?php
if (isset ( $arrPassValue ) && ! empty ( $arrPassValue )) {
    ?>
			    <tr>
					<th><h2>First Name</h2></th>
					<th><h2>Last Name</h2></th>
					<th><h2>Email Address</h2></th>
					<th><h2>Result</h2></th>
				</tr>
			    <?php
    foreach ( $arrPassValue as $key => $value ) {
        echo "<tr>";
        foreach ( $value as $key1 => $value1 ) {
            ?>
							<td><?php echo $value1 ?></td>
						<?php
        }
        echo "<td><a href='javascript:void(0)' onclick=\"getUserResult('{$arrPassValue[$key]['email_address']}');\">View Result</a></td>";
        echo "</tr>";
    }
} elseif (empty ( $arrPassValue )) {
    ?>
			    <tr>
					<td><?php echo "No Records Found"?></td>
				</tr>
			    <?php
}
?>
			</table>
		</div>
		<div class="search_result" id="user_result">
			<table id="test_result">
			    
			</table>
		</div>
	</div>
</section>