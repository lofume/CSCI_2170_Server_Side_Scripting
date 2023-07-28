<?php
/* functions.php
 * Authors: Ironman group members
 * November-December 2021
 */

// Our basic cleaning of data *Crystal, Lynda
function cleanData($input){
     $cleaned = trim($input);
     $cleaned = stripslashes($cleaned);
     $cleaned = htmlspecialchars($cleaned);
     return $cleaned;
}

 /* The following createTempTable() and insertUserMsgToSearch() are used in chatProcessing.php to store and display
    appropriate data in index.php - Ava P. */

 // For displaying recent chat messages on the home page
function createTempTable($sessionToken, $conn) {
    $subtoken = substr($sessionToken, 0, strlen($sessionToken)/4);
    $tableName = "i_temp_" . $subtoken;

    $query = "CREATE TABLE IF NOT EXISTS $tableName (
                i_temp_id int(11) NOT NULL AUTO_INCREMENT,
                i_temp_content varchar(512) NOT NULL,
                i_temp_isUser int(11) NOT NULL,
                PRIMARY KEY (i_temp_id)
              );";

    $conn->query($query);

    return $tableName;
}

// store the information about the search in i-search
function insertUserMsgToSearch($topic, $userID, $conn) {
    $query = "INSERT INTO i_search (i_search_user_id, i_search_topic, i_search_date)
        VALUES ($userID,'$topic', CURRENT_TIMESTAMP)";
    return $conn->query($query);
}
?>