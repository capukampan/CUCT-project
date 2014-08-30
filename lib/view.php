<?php

Class View{
	
	function __construct(){
		//echo 'This is viewer. <br>';
	}
	
	public function render($name,$noTemp = false){
		if($noTemp == true):
			 require('views/templates/header-regis.php');
			 require('views/'. $name .'.php');
			 require('views/templates/footer-regis.php');
		else:
			require('views/templates/header.php');
			require('views/'. $name .'.php');
			require('views/templates/footer.php');
		endif;
	}
}

?>