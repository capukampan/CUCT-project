<?php

Class Bootstrap{
	
	function __construct(){
	
		$url = isset($_GET['url']) ? $_GET['url']:null;
		$url = rtrim($url,'/');
		$url = explode('/', $url);
		//print_r($url);
		
		
		if(empty($url[0])):
			require 'controllers/index.php';
			$index_controller = new Index();
			$index_controller->content();
			return false;
		endif;
			
		$file = 'controllers/'. $url[0] . '.php';
		if(file_exists($file)):
			require 'controllers/'. $url[0] . '.php';
			
			// create controller and show content on it.
			$controller = new $url[0];
			$controller->loadModel($url[0]);
			
			if(isset($url[1])):
				if(method_exists($controller,$url[1])):
					if(isset($url[2])){
						$controller->{$url[1]}($url[2]);
						return false;
					}else{
						$controller->{$url[1]}();
						return false;
					}
				else:
					$this->content_error();
					return false;
				endif;
			endif;
			$controller->content();
		else:
			$this->content_error();
			return false;
		endif;

	}
	
	function content_error(){
		require 'controllers/error.php';
		$error_page = new Error();
		$error_page->content(); 
		
	}
}
?>