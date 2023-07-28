
<?php
/* header.php
     Author: Ava P.
     20 November 2021
*/

    // include db connection *Crystal
    require_once "includes/db.php";
    // include functions *Crystal
    require_once "includes/functions.php";

    // start a session *Crystal
    session_start();

    // make a token for hashing passwords *Crystal
    // info for learning: https://www.php.net/manual/en/function.hash.php
    $_SESSION['token'] = hash("whirlpool",
    "Anything one man can imagine, other men can make real.― Jules Verne, Around the World in Eighty Days");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP ChatBot</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A ChatBot to help you learn PHP.">

    <!-- Link to bootstrap *Crystal -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Link to jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Our stylesheet & normalize.css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>

<header id="pg-header">
    <nav id="header-nav">
        <h1><a href="index.php">PHP ChatBot</a></h1>
        <div class="dropdown">
            <img class="dropbtn" onmouseover="userIconHover(this)" onmouseleave="userIconExit(this)" onclick="dropdownMenu()"
                 src="img/user-6-32.png" alt="Account Options">
            <div id="dropdown-links" class="dropdown-content">
                <?php
                echo "<a href='index.php'>Home</a>";
                // Not logged in
                if(!isset($_SESSION['name'])) {
                    echo "<a href='index.php?login=true'>Login</a>";
                    echo "<a href='index.php?create-account=true'>Create Account</a>";
                }
                // Logged in
                else {
                    if(isset($_SESSION['admin'])){
                        echo "<a href='?admin=true'>Admin</a>";
                    }else{
                        echo "<a href='?profile=true'>My Profile</a>";
                    }
                    echo "<a href='includes/logout.php'>Logout</a>";
                } ?>
            </div>
        </div>
    </nav>
</header>
