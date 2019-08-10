<?php 
	$act="a";
	$btn="إضافة";
	if(isset($_GET["dep"]))
	{
		$statement = "SELECT * FROM departments WHERE dep_id = ?";
		$depart = $db->selectid($statement,array($_GET["dep"]));
		$depart = $depart[0];
		$act="e";
		$btn="تعديل";
	}
	
?>
<div class="col col-md-12">
	<h2>إداره اقسام الكليات</h2>
	<br>
	<form action="scripts/php/funcs/departments.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<input style="padding-right:30px;" name="name" type="text" class="form-control" id="input_name" placeholder="اسم الكلية" value="<?php echo $depart["dep_name"];?>" />
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
			<div class="col-md-12">
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-comment" ></span>
					<textarea  style="padding-right:30px;" name="describtion" maxlength="" rows="6" class="form-control" id="input_message" placeholder="الوصف..."><?php echo $depart["dep_describtion"];?></textarea>
				</div>
			</div> 
			<div align="center">
				<button type="submit" class="btn btn-primary"><?php echo $btn;?></button>
				<button type="reset" class="btn btn-default float_r">مسح</button>
			</div>
		</div>
		<input type="hidden" name="act" value="<?php echo $act; ?>" />
		<input type="hidden" name="dep" value="<?php echo $_GET["dep"]; ?>" />
	</form>
</div>