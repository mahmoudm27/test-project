<?php 
	$act="a";
	$btn = "إضافة";
	if(isset($_GET["spc"]))
	{
		$statement = "SELECT * FROM specifications WHERE spc_id = ?";
		$spcs = $db->selectid($statement,array($_GET["spc"]));
		//$spc = $db->selectid($statement,array($_GET["spc"]));
		$act="e";
		$btn = "تعديل";
		$spcs = $spcs[0];
		//$spc = $spc[0];
	}
	
	$alluni = $db->selectid("SELECT * FROM universities ORDER BY uni_name ASC");
	$alldep = $db->selectid("SELECT * FROM departments ORDER BY dep_name ASC");
?>
<div class="col col-md-12">
	<h2>إداره التخصصات</h2>
	<br>
	<form action="scripts/php/funcs/specifications.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<input style="padding-right:30px;" name="name" type="text" class="form-control" id="input_name" placeholder="اسم التخصص" value="<?php echo $spcs["spc_name"];?>" />
				</div>
			</div>
			<div class="col-md-6">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-comment"></span>
					<textarea style="padding-right:30px;" name="describtion" maxlength="" rows="6" class="form-control" id="input_message" placeholder="الوصف.."><?php echo $spcs["spc_describtion"];?></textarea><br>
				</div>	
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<textarea style="padding-right:30px;" name="bestuni" rows="6" class="form-control" id="input_message" placeholder="افضل الجامعات"><?php echo $spcs["spc_bestuni"];?></textarea><br><br>
				</div>		
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<select multiple name="departments[]" class="form-control" id="input_message" style="height:200px;">
						<option disabled>الكليات التي تندرج تحتها هذا القسم</option>
						<?php foreach($alldep as $u)
						{
							//if()$sel="selected";
							//echo "<option $sel value='$u[dep_id]'>• $u[dep_name]</option>"; 
							//$sel="";
							echo "<option value='$u[dep_id]'>• $u[dep_name]</option>";
						}?>
					</select><br>
				</div>		
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-tower"></span>
					<textarea style="padding-right:30px;" name="aftergrad" rows="6" class="form-control" id="input_message" placeholder="العمل بعد التخرج..."><?php echo $spcs["spc_aftergrad"];?></textarea><br>
				</div>
			</div> 
			<div align="center">
				<button type="submit" class="btn btn-primary"><?php echo $btn;?></button>
				<button type="reset" class="btn btn-default float_r">مسح</button>
			</div>
		</div>
		<input type="hidden" name="act" value="<?php echo $act; ?>" />
		<input type="hidden" name="spc" value="<?php echo $_GET["spc"]; ?>" />
	</form>
</div>