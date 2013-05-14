/*

 **************************** Creation Log *******************************
File Name                   -  functions.js
Project Name                -  SkillSeeker
Description                 -  Functions for multiple view pages 
Version                     -  1.0
Created by                  -  Amber Sharma
Created on                  -  May 13, 2013

*/

// JavaScript Functions for Home Page to open Static Functions

function homepageview(str)
{
	if(str=="/views/homepage.php")
	{
		location.reload();
	}
	else
	{
		$('#inside').load(str);
	}
}


// JavaScript Functions For Create Test Page for Uploading Questions One By one

function addRow1() 
{
        $("#ques1").show();
}
        
function addRow() 
{
        i ++;
	$("#ques").append('<div id='+i+'><tr><td><textarea rows="1" name="opt[]" cols="10"></textarea></td><td><input type="radio" name="opt[]"/></td><td><a href="javascript:void(0)" onclick="removerow()"><img src="../assets/images/delete1.png" height="34px" alt="halo"/></a></td></tr></div>');
}
        

function addMore() 
{
        $("#more").show();
}

function removerow(i) 
{
        alert(i);
}

function insertTest() 
{
    	$.ajax({
			type: "POST",
  		     	url: './index.php?controller=TestController&method=createQues',                  //the script to call to get data          
  		     	data: $("#ques").serialize()  ,                        //Form Elements are Serialized here
  		        success: function(data)
			{
	  			$("#content").html($.trim(data));
  	    		},
		});
}

// Javascript Functions for Assign Link Page 

function assignLink()
{
	document.getElementById("assign_btn").disabled = true; 
	$.ajax
	({
		type: "POST",
	    	url: '../index.php?controller=TestController&method=handleassignLink',  
	     	data: $('#assignlinkform').serialize(),
	       	success: function(data)
		{
		    	$('#Directlink1').hide();
		    	$("#result").html(data);
		    	document.getElementById("assign_btn").disabled = false;
		}
  	});
} 

function fetchLink()
{	
	$.ajax
	({
		type: "POST",
	    	url: '../index.php?controller=TestController&method=handleFetchLink&test_id='+<?php echo $test_id;?>,  
	       	success: function(data)
		{
			$("#link").append('<td ><input type="text" name="link" value="'+data+'" readonly/></td>');
    	 	}
	});
}


//JavaScript Functions for Assign Test Page

function assignTest()
{
	$.ajax
	({
		type: "POST",
		url: '../index.php?controller=TestController&method=handleassignTest',
		data: $('#assigntestform').serialize(),
		success: function(data)
		{
		    	$('#Directlink1').hide();
			$("#result").append(data);
		}
	});
} 

//JavaScript Functions for By Test Page

function fetchValues(val)
{
	$.ajax
	({
		type: "POST",
		url: '../index.php?controller=TestController&method=fetch&test_id='+val,
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
		url: '../index.php?controller=TestController&method=resultView',
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

