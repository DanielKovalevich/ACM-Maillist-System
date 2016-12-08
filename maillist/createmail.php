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

      <!--Include Font Awesome -->
 	  <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />


      <!--Include the WYSIWYG editor-->
      <!--https://www.froala.com/wysiwyg-editor-->
      <link rel="stylesheet" href="assets/froala/css/plugins/char_counter.css">
 	  <link rel="stylesheet" href="assets/froala/css/plugins/code_view.css">
 	  <link rel="stylesheet" href="assets/froala/css/plugins/colors.css">
  	  <link rel="stylesheet" href="assets/froala/css/plugins/emoticons.css">
  	  <link rel="stylesheet" href="assets/froala/css/plugins/file.css">
  	  <link rel="stylesheet" href="assets/froala/css/plugins/fullscreen.css">
  	  <link rel="stylesheet" href="assets/froala/css/plugins/image.css">
  	  <link rel="stylesheet" href="assets/froala/css/plugins/image_manager.css">
  	  <link rel="stylesheet" href="assets/froala/css/plugins/line_breaker.css">
  	  <link rel="stylesheet" href="assets/froala/css/plugins/quick_insert.css">
  	  <link rel="stylesheet" href="assets/froala/css/plugins/table.css">


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
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Create Email</a></li>
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
                    <form>
                    	Mail To:<br>
                    	<input type="radio" name="target" value="Everyone"> ALL<br>
                    	<input type="radio" name="target" value="Software Engineer"> Software Engineers<br>
                    	<input type="radio" name="target" value="Computer Science"> Computer Scientists<br>
                    	<input type="radio" name="target" value="Computer Engineer"> Computer Engineers<br>
                    	<br>

                    	<!--The textbox editor-->
                    	<textarea id="edit" name="content"></textarea>


                    	
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

	<!-- Include all of the Javascript at the end of the file so it doesn't slow everything down-->

	<!-- Include jQuery. -->
  	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  	<!-- Include Code Mirror. -->
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  	<!-- Include Plugins. -->
	<script type="text/javascript" src="assets/froala/js/plugins/align.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/char_counter.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/code_beautifier.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/code_view.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/colors.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/emoticons.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/entities.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/file.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/font_family.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/font_size.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/fullscreen.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/image.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/image_manager.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/inline_style.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/line_breaker.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/link.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/lists.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/paragraph_format.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/paragraph_style.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/quick_insert.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/quote.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/table.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/save.min.js"></script>
  	<script type="text/javascript" src="assets/froala/js/plugins/url.min.js"></script>

  	<!--Include the language file we want to use -->
  	<script type="text/javascript" src="assets/froala/js/languages/en_ca.js"></script>

  	<!--Initialize the editor. -->
  	<script>
  		$(function() {
  			$('#edit').froalaEditor()
  		});
  	</script>
  		})



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