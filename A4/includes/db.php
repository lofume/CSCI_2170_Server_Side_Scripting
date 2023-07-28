<?php
	/*
	 * @file: 	db.php
	 * 
	 * @author: Raghav V. Sampangi (raghav@cs.dal.ca)
	 * 
	 * @desc:	This file connects to the database and creates the connection object.
	 * 
	 * @notes:	DO NOT MODIFY THIS FILE.
	 * 			Create a database named 2170 and work using that database for A3.
	 */
	
	/*
	 *	db.php
	 *	Connects to the Database on localhost.
	 */

	

	$host = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "jedi";

	$conn = new mysqli($host, $username, $password, $dbname);

	
?>