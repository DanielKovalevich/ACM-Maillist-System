<?php
//Create Mail page for the ACM Maillist system
//Written by Conrad Weiser - 12/07/2016

//Enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('ulogin/config/all.inc.php');
require_once('ulogin/main.inc.php');

//Start a secure connection if one is not already running
if (!sses_running())
  sses_start();

//If we're logged in, display the page contents.

function isAppLoggedIn(){
  return isset($_SESSION['uid']) && isset($_SESSION['username']) && isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn']===true);
}

if (isAppLoggedIn()){

	?>


<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <title>Create Mail</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!--Custom styles for this sheet!-->
      <link href="css/protected.css" rel="stylesheet">

      <!--Include the editor javascript-->
      <script src="assets/ckeditor/ckeditor.js"></script>

  </head>
  <body>
  <nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				ACM Mail System
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="http://psb.acm.org" target="_blank">Visit Site</a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="http://psb.acm.org/maillist/secure.php">Home</a></li>
				<li class="active"><a href="#">Create Email</a></li>
				<li><a href="#">View Sent Emails</a></li>
				<li><a href="#">Manage Members</a></li>
				<li><a href="http://psb.acm.org/maillist/settings.php">Settings</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                    <!-- Body content here --> 
                    <br><br>

                    <form accept-charset="UTF-8" role="form" action="assets/sendmail.php" method="POST" class="form-horizontal">
                    	
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="target">Mail To</label>
                        <div class="col-md-4">
                          <select id="target" name="target" class="form-control">
                            <option value="everyone">ALL MEMBERS</option>
                            <option value="Computer Engineer">Computer Engineers</option>
                            <option value="Computer Science">Computer Scientists</option>
                            <option value="Software Engineer">Software Engineers</option>
                            <option value="Undecided">Undecided</option>
                          </select>
                        </div>
                      </div>

                    	<br><br><br>

                      <textarea name="ckeditor" id="ckeditor" rows="10" cols="80">
                          <!--This is the textarea which is replaced by the script following these lines-->
                      </textarea>

                      <br><br><br>

                      <input type="submit" value="Submit">
                      <script>
                        CKEDITOR.replace( 'ckeditor' );
                      </script>
                    </form>
                </div>
            </div>
		</div>
		<footer class="pull-left footer">
			<p class="col-md-12">
				<hr class="divider">
				Bootsnip Copyright &COPY; 2015 Gravitano | Designed for Behrend ACM by Conrad Weiser</a>
			</p>
		</footer>
	</div>
</body>
</html>


<?php
}
else {
?>

<img src="http://memecrunch.com/meme/11CRJ/you-better-get-outta-here-cowboy/image.png">

<?php
}
?>