<?php require_once("scripts/php/controller.php"); ?>
<html>
<head>
	<?php require_once("scripts/static/head.php"); ?>
</head>
<body class="templatemo_garden_bg">
	<div id="main_container">
		<div class="container" id="contact">
			<div class="row col-wrap">			 
				<?php require_once("scripts/static/leftpanel.php"); ?>		  	
				<div id="right_container" class="col col-md-9 col-sm-12">
					<div class="row"><div class="col col-md-12"><h3>تواصلوا معنا</h3></div></div>
					<div class="row">
						<div class="col-md-12">
							<p>تواصلوا معنا
أطلعونا على آرائكم ومقترحاتكم وملاحظاتكم</p>
						</div>
					</div>
					<?php if($_SESSION["error"])
					{
						echo "<div style='color:white;font-size:24px'>";
						echo $_SESSION["error"];unset($_SESSION["error"]);
						echo "</div>";
					}
					else{ ?>
					<form role="form" action="scripts/php/funcs/sendmail.php" method="post">
						<div class="row">
							<div class="col-md-5">
								<div class="form-group left-inner-addon">
									<span class="glyphicon glyphicon-user"></span>
									<input style="padding-right:30px;" name="fullname" type="text" class="form-control" id="input_name" placeholder="الاسم">
							  </div>
								<div class="form-group left-inner-addon">
									<span class="glyphicon glyphicon-envelope"></span>
									<input style="padding-right:30px;" name="email" type="email" class="form-control" id="input_email" placeholder="البريد الالكتروني">
								</div>
								<div class="form-group left-inner-addon">
									<span class="glyphicon glyphicon-earphone"></span>
									<input style="padding-right:30px;" name="subject" type="text" class="form-control" id="input_subj" placeholder="الموضوع">
								</div>
							</div> 
							<div class="col-md-7">
								<div class="form-group left-inner-addon">
									<span class="glyphicon glyphicon-comment"></span>
									<textarea style="padding-right:30px;" name="message" rows="6" class="form-control" id="input_message" placeholder="الرسالة..."></textarea><br>
									<button type="submit" class="btn btn-primary">إرسال</button>
									<button type="reset" class="btn btn-default float_r">مسح</button>
								</div>
							</div>
						</div> <!-- row -->
					</form>
					<?php } ?>

					<div class="row">
                        <div class="col col-md-12">
                        	<h3> عنواننا</h3>
                        </div>
                    </div>
                    
					<div class="row">				  
						<section class="col-xs-12 col-md-12">
							<iframe 
							src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d962.1009969881428!2d44.1722077!3d15.3002651!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603c3601834e5ab%3A0xc077282656bcc8db!2z2KzYp9mF2LnYqSDYqtmI2YbYqtmDINin2YTYr9mI2YTZitipINmE2YTYqtmD2YbZiNmE2YjYrNmK2Kc!5e0!3m2!1sar!2s!4v1549287796417" 
							width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
																																															
							
							
							
						</section>
					</div>	 
                                             
				</div>
			</div>
            
			<?php require_once("scripts/static/footer.php"); ?>
            
		</div>		
	</div>
</body>
</html>