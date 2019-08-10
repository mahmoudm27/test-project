<div id="left_container" class="col col-md-3 col-sm-12">
	<div class="templatemo_logo">
		<a href="index.php"><img src="images/logo/logo.png" alt="دليل الطالب الإلكتروني" style="width:200px;height:200px"></a>
	</div>	

	<nav id="main_nav">
       <ul class="nav">
			<li <?php if(basename($_SERVER['PHP_SELF'])=="index.php")echo "class='active'"; ?>><a href="index.php">  الصفحة الرئيسية للموقع</a></li>
           <li <?php if(basename($_SERVER['PHP_SELF'])=="cpan.php")echo "class='active'"; ?>><a href="cpan.php">واجهة لوحة التحكم</a></li>
			<li <?php if(basename($_SERVER['REQUEST_URI'])=="action.php?act=uni")echo "class='active'"; ?>><a href="action.php?act=uni">إضافة جامعة</a></li>
			<li <?php if(basename($_SERVER['REQUEST_URI'])=="action.php?act=dep")echo "class='active'"; ?>><a href="action.php?act=dep">إضافة قسم</a></li>
			<li <?php if(basename($_SERVER['REQUEST_URI'])=="action.php?act=spc")echo "class='active'"; ?>><a href="action.php?act=spc">إضافة تخصص</a></li>
			<li <?php if(basename($_SERVER['REQUEST_URI'])=="action.php?act=bk")echo "class='active'"; ?>><a href="action.php?act=bk">إضافة كتاب</a></li>
			<li <?php if(basename($_SERVER['REQUEST_URI'])=="action.php?act=vid")echo "class='active'"; ?>><a href="action.php?act=vid">إضافة فيديوا تعليمي</a></li>
			<li <?php if(basename($_SERVER['REQUEST_URI'])=="action.php?act=gran")echo "class='active'"; ?>><a href="action.php?act=gran">إضافة المنح الدراسية</a></li>
           <li <?php if(basename($_SERVER['REQUEST_URI'])=="logact.php")echo "class='active'"; ?>><a href="logact.php">سجل الأحداث log Activity </a></li>
           <li><a href="logout.php">الخروج</a></li>

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