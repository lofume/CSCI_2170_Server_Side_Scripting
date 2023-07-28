<?php
/* chatProcessing.php
    Author: Ava Powelson
    03 December 2021
*/

session_start();
require_once "functions.php";
require_once "db.php";

$_SESSION['msgSent'] = true;
$topic = cleanData($_POST['topic']);

// create temp table to display chats
$tempTable = createTempTable($_SESSION['token'], $conn);

// insert chat into temp table
$usrTopicQuery = "INSERT INTO $tempTable (i_temp_content, i_temp_isUser) VALUES ('$topic', 1)";
$result = $conn->query($usrTopicQuery);
// for checking whether the search has been saved for admins
$logged = false;

// get & display chatBot response
$responseQuery = "SELECT * FROM i_chatbot WHERE '$topic' LIKE CONCAT('%', i_chatbot_topic, '%')";
$result = $conn->query($responseQuery);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cleanContent = addslashes($row['i_chatbot_content']);
        $responseQuery = "INSERT INTO $tempTable (i_temp_content, i_temp_isUser) 
                          VALUES ('$cleanContent', 0)";
        $conn->query($responseQuery);

        //insert chat into search table if user is logged in
        if(isset($_SESSION['name']) && !$logged) {
            insertUserMsgToSearch($row['i_chatbot_topic'], $_SESSION['userID'], $conn);
            $logged = true;
        }
    }
} else {
    $phpResourceURL = 'https://www.php.net/manual/en/';
    $negativeResponse = "Sorry, I don\'t know anything about that. Here is a useful resource: $phpResourceURL";
    $replyQueryN = "INSERT INTO $tempTable (i_temp_content, i_temp_isUser) VALUES ('$negativeResponse', 0);";
    $conn->query($replyQueryN);
}

header("Location: ../index.php");
die();

?>