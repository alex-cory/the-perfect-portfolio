<?php
// from: (http://php.net/manual/en/function.mail.php)
$to = 'Blake <blake589t@gmail.com>,
Blake <blake@hackingedu.co>,
Catherine <cmulling@stanford.edu>,
Catherine <catherine@hackingedu.co,
Jessica <ballet.jessica@gmail.com>,
Jessica <jessicaallen@hackingedu.co>,
Jes <jessicaou@hackingedu.co>,
Jes <jessicaou8@gmail.com>,
Kirill <kirill.satanovsky@gmail.com>,
Kirill <kirill@hackingedu.co>,
Yanny <yzhang1130@gmail.com>,
Yanny <yanny@hackingedu.co>,
Alex <alex@hackingedu.co>,
Delian <petrovd@uci.edu>,
Esther <estherdu@gmail.com>,
Ellie <myungjikim91@gmail.com>,
Calvin <calvin@hackingedu.co>';
$subject = 'Reminder: HackingEDU Meeting [Core Team]';
$message = "Hey everyone!\r\n\r\nDon't forget about the meeting in an hour! Excited to see everyone! :)\r\n\r\nAlex";
$headers = 'From: alex@alexcory.com' . "\r\n" .
    'Reply-To: alex@alexcory.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);