
<script type="text/javascript">
function LoadPageDiv(page)
{
	$('#faqdiv').load(page);
	}
</script>

<div class="faqdiv1">
<form action="#">
<h2>
Search FAQ / Help</h2>
<input type="text" size="20"/><br/><br/>
<input type="button" value="search" class="btn">
</form>
</div>
<div class="faqdiv2">
<br/>
<br/>
<br/>

<ul >
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('faq.html');">FAQ</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('');">Getting started</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('');">Create / edit</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('');">Assign tests</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('');">Result</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('');">Users</a></li>
<li class="instructiontr"><a href="#" onclick="LoadPageDiv('');">Contact Us</a></li>
</ul>
</div>
<div class="faqdiv3" id="faqdiv">
put your code here
</div>
