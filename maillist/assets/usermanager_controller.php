<?php 
    //User manager controller for the ACM mailList
    //Written by Daniel Kovalevich - 1/17/2017

    require_once('../ulogin/config/all.inc.php');
    require_once('../ulogin/main.inc.php');
    // Holds information about databases
    include_once('PDO.inc.php');

    function isAppLoggedIn(){
      return isset($_SESSION['uid']) && isset($_SESSION['username']) && isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn']===true);
    }

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isAppLoggedIn()){
        header("Location: http://psb.acm.org/maillist/usermanager.php");
        exit();
      }
      else {
        echo "<img src='http://memecrunch.com/meme/11CRJ/you-better-get-outta-here-cowboy/image.png'>";
      }
    }

?>