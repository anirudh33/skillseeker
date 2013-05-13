<!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Test</title>
<script	src='http://localhost/skillseeker/trunk/misc/prototypes/html/js/jquery.tools.min.js'></script>
<script language="javascript">
function updateTest()
{

	 $.ajax({


         type: "POST",
         url: '../index.php?controller=AddTest&method=editTest',                  //the script to call to get data          
         data: $("#edittestandcategories").serialize(),                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

               
       
           success: function(data){
        


        
               
           },
           complete: function () {
         
           },
           error: function(){
               
           }
      });
    }


$(document).ready(function()
		{
	$("#editbutton").hide();
	$("#edittestandcategory").hide();
	$("#setRandom").hide();
	$("#option1Settings").hide();
	$("#option2Settings").hide();
	$("#assignTest").hide();
	$("#deleteTest").hide();
		});
		function show(abc)
		{
			
			$('#'+abc).toggle();
			$("#editbutton").show();
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

<body>

    <form action="#" name="edittestandcategories" id="edittestandcategories" >     
<div id="manageTestContainerDiv" >
<h3>Edit Test And Category</h3>
    <a class="aTagManageTest" href="#" onclick=show("edittestandcategory");>Edit Test And Category</a><br/>
     
    <div id="edittestandcategory">
  
		<label>Test Name</label><br/>
		<input type="text" name="testName" id="testName" size="10"
			onblur="uniqueTestName();"><br /> 
			<input type="text" name="testId" id="testId" size="10" style="display: none;" value="<?php echo $_REQUEST['testId']?>">
		<br/><label>Choose the Category</label><br>
		<select
			name="categoryId" id="categoryId">
		
		
		</select><br>		
<!-- 	    <input type="submit" name="edittestandcategorysubmit" value="Submit"/> -->
		
		
    </div>
    <h3>Random Questions</h3>
    Use this setting when you want questions to be randomly chosen from your Question bank each time the test is taken.<br> 
 <a class="aTagManageTest" href="#" onclick=show("setRandom");>Set Random Question</a><br/>
   
    <div id="setRandom">
    Random question settings are optional. Do not add Static questions to this test if you want all questions to be randomly chosen each time it is taken.
As the questions selected for this test will change each time the test is taken, Total points available cannot be calculated in advance.
Note: If you add questions to this test yourself manually (referred to as Static questions) they will not be used again when ClassMarker selects random questions from your question bank.
Use either Option 1 or Option 2, not both.
	<h3>Option 1</h3>

Select the total number of questions randomly chosen from selected categories.
Questions will display in random order irrespective of their categories<br/>

	    <a href="#" onclick=show("option1Settings");>View Option1 Settings</a><br/>
	
	<div id="option1Settings">
	<div id="slide1">
					<input type="text" name="random1" id="random1">total no of questions<br />
				</div>
	<label>From Categories<br>Here all the categories will be shown with checkboxes</label>
	
	
	</div>
	<h3>Option 2</h3>

Select a specific number of questions per category to be randomly chosen.
Allows ordering and grouping questions by category.<br>
	<a href="#" onclick=show("option2Settings");>View Option2 Settings</a><br/>
	
	<div id="option2Settings">
	<label>No. questions per category<br>
	Here all the categories will be shown with the respective textboxes to choose total no of questions per category.
	</label>
	<div id="slides1"></div>
			</div>
	</div>
    
    </div>
    <div> <input type="button"  name="editbutton" id="editbutton" value="Edit Test" onclick="updateTest();" /></div>
    </form>
    <h3>Assign Test</h3>
        <a class="aTagManageTest" href="#" onclick=show("assignTest");>Assign This Test</a><br/>
        <div id="assignTest">
        Once you've finished creating your test you need to Assign your test either to a registered user group, or by creating a direct link / embed code. This enables the test to be taken by your users.
You can come back at anytime to edit this test via the Tests section, even after you have assigned it, and changes will take effect immediately.<br>
        <input type="button" name="assignTestButton" value="Assign Test"/>
        </div>
   
        <h3>Delete Test</h3>
        <a class="aTagManageTest" href="#" onclick=show("deleteTest");>Delete This Test</a><br/>
        <div id="deleteTest">
        <label>Test Name:</label><br>
        Deleting this test is permanent. If the test is currently assigned to any group, it will not be deleted. First remove the test from your groups via the Assign section.<br>
        <input type="button" class='btn' name="deleteTestButton" value="Delete Test"/>
        </div>
    
    </div>
  
</body>
</html>
