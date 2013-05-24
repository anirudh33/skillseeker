<html>
<head>
<link rel="stylesheet" href="css/style.css" />
<script	src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Category</title>
<script language="javascript">
//$(document).ready(function()
//{

	$("#createNewCategoryDiv").hide();
	$("#showEditDiv").hide();
	$("#showDeleteDiv").hide();
	displayCategory();
//});
function showEdit(abc)
{
	$('#createNewCategoryDiv').hide();
	$('#showDeleteDiv').hide();
	$('#showEditDiv').show();
	$('#categoryEditName').val(abc);
	$('#hiddenCategoryEditName').val(abc);
}
function showDelete(abc)
{
	$('#createNewCategoryDiv').hide();
	$('#showEditDiv').hide();
	$('#showDeleteDiv').show();
	$('#categoryDeleteName').val(abc);
}
function showCreateNewCategory()
{

	$('#showEditDiv').hide();
	$('#showDeleteDiv').hide();
	$('#newCategoryName').val('');
	$('#createNewCategoryDiv').show();
}

function hideDivs()
{
	$("#createNewCategoryDiv").hide();
	$("#showEditDiv").hide();
	$("#showDeleteDiv").hide();	
}

function displayCategory()
{
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
			var obj = jQuery.parseJSON(data);
			$.each(obj,function(k,val){
				$.each(val,function(key,value){

					var str="<h4>"+value+"</h4><a href='#' onclick='showEdit(\""+value+"\")'>Show Edit</a>";
						str +="<a href='#' onclick='showDelete(\""+value+"\")'> Show Delete</a>";
						str +="<input type='hidden' id='"+value+"' name='"+value+"' value='"+value+"'/>";

					
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
}

function saveCategory()
{
	var categoryName = $('#newCategoryName').val();
	if(categoryName.trim() != "")
	{
		$.post('index.php',{'controller':'TestController','method':'handleAddCategory','categoryName':categoryName},function(data,status){
			if(status == "success")
			{
				if(data.trim() == "error")
				{
					alert("Same name already exist in database");
				}
				else
				{
					data=data.trim();
					var str="<h4>"+data+"</h4><a href='#' onclick='showEdit(\""+data+"\")'>Show Edit</a>";
					str +="<a href='#' onclick='showDelete(\""+data+"\")'> Show Delete</a>";
					str +="<input type='hidden' id='"+data+"' name='"+data+"' value='"+data+"'/>";
					$('#manageCategory').append(str);
					hideDivs();
				}
			}
			if(status == "error")
			{
				$('#manageCategory').html('<h1>some error occured</h1>');
			}
		});
	}
	else
	{
		alert("please enter some category name");
	}
}

function updateCategory()
{
	//alert("there");
	var oldCategoryName = $('#hiddenCategoryEditName').val();
	var newCategoryName = $('#categoryEditName').val();
	$.post('index.php',{'controller':'TestController','method':'handleUpdateCategory','newCategoryName':newCategoryName,'oldCategoryName':oldCategoryName},function(data,status){
		if(status == "success")
		{
			if(data.trim() == "error")
			{
				alert("Same name already exist in database");
			}
			else
			{
				data=data.trim();
				$('#manageCategory').html("");
				hideDivs();
				displayCategory();
			}
		}
		if(status == "error")
		{
			$('#manageCategory').html('<h1>some error occured</h1>');
		}
	});
}

function deleteCategory()
{
	var choice = confirm("do you really want to delete");
	if(choice == true)
	{
	var categoryName = $('#categoryDeleteName').val();
	$.post('index.php',{'controller':'TestController','method':'handleDeleteCategory','categoryName':categoryName},function(data,status){
		if(status == "success")
		{
			if(data.trim() == "error")
			{
				alert("Same name already exist in database");
			}
			else
			{
				data=data.trim();
				$('#manageCategory').html("");
				hideDivs();
				displayCategory();
			}
		}
		if(status == "error")
		{
			$('#manageCategory').html('<h1>some error occured</h1>');
		}
	});
	}
	else
	{
		
	}
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
<input type="button" name="nameSubmit" value="Submit" onclick = "saveCategory();"/>
</form>
</div>
<div id="showEditDiv">
<label>Edit Category</label>
<form id="categoryEditNameForm">
<input type="text" id = "categoryEditName" name="categoryEditName"/><br/>
<input type="hidden" id = "hiddenCategoryEditName" value = "hiddenCategoryEditName" />
<input type="button" id="editCategory" name="editCategory" value="Update" onclick="updateCategory()"/><br>
</form>
</div>
<div id="showDeleteDiv">
<label>Delete Category</label><br/>
<input type="text" id = "categoryDeleteName" name="categoryDeleteName" readonly="true" /><br>
<input type="hidden" id = "hiddenCategoryDeleteName" value = "hiddenCategoryDeleteName" />
<input type="button" id="deleteCategory" name="deleteCategory" value="Delete" onclick="deleteCategory()" />

</div>

<h3>Manage categories</h3>
<div id="manageCategory" style="Border:2px solid red; width:600px;height:auto;">
</div>
<div id="createTestDiv" style="Border:2px solid red; width:600px;">
<h3>Create new category</h3>
<a href="#" onclick="showCreateNewCategory()">Create New category</a>
</div>
</div>

</body>
<script type="text/javascript">



</script>
</html>