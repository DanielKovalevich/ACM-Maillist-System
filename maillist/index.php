<?php
//Index page for the ACM mailList
//Written by Conrad Weiser - 11/10/2016

//Enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('ulogin/config/all.inc.php');
require_once('ulogin/main.inc.php');


//Start a secure connection if one is not already running
if (!sses_running())
  sses_start();

//Define the functions that we need to use in order to securely authenticate
function isAppLoggedIn(){
  return isset($_SESSION['uid']) && isset($_SESSION['username']) && isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn']===true);
}

function appLogin($uid, $username, $ulogin){
  $_SESSION['uid'] = $uid;
  $_SESSION['username'] = $username;
  $_SESSION['loggedIn'] = true;

  if (isset($_SESSION['appRememberMeRequested']) && ($_SESSION['appRememberMeRequested'] === true))
  {
    // Enable remember-me
    if ( !$ulogin->SetAutologin($username, true))
      echo "cannot enable autologin<br>";

    unset($_SESSION['appRememberMeRequested']);
  }
  else
  {
    // Disable remember-me
    if ( !$ulogin->SetAutologin($username, false))
      echo 'cannot disable autologin<br>';
  }
}

function appLoginFail($uid, $username, $ulogin){
  // Note, in case of a failed login, $uid, $username or both
  // might not be set (might be NULL).
  echo 'login failed<br>';
}

//Store errors and messages in this variable to be displayed on the web page
$msg = '';

//What action are we using? Cheesing this and locking it to login. Chances are we will not need this page to be anything else anyways.
$action = @$_POST['action'];

//Create the ulogin instance
$ulogin = new uLogin('appLogin', 'appLoginFail');

if (isAppLoggedIn()){
  header("Location: http://psb.acm.org/maillist/secure.php");
  die();
  }
}
 else 
 {
  if ($action == 'login') {
      if (isset($_POST['autologin']))
        $_SESSION['appRememberMeRequested'] = true;
      else
        unset($_SESSION['appRememberMeRequested']);

      // This is the line where we actually try to authenticate against our
      // user database.
      $ulogin->Authenticate($_POST['user'],  $_POST['pwd']);
      if ($ulogin->IsAuthSuccess()){
        // Since we have specified callback functions to uLogin,
        // we don't have to do anything here.
      }
    else
      $msg = 'invalid nonce';
  }
}

header('Content-Type: text/html; charset=UTF-8');  
//Show the debug console if enabled. Heavens knows I need this.
ulLog::ShowDebugConsole();

<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <title>Login</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!--Custom styles for this sheet!-->
      <link href="css/login.css" rel="stylesheet">
  </head>
  <body>
<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
        </div>
          <div class="panel-body">
            <form accept-charset="UTF-8" role="form" action="index.php" method="POST">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Username" name="user" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="pwd" type="password" value="">
              </div>
              <input class="btn btn-lg btn-success btn-block" type="submit" value="login">
              <input type="hidden" id ="nonce" value="<?php echo ulNonce::Create('login');?>">
              <input type="hidden" id = "action" value="login" name="action">
            </fieldset>
              </form>
              <?php echo $msg; ?>
          </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
}
?>
