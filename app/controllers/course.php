<?php

/*
* Kurssinäkymän perus-controllei
* Index: Tyhjä
* Display: Tulostetaan yksittäinen kurssi
* Delete: Poistetaan kurssi
* Insert: Tallennetaan uusi
*/

class Course extends Controller {
	
	//
	//TYHJÄ
	//
	public function index() {
		echo 'Ei valittua kurssia!';
	}

	//
	//YKSITTÄINEN KURSSI
	//
	public function display($cid = '') {
		$course->cid = $cid;
		
		//Haetaan yhden kurssin tiedot
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

	//
	//DELETE
	//
	public function delete($cid = '') {
		$course->cid = $cid;
		$result = mydbConnect::mydbDeleteCourse($course->cid);
		echo "Kurssi poistettu!";
	}	

	//
	//LOMAKE
	//
	public function create() {
		//Näytetään view, jossa lomake
		$this->view('course/newcourse');
	}

	//
	//LUODAAN UUSI
	//
	public function insert() {
		
		//Otetaan vastaan POST ja viedään eteenpäin
		$course->name = ($_POST['course-name']);
		$course->description = ($_POST['course-desc']);
		$course->id = mydbConnect::mydbGetId();
		$course->id++; 

		$result = mydbConnect::mydbInsertCourse($course->id, $course->name, $course->description);
		
		echo "Kiitos!";

	}

}

?>