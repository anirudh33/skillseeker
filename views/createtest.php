<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="../misc/prototypes/html/css/style.css" />
<script
	src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Create Test</title>
<script language="javascript">
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
         	   
         	     	var resp=jQuery.parseJSON(data)
                
               $.each(resp, function(key,val) {

            	  			if(key%2==0)
        				$("#Alltests").append("<li><h3>"+val+"</h3></li>");
            	  			else{
            	  				var testId="";
                	  		 testId+="<a href=edittest.php?testId=";
                	  		 testId+=val+">Edit</a><a href='' onclick='deleteTest("+val+")' style='margin:10px 0px 10px 10px;'>Delete</a>";
              
                   $("#Alltests").append(testId);
            	  			}
                      });
                    
        	       }, });
        	
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
				
					if(key%2==0){
						category+= "<option value="+val+">";
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


        function deleteTest(testId)
        {
				alert(testId);
			 $.ajax({


        	     type: "POST",
        	     url: '../index.php?controller=AddTest&method=deleteTest',                  //the script to call to get data          
        	     data: "testId="+testId ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

        	           
        	     complete: function () {
        		     
        	       },
        	       error: function(){
        	           
        	       },
        	       success: function(data){
				alert(data);
//           	    	 $("#random1").val(data);
          	    	
            	                	       }, 

        	       });
        }
        showTests();
        $(document).ready(function(){
        	  
        	
        	fetchCategories();









        	
        	  
        	});
        
        
        
        </script>
</head>
<body id="createtestbody">
	<div id="Alltests"></div>

	<h2>Create Test</h2>
	<form action="../index.php?controller=AddTest&method=addTestController"
		method='post'>
		Name:<br /> <input type="text" name="testName" id="testName" size="10"
			onblur="uniqueTestName();"><br /> <br /> Category <select
			name="categoryId" id="categoryId">
			<option value="0">Generic</option>

		</select> <br /> <INPUT type="button" class="btn" value="Create Test"
			onclick="addRow1()" />

		<div id="randomoptions">
			<div id="slide">
				randomly select:1

				<div id="slide1">
					<br /> <input type="text" name="random1">total no of questions<br />

				</div>
			</div>
			<div id="slides">
				randomly select:2
				<div id="slides1">
					<br />


				</div>
			</div>

		</div>


		<div id="ques1" style="display: none;">
			<!-- <INPUT type="button" id="btn" value="Create Question" onclick="addRow()" /> -->

			<h2>Insert Question</h2>

			<table id="table_insert">
				<tr>
					<td>Lesson</td>
					<td><input type="text" id="lesson" name="lesson"></td>
				</tr>
				<tr>
					<td>Question</td>
					<td><textarea id="question" name="question" rows="7" cols="30"></textarea></td>
				</tr>

				<tr>
					<td>Question Type</td>
					<td><select><option>multiple choice</option>
							<option>true/false</option>
							<option>Quiz/Practicle</option>
					</select></td>
				</tr>
				<tr>
					<td>Category</td>
					<td><select><option>PHP</option>
							<option>MYSQL</option>
							<option>Zend</option>
					</select></td>
				</tr>

			</table>
			<table id="ques" border="5">
				<tr>
					<td bordercolor=""><INPUT type="button" class="btn"
						value="Add Options" onclick="addRow()" /></td>
				
				
				<tr>
					<th>Option</th>
					<th>Answer</th>
					<th>Feedback</th>
					<th>Remove</th>
				</tr>

			</table>
			<div id="more" style="display: none;">Add Ajax code here to add more
				question</div>
			<INPUT type="submit" class="btn" value="submit" /> <INPUT
				type="button" class="btn" value="Add More Questions"
				onclick="addMore()" />
		</div>
	</form>
</body>
</html>