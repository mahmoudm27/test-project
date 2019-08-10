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
		$statement = "SELECT * FROM activities";
		
	}else
	{
		$statement = "SELECT * FROM activities";
		$data = array();
	}
	$books = $db->selectid($statement,$data);
	$deps = $db->selectid("SELECT event FROM activities");
?>
<html>
<head>
	<?php require_once("scripts/static/head.php"); ?>
</head>
<body class="templatemo_padaut_bg">
	<div id="main_container">
		<div class="container" id="services">
			<div class="row col-wrap">			 
				<?php require_once("scripts/static/leftpanel2.php"); ?>		  	
				<div id="right_container" class="col col-md-9 col-sm-12">
					<div class="row">
                    	<div class="col col-md-12">
                     		<h2>الأحداث</h2><br>
                    	</div>
                    </div>
					
					<form action="logact.php" method="GET">			
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
										if($_GET["dep"]==$d["id"])$sel ="selected";
										echo "<option $sel value='$d[id]'>$d[Event]</option>";
										$sel = "";
									}
								?>
							</select>
						</div>
						
						<div class="col-md-6">
							<span class="glyphicon"></span>
							<input type="text" name="q"  class="form-control" placeholder="إبحث برقم الحدث"/>
						</div>
					</div>
					</form>
                    <Br>
					<article class="row">						
						<div class='col col-md-12'>
							<table id="bookshelf">
								<tr>
									<th>التاريخ</th>
									<th>الحدث</th>
									<th>المستخدم</th>
									<th>رقم الحدث</th>
									<th></th>
								</tr>
								
							<?php 
								foreach($books as $b)
								{
								
									echo "
								<tr id='bk$b[id]'>
									<td>$b[date]</td>
									<td>$b[Event]</td>
									
                                    <td></td>
                                    <td>$b[id]</td>
									
								
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
	
	<?php } ?>
</body>
</html>