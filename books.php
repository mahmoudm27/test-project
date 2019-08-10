<?php 
	require_once("scripts/php/controller.php"); 
	if($_GET["q"])
	{
		$data = array("%$_GET[q]%");
		if($_GET["dep"]!="a")
		{
			$deps = "AND bks_specification = ?";
			$data = array("%$_GET[q]%",$_GET["dep"]);
		}
		$statement = "SELECT * FROM books LEFT OUTER JOIN specifications ON bks_specification = spc_id WHERE bks_name LIKE ? $deps ORDER BY bks_name ASC LIMIT 100";
		
	}else
	{
		$statement = "SELECT * FROM books LEFT OUTER JOIN specifications ON bks_specification = spc_id ORDER BY bks_name ASC LIMIT 100";
		$data = array();
	}
	$books = $db->selectid($statement,$data);
	$deps = $db->selectid("SELECT * FROM specifications");
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
                     		<h2>الكتب</h2><br>
                    	</div>
                    </div>
					
					<form action="books.php" method="GET">			
					<div class="row">
					<div class="col-md-2">
							<input type="submit" value="بحث" class="btn btn-primary" />
						</div>
						
						<div class="col-md-4">
							<select name="dep" class="form-control">
								<option value="a"> -- الكل -- </option>
								<?php
									foreach($deps as $d)
									{
										if($_GET["dep"]==$d["spc_id"])$sel ="selected";
										echo "<option $sel value='$d[spc_id]'>$d[spc_name]</option>";
										$sel = "";
									}
								?>
							</select>
						</div>
						
						<div class="col-md-6">
							<span class="glyphicon"></span>
							<input type="text" name="q"  class="form-control" placeholder="Search"/>
						</div>
					</div>
					</form>
                    <Br>
					<article class="row">						
						<div class='col col-md-12'>
							<table id="bookshelf">
								<tr>
									<th>اسم الكتاب</th>
									<th>الوصف</th>
									<th>التخصص</th>
									<th>السنة الجامعية</th>
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
									<td>$b[spc_name]</td>
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
			<style>
				#bookshelf{width:100%;}
				#bookshelf th:not(:last-child):not(:nth-child(4))
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
				#bookshelf tr td:nth-child(4){text-align:center;width:60px;}
				#bookshelf tr td:nth-child(5){text-align:right;width:90px;}
				
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
						alert("هل انت متاكد انك تريد الحذف");
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
</body>
</html>