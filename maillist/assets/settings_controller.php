<?php
//Settings controller for the ACM mailList
//Written by Daniel Kovalevich - 11/26/2016

// Holds information about databases
include_once('PDO.inc.php');

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);
    $login_db = new PDO(UL_PDO_CON_STRING, UL_PDO_USERNAME, UL_PDO_PASSWORD);

	$settings = $db->prepare("SELECT * FROM settings");
	$login_info = $login_db->prepare("SELECT username, password FROM ul_logins");
	$settings = $settings->fetchAll();
	$login_info = $login_info->fetchAll();


    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    }

?>