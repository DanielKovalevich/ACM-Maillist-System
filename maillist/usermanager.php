<?php

//Table view for registered users - ACM mailList
//Written by Conrad Weiser and Daniel Kovalevich - 11/30/2016
//Worked on by Daniel Kovalevich - 1/17/2017

?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <title>User Manager</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
	  <script src="js/table.js"></script>


      <!--Custom styles for this sheet!-->
      <link href="css/protected.css" rel="stylesheet">
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
				<li><a href="http://psb.acm.org/maillist/createmail.php">Create Email</a></li>
				<li><a href="#">View Sent Emails</a></li>
				<li class="active"><a href="http://psb.acm.org/maillist/assets/usermanager_controller.php">Manage Members</a></li>
				<li><a href="http://psb.acm.org/maillist/assets/settings_controller.php">Settings</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Manager
                </div>
                <div class="panel-body">
                    <!-- Page contents for the tables here -->
					<div class="row">
        				<div class="table-responsive">
							<table id="mytable" class="table table-bordred table-striped">
								<thead>
								<th><input type="checkbox" id="checkall" /></th>
								<th>First Name</th>
									<th>Last Name</th>
									<th>Address</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Edit</th>
									
									<th>Delete</th>
								</thead>
								<tbody>
								<tr>
									<td><input type="checkbox" class="checkthis" /></td>
									<td>Mohsin</td>
									<td>Irshad</td>
									<td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
									<td>isometric.mohsin@gmail.com</td>
									<td>+923335586757</td>
									<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
									<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="checkthis" /></td>
									<td>Mohsin</td>
									<td>Irshad</td>
									<td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
									<td>isometric.mohsin@gmail.com</td>
									<td>+923335586757</td>
									<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
									<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="checkthis" /></td>
									<td>Mohsin</td>
									<td>Irshad</td>
									<td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
									<td>isometric.mohsin@gmail.com</td>
									<td>+923335586757</td>
									<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
									<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="checkthis" /></td>
									<td>Mohsin</td>
									<td>Irshad</td>
									<td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
									<td>isometric.mohsin@gmail.com</td>
									<td>+923335586757</td>
									<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
									<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="checkthis" /></td>
									<td>Mohsin</td>
									<td>Irshad</td>
									<td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
									<td>isometric.mohsin@gmail.com</td>
									<td>+923335586757</td>
									<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
									<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
								</tr>
    							</tbody>
							</table>
							<div class="clearfix"></div>
							<ul class="pagination pull-right">
							<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
							</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      				<div class="modal-dialog">
    					<div class="modal-content">
          					<div class="modal-header">
        						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        						<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      						</div>
          					<div class="modal-body">
          						<div class="form-group">
        							<input class="form-control " type="text" placeholder="Mohsin">
        						</div>
        						<div class="form-group">
        
        							<input class="form-control " type="text" placeholder="Irshad">
        						</div>
        						<div class="form-group">
        							<textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
        						</div>
      						</div>
          					<div class="modal-footer ">
        						<button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      						</div>
        				</div>
  					</div>
    			</div>
    			<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      				<div class="modal-dialog">
    					<div class="modal-content">
          					<div class="modal-header">
        						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        						<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      						</div>
          					<div class="modal-body">
      							<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
							</div>
							<div class="modal-footer ">
								<button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
								<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
							</div>
						</div>
					</div>
				</div>
                    <!-- I'm thinking about using this! http://bootsnipp.com/snippets/featured/bootstrap-snipp-for-datatable !-->
               	</div>
            </div>
		</div>
		<footer class="pull-left footer">
			<p class="col-md-12">
				<hr class="divider">
				Bootsnip Copyright &COPY; 2015 Gravitano | Designed for Behrend ACM by Conrad Weiser and Daniel Kovalevich</a>
			</p>
		</footer>
	</div>
	</body>
</html>