<div id="left_container" class="col col-md-3 col-sm-12">
	<div class="templatemo_logo">
		<a href="index.php"><img src="images/logo/logo.png" alt="دليل الطالب الإلكتروني" style="width:200px;height:200px"></a>
	</div>	

	<nav id="main_nav">
       <ul class="nav">
			<li <?php if(basename($_SERVER['PHP_SELF'])=="index.php")echo "class='active'"; ?>><a href="index.php">الصفحة الرئيسية</a></li>
			<li <?php if(basename($_SERVER['PHP_SELF'])=="universities.php")echo "class='active'"; ?>><a href="universities.php">الجامعات</a></li>
			<li <?php if(basename($_SERVER['PHP_SELF'])=="departments.php")echo "class='active'"; ?>><a href="departments.php">الكليات</a></li>
			<li <?php if(basename($_SERVER['PHP_SELF'])=="books.php")echo "class='active'"; ?>><a href="books.php">الكتب</a></li>
			<li <?php if(basename($_SERVER['PHP_SELF'])=="videos.php")echo "class='active'"; ?>><a href="videos.php">الفيديوهات</a></li>
			<li <?php if(basename($_SERVER['PHP_SELF'])=="http://localhost/phpBB3/")echo "class='active'"; ?>><a href="http://localhost:82/phpBB3/">المنتدى</a></li>
			<li <?php if(basename($_SERVER['PHP_SELF'])=="grants.php")echo "class='active'"; ?>><a href="grants.php">المنح</a></li>
			<li <?php if(basename($_SERVER['PHP_SELF'])=="about.php" )echo "class='active'"; ?> ><a href="about.php">من نحن</a></li>
            <?php if(!
                     +-+$_SESSION["ulogged"]){?>
			<li <?php if(basename($_SERVER['PHP_SELF'])=="contact.php")echo "class='active'"; ?>><a href="contact.php">تواصلوا معنا</a></li>
            <?php }?>
			<?php if($_SESSION["ulogged"]){?>
				<li <?php if(basename($_SERVER['PHP_SELF'])=="cpan.php" || basename($_SERVER['PHP_SELF'])=="action.php")echo "class='active'"; ?>><a href="cpan.php">لوحة التحكم</a></li>
			<!--	<li><a href="spicifications.php">التخصص</a></li> -->
				<li><a href="logout.php">الخروج</a></li>
			<?php }?>
		</ul>


        
	</nav> <!-- nav -->	
	<form  action="?" method="get" class="navbar-form" role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search" id="keyword" name="q">
		</div>
		<button type="submit" class="btn btn-primary">بحث</button>
	</form>
	<div>
		<a href="#"><img src="images/social/facebook.png" alt="Like us on Facebook"></a>
		<a href="#"><img src="images/social/twitter.png" alt="Follow us on Twitter"></a>
		<a href="#"><img src="images/social/instagram.png" alt="Follow us on Twitter"></a>
		<a href="#"><img src="images/social/youtube.png" alt="Follow us on Twitter"></a>
		
	</div>
</div>