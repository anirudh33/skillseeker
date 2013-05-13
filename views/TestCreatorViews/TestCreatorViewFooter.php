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

