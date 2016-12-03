<!-- Setting view for the ACM maillist. Created by Daniel Kovalevich -->
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <title>Settings</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!--Custom styles for this sheet!-->
      <!--<link href="css/settings.css" rel="stylesheet">-->
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
                    Settings
                </div>
                <div class="panel-body">
                    <form action="/assets/settings_controller.php" method="post">
                      <fieldset>
                        <div class="form-group">
                          <h3>Current Admin Username</h3>
                          <h4><?= echo $_SESSION["admin"] ?></h4>
                        </div>
                        <div class="form-group">
                          <input autocomplete="off" autofocus class="form-control" name="pswd" placeholder="Password" type="password"/>
                        </div>
                        <div class="form-group">
                          <input autocomplete="off" name="confirm" placeholder="Comfirm" type="password"/>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-default" type="submit">
                          <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                          Change Settings
                          </button>
                        </div>
                      </fieldset>
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