<!-- /*
This code to implement login has been used with some modification from the submission for 
Assignment 4 by Student Crystal Parker in CSCI 2170 (Fall 2021).
Crystal, Assignment 4: CSCI 2170 (Fall 2021), Faculty of Computer Science, Dalhousie 
University. Available online on Gitlab at [URL]: https://git.cs.dal.ca/courses/2021-fall/csci-2170/a4/cparker/-/blob/master/A4/includes/login.php.
Date accessed: Nov 27th 2021.
*/ -->

<!--
Solution to the assignment 4 provided by Dr. Raghav V. Sampangi, Fall 2021 offering of CSCI 1170. 
Used with e-mail permission dated 06-12-2021.
-->

<?php
	/*
	 * @file: 	login.php
	 * 
	 * @author: Raghav V. Sampangi (raghav@cs.dal.ca), Crystal Parker (cr838048@dal.ca), Lynda Ofume (ly863136@dal.ca)
	 * 
	 * @desc:	This file must contain the login processing script.
	 * 
	 * @notes:	Copied over from A3, made changes to include password_hash according to lecture 8 video for Assignment 4
	 * Copied over to Group project for Lynda Ofume to modify/improve for final. I suggest she 
	 * re-watch the lecture video and refer to the login-TODO.txt file to see further tips.
	 * Lynda will make all changes, and add herself to authors at the top. 
	 */


	 require_once "includes/db.php";

	if(isset($_POST['i-submit'])){

	// get user and password
	$email = cleanData($_POST['i-email']);
	$password = cleanData($_POST['i-password']);
	echo $email, $password;

	// //query database for user info
	$submitSQL = "SELECT * FROM `i_login` WHERE `i_email` = '$email'";
	$result = $conn->query($submitSQL);

	$row = $result->fetch_assoc();

	if(!$row){
		// // if they try to put a username that doesn't exist send them back to index.php
		//header("Location: index.php");
		//die();
		$_SESSION['incorrect'] = true;
	}else{

    // make sure password is right
    if(password_verify($password,$row['i_password'])){

	// regenerate session id
	session_regenerate_id();

    $userid = $row['i_id'];

    $submitSQL = "SELECT * FROM `i_user` WHERE `i_user_id` = '$userid'";
	$result = $conn->query($submitSQL);

	$row = $result->fetch_assoc();

	// values to session variable
	$_SESSION['name'] = $row['i_user_fname'];
	$_SESSION['l_name'] = $row['i_user_lname'];
    $_SESSION['email'] = $email;
    $_SESSION['userID'] = $userid;


	}
}
// send them back to index.php
	header("Location: index.php");
	die();
}
else{
?>
<!-- Login form -->
        <section id="login">
		<h2>Login to PHP Chatbot</h2>
        <hr>
		<?php if(isset($_GET['incorrect'])){
			echo"<h4 id='incorrect'>***The username and/or password that you entered is incorrect. Please try again.***</h4>";
			}
			?>

		<form class="login-form" method="post" action="">
			<div class="form-group-row">
    			<label for="email">Email:</label>		
      			<input type="email" name="i-email" id="input-email" placeholder= "Enter your email..." required>
  			</div>

			<div class="form-group-row">
    			<label for="input-password">Password:</label>
      			<input type="password" name="i-password" id="input-password" placeholder= "Enter your password..." required>
  			</div>

			<div class="form-group-row">
				<input class= "submission" type="submit" name="i-submit" value="login">
			</div>
			<a id="sign-up-pg"href= "index.php?create-account=true"> New? Click to Register </a>
		</form>


		</section>
<?php
}
?>