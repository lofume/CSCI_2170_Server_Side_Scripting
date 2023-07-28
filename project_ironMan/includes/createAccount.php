<!--
	 *	createAccount.php
	 *	This page allows the user to create an account on the website.
     *  Author: Anastasia Chapin-Fortin
     *  Date: 4 December 2021 
 -->

 <?php
    require_once "includes/db.php";

    $email = "";
    $password = "";

    if(isset($_POST['signup-submit'])) {

        $email = cleanData($_POST['i-account-email']);
        $password = cleanData($_POST["i-account-password"]);

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $submitSQL = "INSERT INTO 'i_login' (i-account-email, i-account-password)
        VALUES ('{$email}', '{$password_hash}')";

        $sqlQuery = mysqli_query($connection, $submitSQL);

        header("Location: index.php");

    }
?>

    <section id="signup">
	    <h2>Sign Up for PHP Chatbot</h2>
        <hr>

		<form class="signup-form" method="post" action="">
			<div class="input-row">
    			<label for="email">Email: </label>		
      			<input type="email" id="input-email" name="i-account-email" placeholder= "Enter your email..." required>
  			</div>

			<div class="input-row">
    			<label for="input-password">Password: </label>
      			<input type="password" id="input-password" name="i-account-password" placeholder= "Enter your password..." required>
  			</div>

            <div class="input-row">
                <input class= "submit" type="submit" name="signup-submit" value="Sign Up">
            </div>
			<a id="login-pg" href= "index.php?login=true"> Already have an account? Click here to login </a>
		</form>

	</section>
    