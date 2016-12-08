<?php
require 'PHPMailer/PHPMailerAutoload.php';

/* Check to see if the variables required to send an email are stored in the session.
 *
 * Required Variables: (Array)Targets, (Html plaintext)Content
 * Optional Variables: Attachment
*/

if(!isset($_POST['ckeditor'] || !isset($_POST['target'])) {
	echo("Error sending, no targets or HTML text");
}

else{

	//Instances of the PHPMailer and SQL interface classes
	$mail = new PHPMailer;
	$mysql = new ProcessMySQL;

	//Setup the mail object properly with the required system data

	$mail->isSMTP();	//We are using SMTP
	$mail->Host = '';	//The mailhost our webserver uses
	$mail->SMTPAuth = true;	//Enable SMTP authentication
	$mail->Username = '';	//SMTP username
	$mail->Password = '';	//SMTP password
	$mail->SMTPSecure = 'tls';	//Enable TLS encryption. We can also use 'ssl'
	$mail->Port = xxx;	//What port are we sending TCP data over? Replace this with an int

	$mail->setFrom('info@psb.acm.org', 'Behrend ACM');

	//For each user, add their address to the mailing list.
	foreach ($mysql->getEmailAddressesByMajor($_POST['target']) as $address) {
		$mail->addAddress($address);
	}

	//TODO: If we have any attachments, send them here.

	$mail->isHTML(true);	//We will be sending using pure HTML thanks to the CKEditor

	$mail->Subject = 'Here is the Subject';
	$mail->Body = $_POST['ckeditor'];


}