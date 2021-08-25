<?php
if (isset($_SESSION['permission_user'])) {
	// Nếu người dùng đã đăng nhập thì chuyển hướng website sang home
	redirect('/home','refresh');
}
?>
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
		<h2 class="text-xl-center">Welcome to Best Gear</h2>
	</div>
	<div class="alert alert-success" role ="alert">
		<b><?= $this->session->userdata('username'); ?>, permission: <?= $this->session->userdata('permission_user'); ?>, id: <?= $this->session->userdata('id_user'); ?></b>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 push-sm-2">
				<h4>Login</h4>
				<form action="Login_register/Login" method="post" enctype="multipart/form-data">
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
							<input type="submit" class="btn btn-success btn-dark" value="Login">
						</div>
					</div>
				</form>
				<h4>Register</h4>
				<form action="Login_register/Register" method="post" enctype="multipart/form-data">
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
							<fieldset class="form-group">
								<label for="passwordText1">Password:</label>
								<input name="password1" type="password" class="form-control" id="passwordView1"
								placeholder="Re-Enter password" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="nameText">Your Name:</label>
								<input name="name" type="text" class="form-control" id="nameView"
								placeholder="Enter your name" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="addrText">Your Address:</label>
								<input name="addr" type="text" class="form-control" id="addrView"
								placeholder="Enter your Adress" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="phoneText">Your Phone number:</label>
								<input name="phonenum" type="text" class="form-control" id="phoneView"
								placeholder="Enter your phone number" required>
							</fieldset>
							<p>Select your plan:</p>
						  	<input type="radio" id="buyer" name="plan" value="1" checked="checked">
						  	<label for="buyer">Buyer</label><br>
						  	<input type="radio" id="seller" name="plan" value="2">
						  	<label for="seller">Seller</label><br>

							<input type="submit" class="btn btn-success btn-dark" value="Register">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>