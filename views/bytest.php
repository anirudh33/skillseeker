
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script
	src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
	
<script>
$(document).ready(function(){
    $("#add2").hide();
});

function fetchValues(val)
{
	$.ajax
	({
		type: "POST",
		url: 'index.php?controller=TestController&method=fetch&test_id='+val,
		success: function(data)
		{
			$("#add2").html(data);
			var resp=jQuery.parseJSON(data);
	    		$("#add2").html("<table><tr><td>Name</td><td>Marks</td><td>Total Marks</td></tr>");
			$.each(resp, function(key,val) 
			{
		     		$("#add2").append("<tr><td>" +val['first_name']+ "</td><td>" +val['marks']+ "</td><td>" +val['total_marks']+ "</td></tr>");
			});
    
		}
	});
}



function fetchResult()
{
	$.ajax
	({
		type: "POST",
		url: 'index.php?controller=TestController&method=resultView',
		success: function(data)
		{
			$("#add2").show();
			var resp=jQuery.parseJSON(data);
			$("#add2").html("<table><tr><td>Test Name</td><td>Created On</td></tr>");
			$.each(resp, function(key,val)
			{
    		    		$("#add2").append("<tr><td><a href='javascript:void(0)' onclick=fetchValues('"+val['name']+"')> " +val['name']+ "</a></td><td>" +val['created_on']+ "</td></tr>");
    
    			});    
		}
	});
}
</script>
<link rel="stylesheet" type="text/css"
        href="css/resultstyle.css"/>

</head>
<body>
<h2>Overall test results</h2>
<br/>
<h3 class="bytest">Filter tests by category:</h3>
<div>
<select class="bytest1" onchange="fetchResult()">
<option>Generic</option>
<option>Show all tests</option></select><br/><br/>

</div>
<div id="add2">

</div>

<div id="add3">

</div>

</body>
</html>
