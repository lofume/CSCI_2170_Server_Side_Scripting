<?php
    	/*
	 *	adminProcessing.php
     *  Author: Crystal Parker B00440169 cr838048@dal.ca
     *  Modifications:
     *  Date: Dec 6th, 2021 
	 */

    // include_once "includes/functions.php"; 
	include_once "db.php";
	include_once "functions.php";
    // check if it's an admin otherwise send back to index.php
?>

<?php
if(isset($_GET['delete'])){
  $id = cleanData($_GET['delete']);
  
  // // Delete from search record - Maybe not a good idea...
  // $deleteSQL = "DELETE FROM `i_search` WHERE `i_search_topic`=(SELECT `i_chatbot_topic` FROM `i_chatbot` WHERE `i_chatbot_id`= $id)";
  // $deleteResult = $conn->query($deleteSQL);

  // Delete from chatbot
  $deleteSQL = "DELETE FROM `i_chatbot` WHERE `i_chatbot_id`= $id";
  $conn->query($deleteSQL);

  include "database-table.php";
}
?>
