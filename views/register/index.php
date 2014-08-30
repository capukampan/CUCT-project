<div class="frontpage">
	<div class="cover" align="center">
		<h3>ยินดีต้อนรับเพื่อนสู่ค่าย</h3>
		<h2><?=$this->camp["cname"]?></h2><br>
		<h4>วันที่ <?=$this->camp["cBegin"]?> - <?=$this->camp["cEnd"]?></h4>
		<h4>ณ <?=$this->camp['clocation']?></h4>
	</div>
	
	<div class="form" align="center">
		<h5>โปรดกรอกชื่อและนามสกุลของท่านเป็นภาษาไทย</h5>
		<form action="register/rules" method = "post" name="applyname" class="form-inline" role="form">
		<div class="form-group">
			<label for="inputName" class="sr-only">ชื่อ</label>
			<input class="form-control" type="text" placeholder="ชื่อ" name="name" value=""/>
		</div>
		<div class="form-group">
			<label for="inputLastname" class="sr-only">นามสกุล</label>
			<input class="form-control"type="text" placeholder="นามสกุล" name="lastname" value=""/>
		</div>
		
		<button type="submit" class="btn btn-default">ถัดไป
			<span class="glyphicon glyphicon-chevron-right"></span>
		</button>
			
		</form>
	</div>
</div>
