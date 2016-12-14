<?php

include_once('PDO.inc.php');

class processMySQL
{

	//TODO: Make SQL connections persist instead of creating a new one every function call.

	function saveEmailToHistory($target, $subject, $content)
	{
		$db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);

		$stmt = $db->prepare("INSERT INTO sent_emails (send_date, target, subject, content) VALUES (now(), :target, :subject, :content)");

		$stmt->bindParam(':target', $target);
		$stmt->bindParam(':subject', $subject);
		$stmt->bindParam(':content', $content);

		$stmt->execute();
	}

	function processNewUser($name,$email,$major,$gratuateDate)
	{
		$db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);

		$stmt = $db->prepare("INSERT INTO users (name, email, major, gratuation) VALUES (:name, :email, :major, :gratuation)");

		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':major', $major);
		$stmt->bindParam(':gratuation', $gratuateDate);

		$stmt->execute();
	}


	function getEmailAddressesByMajor($major)
	{

		$db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);

		//If we get a string of 'everyone' as the parameter, do a different query
		if($major == 'everyone') {
			$sth = $db->prepare("SELECT email from users");
		}

		else {
			$sth = $db->prepare("SELECT email FROM users WHERE major = :major");
			$sth->bindValue(':major', $major, PDO::PARAM_STR);
		}

		$sth->execute();

		$result = $sth->fetchAll(PDO::FETCH_COLUMN, 0);

		return $result;
	}

	function countUsersByMajor($major)
	{

		if(!empty($major))
		{

			$db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);
	
			$sth = $db->prepare("SELECT name FROM users WHERE major = :major");
			$sth->bindValue(':major', $major, PDO::PARAM_STR);
	
			$sth->execute();
	
	
			$result = $sth->rowCount();

			return $result;
		}
		else
		{
			return "Error: Not provided with a major";
		}
	}

	function getCurrentSettings($database)
	{
		if ($database == "settings")
		{
			$db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);
			$settings = $db->prepare("SELECT * FROM settings");
			$settings->execute();
			$settings = $settings->fetchAll();
			$settings = $settings["0"];

			return $settings;
		}
		else if ($database == "ulog")
		{
			$login_db = new PDO(ULOGIN_PDO_CON_STRING, UL_PDO_USERNAME, UL_PDO_PASSWORD);
			$login_info = $login_db->prepare("SELECT username, password FROM ul_logins");
			$login_info->execute();
			$login_info = $login_info->fetchAll();
			$login_info = $login_info["0"];

			return $login_info;
		}
		else
		{
			print("You shouldn't be here. You're a moron!");
		}
	}
}

?>