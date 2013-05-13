

$(document).ready(function() {

	
  $('#captchaText').blur(function(){
	  captchaCheck();
  });
  
  $('#username').blur(function(){
	  userNameCheck();
  });
 });

function captchaCheck()
{
	var captchaCode = $("#captchaText").val();
	
	$.ajax({
	      url: "./assets/captcha/securimage_show.php",
	      type: "post",
	      data: "number="+captchaCode,
	      success: function(data){
		      if($.trim(data)=="0")
		      {
			     // alert(data);
		    	  $("#captchaText").val('');
		    	  $("#result").html("captcha is wrong");
		      }
		      else if($.trim(data)=="1")
		      {
			     // alert(data);
		    	  $("#result").html("");
		    	  
		      }
		      
	          //alert(data); 
	          // $("#result").html(data);
	    	  
	      },
	      
	    }); 
}



function userNameCheck()
{
	var text = $("#username").val();
	$.post('index.php?controller=MainController&method=uniqueUserNameCheck',{"text":text},function(data){
 		
		if(data.trim()=="true")
		{
	 		//alert(data);
            
			$("#username").val('');
			$("#userresult").html("username already exists");
			
		}
 		
		else if(data.trim()=="false")
  	  {
  	  $("#userresult").html("");
  	  }
		
		
		});

}