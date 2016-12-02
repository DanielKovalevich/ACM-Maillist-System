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
    <form action="settings_controller.php" method="post">
    <fieldset>
        <div class="form-group">
          <h3>Current Admin Username</h3>
          <h4><?= $_SESSION["admin"] ?></h4>
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
  </body>
</html>