<!--
	 *	contact.php
	 *	This is the contact page that allows a user to send an email to the administrator email address.
     *  Author: Anastasia Chapin-Fortin
     *  Date: 4 December 2021 
 -->

<?php

$adminEmail = "ironmanchatbot@gmail.com";
$emailSubject = "Contact form notice";

if(isset($_POST['contact-submit'])) {
    $fullName = cleanData($_POST['contact-name']);
    $email = cleanData($_POST['contact-email']);
    $subject = cleanData($_POST['contact-subject']);
    $message = cleanData($_POST['contact-message']);

    $emailContent = "
        <p>Name: " .$fullName."</p>
        <p>Email: " .$email."</p>
        <p>Subject: " .$subject."</p>
        <p>Message: " .$message."</p>
        ";

    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'X-Mailer: PHP/' . phpversion();
    $headers[] = 'To: ironmanchatbot@gmail.com';
    $headers[] = 'From: ironmanchatbot@gmail.com';

    mail($adminEmail, $emailSubject, $emailContent, implode("\r\n", $headers));

    header("Location: index.php");
}
?>

<section id="contact">
<h2>Contact Us</h2>
    <form class="contact-form" method="post" action="" name="contact-form">
        <div class ="input-row">
            <label for="name">Full Name: </label>
            <input type="text" id="name" name="contact-name" placeholder="Enter your full name..." required 
            value="<?php echo $fullName = cleanData($_POST['contact-name']); ?>">
        </div>

        <div class="input-row">
            <label for="email">Email: </label>
            <input type="email" id="email" name="contact-email" placeholder="Enter your email..." required
            value="<?php echo $email = cleanData($_POST['contact-email']); ?>">
        </div>

        <div class="input-row">
            <label for="subject">Subject: </label>
            <input type="text" id="subject" name="contact-subject" placeholder="Enter the subject..." required
            value="<?php echo $subject = cleanData($_POST['contact-subject']); ?>">
        </div>

        <div class="input-row">
            <label for="message">Message: </label>
            <input type="text" id="message" name="contact-message" placeholder="Enter your message..." required
            value="<?php echo $message = cleanData($_POST['contact-message']); ?>">
        </div>

        <div class="input-row">
            <input class= "submit" type="submit" name="contact-submit" value="Send">
        </div>
</form>
</section>
