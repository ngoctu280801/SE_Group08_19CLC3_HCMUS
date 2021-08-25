<?php 
if (isset($_SESSION['admin'])){
	redirect('','refresh');
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	<div class="container">
		<h2 class="text-xl-center">Login to manage the website</h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 push-sm-2">
				<form action="LoginAdm/LoginAdmin" method="post" enctype="multipart/form-data">
					<div class="card">
						<div class="card-block">
							<fieldset class="form-group">
								<label for="usernameText">Username:</label>
								<input name="username" type="text" class="form-control" id="usernameView"
								placeholder="Enter username" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="passwordText">Password:</label>
								<input name="password" type="password" class="form-control" id="passwordView"
								placeholder="Enter password" required>
							</fieldset>
							<input type="submit" class="btn btn-success btn-dark" value="Login to dashboard">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>