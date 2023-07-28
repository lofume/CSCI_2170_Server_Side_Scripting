<!-- /*
	 *	database-table.php
	 *	This file builds the table so that it can be updated through ajax.
     *  Author: Crystal Parker B00440169 cr838048@dal.ca
     *  Modifications:
     *  Date: Dec 6th, 2021 
	 */ -->
<!-- ✿ SQL to querry database for data -->
<?php
  $getSQL = "SELECT `i_search_topic` AS 'topic', COUNT(`i_search_topic`) AS 'count' FROM `i_search` GROUP BY `i_search_topic` ORDER BY COUNT(`i_search_topic`) DESC";

  $result = $conn->query($getSQL);

  $popTopics = $result->fetch_assoc();
?>
<?php
    // All the popular searches
    while($popTopics){
      $currTopic = $popTopics['topic'];
      $sqlQuery = "SELECT `i_chatbot_content` AS 'content', `i_chatbot_id` AS 'id' FROM `i_chatbot` WHERE `i_chatbot_topic`='$currTopic'";
      $infoResult = $conn->query($sqlQuery);
      while($topicInfo = $infoResult->fetch_assoc()){
        echo "<div class='topic-info row'>";
        echo "<div class='col-9 col-sm-9'><p><b>".$popTopics['topic']."</b> | ".$topicInfo['content']."</p></div><div class='col-4 col-sm-3'>
        <a name='edit link' href='index.php?admin=true&edit=".$topicInfo['id']."'><img alt='edit ".$topicInfo['id']."' class='icon' src='img/icons8-edit-64.png'></a>
        <img  alt='delete ".$topicInfo['id']."' class='deleteItem' value='".$topicInfo['id']."' src='img/icons8-delete-64.png'></div></p>";
        // echo "<p>Number of searches: ".$popTopics['count']."</p>";
        echo "</div>";
      }
      $popTopics = $result->fetch_assoc();
    }
    // Everything that has not been searched
    $sqlQuery = "SELECT `i_chatbot_topic` AS 'topic',
     `i_chatbot_content` AS 'content', `i_chatbot_id` AS 'id' 
     FROM `i_chatbot` WHERE `i_chatbot_topic`
     NOT IN (SELECT `i_search_topic` FROM `i_search`)";
      $infoResult = $conn->query($sqlQuery);
      while($topicInfo = $infoResult->fetch_assoc()){
        echo "<div class='topic-info row'>";
        echo "<div class='col-9 col-sm-9'><p><b>".$topicInfo['topic']."</b> | ".$topicInfo['content'].
        "</p></div><div class='col-4 col-sm-3'><p>
        <a name='edit link' href='index.php?admin=true&edit=".$topicInfo['id']."'><img alt='edit ".$topicInfo['id']."' class='icon' src='img/icons8-edit-64.png'></a>
        <img  alt='delete ".$topicInfo['id']."' class='deleteItem' value='".$topicInfo['id']."' src='img/icons8-delete-64.png'></div></p>";
        echo "</div>";
      }
    ?>