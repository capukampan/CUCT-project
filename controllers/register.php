<?php

class Register extends Controller{
	function __construct(){
		parent::__construct();

		$this->view->js = array('register/js/default.js');
	}

	function checkSession($var){
		Session::init();
		$logged = Session::get($var);
		if(empty($logged)):
			Session::destroy();
			header('location: ../register');
			exit;
		else:
			return true;
		endif;
	}

	function checkAcademicYear($y_sid){
		$currentYear = substr(date('Y')+543,2,2);
		$academic_year = $currentYear - $y_sid;
		

		if($academic_year >= 5):
			Session::destroy();
			header('location: ../register');
			exit;
		else:
			return true;
		endif;

	}
	
	function content(){
		$this->model->content();
		$this->model->queryCamp();
		$this->view->camp = $this->model->getCamp();
		$this->view->title = 'ใบสมัครค่ายศูนย์ประสานฯ';
		$this->view->render('register/index',true);
	}
	
	function rules(){
		$this->model->content();
		$this->model->run();
		if($this->checkSession('name')):
			$this->view->rule = $this->model->queryRule();
			$this->view->js = array('register/js/checkrules.js');
			$this->view->title = 'ข้อตกลงของค่าย';
			$this->view->render('register/rule',true);
		endif;
	}

	function studentinfo(){
		$this->model->content();
		$this->model->setRules();
		$s = $this->model->getStudent();
		//echo $s['sid'];
		if($this->checkAcademicYear(substr($s['sid'],2,2))):
			$this->view->title = 'ข้อมูลของผู้สมัครค่าย';
			if($this->checkSession('name') and $this->checkSession('point_rule')):
				if(!empty($s)){
					$this->view->student = $s;
					$this->view->js = array('register/js/checkname.js');
					$this->view->render('register/checkname',true);
				}else{
					$this->view->js = array('register/js/fillname.js');
					$this->view->render('register/fillname',true);
				}
			endif;
		endif;
	}

	function campinfo(){
		$this->model->content();
		$sid = $this->model->addStudent();
		if(!empty($sid)):
			$this->view->sid = $sid;
			$this->view->js = array('register/js/dragbar_campinfo.js','register/js/slider/js/bootstrap-slider.js');
			$this->view->css = array('register/js/slider/css/slider.css');
			$this->view->title = 'แบบสอบถามเกี่ยวกับค่าย';
			$this->view->render('register/campinfo',true);
		endif;
		
	}

	function updateStudent(){
		$this->model->editStudentInfo();
	}

	function aboutcampinfo(){
		$this->model->content();
		$sid = $this->model->campinfo();
		if(!empty($sid)):
			$this->view->sid = $sid;
			$this->view->js = array();
			array_push($this->view->js, "register/js/dragbar_campinfo.js");
			array_push($this->view->js, "register/js/slider/js/bootstrap-slider.js");
			$this->view->css = array('register/js/slider/css/slider.css');
			$this->view->title = 'แบบสอบถามเกี่ยวกับค่าย';
			$this->view->render('register/campinfo',true);
		else:
			$this->studentinfo();
		endif;
	}

	function applycomplete(){
		$this->model->content();
		$sid = $this->model->applycamp();
		$this->view->title = 'รับสมัครค่ายเรียบร้อย';
		$this->view->render('register/applycomplete',true);
		//Session::destroy();
	}

}

?>