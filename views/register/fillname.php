<div class="row">
	<div class="col-md-3 col-sm-3 leftside" align="center">
		<h1>3</h1>
		<h3>ข้อมูลผู้สมัคร</h3>
		<hr>
		<h4>ค่าย <?= Session::getArray('camp','cname') ?></h4>
		<p>วันที่ <?= Session::getArray('camp','cBegin') ?> - 
		<?= Session::getArray('camp','cEnd') ?></p>
		<p>ณ <?= Session::getArray('camp','clocation') ?></p>
	</div>
	<div class="col-md-9 col-sm-9 rightside">
		<p class="info">โปรดกรอกข้อมูลของเพื่อน</p>
		<form id="fillname" class="form-horizontal" method="POST" action="campinfo">
		<div>
			<h3><?echo Session::get('name');?> <?echo Session::get('lastname');?></h3>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
			<div class="form-group">
				<label for="nickname" class="col-sm-2 control-label">ชื่อเล่น</label>
				<div class="col-sm-9"><input type="text" class="form-control" placeholder="ชื่อเล่น" name="nname" value=""/></div>
			</div>
			<div class="form-group">
				<label for="bd" class="col-sm-2 control-label">วันเกิด</label>
				<div class="col-xs-3"><input type="text" class="form-control" placeholder="วัน" name="bd_date" value=""/></div>
				<div class="col-xs-3"><input type="text" class="form-control" placeholder="เดือน" name="bd_month" value=""/></div>
				<div class="col-xs-3"><input type="text" class="form-control" placeholder="ปี(พ.ศ.)" name="bd_year" value=""/></div>
			</div>
			<div class="form-group">
				<label for="sex" class="col-sm-2 control-label">เพศ</label>
				<div class="col-sm-9">
					<label class="radio-inline"><input type="radio" name="gender" value="m">ชาย</label>
					<label class="radio-inline"><input type="radio" name="gender" value="f">หญิง</label>
				</div>	
			</div>

			<h4>ข้อมูลการติดต่อ</h4>
			<div class="form-group">
				<label for="address" class="col-sm-3 control-label">ที่อยู่</label>
				<div class="col-sm-8"><textarea class="form-control" row="2" name="address"></textarea></div>
			</div>
			<div class="form-group">
				<label for="province" class="col-sm-3 control-label">จังหวัด</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="province" value=""/></div>
			</div>
			<div class="form-group">
				<label for="zipcode" class="col-sm-3 control-label">รหัสไปรษณีย์</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="zipcode" maxlength="5" value=""/></div>
			</div>
			<div class="form-group">
				<label for="phone" class="col-sm-3 control-label">เบอร์บ้าน</label>
				<div class="col-sm-8"><div class="input-group"><input type="text" class="form-control" placeholder="" name="homephone" maxlength="10" value=""/>
					<span class="input-group-addon"><i class="fa fa-phone"></i></span></div></div>
			</div>			
			<div class="form-group">
				<label for="mobile" class="col-sm-3 control-label">เบอร์มือถือ</label>
				<div class="col-sm-8"><div class="input-group"><input type="text" class="form-control" placeholder="" name="mobilephone" maxlength="10" value=""/>
					<span class="input-group-addon"><i class="fa fa-mobile"></i></span></div></div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">E-mail</label>
				<div class="col-sm-8"><input type="email" class="form-control" placeholder="" name="email" value=""/></div>
			</div>

			<div class="form-group">
				<label for="facebook" class="col-sm-3 control-label">Facebook</label>
				<div class="col-sm-8"><div class="input-group"><input type="text" class="form-control" placeholder="" name="facebook" value=""/>
					<span class="input-group-addon"><i class="fa fa-facebook"></i></span></div></div>
			</div>
			<div class="form-group">
				<label for="twitter" class="col-sm-3 control-label">Twitter</label>
				<div class="col-sm-8"><div class="input-group"><input type="text" class="form-control" placeholder="" name="twitter" value=""/>
					<span class="input-group-addon"><i class="fa fa-twitter"></i></span></div></div>
			</div>
			<div class="form-group">
				<label for="line" class="col-sm-3 control-label">Line</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="line" value=""/>
				</div>
			</div>
			</div>

			<div class="ol-xs-12 col-sm-5">
			<h4>ข้อมูลการศึกษา</h4>
			<div class="form-group">
				<label for="syear" class="col-sm-4 control-label">ปีการศึกษาที่เข้า</label>
				<div class="col-sm-8">
					<select class="form-control" name="syear">
						<option value="">เลือกปีการศึกษา</option>
						<? 	$s_year = date('Y')+537;
							$this_year = date('Y')+543;
							for($s_year;$s_year<=$this_year;$s_year++){
						?>		
								<option value="<?=substr($s_year,2,2)?>"><?=$s_year?></option>
						<?	} ?>
					</select></div>
			</div>
			<div class="form-group">
				<label for="faculty" class="col-sm-4 control-label">คณะ</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="faculty" value=""/></div>
			</div>
			<div class="form-group">
				<label for="university" class="col-sm-4 control-label">มหาวิทยาลัย</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="university" value=""/></div>
			</div>

			<h4>ข้อมูลศาสนา</h4>
				<div class="form-group">
				<label for="religion" class="col-sm-4 control-label">ศาสนา</label>
				<div class="col-sm-8">
					<select class="form-control" name="religion">
						<option value="">เลือกศาสนา</option>
						<option value="c">คริสต์-คาทอลิก</option>
						<option value="p">คริสต์-โปสแตสแตนต์</option>
						<option value="b">พุทธ</option>
						<option value="i">อิสลาม</option>
						<option value="h">ฮินดู</option>
						<option value="s">ซิกซ์</option>
						<option value="s">ไม่ระบุ</option>
					</select>
				</div>
			</div>
				<div class="form-group">
				<label for="saintname" class="col-sm-4 control-label">นักบุญ</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="saintname" value=""/></div>
			</div>
			<div class="form-group">
				<label for="church" class="col-sm-4 control-label">สัตบุรุษ</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="church" value=""/></div>
			</div>

			<h4>ข้อมูลจำเพาะ</h4>
			<div class="form-group">
				<label for="motto" class="col-sm-4 control-label">คติพจน์</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="motto" value=""/></div>
			</div>
			<div class="form-group">
				<label for="food" class="col-sm-4 control-label">อาหารที่แพ้</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="food" value=""/></div>
			</div>
			<div class="form-group">
				<label for="drug" class="col-sm-4 control-label">ยาที่แพ้</label>
				<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="drug" value=""/></div>
			</div>
			<br><br>
				<button type="submit" class="btn btn-primary col-sm-8 col-sm-offset-2">ถัดไป
					<span class="glyphicon glyphicon-chevron-right"></span>
				</button>
			</div>
		</div>
		</div>
	</form>
	</div>
</div>