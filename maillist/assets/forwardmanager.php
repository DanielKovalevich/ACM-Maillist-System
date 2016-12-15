
#!/usr/local/lib/php
<?php

require 'PHPMailer/PHPMailerAutoload.php';
include_once('PDO.inc.php');

//Recieve the stdin content that Cpanel is giving us in read only mode
$fd = fopen("php://stdin", "r");
$message = "";

while (!feof($fd))
{
	//Put all of the incoming data in 
	$message .= fread($fd, 1024);
}

fclose($fd);

//All of the mail content is saved in $message now

$mail = new PHPMailer;

//Get the email from the database
$db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);
$settings = $db->prepare("SELECT email FROM settings");
$settings->execute();
$settings->$settings->fetchAll();
$settings = $settings["0"]

//Prepare to send the recieved content to the current ACM president
$mail->isSMTP();
$mail->Host = 'psb.acm.org';    //The mailhost our webserver uses
$mail->SMTPAuth = true; //Enable SMTP authentication
$mail->Username = 'info@psb.acm.org';   //SMTP username
$mail->Password = 'bL,Gvb~VT#c*';       //SMTP password
$mail->SMTPSecure = 'ssl';      //Enable TLS encryption. We can also use 'ssl'
$mail->Port = 465;      //What port are we sending TCP data over? Replace this with an int

$mail->setFrom('infO@psb.acm.org', 'Behrend ACM (Forward)');

//Change this to interface with the settings later
$mail->addAddress($email);

//Probably?
$mail->isHTML(true);

$mail->Subject = "Recieved Email";
$mail->Body = $message;

$result = $mail->Send();

?>