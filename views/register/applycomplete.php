<div class="row">
	<div class="col-md-3 col-sm-3 leftside" align="center">
		<h1>5</h1>
		<h3>รับสมัครค่าย</h3>
		<hr>
		<h4>ค่าย <?= Session::getArray('camp','cname') ?></h4>
		<p>วันที่ <?= Session::getArray('camp','cBegin') ?> - 
		<?= Session::getArray('camp','cEnd') ?></p>
		<p>ณ <?= Session::getArray('camp','clocation') ?></p>
	</div>
	<div class="col-md-9 col-sm-9 rightside">
		<p class="info">ศูนย์ประสานงานฯ ได้รับสมัครของเพื่อนเป็นที่เรียบร้อยแล้ว</p>
		<div class="detailcamp"> <h5>เพื่อนๆ สามารถโอนค่าลงทะเบียนค่ายได้ที่ </h5>
			ธนาคารไทยพาณิชย์ สาขา..... <br>
			เลขที่บัญชี .... ชื่อ .... <br><br>
			เมื่อโอนค่าลงทะเบียนค่ายแล้ว หรือมีข้อสงสัยเพิ่มเติม สามารถติดต่อมาที่ ....
		</div>
	</div>
</div>