<?php
	/* 
	* CSCI 2170: Assignment 2
	* The database connection info file for the example
	* Author: Raghav V. Sampangi (raghav@cs.dal.ca)
	* 
	* If you want to re-use any of this code, you may only do so WITH PERMISSION.
	*/

	// Connecting to the DB - using MySQLi

	$host = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "db";

	$dbconn = new mysqli($host, $username, $password, $dbname);

	//if ($dbconn->connect_errno) {
		//die("There is an error connecting<br>" . $dbconn->connect_error . "<br>" .
		//$dbconn->connect_errno);
	//}
	//else {
	//echo "<p>Connected!</p>";
	 //}

?>