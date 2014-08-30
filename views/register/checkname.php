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
	<div class="col-md-9 col-sm-12 rightside">
		<p class="info">โปรดตรวจสอบข้อมูลของเพื่อน</p>
		<div class="row">
			<div class="col-sm-8">
				<h3><?echo Session::get('name');?> <?echo Session::get('lastname');?> <span class="label label-success"><?=$this->student["snname"]?></span> </h3> 
				<p><b>เพศ: </b> <?=$this->student["ssex"]?></p>
				<p><b>วันเกิด: </b> <?=$this->student["sbd"]?></p>
				<br>
				<h4>ข้อมูลการติดต่อ<span class="right"><i class="fa fa-edit" id="edit_01"></i></span></h4>
				<div class="clr"></div>
				<div class="show_address">
					<p>	<i class="fa fa-home fa-lg"></i> <?=$this->student["saddress"]." ". $this->student["sprovince"] ." ". $this->student["szipcode"] ?> </p>
					<p> <i class="fa fa-phone fa-lg"></i> <?=$this->student["sphone"]?></p>
					<p>	<i class="fa fa-mobile fa-lg"></i> <?=$this->student["smobile"]?></p>
					<p> <i class="fa fa-envelope-o fa-lg"></i> <?=$this->student["semail"]?>
					<i class="fa fa-facebook-square fa-lg"></i><?=$this->student["sfb"]?></p>
					<p>	<i class="fa fa-twitter-square fa-lg"></i><?=$this->student["stt"]?>
					Line: <?=$this->student["sline"]?></p>
					<br>
				</div>

				<form class="form-horizontal" id="edit_address" action="<?=URL?>register/updateStudent/" method="post">
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">ที่อยู่</label>
						<div class="col-sm-10"><textarea class="form-control" row="2" name="address"><?=$this->student["saddress"]?></textarea></div>
					</div>
					<div class="form-group">
						<label for="province" class="col-sm-2 control-label">จังหวัด</label>
						<div class="col-sm-4"><input type="text" class="form-control" placeholder="" name="province" value="<?=$this->student["sprovince"]?>"/></div>
						<label for="zipcode" class="col-sm-2 control-label">รหัสไปรษณีย์</label>
						<div class="col-sm-4"><input type="text" class="form-control" placeholder="" name="zipcode" maxlength="5" value="<?=$this->student["szipcode"]?>"/></div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">เบอร์บ้าน</label>
						<div class="col-sm-4"><div class="input-group"><input type="text" class="form-control" placeholder="" name="homephone" maxlength="10" value="<?=$this->student["sphone"]?>"/>
							<span class="input-group-addon"><i class="fa fa-phone"></i></span></div></div>
							<label for="mobile" class="col-sm-2 control-label">เบอร์มือถือ</label>
						<div class="col-sm-4"><div class="input-group"><input type="text" class="form-control" placeholder="" name="mobilephone" maxlength="10" value="<?=$this->student["smobile"]?>"/>
							<span class="input-group-addon"><i class="fa fa-mobile"></i></span></div></div>
					</div>			
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-4"><input type="email" class="form-control" placeholder="" name="email" value="<?=$this->student["semail"]?>"/></div>
						<label for="facebook" class="col-sm-2 control-label">Facebook</label>
						<div class="col-sm-4"><div class="input-group"><input type="text" class="form-control" placeholder="" name="facebook" value="<?=$this->student["sfb"]?>"/>
							<span class="input-group-addon"><i class="fa fa-facebook"></i></span></div></div>
					</div>
					<div class="form-group">
						<label for="twitter" class="col-sm-2 control-label">Twitter</label>
						<div class="col-sm-4"><div class="input-group"><input type="text" class="form-control" placeholder="" name="twitter" value="<?=$this->student["stt"]?>"/>
							<span class="input-group-addon"><i class="fa fa-twitter"></i></span></div></div>
						<label for="Line" class="col-sm-2 control-label"><b>Line</b></label>
						<div class="col-sm-4"><div class="input-group"><input type="text" class="form-control" placeholder="" name="line" value="<?=$this->student["sline"]?>"/>
							<span class="input-group-addon"><i class="fa fa-instagram"></i></span></div></div>
					</div>
					<input type="hidden" name="s-id" value="<?= $this->student['sid']?>"/>
					<input type="hidden" name="type" value="1"/>
					<div class="form-group">
						<button type="submit" class="btn btn-primary col-sm-2 col-sm-offset-10">Done
						</button>
					</div>
				</form>

				<br>
				<h4>ข้อมูลจำเพาะ<span class="right"><i class="fa fa-edit" id="edit_02"></i></span></h4>
				<div class="clr"></div>
				<div class="show_personal">
					<p> <b>คติพจน์: </b> <?=$this->student["smotto"]?></p>
					<p>	<b>อาหารที่แพ้: </b> <?=$this->student["sfood"]?> </p>
					<p> <b>ยาที่แพ้: </b> <?=$this->student["sdrug"]?></p>
				</div>

				<form class="form-horizontal" id="edit_personal" action="<?=URL?>register/updateStudent" method="post">
					<div class="form-group">
						<label for="food" class="col-sm-4 control-label">อาหารที่แพ้</label>
						<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="food" value="<?=$this->student["sfood"]?>"/></div>
					</div>
					<div class="form-group">
						<label for="drug" class="col-sm-4 control-label">ยาที่แพ้</label>
						<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="drug" value="<?=$this->student["sdrug"]?>"/></div>
					</div>
					<div class="form-group">
						<label for="motto" class="col-sm-4 control-label">คติพจน์</label>
						<div class="col-sm-8"><input type="text" class="form-control" placeholder="" name="motto" value="<?=$this->student["sdrug"]?>"/></div>
					</div>
					<input type="hidden" name="s-id" value="<?= $this->student['sid']?>"/>
					<input type="hidden" name="type" value="2"/>
					<div class="form-group">
						<button type="submit" class="btn btn-primary col-sm-2 col-sm-offset-10">Done
						</button>
					</div>
				</form>

			</div>
			<div class="col-sm-3">
				<div class="circle hidden-xs"><div>Picture</div></div>
				<div class="r-side">
				<h4>ข้อมูลการศึกษา</h4>
				<p><span class="label">รหัสนักศึกษา</span> <?=substr($this->student["sid"], 2,2)?></p>
				<p><span class="label">คณะ</span> <?=$this->student["sfaculty"]?></p>
				<p><span class="label">มหาวิทยาลัย</span> <?=$this->student["suniversity"]?></p>
				</div>
				<div class="r-side">
				<h4>ข้อมูลศาสนา</h4>
				<p><span class="label">ศาสนา</span> <?=$this->student["srel"]?></p>
				<p><span class="label">นักบุญ</span> <?=$this->student["ssaint"]?></p>
				<p><span class="label">สัตบุรุษวัด</span> <?=$this->student["schurch"]?></p>
				</div>
			</div>
		<div class="clearfix visible-xs"></div>
		</div>
		<br><br><br>
		<form action="aboutcampinfo" method="post" name="studentinfo"> 
			<input type="hidden" name="s-id" value="<?= $this->student['sid']?>"/>
		<center>
			<button id="back" class="btn btn-primary" onclick="window.history.back();">
				<span class="glyphicon glyphicon-chevron-left"></span>ย้อนกลับ</button>
			<button id="forward" type="submit" class="btn btn-primary">ถัดไป
				<span class="glyphicon glyphicon-chevron-right"></span>
			</button>
		</center>
	</form>
	</div>
</div>