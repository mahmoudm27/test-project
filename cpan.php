<?php 
	require_once("scripts/php/controller.php"); 
	if(!$_SESSION["ulogged"])header("location:login.php");
?>
<html style="direction:rtl">
<head>
	<?php require_once("scripts/static/head.php"); ?>
     
      
</head>
<body class="templatemo_juice_bg" style="direction:rtl">
	<div id="main_container">
		<div class="container" id="home">
			<div class="row col-wrap">			 
				<?php require_once("scripts/static/leftpanel2.php"); ?>
				<div id="right_container" class="col col-md-9 col-sm-12">
                
					<div class="row">
                    	<div class="col col-md-12">
							<?php if($_SESSION["notice"]){echo "<div id='notice'>$_SESSION[notice]</div>";unset($_SESSION["notice"]); }?>
                    		<h2 style="margin-bottom:50px;font-size:40px;text-align:center;color:#a9bf39;font-weight:bold">واجهة لوحة التحكم</h2>
							 
							
        				</div>
                        <?php
         function rw_nm($table_name) {
              $con = mysql_connect("localhost","root","");
                                   if (!$con) {
                                            die('Could not connect: ' . mysql_error());
                                        }

                                        mysql_select_db("yemenuniversities", $con);

                                        $result = mysql_query("select * from ".$table_name);
                                    $num_rows = mysql_num_rows($result);

                                    return $num_rows;

                                        mysql_close($con);
         
         }
                        ?>
                        	
						<article class="row">
                        
                            	<div class="col col-md-4">
								<h4   align="center">عدد الأقسام </h4>
								   <h4 align="center">
                                    <?php
                              echo rw_nm("departments"); ?>
                                    </h4>
							</div>
                             
                            
                            	<div class="col col-md-4">
								<h4 align="center">عدد التخصصات</h4>
                                <h4 align="center">
                                    <?php
                              echo rw_nm("specifications"); ?>
                                    </h4>
							</div>
						
                            	<div class="col col-md-4">
								<h4 align="center">عدد الجامعات</h4>
                                <h4 align="center">
                                    <?php
                              echo rw_nm("universities"); ?>
                                    </h4>
							</div>
                            
                            <div class="col col-md-4">
								<h4 align="center">إجمالي الزيارات </h4>
								 <h4 align="center">
                                    <?php
                              echo rw_nm("counter"); ?>
                                    </h4>
								
							</div>
                            	<div class="col col-md-4">
								<h4 align="center">عدد الكتب </h4>
								   <h4 align="center">
                                    <?php
                              echo rw_nm("books"); ?>
                                    </h4>
							</div>
							
                            <div class="col col-md-4">
								<h4 align="center">عدد الفيدوهات</h4>
                                <h4 align="center">
                                    <?php
                              echo rw_nm("videos"); ?>
                                    </h4>
							</div>
                               <div class="col col-md-4">
								<h4 align="center">المنح </h4>
                                <h4 align="center">
                                    <?php
                              echo rw_nm("post"); ?>
                                    </h4>
							</div>
						<article class="row">
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