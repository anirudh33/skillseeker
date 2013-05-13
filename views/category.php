<html>
<head>
<link rel="stylesheet" href="css/style.css" />
<script	src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Category</title>
<script language="javascript">
$(document).ready(function()
{
	$("#createNewCategoryDiv").hide();
	$("#showEditDiv").hide();
	$("#showDeleteDiv").hide();
	var userId = $('#sessionValue').val();
	$.post('index.php',{'controller':'TestController','method':'handleDisplayCategory','userId':userId},function(data,status){
		if(status == "success")
		{
			if(data.trim() == "")
			{
				alert("NO Record exist in database");
			}
			else
			{
			
			alert(data);
			var obj = jQuery.parseJSON(data);
			$.each(obj,function(k,val){
				$.each(val,function(key,value){
					var str = '<h4>'+value+'</h4>'+'<a href="#" onclick=show("showEditDiv");>Show Edit</a>'+
					'<a href="#" onclick=show("showDeleteDiv");>Show Delete</a>'+
					'<input type="hidden" name="'+value+'" value="'+value+'"/>';
					
					$('#manageCategory').append(str);
					});
				});
			}
		}
		if(status == "error")
		{
			$('#manageCategory').html('<h1>some error occured</h1>');
		}
	});
	
});
function show(abc)
{
	$('#'+abc).toggle();
}


</script>
</head>
<body>
<input type="hidden" id = "sessionValue" value = "<?php echo $_SESSION['userId'];?>" />
<div id="categoryContainerDiv">
<div id="createNewCategoryDiv">
<h3>Add new category</h3>
<label>Category name:</label>
<form id="newCategoryNameForm">
<input type="text" id="newCategoryName" name="newCategoryName"/><br>
<input type="button" name="nameSubmit" value="Submit" onclick = "saveCategory()">
</form>
</div>
<div id="showEditDiv">
<label>Edit Category</label>
<form id="categoryEditNameForm">
<input type="text" name="categoryEditName"/><br>
</form>
</div>
<div id="showDeleteDiv">
<label>Delete Category</label>
<input type="button" name="categoryDeleteButton" value="Delete">

</div>

<h3>Manage categories</h3>
<div id="manageCategory" style="Border:2px solid red; width:600px;height:auto;">
</div>
<div id="createTestDiv" style="Border:2px solid red; width:600px;">
<h3>Create new category</h3>
<a href="#" onclick=show("createNewCategoryDiv");>Create New category</a>
</div>
</div>

</body>
<script type="text/javascript">

function saveCategory()
{
	var categoryName = $('#newCategoryName').val();
	$.post('index.php',{'controller':'TestController','method':'handleAddCategory','categoryName':categoryName},function(data,status){
		if(status == "success")
		{
			if(data.trim() == "error")
			{
				alert("Same name already exist in database");
			}
			else
			{
			var str = '<h4>'+data+'</h4>'+'<a href="#" onclick=show("showEditDiv");>Show Edit</a>'+
			'<a href="#" onclick=show("showDeleteDiv");>Show Delete</a>'+
			'<input type="hidden" name="'+data+'" value="'+data+'"/>';
			
			$('#manageCategory').append(str);
			}
		}
		if(status == "error")
		{
			$('#manageCategory').html('<h1>some error occured</h1>');
		}
	});
}
</script>
</html>