<?php
	/*
	 * @file: 	index.php
	 * 
	 * @author: Raghav V. Sampangi (raghav@cs.dal.ca)
	 * 
	 * @desc:	This file must contain the login processing script.
	 * 
	 * @notes:	As a student working on A3 in CSCI 2170, you are allowed to edit this file.
	 * 			When you edit/modify, include block comments to summarize changes. 
	 * 			Clearly highlight what changed and why, and state assumptions if you make any.
	 */

	// verify that there is submission into the form

	require_once "includes/db.php";

	$email = $_POST['j-email'];
	$password = $_POST['j-password'];


	if ($conn->connect_error) {
		die("Nooooooooo!" . $conn->connect_error);
	}
	else {
		$thisinput = $conn->prepare("SELECT * FROM j_login WHERE j_email= ?");
		$thisinput->bind_param("s", $email);
		$thisinput->execute();
		$thisinput_result = $thisinput->get_result();
		if($thisinput_result->num_rows > 0){
			$data = $thisinput_result->fetch_assoc();
			if($data['password']=== $password){
				echo "<h2>Login Successfull</h2>";
			}
			else{
				echo "<h2>invalid</h2>";
			}
		}
		header("index/php");
		//else{
			//echo "<h2>invalid</h2>";
		//}
	}
?>
