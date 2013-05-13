<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Examination</title>
<meta charset="utf-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet" href="../misc/prototypes/html/css/reset.css"
	type="text/css" media="all">
<link rel="stylesheet" href="../misc/prototypes/html/css/style.css"
	type="text/css" media="all">
<link rel="stylesheet" href="../misc/prototypes/html/css/superfish.css"
	media="screen">
<link rel="stylesheet" href="../misc/prototypes/html/css/newsfeed.css"
	media="screen">
<script type="text/javascript"
	src="../misc/prototypes/html/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript"
	src="../misc/prototypes/html/js/cufon-yui.js"></script>
<script type="text/javascript"
	src="../misc/prototypes/html/js/cufon-replace.js"></script>
<script type="text/javascript"
	src="../misc/prototypes/html/js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript"
	src="../misc/prototypes/html/js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript"
	src="../misc/prototypes/html/js/script.js"></script>


<script src="../misc/prototypes/html/js/jquery-1.9.1.min.js"></script>
<script src="../misc/prototypes/html/js/hoverIntent.js"></script>
<script src="../misc/prototypes/html/js/superfish.js"></script>
<script src="../misc/prototypes/html/js/menubar.js"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script
	src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
	type="text/javascript"></script>


<script type="text/javascript">

function editTest(testId)
{		
	 $.ajax({

		
	     type: "POST",
	     url: '../index.php?controller=AddTest&method=editTestView',                  //the script to call to get data          
	     data: "testId="+testId ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	
		$("#Alltests").html(data);

  	    	
    	                	       }, 

	       });
}
function createTest()
{		 $("#Alltests").html("");
	$.ajax({


	     type: "POST",
	     url: '../index.php?controller=AddTest&method=createTestView',                  //the script to call to get data          
	     data: "userId=1" ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
	 
	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	    	  
	     	$("#Alltests").append(data);
	       }, });
	
}

function deleteTest(testId)
{
		
	 $.ajax({


	     type: "POST",
	     url: '../index.php?controller=AddTest&method=deleteTest',                  //the script to call to get data          
	     data: "testId="+testId ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	    	   showTests();
//   	    	 $("#random1").val(data);
  	    	
    	                	       }, 

	       });
}
function createTest()
{		 $("#Alltests").html("");
	$.ajax({


	     type: "POST",
	     url: '../index.php?controller=AddTest&method=createTestView',                  //the script to call to get data          
	     data: "userId=1" ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
	 
	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	    	  
	     	$("#Alltests").append(data);
	       }, });
	
}
function showTests()
{
	
	$.ajax({


	     type: "POST",
	     url: '../index.php?controller=AddTest&method=fetchAlltests',                  //the script to call to get data          
	     data: "userId=1" ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
	 
	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	    	   $("#Alltests").html("");
 	     	var resp=jQuery.parseJSON(data)
        
       $.each(resp, function(key,val) {

    	  			if(key%2==0)
				$("#Alltests").append("<li><h3>"+val+"</h3></li>");
    	  			else{
    	  				var testId="";
        	  		 testId+="<a href='#' onclick='editTest(";
        	  		 testId+=val+")'>Edit</a><a href='#' onclick='deleteTest("+val+")' style='margin:10px 0px 10px 10px;'>Delete</a>";
      
           $("#Alltests").append(testId);
         
    	  			}
              });
  	       $("#Alltests").append("<br/><a href='#' onclick='createTest();'>Create New Test</a>");
            
	       }, });
	
} 
function load() {
var feed ="http://feeds.bbci.co.uk/news/world/rss.xml";
new GFdynamicFeedControl(feed, "feedControl");

}
google.load("feeds", "1");
google.setOnLoadCallback(load);
</script>

</head>

<body id="page1">
	<div class="wrap">
		<!-- header -->
		<header>

			<div class="container">
				<h1>
					<a href="#">Online Examination</a>
				</h1>



				<ul class="sf-menu" id="example">
					<li class="current"><a href="followed.html">Home</a>
						<ul>
							<li><a href="followed.html">Pricing</a></li>
							<li><a href="followed.html">FAQ</a></li>
							<li><a href="followed.html">Contact Us</a></li>



						</ul></li>

					<li class="current"><a href="#" >Test</a>
						<ul>
							<li><a href="followed.html">Categories</a></li>
							<li><a href="followed.html">Question Bank</a></li>
							<li><a href="#" onclick="showTests();">My Test</a></li>
							<li><a href="followed.html">Certificates</a></li>



						</ul></li>
					<li class="current"><a href="followed.html">Assign</a>
						<ul>
							<li><a href="followed.html">Assign</a></li>
							<li><a href="followed.html">View Assign Test</a></li>




						</ul></li>

					<li class="current"><a href="followed.html">Result</a>
						<ul>
							<li><a href="followed.html">By Test</a></li>
							<li><a href="followed.html">Search User</a></li>




						</ul></li>

				</ul>

			</div>
		</header>
		<br />
		<div class="container">
			<!-- aside -->
			<aside>


				<br /> <br />


				<h3>Categories</h3>
				<div id="body">
					<div id="feedControl">Loading...</div>
				</div>

			</aside>
			<!-- content -->
			<div id="Alltests">hiiiiiiiiiiiii</div>

		</div>
	</div>
	footer
	<footer>
		<div class="container">
			<div class="inside">
				<div class="wrapper">

					<div class="aligncenter">
						<h5>
							<span>Website designed by</span>
						</h5>
						<a rel="nofollow" href="http://www.osscube.com" class="new_window">OSSCube.com</a><br>

					</div>
				</div>
			</div>
		</div>
	</footer>

	<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
