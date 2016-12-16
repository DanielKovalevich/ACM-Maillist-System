<?php 
    //Settings controller for the ACM mailList
    //Written by Daniel Kovalevich - 11/26/2016

    // Holds information about databases
    include_once('PDO.inc.php');

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      header("Location: http://psb.acm.org/maillist/settings.php");
      exit();
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $db = new PDO(ML_PDO_CON_STRING, ML_PDO_USERNAME, ML_PDO_PASSWORD);
      $login_db = new PDO('mysql:host=127.0.0.1;dbname=psbhosti_ulogin', 'psbhosti_ulogin', 'cR1_}LPyFo.9');

      // Verify that at least one field is filled
    if (empty($_POST['email']) && empty($_POST['SMTPuser']) && empty($_POST['SMTPserver']) && empty($_POST['IMAP']) && empty($_POST['POP3']) && empty($_POST['SMTP']) && empty($_POST['pswd']) && empty($_POST['mailUser']))
      {
        echo "<h1>You didn't fill any of the forms!</h1>";
      }
      else 
      {
        if (!empty($_POST['email'])){
          $settings = $db->prepare("UPDATE settings SET email=?");
          $settings->bindParam(1, $_POST['email']);
          $settings->execute();
        }
        //$login_info = $login_db->prepare("SELECT username, password FROM ul_logins");

        
        //$login_info->execute();


        header("Location: http://psb.acm.org/maillist/settings.php");
        exit();
      }
    }
?>