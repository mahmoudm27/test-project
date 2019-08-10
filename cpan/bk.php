<?php 
	$act="a";
	$btn="إضافة";
	if($_GET["bk"])
	{
		$statement = "SELECT * FROM books WHERE bks_id = ?";
		$book = $db->selectid($statement,array($_GET["bk"]));
		$act="e";
		$btn="تعديل";
		$book = $book[0];
	}
	
	$spc = $db->selectid("SELECT * FROM specifications ORDER BY spc_name ASC",array());
	$deps = $db->selectid("SELECT * FROM departments ORDER BY dep_name ASC",array());
?>
<div class="col col-md-12">
	<h2>إداره الكتب</h2>
	<br>
	<form action="scripts/php/funcs/books.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<input style="padding-right:30px;"  name="books" required type="file" accept=".pdf,.docx,.doc,.xls,.xlsx" class="form-control" id="input_name" placeholder="الكتاب" <?php if($_GET["bk"])echo "disabled style='visibility:0;'"; ?>/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<select name="year" class="form-control" placeholder="Study year">
						<option value="1" <?php if($book["bks_year"]==1) echo "selected"; ?>>السنة الاولى</option>
						<option value="2" <?php if($book["bks_year"]==2) echo "selected"; ?>>السنة الثانية</option>
						<option value="3" <?php if($book["bks_year"]==3) echo "selected"; ?>>السنة الثالثه</option>
						<option value="4" <?php if($book["bks_year"]==4) echo "selected"; ?>>السنة الرابعة</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
						<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon glyphicon-comment"></span>
					<textarea style="padding-right:30px;" required name="describtion" maxlength="" rows="6" class="form-control" id="input_message" placeholder="الوصف..."><?php echo $book["bks_describtion"];?></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<select name="specification" class="form-control" placeholder="Major" required>
						<option disabled hidden selected> -- اختار التخصص -- </option>
						<?php foreach($spc as $s){if($s["spc_id"]==$book["bks_specification"])$sel="selected";echo "<option $sel value='$s[spc_id]'>$s[spc_name]</option>";$sel="";}?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group left-inner-addon">
					<span class="glyphicon"></span>
					<select name="department" class="form-control" placeholder="Major" required>
						<option disabled hidden selected> -- اختار الكليه -- </option>
						<?php foreach($deps as $s){if($s["dep_id"]==$book["bks_department"])$sel="selected";echo "<option $sel value='$s[dep_id]'>$s[dep_name]</option>";$sel="";}?>
					</select>
				</div>
			</div>
		</div>
		<div align="center">
				<button type="submit" class="btn btn-primary"><?php echo $btn;?></button>
				<button type="reset" class="btn btn-default float_r">مسح</button>
		</div>
		<input type="hidden" name="act" value="<?php echo $act; ?>" />
		<input type="hidden" name="bk" value="<?php echo $_GET["bk"]; ?>" />
	</form>
</div>