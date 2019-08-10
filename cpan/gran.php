<?php 
	$act="a";
	$btn = "إضافة";
	if($_GET["gran"])
	{
		$statement = "SELECT * FROM post WHERE post_id = ?";
		$gran = $db->selectid($statement,array($_GET["gran"]));
		$gran = $gran[0];
		$act="e";
		$btn = "تعديل";
	}
	
?>
<div class="col col-md-12">
	<h2>إداره المنح</h2>
	<br>
	<form action="scripts/php/funcs/grant.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<input style="padding-right:30px;" name="name" type="text" class="form-control" id="input_name" placeholder="عنوان المقال" value="<?php echo $gran["post_name"];?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<input name="images[]" multiple type="file" class="form-control" id="input_name" placeholder="Images">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-comment"></span>
					<textarea style="padding-right:30px;" name="post" maxlength="" rows="6" class="form-control" id="input_message" placeholder="الوصف..."><?php echo $gran["post"];?></textarea><br>
				</div>	
				
			
			</div>
		</div> <!-- row -->
		
			<div align="center">
				<button type="submit" class="btn btn-primary"><?php echo $btn;?></button>
				<button type="reset" class="btn btn-default float_r">مسح</button>
			</div>
		</div>
		<br>
		<input type="hidden" name="act" value="<?php echo $act; ?>" />
		<input type="hidden" name="gran" value="<?php echo $_GET["gran"]; ?>" />
	</form>
</div>