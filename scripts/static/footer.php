<footer class="row credit">
	<div class="col col-md-12">
		<div id="templatemo_footer">
		<a href="about.php">فريق العمل</a>
		</div>
	</div>
</footer>
<?php if($_SESSION["ulogged"]) { ?>
	<script>
	function delImg(id)
	{
		if(confirm("Are you sure you want to delete this image?"))
		{
			$.ajax({
				type : "POST",
				url :  "scripts/php/funcs/deleter.ajax.php",
				data:	{
							act : "img", 
							url : $("#sImg"+id).attr("src")
						},
				success : function(result) 
				{
					console.log(result);
					if(result=="D")
					{
						$('#bk'+id).fadeOut();
					}else if(result == "N")
					{
						alert("You are not allowed to do this.");
					}else alert("Internal server error");
				},
				error: function()
				{	
					alert("حصل خطأ في الاتصال");
					$('#pr'+id).remove();
					$('#aim').attr("disbaled",false);
					$('#dim').attr("disbaled",false);
				}
			});
		}
	}
	</script>
<?php } ?>