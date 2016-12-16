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
        if (!empty($_POST['SMTPuser'])){
          $settings = $db->prepare("UPDATE settings SET SMTP_username=?");
          $settings->bindParam(1, $_POST['SMTPuser']);
          $settings->execute();
        }
        if (!empty($_POST['SMTPserver'])){
          $settings = $db->prepare("UPDATE settings SET SMTP_server=?");
          $settings->bindParam(1, $_POST['SMTPserver']);
          $settings->execute();
        }
        if (!empty($_POST['IMAP'])){
          $settings = $db->prepare("UPDATE settings SET IMAP_port=?");
          $settings->bindParam(1, $_POST['IMAP']);
          $settings->execute();
        }
        if (!empty($_POST['POP3'])){
          $settings = $db->prepare("UPDATE settings SET POP3_port=?");
          $settings->bindParam(1, $_POST['POP3']);
          $settings->execute();
        }
        if (!empty($_POST['SMTP'])){
          $settings = $db->prepare("UPDATE settings SET SMTP_port=?");
          $settings->bindParam(1, $_POST['SMTP']);
          $settings->execute();
        }
        if (!empty($_POST['SMTPpswd'])){
          if ($_POST['SMTPpswd'] === $_POST['SMTPconfirmPswd'])
          {
            $settings = $db->prepare("UPDATE settings SET SMTP_password=?");
            $settings->bindParam(1, $_POST['SMTPpswd']);
            $settings->execute();
          }
          else
          {
            echo "You entered two different passwords!";
          }
        }
        if (!empty($_POST['mailUser'])){
          $login_info = $login_db->prepare("UPDATE ul_logins SET username=?");
          $login_info->bindParam(1, $_POST['mailUser']);
          $login_info->execute();
        }
        if (!empty($_POST['Mailpswd'])){
          if ($_POST['Mailpswd'] === $_POST['MailconfirmPswd'])
          {
            $login_info = $login_db->prepare("UPDATE ul_logins SET password=?");
            $login_info->bindParam(1, $_POST['Mailpswd']);
            $login_info->execute();
          }
          else
          {
            echo "You entered two different passwords!";
          }
        }

        header("Location: http://psb.acm.org/maillist/settings.php");
        exit();
      }
    }
?>