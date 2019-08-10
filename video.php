<?php 
	require_once("scripts/php/controller.php"); 
	if(!isset($_GET["vid"]))header("location:videos.php");
	
	$statement = "SELECT * FROM videos WHERE vid_id = ? ORDER BY vid_year ASC";
	$res = $db->selectid($statement,array($_GET["vid"]));
	if(sizeof($res)>0)
		$res = $res[0];
	//else header("location:videos.php");
	//print_r($res);
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
                        	<h2><?php echo $res["spc_name"]; ?></h2>
                        </div>
                    </div>
					
					<article class="row">
						<div class='col col-md-12'>
							<h2><?php echo $res["vid_name"];?></h2>
						</div>
						<div class='col col-md-12'>
							<iframe id="ytplayer" type="text/html" width="640" height="360"
							  src="<?php echo $res["vid_url"];?>"
							  frameborder="0"></iframe>
						</div>
					</article>
									            
										
				</div>
			</div>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>		
	</div>
   
</body>
</html>