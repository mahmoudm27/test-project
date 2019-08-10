<?php 
	require_once("scripts/php/controller.php"); 
	if(!isset($_GET["maj"]))header("location:departments.php");
	
	$statement = "SELECT * FROM specifications WHERE spc_id = ?";
	$res = $db->selectid($statement,array($_GET["maj"]));
	if(sizeof($res)>0)
		$res = $res[0];
	else header("location:departments.php");
	
	$books = $db->selectid("SELECT * FROM books WHERE bks_specification = ?",array($_GET["maj"]));
//print_r($books);
	$images  = scandir("images/majors/$_GET[maj]/");
	
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
							<a href='action.php?act=spc&spc=<?php echo $res["spc_id"];?>' class="editImg"><span class='glyphicon glyphicon-pencil'></span></a>
                        	<h2><?php echo $res["spc_name"]; ?></h2>
                        </div>
                    </div>
					<article class="row">
						<div class="flexslider">
								<ul class="slides">
								<?php for($i=2;$i<sizeof($images);$i++) 
									echo "
									<li>
										<img  style='height:350px;' id='sImg$i' src='images/majors/$_GET[maj]/".$images[$i]."'/>
										<a class='delImg' onclick='delImg($i)'><span class='glyphicon glyphicon-remove'></span></a>
									</li>";
								?>
								</ul>
						</div>
						<div class="col col-md-12">
							<div class="vid_holder">
								<!--img src="<?php echo $res["spc_img"]; ?>" /-->
							</div>
						</div>
						<br>
						<div class="col">
                        	<p><?php echo $res["spc_describtion"]; ?></p>
						</div>		            
					</article>
					
					<article class="row">
						<div class='col col-md-6'>
							<h4>الاعمال التي يمكنك ان تعملها بعد التخرج</h4>
							<p><?php echo $res["spc_aftergrad"]; ?></p>
						</div>
						<div class='col col-md-6'>
							<h4>افضل الجامعات لهذا التخصص </h4>
							<p><?php echo $res["spc_bestuni"]; ?></p>
						</div>
					</article> 	
					
					
					<article class="row">
						<div class='col col-md-12'>
							<h2>الكتب لهذا التخصص</h2>
							<br>
						</div>
						<div class='col col-md-12'>
							<table id="bookshelf">
								<tr>
									<th>الاسم</th>
									<th>الوصف</th>
									<th>السنة</th>
									<th></th>
								</tr>
								
							<?php 
								foreach($books as $b)
								{
									if($_SESSION["ulogged"])$acts = "
										<a onclick='delBook($b[bks_id])'><span class='glyphicon glyphicon-remove'></span></a>
										&nbsp;
										<a href='action.php?act=bk&bk=$b[bks_id]'><span class='glyphicon glyphicon-pencil'></span></a>
									";
									
									echo "
								<tr id='bk$b[bks_id]'>
									<td>$b[bks_name]</td>
									<td>$b[bks_describtion]</td>
									<td>$b[bks_year]</td>
									<td>
										<a href='$b[bks_url]' download><span class='glyphicon glyphicon-download-alt'></span></a>
										&nbsp;
										$acts
									</td>
								</tr>";
								}
							?>
							</table>
						</div>
					</article>
									            
										
				</div>
			</div>
			<style>
				#bookshelf{width:100%;}
				#bookshelf th:not(:nth-child(3)):not(:last-child)
				{
					border-right:1px solid white;
				}
				#bookshelf th
				{
					color:#f55b1f;
					border-bottom:2px solid white;
					text-align:center;
				}
				#bookshelf td
				{
					color:white;
					padding:5px;
					padding-left:6px;
				}
				#bookshelf tr:nth-child(odd):not(:first-child){background:rgba(255,255,255,0.15);}
				#bookshelf tr td:nth-child(3){text-align:center;width:60px;}
				#bookshelf tr td:nth-child(4){text-align:right;width:120px;}
				
			</style>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>		
	</div>
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
<?php if($_SESSION["ulogged"]) { ?>
	<script>
	function delBook(id)
	{
		if(confirm("Are you sure you want to delete this book?"))
		{
			$.ajax({
				type : "POST",
				url :  "scripts/php/funcs/deleter.ajax.php",
				data:	{
							act : "bk", 
							id : id
						},
				success : function(result) 
				{
					console.log(result);
					if(result=="D")
					{
						$('#bk'+id).fadeOut(2000);
					}else if(result == "N")
					{
						alert("You are not allowed to do this.");
					}else alert("Internal server error");
				},
				error: function()
				{	
					alert("حصل خطأ في الاتصال");
					$('#pr'+id).remove();
					$('#aim').attr("disbaled",false);
					$('#dim').attr("disbaled",false);
				}
			});
		}
	}
	</script>
	<?php } ?>
</html>