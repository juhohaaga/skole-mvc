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

	//DELETE
	public function delete($cid = '') {
		$course->cid = $cid;
		$result = mydbConnect::mydbDeleteCourse($course->cid);
		echo "Kurssi poistettu!";
	}	

	//Näytetään lomake
	public function create() {
		$this->view('course/newcourse');
	}


	//Tallennetaan uusi
	// Käytetään tässä parametrejä hassusti
	
	public function insert() {
		$course->name = ($_POST['course-name']);
		$course->description = ($_POST['course-desc']);
		$course->id = mydbConnect::mydbGetId();
		$course->id++; 

		
		$result = mydbConnect::mydbInsertCourse($course->id, $course->name, $course->description);
		
		echo "Kiitos!";

	}

}

?>