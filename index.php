<?php require_once("scripts/php/controller.php"); ?>
<html>
<head>
	<?php require_once("scripts/static/head.php"); ?>
</head>
<body class="templatemo_juice_bg">
	<div id="main_container">
		<div class="container" id="home">
			<div class="row col-wrap">			 
				<?php require_once("scripts/static/leftpanel.php"); ?>
				<div id="right_container" class="col col-md-9 col-sm-12">
                
					<div class="row">
                    	<div class="col col-md-12">
                        
							<section id="slider">
							  <input type="radio" name="slider" id="s1">
							  <input type="radio" name="slider" id="s2">
							  <input type="radio" name="slider" id="s3" checked>
							  <input type="radio" name="slider" id="s4">
							  <input type="radio" name="slider" id="s5">
							  <label for="s1" id="slide1"></label>
							  <label for="s2" id="slide2"></label>
							  <label for="s3" id="slide3"></label>
							  <label for="s4" id="slide4"></label>
							  <label for="s5" id="slide5"></label>
							</section>
                            
        				</div>
                    </div>
					
					<div class="row" style="clear: both;
							padding-top: 0px;
							padding-right: 10px;
							padding-bottom: 0px;
							padding-left: 10px;
							border-bottom: 2px solid #abc238;
							margin-right: 15px;
							margin-left: 15px;">
											
						<div class="col col-md-8" >
						 
						</div>
                    	<div class="col col-md-4">
                          <div class="title text-center" style="background:#abc238;padding:5px;margin-top:70px">
						    <h2 style="color:#fff">اسماء الكليات</h2>
						  </div>
        				</div>
					 
                    </div>
					
					
					<?php 
						$statement = "SELECT * FROM `departments` WHERE dep_id >= (SELECT FLOOR( MAX(dep_id) * RAND()) FROM `departments` ) ORDER BY dep_id LIMIT 3;";
						$res = $db->selectid($statement,array());
						echo" <article class='row'>
					        ";
						foreach($res as $r)
						{
							if(strlen($r["dep_describtion"])>300)
								$desc = substr($r[dep_describtion],0,300).".....";
							else
								$desc = $r["dep_describtion"];
							$img = scandir("images/departments/$r[dep_id]/");
							$img = $img[random(sizeof($img))];
							echo "
						        <div class='col col-md-4'>
								<img style='width:400px; height:150px;' src='images/departments/$r[dep_id]/$img' alt='' class='img-thumbnail img-responsive img_left'>
								<h3>$r[dep_name]</h3> 
								<p>".$desc."</a>.			
								 </p>
								<p><a href='department.php?dep=$r[dep_id]' class='btn btn-primary' role='button'>عرض المزيد</a></p>
                            </div>
						";
						}
						echo"
							</article>";
						function random($x)
						{
							return rand(2,$x-1);
						}
					?>

             <div class="row" style="clear: both;
							padding-top: 0px;
							padding-right: 10px;
							padding-bottom: 0px;
							padding-left: 10px;
							border-bottom: 2px solid #abc238;
							margin-right: 15px;
							margin-left: 15px;">
											
						<div class="col col-md-8" >
						 
						</div>
                    	<div class="col col-md-4">
                          <div class="title text-center" style="background:#abc238;padding:5px;margin-top:70px">
						    <h2 style="color:#fff">اسماء الجامعات</h2>
						  </div>
        				</div>
					 
                    </div>	
                    
					 <?php 
						$statement = "SELECT * FROM `universities` WHERE uni_id>= (SELECT FLOOR( MAX(uni_id) * RAND()) FROM `universities` ) ORDER BY uni_id LIMIT 3;";
						$res = $db->selectid($statement,array());
						echo" <article class='row'>
					        ";
						foreach($res as $r)
						{
							if(strlen($r["uni_describtion"])>300)
								$desc = substr($r[uni_describtion],0,300).".....";
							else
								$desc = $r["uni_describtion"];
							$img = scandir("images/universities/$r[uni_id]/");
							$img = $img[random(sizeof($img))];
							echo "
						        <div class='col col-md-4'>
								<img style='width:400px; height:150px;' src='images/universities/$r[uni_id]/$img' alt='' class='img-thumbnail img-responsive img_left'>
								<h3>$r[uni_name]</h3> 
								<p>".$desc."</a>.			
								 </p>
								<p><a href='university.php?uni=$r[uni_id]' class='btn btn-primary' role='button'>عرض المزيد</a></p>
                            </div>
						";
						}
						echo"
							</article>";
						function randoms($x)
						{
							return rand(2,$x-1);
						}
					?>
					
					
				</div>
			</div>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>		
	</div>
	
  <!-- FlexSlider -->
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
  
</body>
</html>