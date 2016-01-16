<?php

// The proper way to use this class is to make an object of the class and call the appropriate functions. Paramaeters are mentioned
// AUTHOR: ADITYA WALVEKAR
// IECSE MAILER
// DATE:04.11.2015

class dbAccess{
	public $conn;
//The parameters for the contructor is the Server address/IP, The Name of the database and the credentials(username and password)
	public function __construct($db_server,$db_name,$username,$password){
		global $conn;
		$conn = new mysqli($db_server,$username,$password);
		if($conn->connect_error){
			die("Connection Failed".$conn->connect_error);
		}
		mysqli_select_db($conn,$db_name);
		
	}
//Parameters to pass to the write_to_db() function is just a mysql query as a string.
//It will return the success state of the query as a boolean.
	public function write_to_db($q){
		global $conn;
		$query=mysqli_query($conn,$q);
		return $query;
	}
//Parameters to pass to the read_from_db() function is just a mysql query as a string.
//It will return either the Associative array of the query or the state of the query(true, false).
	public function read_from_db($q){
		global $conn;
		$query=mysqli_query($conn,$q);
		if($query){
			if(mysqli_num_rows($query)>=1){
				
				return (mysqli_fetch_assoc($query));


			}
		}


	}
	public function read_from_db_array($q){
		global $conn;
		$query=mysqli_query($conn,$q);
		if($query){
			if(mysqli_num_rows($query)>=1){
				
				return (mysqli_fetch_array($query));


			}
		}


	}

	public function write_query_generator($column,$data,$table){
		$q="INSERT INTO $table ($column) VALUES ($data)";
		return $q;
	}
	public function read_query_generator($column,$data,$table){
		$q="SELECT * FROM $table WHERE $coloumn=$data";
		return $q;
	}
	public function delete_query_generator($column,$data,$table){
		$q="DELETE FROM $table WHERE $column = $data";
		return $q;
	}


}