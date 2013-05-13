<!-- aside -->
<?php include_once 'userdashboard.php'; ?>   


<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/menubar.js"></script>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
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
	
	$.ajax({
        type: "POST",
        url: 'index.php?controller=TestController&method=loadView&page='+str,
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
          <h1><a href="#"><?php echo $lang->ONLINE." " .$lang->EXAMINATION;?></a></h1>
				
					
						
							<ul class="sf-menu" id="example">
								<li class="current">
									<a href="#"><?php echo $lang->HOME;?></a>
									<ul class="follow">
										<li>
											<a href="#"><?php echo $lang->PRICING;?></a>
										</li>
										<li>
											<a href="#"><?php echo $lang->FAQ;?></a>
										</li>
										<li>
											<a href="#"><?php echo $lang->CONTACTUS;?></a>
										</li>
									</ul>
									</li>
							<li class="current">
									<a href="#">Test</a>
									<ul class="follow">
										<li>
											<a href="javascript:showCategory()" on click="javascript:showCategory()"><?php echo $lang->CATEGORIES;?></a>
											
										</li>
										<li>
											<a href="#"><?php echo $lang->QUESTION." " .$lang->BANK;?></a>
											<ul>
							<li><a href="javascript:void(0)" onclick="openPage('/views/createtest.php')"><?php echo $lang->ADD ." ".$lang->QUESTION." " .$lang->ONE . " " . $lang->BY . " " .$lang->ONE ;?></a></li>
							<li><a href="javascript:void(0)" onclick="openPage('/views/upload.php')"><?php echo $lang->ADD ." ".$lang->QUESTION." " .$lang->IN . " " . $lang->BULK;?></a></li>
							
						</ul>
											
										</li>
										<li>
											<a href="javascript:void(0)" onclick="showTests();"><?php echo $lang->MY . " " .$lang->TEST;?></a>
										</li>
										<li>
											<a href="#"><?php echo $lang->CERTIFICATES;?></a>
										</li>
										<li>
											<a href="#"><?php echo $lang->CREATE. " " .$lang->TEST;?></a>
										</li>
									
					
					
									</ul>
									</li>
									
									
									
									
									
									
									
									
									
									
									
							<li class="current">
									<a href="#"><?php echo $lang->ASSIGN;?></a>
									<ul class="follow">
										<li>
											<a href="#"><?php echo $lang->ASSIGN;?></a>
											
										</li>
										<li>
											<a href="#"><?php echo $lang->VIEW." " .$lang->ASSIGN. " " .$lang->TEST;?></a>
										</li>
										
									
					
					
									</ul>
									</li>
			
						<li class="current">
									<a href="#"><?php echo $lang->RESULT;?></a>
									<ul class="follow">
										<li>
											<a href="javascript:void(0)" onclick="openPage('/views/bytest.php')">By Test</a>
										</li>
										<li>
											<a href="#"><?php echo $lang->SEARCH. " " .$lang->USER;?></a>
										</li>
										
									
					
					
									</ul>
									</li>
			
		</ul>
	
			</div>
   </header>
   <br/>
   <div class="container">
   
  
      <!-- aside -->
			<aside>

				
				<br />
				<br />


				<h3><?php echo $lang->CATEGORIES;?></h3>
				<div id="body">
<div id="feedControl">Loading...</div>
</div>

			</aside>
			<!-- content -->
			 <section id="content">
         <div id="banner">
            <h2><?php echo $lang->PROFESSIONAL;?><span><?php echo $lang->ONLINE." " .$lang->EXAMINATION;?><span><?php echo $lang->SINCE2013;?></span></span></h2>
         </div><div class="ic"></div></section>
				
			<br><br>
<!--       <section id="content"> -->
<!--          <div id="banner"> -->
<!--             <h2>Professional <span>Online Examination <span>Since 2013</span></span></h2> -->
<!--          </div><div class="ic"></div> -->
        
<!--       </section> -->
   </div>
</div>
<footer>
   <div class="container">
      <div class="inside">
         <div class="wrapper">
      
            <div class="aligncenter"><h5><span><?php echo $lang->WEBSITE." " .$lang->DESIGNED ." ".$lang->BY;?></span> </h5><a rel="nofollow" href="http://www.osscube.com" class="new_window"><?php echo $lang->OSSCUBECOM;?></a><br>
         
          </div>
         </div>
      </div>
   </div>
</footer>

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
