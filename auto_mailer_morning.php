<?php
// from: (http://php.net/manual/en/function.mail.php)
$to      = 'alex@hackingedu.co,alexlcory@gmail.com,alexcoryregister@gmail.com';
$subject = 'Reminder: HackingEDU Meeting [Core Team]';
$message = "Hey everyone!\r\n\r\nDon't forget about the meeting tonight at 9:30pm! Excited to see everyone!\r\n\r\nAlex";
$headers = 'From: alex@alexcory.com' . "\r\n" .
    'Reply-To: alex@alexcory.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);