<?php

class Home extends Controller {
	
	public function index() {
	
		$this->model('Course');
		$user->name = $name;
	
		$result = mydbConnect::mydbCourses();
	
		if ($result->num_rows > 0) {
			
			$listElement = array();

   			while($row = $result->fetch_assoc()) {
 	  			array_push($listElement, '
 	  					<tr>
						<td class="extra-widthcolumn">' . $row["name"] . '</td>
						<td> <a href="/skole-mvc/public/course/display/' . $row["id"] . '" class="btn btn-primary">Lisätiedot</a></td>
						<td> <a href="/skole-mvc/public/course/display/' . $row["id"] . '/edit" class="btn btn-primary">Muokkaa</a></td>
						</tr>	
 	  			');
			}
 		} else {
 			echo '<p>Kurssidata puuttuu!</p>';
 		}
		$this->view('home/index', array('all-courses' => $listElement));
	}
}