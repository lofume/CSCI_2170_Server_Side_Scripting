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
	if(!isset($_SESSION['username'])){

	?>
<!-- login form -->
	<nav id="temp-login-nav">
		<form method="post" action=""> 
			<input type="text" name="l-username" id= "input-username" placeholder="Enter your username:">
			<input type="text" name="l-password" id= "input-password" placeholder="Enter your passowrd:">
			<input type="hidden" name= "i-token" value="<?php echo $_SESSION['l_token'];?>">
			<input type="submit" name="l_submit" id= "input-submit-form">
		</form>
	</nav>
	<?php
		}
		else{
	?>
	<nav id="weHome">
		<a href="index.php">Home</a>
	</nav>
	<nav id="primary-nav">
	<?php
	// very it is set and then display user's name
	if(isset($_SESSION['username'])){
	?>
		<p>Hello&nbsp<?php echo $_SESSION['name'];?></p><p>!</p>
	<?php
	}
	?>
		<a href= "includes/logout.php">(Click here to Logout)</a>
	<?php
		}
	?>
	
</nav>


	
