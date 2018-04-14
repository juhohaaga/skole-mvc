<?php

class mydbConnect {
 	public function mydbCon() {
 		
		$conn = new mysqli('localhost', 'root', '', 'course-db');
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	//READ
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
		return $result;
	}
/*
	//UPDATE
	public function mydbUpdateCourse() {
		$thisconn = mydbconnect::mydbCon();
		$result = $thisconn->query('SELECT id, name FROM courses');
		//return $result;
	}
	
	//INSERT
	public function mydbInsertCourse() {
		$thisconn = mydbconnect::mydbCon();
		//$result = $thisconn->query('SELECT id, name FROM courses');
		return true;
	}
	//DELETE
	public function mydbInsertCourse() {
		$thisconn = mydbconnect::mydbCon();
		//$result = $thisconn->query('SELECT id, name FROM courses');
		return $result;
	}
	*/



}

?>