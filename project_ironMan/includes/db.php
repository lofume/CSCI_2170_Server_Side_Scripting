	<?php
	/*
	 *	db.php
	 *	Connects to the Database on localhost.
     *  Author: Crystal Parker B00440169 cr838048@dal.ca, Lynda Ofume ly863136@dal.ca
     *  Modifications:
     *  Date: Nov 21, 2021 
	 */
    
    $host = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "ironman";

	$conn = new mysqli($host, $username, $password, $dbname);

	// https://onelinefun.com/mistake/
	if ($conn->connect_error) {
		die("Anyone who has never made a mistake has never tried anything new.". $conn->connect_error);
	}
	//else {
		//echo "<p>Connected!</p>";
	//}

?>