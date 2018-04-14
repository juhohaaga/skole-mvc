<?php

class mydbConnect {
 	public function mydbCon() {
 		
		$conn = new mysqli('localhost', 'root', '', 'course-db');
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}

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

}

?>