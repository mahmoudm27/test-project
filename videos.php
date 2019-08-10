<?php 
	require_once("scripts/php/controller.php"); 
	if($_GET["q"])
	{
		$statement = "SELECT * FROM videos LEFT OUTER JOIN specifications ON vid_specification = spc_id WHERE vid_name LIKE ? ORDER BY vid_name ASC LIMIT 100";
		$data = array("%$_GET[q]%");
	}else
	{
		$statement = "SELECT * FROM videos LEFT OUTER JOIN specifications ON vid_specification = spc_id ORDER BY vid_name ASC LIMIT 100";
		$data = array();
	}
	$videos = $db->selectid($statement,$data);
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
                     		<h2>الفيديوهات التعليمية</h2><br>
                    	</div>
                    </div>
					
					<form action="videos.php" method="GET">			
					<div class="row">
					 <div class="col-md-2">
							<input type="submit" value="بحث" class="btn btn-primary" />
						</div>
						<div class="col-md-8">
								<span class="glyphicon"></span>
								<input type="text" name="q"  class="form-control" placeholder="ابحث هنا"/>
						</div>
						
					</div>
					</form>
                    <Br>
					<article class="row">						
						<div class='col col-md-12'>
							<table id="videoshelf">
								<tr>
									<th>الاسم</th>
									<th>الوصف</th>
									<th>التخصص</th>
									<th>السنة الدراسية</th>
									<th></th>
								</tr>
								
							<?php 
								foreach($videos as $b)
								{
									if($_SESSION["ulogged"])$acts = "
										<a onclick='delBook($b[vid_id])'><span class='glyphicon glyphicon-remove'></span></a>
										&nbsp;
										<a href='action.php?act=vid&vid=$b[vid_id]'><span class='glyphicon glyphicon-pencil'></span></a>
									";
									echo "
								<tr id='vid$b[vid_id]'>
									<td>$b[vid_name]</td>
									<td>$b[vid_describtion]</td>
									<td>$b[spc_name]</td>
									<td>$b[vid_year]</td>
									<td>
										<a href='video.php?vid=$b[vid_id]'><span class='glyphicon glyphicon-play'></span></a>
										&nbsp;
										$acts
									</td>
								</tr>";
								}
							?>
							</table>
						</div>
					</article>
			<style>
				#videoshelf{width:100%;}
				#videoshelf th:not(:last-child):not(:nth-child(4))
				{
					border-right:1px solid white;
				}
				#videoshelf th
				{
					color:#f55b1f;
					border-bottom:2px solid white;
					text-align:center;
				}
				#videoshelf td
				{
					color:white;
					padding:5px;
					padding-left:6px;
				}
				#videoshelf tr:nth-child(odd):not(:first-child){background:rgba(255,255,255,0.15);}
				#videoshelf tr td:nth-child(4){text-align:center;width:60px;}
				#videoshelf tr td:nth-child(5){text-align:right;width:90px;}
				
			</style>                          
				</div>
			</div>
			<?php require_once("scripts/static/footer.php"); ?>
		</div>		
	</div>
    <!-- templatemo 391 botany -->
	<?php if($_SESSION["ulogged"]) { ?>
	<script>
	function delBook(id)
	{
		if(confirm("هل انت متاكد انك تريد حذف الفيديوا؟"))
		{
			$.ajax({
				type : "POST",
				url :  "scripts/php/funcs/deleter.ajax.php",
				data:	{
							act : "vid", 
							id : id
						},
				success : function(result) 
				{
					console.log(result);
					if(result=="D")
					{
						$('#vid'+id).fadeOut(2000);
					}else if(result == "N")
					{
						alert("انت لاتسمح بعمل هذا");
					}else alert(" deleted sucssfuly");
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
</body>
</html>