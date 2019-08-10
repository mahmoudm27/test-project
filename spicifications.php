<?php 
	require_once("scripts/php/controller.php"); 
	$data = array();
	if(isset($_GET["q"]))
	{
		$statement = "SELECT * FROM specifications WHERE spc_name LIKE ?";
		$data = array("%$_GET[q]%");
	}else
		$statement = "SELECT * FROM specifications";
	
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
                     		<h2>التخصصات</h2><br>
                     
                    	</div>
                    </div>
                    
					<?php
					$cnt =0;
					foreach($res as $r)
					{
						if($cnt==0)	echo "<article class='row'>";
						if(strlen($r["spc_describtion"])>190)
								$desc = substr($r["spc_describtion"],0,185).".....";
							else
								$desc = $r["spc_describtion"];
						//$img = scandir("images/specifications/$r[spc_id]");
						//$img = "images/specifications/$r[spc_id]/".$img[2];
						echo "
						<div class='col col-md-6'>							
							
							<h4>$r[spc_name]</h4>
							<p>$desc</p>
							<p><a href='spicification.php?spc=$r[spc_id]' class='btn btn-primary' role='button'>التفاصيل</a></p>
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