<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php'; 
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
	try {

		// require('theme_json_data.php');

		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		// $mail->isSMTP();                                         // Send using SMTP
		//$mail->Host       = $smtpSetting->smtp_host;                    	// Set the SMTP server to send through
		//$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		//$mail->Username   = $smtpSetting->smtp_user;                 // SMTP username
		//$mail->Password   = $smtpSetting->smtp_pass;                     // SMTP password
		// $mail->SMTPSecure = $smtpSetting->smtp_crypto;
		//$mail->Port       = $smtpSetting->smtp_port;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$fromEmail = $_POST['email'];
		$fromName = $_POST['name'];

		$mail->setFrom($fromEmail, $fromName);
		$mail->addAddress('info@eliphas.in', 'Eliphas');     // Add a recipient
		$mail->addReplyTo($fromEmail, $fromName);

		/*foreach($adminEmails as $adminEmail){
			$mail->addBCC($adminEmail);
		}*/

		$subject = $_POST['subject'];
		$message = "
			<table>
			  <tr>
			    <th>Name: </th>
			    <td>".$_POST['name']."</td>
			    </tr>
			  <tr>
			    <th>Email: </th>
			    <td>".$_POST['email']."</td>
			  </tr>
			  <tr>
			    <th>Subject: </th>
			    <td>".$_POST['subject']."</td>
			  </tr>
			  <tr>
			    <th>Message: </th>
			    <td>".$_POST['message']."</td>
			  </tr>
			</table>
			";

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message;


		if ($_FILES["file"]["name"]) {
			$mail->AddAttachment( $_FILES["file"]["tmp_name"], $_FILES["file"]["name"] );
		}
		// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if ($mail->send()) {
			echo "OK";
		} else {
			echo "failed";
		}
	}catch (Exception $e) {
		$status = ['status' => "failed", 'msg' => $mail->ErrorInfo];
		echo json_encode($status);
	}