<?php

/*
* Yhteydet:
* mydbConnect luokan avulla yhteys kantaan, ja perus CRUD toiminnot jaettu nyt omiin funccareihin 
* joita voi käyttää controllereissa suoraan
*/


//
// Syötteiden siivoaminen ja varmistus
//
class myCleanup {

}

//
// TIETOKANTA
//
class mydbConnect {
 
	//
	// Yhteyden luonti
	//
 	public function mydbCon() {
 		
		$conn = new mysqli('localhost', 'root', '', 'course-db');
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	
	//
	//READ
	//
	public function mydbCourse($id) {
		$thisconn = mydbconnect::mydbCon();
		$result = $thisconn->query('SELECT id, name, description FROM courses where id = ' . $id);
		return $result;

	}
	public function mydbCourses() {
		$thisconn = mydbconnect::mydbCon();
		$result = $thisconn->query('SELECT id, name FROM courses');
		return $result;
	}
	public function mydbGetId() {
		$thisconn = mydbconnect::mydbCon();
		$result = $thisconn->query('SELECT id FROM courses order by id desc limit 1');
		while($row = $result->fetch_assoc()) {
			$maxid = $row["id"];
		}
		return $maxid;
	}
	
	//
	//INSERT
	//
	public function mydbInsertCourse($id, $name, $desc) {
		$thisconn = mydbconnect::mydbCon();

		$sql = "INSERT INTO courses (id, name, description)
		VALUES ('$id', '$name', '$desc')";

		if ($thisconn->query($sql) === TRUE) {
 			return true;
		} else {
    		echo "Virhe: " . $sql . "<br>" . $thisconn->error;
    		return false;
		}
	}
	
	//
	//DELETE
	//
	public function mydbDeleteCourse($id) {
		$thisconn = mydbconnect::mydbCon();
		$sql = $thisconn->query('DELETE FROM courses WHERE id = ' . $id);
	}
}

?>