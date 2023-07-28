<?php
/*
 * This session-destroy code is from PHP.net
 * URL: https://www.php.net/manual/en/function.session-destroy.php
 * Author(s): PHP.net contributors
 * Date accessed: 27 November 2021
 *
 */

session_start();

/* Need to drop temp table used to display responses for the session.
   The following code is written by Ava Powelson on 03 December 2021 */

require_once "db.php";
$subtoken = substr($_SESSION['token'], 0, strlen($_SESSION['token'])/4);
$dropQuery = "DROP TABLE IF EXISTS i_temp_$subtoken";
$conn->query($dropQuery);

/* End of Code written by Ava */

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

header("Location: ../index.php");
die();

?>
