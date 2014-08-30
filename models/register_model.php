<?php

	Class Register_Model extends Model{
		protected $camp;
		protected $student;
		private $name;
		private $lastname;
		private $rules_answer;
		protected $point_rule;

		protected $studentTable = "student";
		protected $campTable = "camping";

		function content(){	
			Session::init();	
		}

		/* set student ID  */
		function setSID($r,$sex,$syear){
			$sID = $r.$sex.$syear;
			$countTable = "student";
			$fieldCount = "Student_id";
			$conditionCount = "Student_id LIKE '" .$sID ."%'";
			$countID = $this->db->selectCount($fieldCount,$this->studentTable,$conditionCount);
			if($countID){
				$c = $countID['number']+1;
				if($c < 10)
					$suffix_id = '00'.$c;
				else if($c < 100)
					$suffix_id = '0'.$c;
				else
					$suffix_id = $c;
			}
			return $sID.$suffix_id;
		}
		
		
		function queryCamp(){
			
			$condition = "camp_type <= 'c6%' AND s_camp = 1";
			$campQuery = $this->db->selectCondition('*',$this->campTable,$condition);
			if($campQuery){
				$this->camp = array( "cid" => $campQuery['camp_id'],
									 "cname" => $campQuery['camp_name'],
									 "clocation" => $campQuery['location'],
									 "cBegin" => parent::convertDate($campQuery['date_start_camp']),
									 "cEnd" => parent::convertDate($campQuery['date_finish_camp']));
				
				Session::set('camp',$this->camp);
			}
		}
		
		function getCamp(){
			return $this->camp;
		}


		function run(){
			if(isset($_POST['name']) and isset($_POST['lastname'])){
			$this->name 		= trim($_POST['name']);
			$this->lastname 	= trim($_POST['lastname']);
			//print strlen(trim($this->name)) . strlen(trim($this->lastname));
			if(!is_null($this->name) and !is_null($this->lastname)){
				Session::set('name',$this->name);
				Session::set('lastname',$this->lastname);
				}
			}	
		}

		function queryRule(){
			$ruleTable = "rule";
			$ruleField = "*";
			$ruleSorts = "rule_id ASC";
			$ruleQuery = $this->db->selectAll($ruleField,$ruleTable,$ruleSorts);
			$ruleData = array();
			while($row = $this->db->selectFetchAssoc($ruleQuery)){
				array_push($ruleData, $row);
			}
			return $ruleData;
		}

		function setRules(){
			//
			$this->point_rule  = 0;
			if(isset($_POST['rule_1']) and isset($_POST['rule_12']) and !empty($_POST['studentid'])){
				$count = $_POST['count_rule'];
				for($i = 1;$i<=$count;$i++){
					$this->point_rule = $this->point_rule + $_POST['rule_'.$i]*pow(2,($count-$i));
				}
					
				Session::set('point_rule',$this->point_rule);
				//query student name from DB
				$year_sid = $this->queryName();
				//return $year_sid;
			}
		}

		function queryName(){
			$table = 'student,rel_student';
			$condition = "Fname LIKE '".Session::get('name')."' AND Sname LIKE '".Session::get('lastname').
				"' AND Student_id = rs_id";
			$studentQuery = $this->db->selectCondition('*',$table,$condition);
			if($studentQuery){
				$this->student = array( "sid" => $studentQuery['Student_id'],
									"ssex" => parent::getSex(substr($studentQuery['Student_id'],1,1)),
								 	"snname" => $studentQuery['Nname'],
									"sfaculty" => $studentQuery['Faculty'],
									"suniversity" => $studentQuery['University'],
									"sbd" => parent::convertDate($studentQuery['date_Birth']),
									"saddress" => $studentQuery['Address'],
									"sprovince" => $studentQuery['Province'],
									"szipcode" => $studentQuery['zipcode'],
									"sphone" => $studentQuery['tel_Home'],
									"smobile" => $studentQuery['tel_Mobile'],
									"semail" => $studentQuery['Email'],
									"sfb" => $studentQuery['Facebook'],
									"stt" => $studentQuery['Twitter'],
									"sline" => $studentQuery['Line'],
									"smotto" => parent::emptyString($studentQuery['Motto']),
									"sfood" => parent::emptyString($studentQuery['Lfood']),
									"sdrug" => parent::emptyString($studentQuery['Drug']),
									"srel" => $studentQuery['Religion'],
									"ssaint" => $studentQuery['saintName'],
									"schurch" => $studentQuery['Church']);
				Session::set('student',$this->student);
				//return substr($studentQuery['Student_id'], 2,2);
			}
		}

		//add new cuct student 
		function addStudent(){
			if(isset($_POST['syear']) AND isset($_POST['religion']) AND isset($_POST['gender'])){
				$sid = $this->setSID($_POST['religion'],$_POST['gender'],$_POST['syear']);
				
				/*insert student info into student table*/
				$studentField = "Student_id,Fname,Sname,Nname,Faculty,University,date_Birth,Address,Province,zipcode,tel_Home,tel_Mobile,Email".
						",Facebook,Twitter,Line,Motto,Lfood,Drug,First_camp";
				$studentValue = "'".$sid."','".Session::get('name'). "','".Session::get('lastname') ."','". $_POST['nname'] ."','" .$_POST['faculty'] ."','".$_POST['university']. "','" .
						($_POST['bd_year']-543) ."-".$_POST['bd_month']."-" .$_POST['bd_date']. "','" .$_POST['address']. "','" .$_POST['province']. "','" .$_POST['zipcode']."','".
						$_POST['homephone']. "','" .$_POST['mobilephone'] . "','".$_POST['email'] ."','" .$_POST['facebook'] ."','".$_POST['twitter']."','".$_POST['line'] . "','" .
					 	$_POST['motto'] . "','" . $_POST['food'] ."','" . $_POST['drug']. "','". Session::getArray('camp','cid') ."'" ;
				$studentInsert = $this->db->insertRecord($this->studentTable,$studentField,$studentValue);
				if(!$studentInsert):
					print "ไม่สามารถเพิ่มข้อมูลได้";
				endif;
				/*insert student religion into rel_student table*/
				$relTable = 'rel_student';
				$relField = "rs_id,Religion,saintName,Church";
				$relValue = "'".$sid."','".parent::getReligion($_POST['religion']) ."','".$_POST['saintname'] ."','". $_POST['church'] ."'";
				$relInsert = $this->db->insertRecord($relTable,$relField,$relValue);
				return $sid;
			}
			return '';
		}

		function editStudentInfo(){
			if($_POST['type'] == 1):
				$studentField = "address='".$_POST['address']."',province='".$_POST['province']."',zipcode='".$_POST['zipcode'].
							"',tel_Home='".$_POST['homephone']."',tel_Mobile='".$_POST['mobilephone']."',Email='".$_POST['email']. 
							"',Facebook='".$_POST['facebook']."',Twitter='".$_POST['twitter']."',Line='".$_POST['line']."'";
				$dataUpdate = array('address' => $_POST['address'] ." ".$_POST['province'] ." ". $_POST['zipcode'],
							'homephone' => $_POST['homephone'], 'mobilephone' => $_POST['mobilephone'],
							'email' => $_POST['email'] , 'facebook' => $_POST['facebook'], 'twitter' => $_POST['twitter'],
							'twitter' => $_POST['twitter'], 'line' => $_POST['line'], 'type' => $_POST['type']);
			else:
				$studentField = "Lfood='".$_POST['food']."',Drug='".$_POST['drug']."',motto='".$_POST['motto']."'";
				$dataUpdate = array('food' => $_POST['food'],'drug' => $_POST['drug'], 'motto' => $_POST['motto'], 'type' => $_POST['type']);
			endif;
							
			$studentCondition = "Student_id='".$_POST['s-id']."'";
			$studentUpdate = $this->db->updateRecord($this->studentTable,$studentField,$studentCondition);


			echo json_encode($dataUpdate);
							
		}

		//questionnaire about camp
		function campinfo(){
			if(isset($_POST['s-id'])){
				return $_POST['s-id'];
			}
			return '';
		}
		//To apply camp
		function applycamp(){
			if(isset($_POST['s-id'])){
				/*insert apply camp from student into camp_enter table*/
				$applyTable = "camp_enter";
				$applyField = "s_id,c_id,date_stamp,dlocation,incamp,givecamp,point,news,rule_point";
				$applyValue = "'".$_POST['s-id']."','".Session::getArray('camp','cid'). "',now(),'". $_POST['dream_place'] ."','" .
						$_POST['intention_camp'] ."','".$_POST['intention_given']. "','" . $_POST['point'] ."','" .$_POST['newscamp']."','".
						session::get('point_rule')."'";
				$applyInsert = $this->db->insertRecord($applyTable,$applyField,$applyValue);
				if(!$applyInsert):
					print "ไม่สามารถเพิ่มข้อมูลได้";
				endif;
			}
		}

		function getStudent(){
			return $this->student;
		}
		
		function getName(){
			return $this->name. ' '. $this->lastname;	
		}

		function getYearStudent(){
			return substr(session::getArray('student',''),2,2);
		}
		
		
	}
	
?>