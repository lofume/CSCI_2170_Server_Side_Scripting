<!-- /*
This code to implement form has been used with some modification from the submission for 
Assignment 4 by Student Crystal Parker in CSCI 2170 (Fall 2021).
Crystal, Assignment 4: CSCI 2170 (Fall 2021), Faculty of Computer Science, Dalhousie 
University. Available online on Gitlab at [URL]: https://git.cs.dal.ca/courses/2021-fall/csci-2170/a4/cparker/-/blob/master/A4/includes/compose.php.
Date accessed: Nov 27th 2021.
*/ -->
<?php
    	/*
	 *	admin.php
	 *	This file is the admin interface, can only access if session variable 
     *  admin is set. 
     *  Author: Crystal Parker B00440169 cr838048@dal.ca
     *  Modifications:
     *  Date: Nov 21, 2021 
	 */
    
    // check if it's an admin otherwise send back to index.php
    if(!$_SESSION['admin']){
         header("Location: index.php");
		die();
     }
?>
<?php
// //To fill in i-search
// $time= new DateTime();
// echo $time->format('Y-m-d H:i:s');
// INSERT INTO i_search (
//     `i_search_user_id`,`i_search_topic`,`i_search_date`)
//     VALUES (1,'session','2021-11-29 01:27:21')

?>
<!-- ✿ SQL to submit data to database        -->
<!-- TODO: AJAX so it's async... -->
<?php 
    if(isset($_POST['sendToDatabase'])){
      // get form data
	    $topic = cleanData($_POST['i-topic']);
	    $content = cleanData($_POST['i-content']);

    // check to make sure it's not empty
    if(!$topic||!$content){
        $_SESSION['incorrect'] = true;
        header("Location: index.php?admin=true");
	    die();
    }
    $content = $conn->real_escape_string($content);
    $topic = $conn->real_escape_string($topic);
    
    // Send to database
    // set up query
    $submitSQL = "INSERT INTO i_chatbot (
        `i_chatbot_topic`,`i_chatbot_content`)
        VALUES ('{$topic}','{$content}')";
    
    // excecute query
    $result = $conn->query($submitSQL);
    
    // If you successfully sent a querry you can unset previous incorrect status.
    if(isset($_SESSION['incorrect'])){
        unset($_SESSION['incorrect']);
    }
    }
?>
<?php
if(isset($_POST['editDatabase'])){
  // get form data
  $topic = cleanData($_POST['i-topic']);
  $content = cleanData($_POST['i-content']);
  $ID = cleanData($_POST['i-id']);


  // check to make sure it's not empty
  if(!$topic||!$content){
    $_SESSION['incorrect'] = true;
    header("Location: index.php?admin=true");
  die();
}
$content = $conn->real_escape_string($content);
$topic = $conn->real_escape_string($topic);
$ID = $conn->real_escape_string($ID);

  // Send to database
  // set up query
  $submitSQL = "UPDATE `i_chatbot` SET `i_chatbot_topic`='$topic',`i_chatbot_content`='$content' WHERE `i_chatbot_id`=$ID";

  // excecute query
  $result = $conn->query($submitSQL);
  
  // If you successfully sent a querry you can unset previous incorrect status.
  if(isset($_SESSION['incorrect'])){
      unset($_SESSION['incorrect']);
  }

  header("Location: index.php?admin=true");
  die();
}
?>


<main>
  <!-- Main admin Page -->
<h1 id="admin-h1">Hello Admin named: <?php echo $_SESSION['name']." ".$_SESSION['l_name'];?></h1> <!-- Just changed this since my IDE pointed it out! </p> to </h2> -Ava -->
<br><br>
<div id="admin-main">
<!-- ✿ Display format for individual content -->
<?php
if(isset($_POST['individual'])){
?>
<!-- TODO -->
  <section id="individual">
  <h2>Topic: </h2>
  <ul>
    <li>Content:</li>
  </ul>
  </section>
<?php
}else{
?>


<!-- ✿ Form to submit data to database       -->
<br>
<section id='admin-form'>
<h2>Add new content to database</h2>
<hr>
<form id="database_update_form" action="" method="post">
<?php if(isset($_SESSION['incorrect'])){
			echo"<h4 id='incorrect'>***The form is incorrect. Please try again.***</h4>";
			}?>
  <div class="form-group row">
    <?php if(isset($_GET['edit'])){ 
      // Edit form
      $id = cleanData($_GET['edit']);
      // SQL to fill form
      $editSQL = "SELECT `i_chatbot_content` AS 'content', `i_chatbot_topic` AS 'topic' FROM `i_chatbot` WHERE `i_chatbot_id`='$id'";

      $result = $conn->query($editSQL);

      $editRow = $result->fetch_assoc();
      ?>
      <div class="col-sm-7">
      <input type="text" class="form-control" value="<?php echo $editRow['topic'] ?>" name="i-topic">
    </div>
    <input type="hidden" name="i-id" value="<?php echo $id ?>">
      <input type="submit" class="col-sm-4" name="editDatabase" id="edit-database" value="Edit Database">
      </div>
      <div class="form-group row">
    <div class="col-sm-12">
    <!-- https://www.w3docs.com/snippets/html/how-to-create-a-multi-line-text-input-field-in-html.html -->
    <textarea id="database-content" class="form-control"  name="i-content" rows="12" cols="20"><?php echo $editRow['content'] ?></textarea>
    </div>
    </div>
      <?php }else{ 
        // Normal Form
        ?>
        <div class="col-sm-7">
      <input type="text" class="form-control" placeholder="Topic" name="i-topic">
      </div>
      <input type="submit" class="col-sm-4" name="sendToDatabase" id="add-to-database" value="Send to Database">
      </div>
      <div class="form-group row">
    <div class="col-sm-12">
    <!-- https://www.w3docs.com/snippets/html/how-to-create-a-multi-line-text-input-field-in-html.html -->
    <textarea id="database-content" class="form-control" placeholder="Content" name="i-content" rows="12" cols="20"></textarea>
    </div>
  </div>
      <?php }?>
</form>
<?php
  $getSQL = "SELECT `i_search_topic` AS 'topic', COUNT(`i_search_topic`) AS 'count' FROM `i_search` GROUP BY `i_search_topic` ORDER BY COUNT(`i_search_topic`) DESC";

  $result = $conn->query($getSQL);

  $popTopics = $result->fetch_assoc();
?>
</section>
<!-- ✿ Table to display data from database   -->
<h2 class="center">Content ordered by most popular</h2>
<h3 class="center">Most popular topic is: <b><?php echo $popTopics['topic'];?></b></h3>
<section id="database-table">
    <?php
    include_once "includes/database-table.php";
    ?>
</section>
<script src="js/admin.js"></script>
<?php
}
?>
</div>
</main>