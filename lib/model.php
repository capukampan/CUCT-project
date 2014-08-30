
<?php

Class Model{
	
	function __construct(){
		require 'lib/config.inc';
		$this->db = new MyDatabase("localhost",$DBname,$DBuser,$DBpass);
	}

	function convertDate($strDate){

		$y = substr($strDate,0,4) + 543;
		$m = substr($strDate,5,2);
		$d = substr($strDate,8,2);

		switch ($m) {
			case '1':	$month = 'มกราคม';		break;
			case '2':	$month = 'กุมภาพันธ์';	break;
			case '3':	$month = 'มีนาคม';		break;
			case '4':	$month = 'เมษายน';		break;
			case '5':	$month = 'พฤษภาคม';		break;
			case '6':	$month = 'มิถุนายน';		break;
			case '7':	$month = 'กรกฎาคม';		break;
			case '8':	$month = 'สิงหาคม';		break;
			case '9':	$month = 'กันยายน';		break;
			case '10':	$month = 'ตุลาคม';		break;
			case '11':	$month = 'พฤศจิกายน'	;	break;
			case '12':	$month = 'ธันวาคม';		break;
			default: $month ='ไม่รู้';	break;
			
		}

		return $d." ". $month." ".$y;
	}

	function getSex($strSex){
		switch ($strSex) {
			case 'm': $sex = 'ชาย';	break;
			case 'f': $sex = 'หญิง';	break;
			default: 	break;
		}
		return $sex;
	}

	function getReligion($strR){
			switch($strR){
				case 'b' : $rel =  "พุทธ";					break;
				case 'c' : $rel =  "คริสต์ - คาทอลิก";			break;
				case 'p' : $rel =  "คริสต์ - โปแตนแตนส์";		break;
				case 'i' : $rel =  "อิสลาม";					break;	
				case 'h' : $rel =  "ฮินดู";					break;
				case 's' : $rel =  "ซิกซ์";					break;
				case 'i' : $rel =  "ไม่ประสงค์";					break;		
				}
			return $rel;
		}

	function emptyString($str){
		if(strlen($str) == 0)
			return 'ไม่มี';
		return $str;
	}
}
?>