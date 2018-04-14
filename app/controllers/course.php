<?php


class Course extends Controller {
	
	public function index() {
		echo 'Ei valittua kurssia!';
	}

	//Rakennetaan yksittäisen kurssin näkymä tulostusta varten
	public function display($cid = '') {
		$course->cid = $cid;
		

		$result = mydbConnect::mydbCourse($course->cid);
		if ($result->num_rows > 0) {
   			while($row = $result->fetch_assoc()) {
   			 	$course->name = $row["name"];
   			 	$course->desc = $row["description"];

   			 	//Data-array viewille, joka tulostaa näkyvän templaten
   			 	$this->view('course/index', array('name' => $course->name, 'desc' => $course->desc, 'cid' => $course->cid));
			}
 		} 
 		else {
 			echo '<p>Kurssitieto puutteellinen!</p>';
 		}
 		   
	}


	//Näytetään lomake
	public function create() {
		$this->view('course/newcourse');
	}


	//Tallennetaan uusi

	public function insert() {
	//	$course->name = $name;
	//	$course->description = $description;
		//mydbConnect::mydbInsertCourse($course->cid, $course->name, $course->description);

		echo "Kiitos!";

	}

}

?>