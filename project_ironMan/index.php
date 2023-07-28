<?php
/* index.php
     Author: Ava P.
     20 November 2021
*/

require_once "includes/header.php";
?>
<?php
// If you left login/admin-form you can unset previous incorrect status,
//so it isn't on when you go back - Crystal
if(isset($_SESSION['incorrect'])){
    unset($_SESSION['incorrect']);
}

// to determine which recent messages (if any) to display
$subtoken = substr($_SESSION['token'], 0, strlen($_SESSION['token'])/4);
?>
<main id="index-main">
    <?php
    if(isset($_GET['login'])) {
        include_once "includes/login.php";
    } elseif (isset($_GET['create-account'])) {
        include_once "includes/createAccount.php";
    } elseif(isset($_GET['admin'])){
        include_once "includes/admin.php";
    } elseif(isset($_GET['profile'])) {
        include_once "includes/profile.php";
    } elseif(isset($_GET['contact-pg'])){
        include_once "includes/contact.php";
    } elseif(isset($_GET['about'])){
        include_once "includes/about.php";
    } else { ?>
    <h2>Hello<?php if(isset($_SESSION['name'])) echo " " . $_SESSION['name']; ?>, how can I help you?</h2>
        <div id="chatDisplay">
            <?php
            if(isset($_SESSION['msgSent'])) {
                $query = "SELECT * FROM i_temp_$subtoken";
                $result = $conn->query($query);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['i_temp_isUser'])
                            echo "<p><strong>User: </strong>" . $row['i_temp_content'] . "</p>";
                        else
                            echo "<p><strong>ChatBot: </strong>" . $row['i_temp_content'] . "</p>";
                    }
                }
            }
            ?>
        </div>
        <form id="chatForm" action="includes/chatProcessing.php" method="post">
            <label for="topicBox"></label>
            <input type="text" name="topic" id="topicBox" placeholder="Enter your topic here..." required>
            <input onmouseover="sendBtnHover(this)" onmouseleave="sendBtnExit(this)" type="image" alt="Submit" src="img/arrow-32-24.png" id="sendMsgBtn" >
        </form>
    <?php } ?>
</main>
<?php
require_once "includes/footer.php";
?>
