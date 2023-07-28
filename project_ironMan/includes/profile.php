<?php
/*
	 *	profile.php
	 *	displays profile information and users top searches
     *  Author: Parker Woolaver
     *  Date: Dec, 4 2021 
	 */

     include_once 'includes/header.php';
     require_once 'includes/functions.php';
?>
<span style="display:block; height: 15px;"></span>
<h1 class = "heading"> <b>Profile </b></h1> 
<span style="display:block; height: 10px;"></span>
<div class = "profile">
<img class="img" src="img/icons8-name-100.png" alt="Profile logo" style = "width:100%">
<h1><?php echo $_SESSION['name']." ".$_SESSION['l_name']; ?> </h1>
<p class="username"> <?php echo $_SESSION['email']; ?> </p>
</div>

<span style="display:block; height: 75px;"></span>



<h1 class = "searches"> <b>Search History</b></h1>
<?php


/*
Displaying the last 10 searches the user made during the session
*/

            if(isset($_SESSION['msgSent'])) {
                $query = "SELECT * FROM i_temp_$subtoken ORDER BY i_temp_id DESC LIMIT 20";
                $result = $conn->query($query);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['i_temp_isUser'])
                            echo "<p>" . $row['i_temp_content'] . "</p>";
                    }
                }
            }
            ?>