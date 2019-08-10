<?php 
	require_once("scripts/php/controller.php"); 
	if(!isset($_GET["bk"]))header("location:departments.php");
	
	$statement = "SELECT * FROM books WHERE bk_id = ? ORDER BY bks_year ASC";
	$res = $db->selectid($statement,array($_GET["bk"]));
	if(sizeof($res)>0)
		$res = $res[0];
	else header("location:departments.php");
	
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
							<h2><?php echo $res["bks_name"];?></h2>
						</div>
						<div class='col col-md-12'>
							<ul id="bookshelf">
							<?php foreach($books as $b) echo "<li><a href='book.php?bk=$b[bks_id]'>$b[bks_name]</a></li>"; ?>
							</ul>
						</div>
					</article>
									            
										
				</div>
			</div>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>		
	</div>
    
</body>
</html>