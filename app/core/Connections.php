<?php
/*
$servername = "localhost";
$username = "username";
$password = "password";


$conn = new mysqli('localhost', 'root', '', 'course-db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/


class dbconnect{
    	public function connect(){
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'course-db';
        $connection = mysqli_connect($host,$user,$pass,$db); 
        return $connection;
    }
}


?>