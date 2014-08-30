<?php
Class Session{
	public static function init(){
		@session_start();
	}
	public static function set($key,$value){
		$_SESSION[$key] = $value;
	}
	public static function get($key){
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
	}
	
	public static function getArray($key,$index){
		if(isset($_SESSION[$key][$index]))
			return $_SESSION[$key][$index];
	}
	public static function destroy(){
		//unset($_SESSION);
		session_destroy();
	}
		
}

?>