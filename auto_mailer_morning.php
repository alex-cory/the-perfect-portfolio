<?php
// from: (http://php.net/manual/en/function.mail.php)
$to = 'Blake <blake589t@gmail.com>,
Blake <blake@hackingedu.co>,
Catherine <cmullings@stanford.edu>,
Catherine <catherine@hackingedu.co,
Jessica <ballet.jessica@gmail.com>,
Jessica <jessicaallen@hackingedu.co>,
Jes <jessicaou@hackingedu.co>,
Jes <jessicaou8@gmail.com>,
Kirill <kirill.satanovsky@gmail.com>,
Kirill <kirill@hackingedu.co>,
Yanny <yzhang1130@gmail.com>,
Yanny <yanny@hackingedu.co>,
Alex <alex@hackingedu.co>';
$subject = 'Reminder: HackingEDU Meeting [Core Team]';
$message = "Hey everyone!\r\n\r\nDon't forget about the meeting tonight at 9:30pm! Excited to see everyone! :)\r\n\r\nAlex";
$headers = 'From: alex@alexcory.com' . "\r\n" .
    'Reply-To: alex@alexcory.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



// from: (http://php.net/manual/en/function.mail.php)
// $to = array(
// 	'Alex' =>  'alex@hackingedu.co',
// 	'Jes' => 'jessicaou@hackingedu.co',
// 	'Jessica' => 'jessicaallen@hackingedu.co',
// 	'Catherine' => 'catherine@hackingedu.co',
// 	'Blake'
// 	);
// $subject = 'Reminder: HackingEDU Meeting [Core Team]';

// $headers = 'From: alex@hackingedu.co' . "\r\n" .
//     'Reply-To: alex@hackingedu.co' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// foreach ($to as $k => $v) {
// 	$message = "Hey $k!\r\n\r\nDon't forget about the meeting tonight at 9:30pm! Excited to see you there! :)\r\n\r\nAlex";
// 	mail($v, $subject, $message, $headers);
// }