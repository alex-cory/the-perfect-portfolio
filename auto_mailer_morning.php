<?php
// from: (http://php.net/manual/en/function.mail.php)
$to = array(
	'AlexHackingEDU <alex@hackingedu.co>',
	'AlexLCory <alexlcory@gmail.com>',
	'AlexCoryRegister <alexcoryregister@gmail.com>'
	);
$subject = 'Reminder: HackingEDU Meeting [Core Team]';

$headers = 'From: alex@hackingedu.co' . "\r\n" .
    'Reply-To: alex@hackingedu.co' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

foreach ($to as $k => $v) {
	$message = "Hey $k!\r\n\r\nDon't forget about the meeting tonight at 9:30pm! Excited to see you there! :)\r\n\r\nAlex";
	mail($v, $subject, $message, $headers);
}