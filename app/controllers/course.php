<?php

class Course extends Controller {
	
	public function index() {
		echo 'Ei valittua kurssia!';
	}
	public function display($cid = '') {
		$course->cid = $cid;
		
		$result = mydbConnect::mydbCourse($course->cid);
		if ($result->num_rows > 0) {
   			while($row = $result->fetch_assoc()) {
   			 	$course->name = $row["name"];
   			 	$course->desc = $row["description"];
   			 	$this->view('course/index', array('name' => $course->name, 'desc' => $course->desc, 'cid' => $course->cid));
			}
 		} 
 		else {
 			echo '<p>course data invalid!</p>';
 		}
 		   
	}
}

?>