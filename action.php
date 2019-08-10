<?php 
	require_once("scripts/php/controller.php"); 
	if($_SESSION["ulogged"]!=true)header("location:login.php");
?>
<html>
<head>
	<?php require_once("scripts/static/head.php"); ?>
</head>
<body class="templatemo_juice_bg">
	<div id="main_container">
		<div class="container" id="home">
			<div class="row col-wrap">			 
				<?php require_once("scripts/static/leftpanel2.php"); ?>
				<div id="right_container" class="col col-md-9 col-sm-12">
                
					<div class="row">
						<?php require_once("cpan/".$_GET["act"].".php"); ?>
                    </div>     
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
  <!-- templatemo 391 botany -->
</body>
</html>