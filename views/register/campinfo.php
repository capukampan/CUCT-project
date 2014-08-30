<div class="row">
	<div class="col-md-3 col-sm-3 leftside" align="center">
		<h1>4</h1>
		<h3>เกี่ยวกับค่าย</h3>
		<hr>
		<h4>ค่าย <?= Session::getArray('camp','cname') ?></h4>
		<p>วันที่ <?= Session::getArray('camp','cBegin') ?> - 
		<?= Session::getArray('camp','cEnd') ?></p>
		<p>ณ <?= Session::getArray('camp','clocation') ?></p>
	</div>

	<div class="col-md-9 col-sm-9 rightside">
		<p class="info">แบบสอบถามเกี่ยวกับค่ายครั้งนี้</p>
		<form class="form-horizontal" method="POST" action="applycomplete">
		<div class="form-group">
			<label for="dream_place" class="col-sm-3 control-label">สถานที่ในฝัน</label>
			<div class="col-sm-6"><input type="text" class="form-control" name="dream_place" value="" ></div>
		</div>
		<div class="form-group">
			<label for="intention_camp" class="col-sm-3 control-label">ความตั้งใจในการมาค่ายครั้งนี้</label>
			<div class="col-sm-6"><textarea class="form-control" row="2" name="intention_camp"></textarea></div>
		</div>
		<div class="form-group">
			<label for="intention_given" class="col-sm-3 control-label">ตั้งใจว่าจะให้อะไรกับค่ายนี้</label>
			<div class="col-sm-6"><textarea class="form-control" row="2" name="intention_given"></textarea></div>
		</div>
		<div class="form-group">
			<label for="point" class="col-sm-3 control-label">จากคะแนนเต็ม 10 เพื่อนตั้งใจจะทุ่มเทกับค่ายนี้เท่าไหร่้</label>
			<div class="col-sm-4">

				<input id="camp-point" name="point" class="slider" type="text" value="" data-slider-id="cpSlider" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="6"/>
				
			</div>
		</div>
		<div class="form-group">
			<label for="news" class="col-sm-3 control-label">แหล่งข่าวจากค่ายนี้</label>
			<div class="col-sm-6">
				<label class="checkbox-inline"><input type="checkbox" name="newscamp" value="website"/>website</label>
				<label class="checkbox-inline"><input type="checkbox" name="newscamp" value="phone"/>โทรศัพท์-sms</label>
				<label class="checkbox-inline"><input type="checkbox" name="newscamp" value="friends"/>เพื่อนๆ</label>
				<label class="checkbox-inline"><input type="checkbox" name="newscamp" value="cathclub"/>ชมรม</label>
				<label class="checkbox-inline"><input type="checkbox" name="newscamp" value="church"/>วัด</label>
				<label class="checkbox-inline"><input type="checkbox" name="newscamp" value="other"/>อื่นๆ</label>
			</div>
		</div>
		<input type="hidden" name="s-id" value="<?=$this->sid?>"/>
		<center>
			<button class="btn btn-primary" onclick="window.history.go(-1);">
				<span class="glyphicon glyphicon-chevron-left"></span>ย้อนกลับ</button>
			<button type="submit" class="btn btn-primary">ถัดไป
				<span class="glyphicon glyphicon-chevron-right"></span>
			</button>
		</center>
	</form>
	</div>
</div>
