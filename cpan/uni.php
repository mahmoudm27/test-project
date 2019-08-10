<?php 
	$act="a";
	$btn = "إضافة";
	if($_GET["uni"])
	{
		$statement = "SELECT * FROM universities WHERE uni_id = ?";
		$uni = $db->selectid($statement,array($_GET["uni"]));
		$uni = $uni[0];
		$act="e";
		$btn = "تعديل";
	}
	$alldep = $db->selectid("SELECT * FROM departments ORDER BY dep_name ASC");
?>
<div class="col col-md-12">
	<h2>إداره الجامعات</h2>
	<br>
	<form action="scripts/php/funcs/universities.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<input style="padding-right:30px;" name="uniname" type="text" class="form-control" id="input_name" placeholder="اسم الجامعة" value="<?php echo $uni["uni_name"];?>" />
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
					<textarea style="padding-right:30px;" name="describtion" maxlength="" rows="6" class="form-control" id="input_message" placeholder="الوصف..."><?php echo $uni["uni_describtion"];?></textarea><br>
				</div>	
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-thumbs-up"></span>
					<textarea  style="padding-right:30px;" name="pros" maxlength="" rows="6" class="form-control" id="input_message" placeholder="الايجابيات..."><?php echo $uni["uni_pros"];?></textarea><br>
				</div>	
			</div> 
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-earphone"></span>
					<textarea  style="padding-right:30px;" name="contacts" maxlength="" rows="6" class="form-control" id="input_message" placeholder="التواصل..."><?php echo $uni["uni_contacts"];?></textarea><br>
				</div>		
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-thumbs-down"></span>
					<textarea style="padding-right:30px;" name="cons" rows="6" class="form-control" id="input_message" placeholder="السلبيات..."><?php echo $uni["uni_cons"];?></textarea><br>
				</div>	
			</div>
		</div> <!-- row -->
		<div class="row">
			
			<div class="col-md-12">
				<span class="glyphicon"></span>
				<select multiple name="departments[]" class="form-control" id="input_message" style="height:200px;">
					<option disabled>اختار الاقسام التي تندرج تحت هذه الجامعة</option>
					<?php foreach($alldep as $u)echo "<option value='$u[dep_id]'>• $u[dep_name]</option>"; ?>
				</select><br>
			</div>
			<div class="col-md-12">
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-certificate"></span>
					<textarea  style="padding-right:30px;" name="certification" maxlength="" rows="3" class="form-control" id="input_message" placeholder="الشهادات..."><?php echo $uni["uni_certification"];?></textarea><br>
				</div>	
			</div>
			<div align="center">
				<button type="submit" class="btn btn-primary"><?php echo $btn;?></button>
				<button type="reset" class="btn btn-default float_r">مسح</button>
			</div>
		</div>
		<br>
		<input type="hidden" name="act" value="<?php echo $act; ?>" />
		<input type="hidden" name="uni" value="<?php echo $_GET["uni"]; ?>" />
	</form>
</div>