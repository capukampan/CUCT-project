

<div class="row">
	<div class="col-md-3 col-sm-3 leftside" align="center">
		<h1>2</h1>
		<h3>ข้อตกลงร่วมกัน</h3>
		<hr>
		<h4>ค่าย <?= Session::getArray('camp','cname') ?></h4>
		<p>วันที่ <?= Session::getArray('camp','cBegin') ?> - 
		<?= Session::getArray('camp','cEnd') ?></p>
		<p>ณ <?= Session::getArray('camp','clocation') ?></p>
	</div>

	<div class="col-md-9 col-sm-9 rightside">
		<p class="info">ด้วยเล็งเห็นถึงคุณค่าของมิตรภาพ การเคารพและให้เกียรติต่อกัน การเคารพวัฒนธรรม การดูแลรักษาความปลอดภัย และการมีส่วนร่วมเพื่อการเรียนรู้ 
			ดังนั้นพวกเราจึงมีข้อตกลงของการอยู่ร่วมกัน โปรดคลิก “ได้” หรือ “ไม่ได้” หลังข้อตกลงแต่ละข้อตามที่ท่านเห็นสมควร</p>

	<form id="radio-rules" name="checkrule" action="studentinfo"  method="post">
	<!--<p class="rule-warning bg-warning"></p>-->
	<div class="form-group">
        <div class="col-md-9">
            <div id="messages" class="bg-warning"></div>
        </div>
    </div>
	<table class="tableform" width="95%" align="center" cellspacing="0" >
       
		<tr class="tableheader">
			<th align="center" ></th>
			<th align="center" >ได้</th>
			<th align="center" >ไม่ได้</th>
		</tr>
		<?	

			foreach($this->rule as $key => $value){
		?>
			<tr>
				<td><?=$key+1?>. <?=$value['rule_txt']?></td>
				<td align="center"><div class="iradio"><input type="radio" name="rule_<?=$value['rule_id']?>" value="1" /></div></td>
				<td align="center"><div class="iradio"><input type="radio" name="rule_<?=$value['rule_id']?>" value="0" /></div></td>
			</tr>
		<?	}	?>
		
	  </table>
	  <input type="hidden" name="count_rule" value="<?=count($this->rule)?>"/>
	  <p></p>
	  <blockquote>หากไม่ให้ความร่วมมือ จำเป็นจะต้องมีการ <strong>ตักเตือน</strong> และหากว่าตักเตือนแล้ว ยังไม่ให้ความร่วมมือ จำเป็นจะต้องมีการ <strong>เชิญออก</strong> จากค่ายโดยทันที 
			ถ้ามีข้อสงสัย หรือมีเหตุจำเป็น กรุณาปรึกษาจิตตาธิการหรือคณะกรรมการค่าย<br>
			ข้าพเจ้าขอสัญญาว่าข้าพเจ้าจะยินดีปฏิบัติตามข้อตกลงข้างต้นทุกประการและถ้าข้าพเจ้าละเมิดข้อตกลงดังกล่าว ข้าพเจ้ายินดีรับคำตักเตือนและออกจากงานนี้โดยไม่ถือโทษโกรธคณะกรรมการแต่อย่างใด
		</blockquote>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4" align="center">
				<p><? echo Session::get('name').' '.Session::get('lastname') ?>  </p>
				<p><?=date("d-M-Y",time());?></p>
			<div class="form-group">
			<label for="inputstudentID" class="sr-only">รหัสนิสิต/นักศึกษา</label>
			<input class="form-control"type="password" placeholder="รหัสนิสิต/นักศึกษา" name="studentid" value=""/>
		</div>
				<br>
				<button class="btn btn-primary" onclick="window.history.back();">
					<span class="glyphicon glyphicon-chevron-left"></span>ย้อนกลับ
				</button>
				<button type="submit" class="btn btn-primary">ถัดไป
					<span class="glyphicon glyphicon-chevron-right"></span>
				</button>
			</div>

		</div>
	</form>
	</div>
</div>