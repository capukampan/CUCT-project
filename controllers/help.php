<?php

Class Help extends Controller{
	 function __construct(){
	 	parent::__construct();	

	 }
	 
	 function content(){	
		$this->view->render('help/index');
	 }
	 
	 public function other($arg = false){
		 $msghelp = 'We are other side. <br>';
		// $msghelp. 'Argument : ' . $arg . '.';
		 
		 $this->view->msghelp = $msghelp;
		 
		 require('models/help_model.php');
		 $help = new Help_Model();
	 }
}	
	
?>