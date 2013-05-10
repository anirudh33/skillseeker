<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="../misc/prototypes/html/css/style.css" />
<script
	src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Create Test</title>
<script language="javascript">
var quesCat;
        function addRow1() { 
$("#ques1").show();
        }
        function addRow() {
$("#ques").append('<tr><td><textarea rows="1" cols="10"></textarea></td><td><input type="radio" name="qoption[]"/></td><td><textarea  rows="1" cols="10" ></textarea> </td><td><a href="#"><img src="images/delete1.png" height="34px" alt="halo"/></a></td></tr>');

        }
        function addMore() { 
        	$("#more").show();
        	        }

        function uniqueTestName()
        {
         $.ajax({


             type: "POST",
             url: '../index.php?controller=AddTest&method=testNameAvailability',                  //the script to call to get data          
             data: "testName="+$("#testName").val() ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

                   
           
               success: function(data){
              if(data==0)
        	{
        	alert('name already exists');
        	$("#testName").val("");
             	}


            
                   
               },
               complete: function () {
             
               },
               error: function(){
                   
               }
          });
        }

               function fetchCategories()
        {
        	$.ajax({


          	     type: "POST",
          	     url: '../index.php?controller=AddTest&method=fetchCategories',                  //the script to call to get data          
          	     data: "userId=1" ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

          	           
          	     complete: function () {
          		     
          	       },
          	       error: function(){
          	           
          	       },
          	       success: function(data){

				
           	     	var category="";
           	     	var random1="";
           	     	var random2="";
                  var resp=jQuery.parseJSON(data);
                  $.each(resp, function(key,val) {
					var check=0;
					if(key%2==0){
						 $.each(quesCat, function(key1,val1) {
	            	    	if(val==val1)
		            	    	check=1;
	            	    	 });
						category+= "<option value="+val+">";
						if(check==1)
							random1+='<br/><input type ="checkbox" name="categories1[]" value="'+val+'" checked="checked">';
						else
						random1+='<br/><input type ="checkbox" name="categories1[]" value="'+val+'">';
						random2+='<br/><input type ="text" name="random2[]" value=""><input type ="hidden" name="categories2[]" value="'+val+'">';
					}
            	  			else{
            	  				category+=val+"</option>"
            	  				random1+=val;
            	  				random2+=val;

            	  			}
    	  			
                  });
               
                    $("#categoryId").append(category); 
                    $("#slide1").append(random1); 
                    $("#slides1").append(random2);
          	       }, 

          	       });
        }
               

         function fetchTestName()
         {

        	 $.ajax({


          	     type: "POST",
          	     url: '../index.php?controller=AddTest&method=fetchTestName',                  //the script to call to get data          
          	     data: "testId="+$("#testId").val() ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

          	           
          	     complete: function () {
          		     
          	       },
          	       error: function(){
          	           
          	       },
          	       success: function(data){

						$("#testName").val(data);
              	                	       }, 

          	       });
        }

         function testQuestionCategories()
         {
        	 $.ajax({


          	     type: "POST",
          	     url: '../index.php?controller=AddTest&method=fetchQuestionCategory',                  //the script to call to get data          
          	     data: "testId="+$("#testId").val() ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

          	           
          	     complete: function () {
          		     
          	       },
          	       error: function(){
          	           
          	       },
          	       success: function(data){

            	    	  quesCat=jQuery.parseJSON(data);
            	    	
              	                	       }, 

          	       });
			
         }

			function fetchNoOfQuestion()
			{
	
				 $.ajax({


	          	     type: "POST",
	          	     url: '../index.php?controller=AddTest&method=fetchNoOfQuestion',                  //the script to call to get data          
	          	     data: "testId="+$("#testId").val() ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

	          	           
	          	     complete: function () {
	          		     
	          	       },
	          	       error: function(){
	          	           
	          	       },
	          	       success: function(data){
					
	            	    	 $("#random1").val(data);
	            	    	
	              	                	       }, 

	          	       });
					
			}
          
        $(document).ready(function(){
        	  
        	testQuestionCategories();
        	fetchCategories();

        	fetchTestName();
        	fetchNoOfQuestion();






        	
        	  
        	});
        
        
        
        </script>
</head>
<body id="createtestbody">
	<div id="Alltests"></div>

	<h2>Create Test</h2>
	<form action="../index.php?controller=AddTest&method=editTest"
		method='post'>
		Name:<br /> <input type="text" name="testName" id="testName" size="10"
			onblur="uniqueTestName();"><br /> <input type="text" name="testId"
			id="testId" size="10" style="display: none;"
			value="<?php echo $_REQUEST['testId']?>"> <br /> Category <select
			name="categoryId" id="categoryId">
			<option value="0">Generic</option>

		</select> <br /> <INPUT type="button" class="btn" value="Create Test"
			onclick="addRow1()" />

		<div id="randomoptions">
			<div id="slide">
				randomly select:1

				<div id="slide1">
					<input type="text" name="random1" id="random1">total no of questions<br />
				</div>
			</div>
			<div id="slides">
				randomly select:2
				<div id="slides1"></div>
			</div>

		</div>
		<input type="submit"   value="Edit">
	</form>
</body>
</html>
