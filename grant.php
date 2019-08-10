<?php 
	require_once("scripts/php/controller.php"); 
	if(!$_GET["gran"])header("location:grants.php");
	
	$statement = "SELECT * FROM post WHERE post_id = ? ";
	$res = $db->selectid($statement,array($_GET["gran"]));
	if(sizeof($res)>0)
		$res = $res[0];
	else header("location:grants.php");
	
	//$spec = $db->selectid("SELECT undp_department FROM unidep JOIN departments ON undp_department = dep_id WHERE undp_university = $res[uni_id]");
	//$deps = "";
	//foreach($spec as $b)
	//{
	//	$r = $db->selectid("SELECT dep_id, dep_name FROM departments WHERE dep_id = $b[undp_department]",array());
		//$r = $r[0];
		//$deps.="<li><a href='department.php?dep=$r[dep_id]'>$r[dep_name]</a></li>";
	//}
	$images  = scandir("images/grant/$_GET[gran]/");
	
	//if(isset($_GET['del'])){
	//$statement = "DELETE  FROM universities WHERE uni_id = ? ";
	//$del = $db->selectid($statement,array($_GET["del"]));
	//}
	
?>
<html>
<head>
	<?php require_once("scripts/static/head.php"); ?>
</head>
<body class="templatemo_flower_1">
	<div id="main_container">
		<div class="container" id="services">
			<div class="row col-wrap" >			 
				<?php require_once("scripts/static/leftpanel.php"); ?>		  	
				<div id="right_container" class="col col-md-9 col-sm-12">
					<div class="row">
                    	<div class="col col-md-12">
                        <?php 
                            $_POST[post_id];
						if($_SESSION["ulogged"]) echo "
										<a href='scripts/del.php?gran=$res[post_id]'><span class='glyphicon glyphicon-remove'></span></a>
										&nbsp;
						              <a href='action.php?act=gran&gran=$res[post_id]' class='editImg'><span class='glyphicon glyphicon-pencil'></span></a>"; ?>
									  
                         $_POST['id']==$res[post_id];
									
                    		<h2><?php echo $res["post_name"]; ?></h2>

                            <div class="flexslider">
                              <ul class="slides">
								<?php for($i=2;$i<sizeof($images);$i++) 
									echo "
									<li>
										<img style='height:350px;' id='sImg$i' src='images/grant/$_GET[gran]/".$images[$i]."'/>
										<a class='delImg' onclick='delImg($i)'><span class='glyphicon glyphicon-remove'></span></a>
									</li>";
								?>
								</ul>
                            </div>
        				</div>
                    </div>
					<article class="row" style="margin-top:0;padding-top:0;">
						<div class="col col-md-12">
							<div class="vid_holder">
								<img src="<?php echo $res["image"]; ?>" />
							</div>
						</div>
						<br>
						<div class="col">
                        	<p><?php echo $res["post"]; ?></p>
						</div>		            
					</article>
					
					     
										
				</div>
			</div>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>		
	</div>
		<?php if($_SESSION["ulogged"]) { ?>
	<script>
	function delUni(id)
	{
		if(confirm("هل انت متاكد انك تريد حذف الجامعة؟"))
		{
			$.ajax({
				type : "POST",
				url :  "scripts/php/funcs/deleter.ajax.php",
				data:	{
							act : "gran", 
							id : id
						},
				success : function(result) 
				{
					console.log(result);
					if(result=="D")
					{
						$('#gran'+id).fadeOut(2000);
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
	<script defer src="slider/jquery.flexslider.js"></script>
	<script type="text/javascript">
	/*$(function(){
		SyntaxHighlighter.all();
		});*/
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
	});
	
	
	</script>

</body>
</html>