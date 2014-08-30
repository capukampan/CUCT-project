<?php

Class Index extends Controller{
	 function __construct(){
	 	parent::__construct();
	 }
	 
	 function content(){
		 $this->view->render('index/index');
	 }
}	
	
?>