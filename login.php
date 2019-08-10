<?php 
	require_once("scripts/php/controller.php"); 
?>
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
							<br>
							<br>
							<br>
							<br>
							<br>
							<?php if($_SESSION["notice"]){echo "<div id='notice'>$_SESSION[notice]</div>";unset($_SESSION["notice"]); }?>                    		<h2>Login</h2>
							<br>
							<form action="scripts/php/login.php" method="post">
								<div class="col-md-12">
									<div class="form-group left-inner-addon">
										<span class="glyphicon glyphicon-user"></span>
										<input name="username" multiple type="text" class="form-control" id="input_name" placeholder="username" style="padding-right:30px;">
									</div>
									<div class="form-group left-inner-addon">
										<span class="glyphicon glyphicon-lock"></span>
										<input name="password" multiple type="password" class="form-control" id="input_name" placeholder="password" style="padding-right:30px;">
									</div>
									<div align="center">
										<button type="submit" class="btn btn-primary">Login</button>
									</div>
								</div>
								
							</form>
        				</div>
                    </div>     
				</div>
			</div>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>		
	</div>
</body>
</html>