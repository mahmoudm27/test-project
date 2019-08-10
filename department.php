<?php 
	require_once("scripts/php/controller.php"); 
	if(!isset($_GET["dep"]))header("location:departments.php");
	
	$statement = "SELECT * FROM departments WHERE dep_id = ?";
	$res = $db->selectid($statement,array($_GET["dep"]));
	if(sizeof($res)>0)
		$res = $res[0];
	else header("location:departments.php");
	
	$spec = $db->selectid("SELECT * FROM depspc JOIN specifications ON dpsp_specification = spc_id WHERE dpsp_department = $res[dep_id]");
	$deps = "";
	foreach($spec as $s)
	{
		$r = $db->selectid("SELECT spc_id, spc_name FROM specifications WHERE spc_id = $s[dpsp_specification]",array());
		$r = $r[0];
		$deps.="<li><a href='spicification.php?spc=$r[spc_id]'>$r[spc_name]</a></li>";
	}
	$images  = scandir("images/departments/$_GET[dep]/");
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
							<a onclick='deldep($res[dep_id])'><span class='glyphicon glyphicon-remove'></span></a>
										&nbsp;
							<a href='action.php?act=dep&dep=$res[dep_id]' class='editImg'><span class='glyphicon glyphicon-pencil'></span></a>"; ?>
                        	<h2><?php echo $res["dep_name"]; ?></h2>
                        </div>
                    </div>
					<article class="row">
                    	<div class="col col-md-12">
                        
                    		<h2><?php echo $res["uni_name"]; ?></h2>

                            <div class="flexslider">
                              <ul class="slides">
                                <?php for($i=2;$i<sizeof($images);$i++) 
									echo "
								<li>
									<img style='height:350px;' id='sImg$i' src='images/departments/$_GET[dep]/".$images[$i]."'/>
									<a class='delImg' onclick='delImg($i)'><span class='glyphicon glyphicon-remove'></span></a>
								</li>"; ?>
                              </ul>
                            </div>
        				</div>
						<div class="col col-md-12">
                        	<p><?php echo $res["dep_describtion"]; ?></p>
						</div>		            
					</article>
					
					<article class="row">
						<div class='col col-md-6'>
							<h2>تخصصات القسم </h2>
					<?php
					
						foreach($spec as $sp)
						{
							echo
							"
								<p class='text-center'><i class='fa fa-smile-o fa-5x'></i></p>							
								<p><a href='major.php?maj=$sp[spc_id]'>$sp[spc_name]</a></p>
							";
						}					
					?>
					 <!--<ul><?php //echo $deps; ?></ul>-->
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
	function deldep(id)
	{
		if(confirm("هل انت متاكد انك تريد حذف الكلية؟"))
		{
			$.ajax({
				type : "POST",
				url :  "scripts/php/funcs/deleter.ajax.php",
				data:	{
							act : "dep", 
							id : id
						},
				success : function(result) 
				{
					console.log(result);
					if(result=="D")
					{
						$('#dep'+id).fadeOut(2000);
					}else if(result == "N")
					{
						alert("انت لاترريد ذلك");
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