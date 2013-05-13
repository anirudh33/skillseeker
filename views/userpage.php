<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Examination</title>
<meta charset="utf-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet"
	href="<?php echo SITE_URL;?>/assets/css/reset.css" type="text/css"
	media="all">
<link rel="stylesheet"
	href="<?php echo SITE_URL;?>/assets/css/style.css" type="text/css"
	media="all">
<link rel="stylesheet"
	href="<?php echo SITE_URL;?>/assets/css/superfish.css" media="screen">
<link rel="stylesheet"
	href="<?php echo SITE_URL;?>/assets/css/newsfeed.css" media="screen">
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/cufon-yui.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/cufon-replace.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript"
	src="<?php echo SITE_URL;?>/assets/js/script.js"></script>


<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script src="js/menubar.js"></script>

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
	
		$("#content").html(data);

  	    	
    	                	       }, 

	       });
}
function createTest()
{		 $("#content").html("");
	$.ajax({


	     type: "POST",
	     url: '../index.php?controller=AddTest&method=createTestView',                  //the script to call to get data          
	     data: "userId=1" ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
	 
	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	    	  
	     	$("#content").append(data);
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
{		 $("#content").html("");
	$.ajax({


	     type: "POST",
	     url: '../index.php?controller=AddTest&method=createTestView',                  //the script to call to get data          
	     data: "userId=1" ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
	 
	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	    	  
	     	$("#content").append(data);
	       }, });
	
}
function showTests()
{
	alert("hi");
	$.ajax({


	     type: "POST",
	     url: '../index.php?controller=AddTest&method=fetchAlltests',                  //the script to call to get data          
	     data: "userId=1" ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
	 
	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	    	   $("#content").html("");
 	     	var resp=jQuery.parseJSON(data)
        
       $.each(resp, function(key,val) {

    	  			if(key%2==0)
				$("#content").append("<li><h3>"+val+"</h3></li>");
    	  			else{
    	  				var testId="";
        	  		 testId+="<a href='#' onclick='editTest(";
        	  		 testId+=val+")'>Edit</a><a href='#' onclick='deleteTest("+val+")' style='margin:10px 0px 10px 10px;'>Delete</a>";
      
           $("#content").append(testId);
         
    	  			}
              });
  	       $("#content").append("<br/><a href='#' onclick='createTest();'>Create New Test</a>");
            
	       }, });
	
} 

</script>
<script type="text/javascript">

function openPage(str)
{
	if(str=="/views/upload.php") {
	$.ajax({
        type: "POST",
        url: './index.php?controller=TestController&method=loadView&page='+str,
        //data: $("#idForm").serialize(), // serializes the form's elements.
        success: function(data)
        {
        	$('#content').html(' ');
            $('#content').html(data);
            //alert(data); // show response from the php script.
        }
      });
   /*  $.post('index.php',{'controller':'TestController','method':'loadview'},function(data,status){
            if(status == "success")
            {
                $('#content').html(' ');
                $('#content').html(data);
            }
            if(status == "error")
            {
                $('#content').html('<h1>NO Page Found</h1>');
            }
        }); */
	}
	else {
		$.ajax({
	        type: "POST",
	        url: 'index.php?controller=TestController&method=handleQuesUpload',
	        //data: $("#idForm").serialize(), // serializes the form's elements.
	        success: function(data)
	        {
	        	$('#content').html(' ');
	            $('#content').html(data);
	            //alert(data); // show response from the php script.
	        }
	      });
	   /*  $.post('index.php',{'controller':'TestController','method':'loadview'},function(data,status){
	            if(status == "success")
	            {
	                $('#content').html(' ');
	                $('#content').html(data);
	            }
	            if(status == "error")
	            {
	                $('#content').html('<h1>NO Page Found</h1>');
	            }
	        }); */
		}
		
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
  <?php include_once 'headertop.php'; ?>
   <?php include_once 'userheaderbelow.php'; ?>   
   </header>
		<br />
		<div class="container">


			<!-- aside -->
			 <?php include_once 'userdashboard.php'; ?>   

			<br> <br>

		</div>
   <?php include_once 'footer.php'; ?>
</div>


	<script type="text/javascript"> Cufon.now(); </script>
</body>
<script type="text/javascript">
function showCategory()
{
	$.post('index.php',{'controller':'TestController','method':'handleCategory'},function(data,status){
			if(status == "success")
			{
				$('#content').html(' ');
				$('#content').html(data);
			}
			if(status == "error")
			{
				$('#content').html('<h1>NO Page Found</h1>');
			}
		});
}
</script>
</html>
