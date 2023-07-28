<?php
	/*
	 * @file: 	processform.php
	 * 
	 * @author: Raghav V. Sampangi (raghav@cs.dal.ca)
	 * 
	 * @desc:	This file processes data submitted to add/edit/delete items to the list.
	 * 
	 * @notes:	As a student working on A3 in CSCI 2170, you are allowed to edit this file. 
	 * 			When you edit/modify, include block comments to summarize changes. 
	 * 			Clearly highlight what changed and why, and state assumptions if you make any.
	 */
	

	//Understanding of Delete, Data submission in php for Login, index, and processform. 
		//It is available under the Week 4-8 lecture notes (concept videos) Accessed on Nov 1-2, 2021.
	function sanitizeData ($string){
		$sanitizestring = trim($string);
		$sanitizestring = stripslashes($sanitizestring);
		$sanitizestring = htmlspecialchars($sanitizestring);

		include "includes/db.php";
		$conn->real_escape_string($sanitizestring);
		return $sanitizestring;
	}
	/*
	 * Processing submitted list item
	 */
	//Understanding how to not enter an empty response to the data, used in processform and index.
		//https://codewithawa.com/posts/to-do-list-application-using-php-and-mysql-database Accesssed on Nov 1, 2021.
	
		$sendErrorMsg = "";
	if (isset($_POST['submitListItem'])) {
		//message to stop no submission to adding to data
		if(empty($_POST['listItem'])){
			$sendErrorMsg = "You must input a task";
		}else{
		//Understanding of Delete, Data submission in php for Login, index, and processform. 
		//It is available under the Week 4-8 lecture notes (concept videos) Accessed on Nov 1-2, 2021.
		// your code here to sanitize data and submit to data set
			$the_Item = sanitizeData($_POST['listItem']);
			$theSQL = "INSERT INTO mylist (`l_id`, `l_item`, `l_done`) VALUES (NULL ,'{$the_Item}' , 0 )";
			//echo $theSQL;
			$conn->query($theSQL);
		}
	}
	/*
	 *	Processes delete item requests
	 */
	//Understanding of Delete, Data submission in php for Login, index, and processform. 
		//It is available under the Week 4-8 lecture notes (concept videos) Accessed on Nov 1-2, 2021.
	if (isset($_GET['delete'])) {
		// your code here
		$l_id = $_GET['delete'];
		$deleteLine = "DELETE FROM mylist WHERE l_id=" . $l_id;

		$conn->query($deleteLine);

		header("Location: index.php");
		die();
	}
	/*
	 *	Processes completed item requests
	 *  "Mark as done" --> set l_done = 1
	 *  failed to process
	 */
	if (isset($_GET['complete'])) {
		// could not get this portion of the code to work 

			

	}


?>