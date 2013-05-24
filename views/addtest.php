<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<script language="javascript">
function show(abc)
{
	
	$('#'+abc).toggle();
// 	$("#editbutton").show();
}
function submitCreateTest()
{
	 $.ajax({


         type: "POST",
         url: "./index.php?controller=AddTest&method=addTestController",                  //the script to call to get data          
         data: $("#createTest").serialize(),                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

               
       
           success: function(data){
        	   $("#Alltests").html("Test created Successfully.");
              	   


        
               
           },
           complete: function () {
         
           },
           error: function(){
               
           }
      });
	
}
function showOptions()
{
	$("#setRandom").show();
}
        function addRow1() { 
$("#ques1").show();
        }
        function addRow() {
$("#ques").append('<tr><td><textarea rows="1" cols="10"></textarea></td><td><input type="radio" name="qoption[]"/></td><td><textarea  rows="1" cols="10" ></textarea> </td><td><a href="#"><img src="http://localhost/skillseeker_old/trunk/misc/prototypes/html/images/delete1.png" height="34px" alt="halo"/></a></td></tr>');

        }
        function addMore() { 
        	$("#more").show();
        	        }

        function uniqueTestName()
        {
         $.ajax({


             type: "POST",
             url: './index.php?controller=AddTest&method=testNameAvailability',                  //the script to call to get data          
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

//         function showTests()
//         {
        	
//         	$.ajax({


//         	     type: "POST",
//         	     url: '../index.php?controller=AddTest&method=fetchAlltests',                  //the script to call to get data          
//         	     data: "userId=1" ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
        	 
        	           
//         	     complete: function () {
        		     
//         	       },
//         	       error: function(){
        	           
//         	       },
//         	       success: function(data){
         	   
//          	     	var resp=jQuery.parseJSON(data)
                
//                $.each(resp, function(key,val) {

//             	  			if(key%2==0)
//         				$("#Alltests").append("<li><h3>"+val+"</h3></li>");
//             	  			else{
//             	  				var testId="";
//                 	  		 testId+="<a href=edittest.php?testId=";
//                 	  		 testId+=val+">Edit</a><a href='' onclick='deleteTest("+val+")' style='margin:10px 0px 10px 10px;'>Delete</a>";
              
//                    $("#Alltests").append(testId);
//             	  			}
//                       });
                    
//         	       }, });
        	
//         } 
        function fetchCategories()
        {
        	$.ajax({


          	     type: "POST",
          	     url: './index.php?controller=AddTest&method=fetchCategories',                  //the script to call to get data          
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


       
       
        $(document).ready(function(){
        	  
        	
        	fetchCategories();

        	});
        $("#testsubmit").mouseover(function(){
        	uniqueTestName();
      	}); 
        
        
        </script>
</head>
<body id="createtestbody">
	<div id="Alltests">

	<h2>Create Test</h2>
	<form action="#" method='post' id="createTest">
		Name:<br /> <input type="text" name="testName" id="testName" size="10"
			onblur="uniqueTestName();" required="required"><br /> <br /> Category <select
			name="categoryId" id="categoryId">
			

		</select> <br /><br /><br />
				 <h3>Random Questions</h3><br /><br />
    Use this setting when you want questions to be randomly chosen from your Question bank each time the test is taken.<br> 
 <a class="aTagManageTest" href="#" onclick=showOptions();>Set Random Question</a><br/>
   
    <div id="setRandom" style="display:none">
    Random question settings are optional. Do not add Static questions to this test if you want all questions to be randomly chosen each time it is taken.
As the questions selected for this test will change each time the test is taken, Total points available cannot be calculated in advance.
Note: If you add questions to this test yourself manually (referred to as Static questions) they will not be used again when ClassMarker selects random questions from your question bank.
Use either Option 1 or Option 2, not both.
		<div id="randomoptions" >
			<div id="slide"><br /><br />
			<h3>Option 1</h3>

Select the total number of questions randomly chosen from selected categories.
Questions will display in random order irrespective of their categories<br/>
			
				<a class="aTagManageTest" href="#" onclick="show('slide1');">View Option1 Settings</a><br/>

				<div id="slide1" style="display:none">
					<br /> <input type="text" name="random1">total no of questions<br />

				</div>
			</div>
			<div id="slides" >
			<br/><br/><br/>
				<h3>Option 2</h3>

Select a specific number of questions per category to be randomly chosen.
Allows ordering and grouping questions by category.<br>
<a class="aTagManageTest" href="#" onclick="show('slides1');">View Option 2 Settings</a><br/>
				<div id="slides1" style="display:none">
					


				</div>
			</div>

		</div>

		</div>
		
			<INPUT type="button" class="btn" value="submit" onclick="submitCreateTest();" id="testsubmit"/> 
		
	</form>
	</div>
</body>
</html>
