<?php 
	require_once("scripts/php/controller.php"); 
	if(!isset($_GET["spc"]))header("location:spicifications.php");
	
	$statement = "SELECT * FROM specifications WHERE spc_id = ?";
	$res = $db->selectid($statement,array($_GET["spc"]));
	if(sizeof($res)>0)
		$res = $res[0];
	else header("location:spicifications.php");
	
	$spec = $db->selectid("SELECT * FROM depspc JOIN specifications ON dpsp_specification = spc_id WHERE dpsp_department = $res[dep_id]");
	 //$spec = $db->selectid("SELECT * FROM depspc,specifications,departments WHERE depspc.depspc_id = specification.depspc_id  AND  specification.spc_id = departments.spc_id ]");
	//$images  = scandir("images/spesifications/$_GET[spc]/");
?>
<html>
<head>
	<?php require_once("scripts/static/head.php"); ?>
</head>
<body class="templatemo_flower_1">
	<div id="main_container">
		<div class="container" id="services">
			<div class="row col-wrap">			 
				<?php require_once("scripts/static/leftpanel.php"); ?>		  	
				<div id="right_container" class="col col-md-9 col-sm-12">
					<div class="row">
                    	<div class="col col-md-12">
							<?php if($_SESSION["ulogged"]) echo "
							<a onclick='delSpc($res[spc_id])'><span class='glyphicon glyphicon-remove'></span></a>
								&nbsp;
							<a href='action.php?act=spc&spc=$res[spc_id]' class='editImg'><span class='glyphicon glyphicon-pencil'></span></a>"; ?>
                        	<h2><?php echo $res["spc_name"]; ?></h2>
                        </div>
                    </div>
					<article class="row">
                    	<div class="col col-md-12">
                        

                            <div class="flexslider">
                              
                            </div>
        				</div>
						<div class="col col-md-12">
                        	<p><?php echo $res["spc_describtion"]; ?></p>
						</div>	

                       <div class="col col-md-12">
                        	<p><?php echo $spec["dep_name"]; ?></p>
						</div>							
					</article>
					
					
					<br><br><br><br>
				</div>
			</div>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>
	</div>
	<script defer src="slider/jquery.flexslider.js"></script>
	<script type="text/javascript">
	$(function(){
		SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
	});
	</script>
		<?php if($_SESSION["ulogged"]) { ?>
	<script>
	function delSpc(id)
	{
		if(confirm("هل انت متاكد انك تريد حذف التخصص؟"))
		{
			$.ajax({
				type : "POST",
				url :  "scripts/php/funcs/deleter.ajax.php",
				data:	{
							act : "spc", 
							id : id
						},
				success : function(result) 
				{
					console.log(result);
					if(result=="D")
					{
						$('#spc'+id).fadeOut(2000);
					}else if(result == "N")
					{
						alert("انت لاتريد فعل ذلك");
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
</body>
</html>