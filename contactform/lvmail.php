<?php

$name = $HTTP_POST_VARS['Name'];
$email = $HTTP_POST_VARS['Email'];
$message = $HTTP_POST_VARS['Message'];

$message = stripslashes($message);
// ------- YOUR EMAIL HERE! ------------------
$sendTo = "spam@lernvid.com";
// -------------------------------------------
$subject = "Message from Flash Contact Form 2";

$msg_body = '<html><body>';
$msg_body .= "<p><strong>Name:  $name</strong></p>";
$msg_body .= "<p><strong>E-Mail:  $email</strong></p>";
$msg_body .= "<p><strong>Message:</strong></p>";
$msg_body .= "<p>$message</p>";
$msg_body .= '</body></html>';

$header_info = "From: ".$name." <".$email.">\r\n";
$header_info .= "MIME-Version: 1.0\r\n";
$header_info .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($sendTo, $subject, $msg_body, $header_info);

?>