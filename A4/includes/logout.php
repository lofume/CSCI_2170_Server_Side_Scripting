<?php

//The session destroy code is considered to be standard / best-practice implementation. 
//It is available as Example #1 on: http://php.net/manual/en/function.session-destroy.php Accessed on 19 Oct 2021.
//Authors: PHP.net contributors
//Understanding of Delete, Data submission in php for Login, index, and processform. 
		//It is available under the Week 4-8 lecture notes (concept videos) Accessed on Nov 1-2, 2021.

    //initialize the session
    session_start();

    //unset all variables
    $_SESSION = array();

//if desired kill the session, and delete cookies
    if(ini_get("session.use_cookies")){
        $params= session_get_cookie_params();
        setcookie(session_name(),'', time()-42000,
        $params["path"], $params["domain"],
        $params["secure"], $param["httponly"]
    );

    }

    //destroy session
    session_destroy();

    //redirect to homepage
    header("Location: ../index.php");
    die();





?>