<script type="text/javascript" >

function showAns(idS)
{
	$("#"+idS).show();
}
function LoadPageDiv(id)
{
	
	 $.ajax({

			
	     type: "JSON",
	     url: 'index.php?controller=MainController&method=fetchFAQ&faq_category='+id,                  //the script to call to get data          
	    // data: $("#faqform").serialize(),                       //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"

	           
	     complete: function () {
		     
	       },
	       error: function(){
	           
	       },
	       success: function(data){
	    	   $("#faqdiv").html("");
		
		var resp=jQuery.parseJSON(data);
		$.each(resp, function(key,val) {
    	      if(key%2==0){
        	      var a=key+1;
			$("#faqdiv").append('<p><a href="#" onclick="showAns('+a+')">'+val+'</a></p>');
    	      }
    	      else
    	      {
		$("#faqdiv").append('<div id='+key+ ' style="display:none;"><p>'+val+'<p></div>');
    	      }
		 });
    	  }, 

	       });
}
</script>
<script>
function faq()
{

	 $.ajax({

			
	     type: "POST",
	     url: '../index.php?controller=MainController&method=handleFAQ',                  //the script to call to get data          
	    success: function(data)
	    {
			$("#banner").hide();
			$("#article").hide();

			$("#faq").html("</br>"+data);
		 },

	       });
}
faq();
</script>
</head>
<body>
<div class="faqdiv1">
<form action="./index.php?controller=fetchfaq&method=afetchfaq" id="faqform" method="post">
</form>
</div>
<div class="faqdiv2">
<br/>
<br/>
<br/>

<ul >
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('1');">FAQ</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('2');">Getting started</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('3');">Create / edit</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('4');">Assign tests</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('5');">Result</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('6');">Users</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('7');">Contact Us</a></li>
</ul>
</div>
<div class="faqdiv3" id="faqdiv" style="overflow: auto;" >
put your code here
</div>

