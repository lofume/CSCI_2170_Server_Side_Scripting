<?php
	/*
	 * @file: 	index.php
	 * 
	 * @author: Raghav V. Sampangi (raghav@cs.dal.ca)
	 * 
	 * @desc:	This file is the homepage of the list interface, which serves as a starting point for Assignment 3 (CSCI 2170, Fall 2021).
	 * 
	 * @notes:	As a student working on A3 in CSCI 2170, you are allowed to edit this file.
	 * 			When you edit/modify, include block comments to summarize changes. 
	 * 			Clearly highlight what changed and why, and state assumptions if you make any.
	 * 
	 * Understanding how to not enter an empty response to the data, used in processform and index. (Line 32-34)
			https://codewithawa.com/posts/to-do-list-application-using-php-and-mysql-database Accesssed on Nov 1, 2021.
	 */


	require_once "includes/db.php";

	require_once "includes/processform.php";

	require_once "includes/header.php"; 

?>

<main id="pg-main">
<!-- function used to add list item form -->
	<h3>Submit a new item to your to do list:</h3>

				<form action="" id="form-flex-container" method="post">
				<?php if (isset($sendErrorMsg)) { ?>
					<p><?php echo $sendErrorMsg; ?></p>
				<?php } ?>
					<input type="text" placeholder="Enter list item" name="listItem" style= "border-color: black">
					<input type="submit" name="submitListItem" value="Submit list item">
				</form>
		<section id="list-container">
			<h3>Your list:</h3>

			
			<?php 
			//echo "<p>is currently empty!</p>"; 
			?>
				<table id = "to-dolist">
					<?php
				// Update this code to display the list if list items are available in the DB
				// And echo the list is empty if there is no list item
						$our_List = "SELECT * FROM mylist";
						$return = $conn->query($our_List);
						if($return){
							while($row = $return->fetch_assoc()){
								//echo $row["l_item"];
								// create delete variable
								$deleteToDo_val = <<<ENDDELETESTRING
									<button><a style= "text-decoration:none" 
									href= "index.php?delete={$row['l_id']}">Delete this item</a></button>
						ENDDELETESTRING;
						//complete - failed to process
						$completeToDo_val = <<<ENDEDITSTRING
									<input type= "checkbox" id="complete"><a style= "text-decoration:none" 
									href= "index.php?update={$row['l_id']}"></a></input>
						ENDEDITSTRING;
						
							//show list of data
								echo "<tr>";
								echo "<td>" . $completeToDo_val . "</td>";
								echo "<td>" . $row["l_item"] . "</td>";
								echo "<td>" . $deleteToDo_val . "</td>";
								echo "</tr>";
						
								}

							
					}
					?>
				</table>
					</section>
</main>

<?php 
require_once "includes/footer.php"; 
?>
