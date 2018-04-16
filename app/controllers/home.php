<?php

/*
* Etusivun perus-controllei
* Näytetään vain lista, jossa kurssit ja muutama button
*/

class Home extends Controller {
	
	public function index() {
	
		$this->model('Course');
		//$user->name = $name;
	
		$result = mydbConnect::mydbCourses();
		if ($result->num_rows > 0) {

			//Lisätään kurssit arrayhyn tulostusta varten
			$listElement = array();
   			while($row = $result->fetch_assoc()) {
 	  			array_push($listElement, '
 	  					<tr>
						<td class="extra-widthcolumn">' . $row["name"] . '</td>
						<td> <a href="/skole-mvc/public/course/display/' . $row["id"] . '" class="btn btn-primary">Lisätiedot</a></td>
						<td> <a href="/skole-mvc/public/course/delete/' . $row["id"] . '" class="btn btn-primary">Poista</a></td>
						</tr>	
 	  			');
			}
 		} else {
 			echo '<p>Kurssidata puuttuu!</p>';
 		}

 		//Viedään datasetti oikealle viewille
		$this->view('home/index', array('all-courses' => $listElement));
	}
}