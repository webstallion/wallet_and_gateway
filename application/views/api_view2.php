
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
		    /* Remove the navbar's default margin-bottom and rounded borders */ 
		    .navbar {
		      margin-bottom: 0;
		      border-radius: 0;
		    }
		    
		    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
		    .row.content {height: 450px}
		    
		    /* Set gray background color and 100% height */
		    .sidenav {
		      padding-top: 20px;
		      background-color: #f1f1f1;
		      height: 100%;
		    }
		    
		    /* Set black background color, white text and some padding */
		    footer {
		      background-color: #555;
		      color: white;
		      padding: 15px;
		    }
		    
		    /* On small screens, set height to 'auto' for sidenav and grid */
		    @media screen and (max-width: 767px) {
		      .sidenav {
		        height: auto;
		        padding: 15px;
		      }
		      .row.content {height:auto;} 
		    }
	  	</style>
    
	</head>
	<body>
	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-8 text-left">
				<br />
			<h3 align="center">Create CRUD REST API in Codeigniter</a></h3>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<h3 class="panel-title">CRUD REST API in Codeigniter</h3>
						</div>
						<div class="col-md-6" align="right">
							<button type="button" id="add_button" class="btn btn-info btn-xs">Add</button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<span id="success_message"></span>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($output as $data) { ?>
							<tr>
								<th><?= $data->firstname; ?></th>
								<th><?= $data->lastname; ?></th>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
			<div class="col-sm-2">
			</div>
		</div>
	</div>
</body>
</html>