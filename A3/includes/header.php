<?php 
// Understanding of Delete, Data submission in php for Login, index, and processform. 
	//It is available under the Week 4-8 lecture notes (concept videos) Accessed on Nov 1-2, 2021.

	session_start(); //start session

	//sanitize data and then verify the right password outputs the right information
	if(isset($_POST['l_submit'])){
		if($_SESSION['l_token'] == $_POST['i-token']){
			//Regenerate session ID 
			session_regenerate_id();
			$_SESSION['username'] = sanitizeData($_POST['l-username']) ;
			$_SESSION['password'] = sanitizeData($_POST['l-password']) ;

			if($_SESSION['username'] == "yodaiam" && $_SESSION['password'] == "doORdonotNOTRY"){
				$_SESSION['name'] = "Yoda";
			}
			else{
				if($_SESSION['username'] == "rey" && $_SESSION['password'] == "balance"){
					$_SESSION['name'] = "Rey Skywalker";
				}
			}
		}
	}
?><!DOCTYPE html> <!-- code to excute session start and to re use header function in other files -->
<html lang="en">
<head>
	<title>To Do list</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header id="pg-header">
		<h1>This is your To Do list</h1>
	</header>
	
	<!-- reuse login.php -->
		<?php require_once "includes/login.php"; ?>