<?php
//Settings controller for the ACM mailList
//Written by Daniel Kovalevich - 11/26/2016

// Holds information about database
include_once('PDO.inc.php');

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);
	$settings = $db->prepare("SELECT * FROM settings");
    
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
    }

?>