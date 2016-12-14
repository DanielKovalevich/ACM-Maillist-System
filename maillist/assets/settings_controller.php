<?php 
    //Settings controller for the ACM mailList
    //Written by Daniel Kovalevich - 11/26/2016

    // Holds information about databases
    include_once('PDO.inc.php');

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      // Allow us to display current settings in the view
      //$_SESSION["admin"] = $settings["email"];
      //$_SESSION["SMTPuser"] = $settings["SMTP_username"];
      //$_SESSION["SMTPserver"] = $settings["SMTP_server"];
      //$_SESSION["IMAP"] = $settings["IMAP_port"];
      //$_SESSION["POP3"] = $settings["POP3_port"];
      //$_SESSION["SMTP"] = $settings["SMTP_port"];
      //$_SESSION["username"] = $login_info["username"];

      header("Location: http://psb.acm.org/maillist/settings.php");
      exit();
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);
      $login_db = new PDO(UL_PDO_CON_STRING, UL_PDO_USERNAME, UL_PDO_PASSWORD);

      $settings = $db->prepare("SELECT * FROM settings");
      $login_info = $login_db->prepare("SELECT username, password FROM ul_logins");

      $settings->execute();
      $settings = $settings->fetchAll(PDO::FETCH_COLUMN, 0);
      $login_info->execute();
      $login_info = $login_info->fetchAll(PDO::FETCH_COLUMN, 0);

?>