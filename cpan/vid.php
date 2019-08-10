<?php 
	$act="a";
	$btn="إضافة";
	if($_GET["vid"])
	{
		$statement = "SELECT * FROM videos WHERE vid_id = ?";
		$video = $db->selectid($statement,array($_GET["vid"]));
		$act="e";
		$btn="تعديل";
		$video = $video[0];
	}
	
	$spc = $db->selectid("SELECT * FROM specifications ORDER BY spc_name ASC",array());
?>
<div class="col col-md-12">
	<h2>إداره الفيديوهات التعليمية</h2>
	<br>
	<form action="scripts/php/funcs/videos.php" method="post"">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<input name="url" required type="text" class="form-control" id="input_name" placeholder="رابط الفيديوا" value="<?php echo $video["vid_url"]; ?>" style="direction:ltr;text-align:left;"/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<select name="year" class="form-control" placeholder="السنة الدراسية">
						<option value="1" <?php if($video["vid_year"]==1) echo "selected"; ?>>السنة الاولى</option>
						<option value="2" <?php if($video["vid_year"]==2) echo "selected"; ?>>السنة الثانية</option>
						<option value="3" <?php if($video["vid_year"]==3) echo "selected"; ?>>السنة الثالثة</option>
						<option value="4" <?php if($video["vid_year"]==4) echo "selected"; ?>>السنة الرابعه</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
						<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-comment"></span>
					<textarea style="padding-right:30px;" required name="describtion" maxlength="" rows="6" class="form-control" id="input_message" placeholder="الوصف..."><?php echo $video["vid_describtion"];?></textarea>
				</div>
			</div> 
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<select name="specification" class="form-control" placeholder="Major" required>
						<option disabled hidden selected> -- اختار التخصص -- </option>
						<?php foreach($spc as $s){if($s["spc_id"]==$video["vid_specification"])$sel="selected";echo "<option $sel value='$s[spc_id]'>$s[spc_name]</option>";$sel="";}?>
					</select>
				</div>
			</div>
		</div>
		<div align="center">
				<button type="submit" class="btn btn-primary"><?php echo $btn;?></button>
				<button type="reset" class="btn btn-default float_r">مسح</button>
		</div>
		<input type="hidden" name="act" value="<?php echo $act; ?>" />
		<input type="hidden" name="vid" value="<?php echo $_GET["vid"]; ?>" />
	</form>
</div>