<?php

/*
* Yhteydet:
* mydbConnect luokan avulla yhteys kantaan, ja perus CRUD toiminnot jaettu nyt omiin funccareihin 
* joita voi käyttää controllereissa suoraan
*
* Siivotaan myös syötteet tageista yms.
*/


//
// SYÖTTEIDEN SIIVOAMINEN
//
class myCleanup {
  public function CleanValues($uncleaned) {
  	$cleaned = strip_tags($unclened);
  	return $cleaned;
  }
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
		$id = myCleanup::CleanValues($id);

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

		$id = myCleanup::CleanValues($id);
		$name = myCleanup::CleanValues($name);
		$desc = myCleanup::CleanValues($desc);

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

		$id = myCleanup::CleanValues($id);

		$thisconn = mydbconnect::mydbCon();
		$sql = $thisconn->query('DELETE FROM courses WHERE id = ' . $id);
	}
}

?>