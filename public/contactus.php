
        <link href="../css/style.css" type="text/css" rel="stylesheet">
        <link href="../css/contact.css" type="text/css" rel="stylesheet">
    <?php
        include "connection.php";
        include "navbar.php";
    ?>
<header>
	<h1 class="h1">Contact us</h1>
</header>

<div id="form">

<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>

<form id="waterform" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" >

<div class="formgroup" id="name-form">
    <label for="name">Your name*</label>
    <input type="text" id="name" name="name" />
</div>

<div class="formgroup" id="email-form">
    <label for="email">Your e-mail*</label>
    <input type="email" id="email" name="email" />
</div>

<div class="formgroup" id="message-form">
    <label for="message">Your message</label>
    <textarea id="message" name="message"></textarea>
</div>

	<input type="submit" value="Send your message!" />
</form>
</div>

<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $text = $_REQUEST["message"];

$mail = new PHPMailer();

$mail->isSMTP();                                      

$mail->SMTPAuth = true;                            
$mail->Username = 'abshir@gmail.com';  
$mail->Password = 'abshir@123';                           
$mail->SMTPSecure = 'tls';               

$mail->From = 'abshir@gmail.com';
$mail->FromName = 'Abshir';
$mail->addAddress($email);  
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 

$mail->isHTML(true);                                  

$mail->Subject = 'Buy/Rent';
$mail->Body = $text;
$mail->AltBody = 'This is Abshir and it sends message';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>

<?php
include "footer.php";

?>