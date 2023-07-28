<?php
	/*
	 * CSCI 2170: Fall 2021, Assignment 4
	 * index.php - the main homepage file for this template
	 * Author: Raghav V. Sampangi (raghav@cs.dal.ca)
	 */

	require_once "includes/db.php";

	require_once "includes/login.php";
	
	require_once "includes/header.php";

	
?>

<!-- Login Form -->
<div class= "text-center">
	<h2>Login to JediMail</h2>
</div>
		<form action="" method="post">
			<div class="login-form">
				<label for="email">Your email:</label>
					<input type="email" name="j-email" id= "input-email">
			</div>
			<div class=login-form>
				<label for="password">Your password:</label>
					<input type="password" name="j-password" id= "input-password">
			</div>
			<div class=login-button>
			<input type="submit" class="j_submit" value="Login" name="">
			</div>
		</form>
	









	<nav class="primary-nav">
		<a href="">Inbox</a>
		<a href="">Sent &amp; drafts</a>
		<a href="">Write new email</a>
	</nav>

	<main id="homepg-main-content" class="pg-main-content">
	</main>



<?php
	require_once "includes/footer.php";
?>