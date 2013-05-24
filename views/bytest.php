
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script
	src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
	
	<script
	src='http://localhost/skillseeker/trunk/assets/js/functions.js'></script>
	
<script>
$(document).ready(function(){
    $("#add2").hide();
});


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
