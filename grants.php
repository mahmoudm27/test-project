<?php 
	require_once("scripts/php/controller.php"); 
	$data = array();
	if(isset($_GET["q"]))
	{
		$statement = "SELECT * FROM post WHERE post_name LIKE ?";
		$data = array("%$_GET[q]%");
	}else
		$statement = "SELECT * FROM post";
	
	$res = $db->selectid($statement,$data);
?>
<html>
<head>
	<?php require_once("scripts/static/head.php"); ?>
</head>
<body class="templatemo_padaut_bg">
	<div id="main_container">
		<div class="container" id="services">
			<div class="row col-wrap">			 
				<?php require_once("scripts/static/leftpanel.php"); ?>		  	
				<div id="right_container" class="col col-md-9 col-sm-12">
					<div class="row">
                    	<div class="col col-md-12">
                     		<h2>المنح</h2><br>
                     
                    	</div>
                    </div>
                    
					<?php
					
					$cnt =0;
					foreach($res as $r)
					{
						if($cnt==0)	echo "<article class='rows'>";
						if(strlen($r["post"])>190)
								$desc = substr($r["post"],0,185).".....";
							else
								$desc = $r["post"];
						$img = scandir("images/grant/$r[post_id]");
						$img = "images/grant/$r[post_id]/".$img[2];						
						echo "
						<div class='col  post' style='padding:5px;border:1px solid #eee;background:#fff;margin:5px;float:right;width:48%;border-radius:4px'>
							<img style='height:190px;' src='$img' alt='Pic 1' class='img-thumbnail img-responsive'>
							<h4>$r[post_name]</h4>
							<p style='color:#000'>$desc</p>
							<p><a href='grant.php?gran=$r[post_id]' class='btn btn-primary' role='button'>التفاصيل</a></p>
						</div>					
						";
						
						$cnt++;
						if($cnt==2){echo "</article>";$cnt=0;}
					}
					if($cnt==1)echo "</article>";
					?>				
				</div>
			</div>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>		
	</div>
</body>
</html>