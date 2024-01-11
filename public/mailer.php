
<?php
function sendSMTP($fromAddr, $fromName, 
$replyAddr, $replyName, $addr, $subject, $body){
$mail = new PHPMailer;
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = "techreviewnow7@gmail.com"; // your email id
$mail->Password = "0930651099"; // your password
$mail->SMTPSecure = 'tls';               
$mail->setFrom('techreviewnow7@gmail.com', 'Tech Review');
$mail->addAddress('asnakeassefa28@gmail.com');   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>HeY!,</h1>';
$bodyContent .= '<p>your key is</p>';
$mail->Subject = 'Email from Abshir';
$mail->Body    = $bodyContent;
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
}
?>