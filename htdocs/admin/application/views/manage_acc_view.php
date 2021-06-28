<?php
if (isset($_SESSION['permission_user']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang đăng nhập
	redirect('/Login_register','refresh');
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
		<h2 class="text-xl-center"><a href="../Home">Return Home</a></h2>
	</div>
	<div class="alert alert-success" role ="alert">
		<b><?= $this->session->userdata('username'); ?>, permission: <?= $this->session->userdata('permission_user'); ?>, id: <?= $this->session->userdata('id_user'); ?></b>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 push-sm-2">
				<h4>Update your information:</h4>
				<form action="ChangeInfo" method="post" enctype="multipart/form-data">
					<div class="card">
						<div class="card-block">
							<fieldset class="form-group">
								<label for="nameText">Name:</label>
								<input name="name" type="text" class="form-control" id="nameView"
								value="<?= $attribute[0]['name']; ?>">
							</fieldset>
							<fieldset class="form-group">
								<label for="phoneText">Phone number:</label>
								<input name="phonenum" type="text" class="form-control" id="phonenumView"
								value="<?= $attribute[0]['phonenum']; ?>">
							</fieldset>
							<fieldset class="form-group">
								<label for="addrText">Your Address:</label>
								<input name="addr" type="text" class="form-control" id="addrView"
								value="<?= $attribute[0]['addr']; ?>">
							</fieldset>
							<input type="submit" class="btn btn-success btn-dark" value="Save">
						</div>
					</div>
				</form>
				<h4>Change your password:</h4>
				<form action="ChangePassword" method="post" enctype="multipart/form-data">
					<div class="card">
						<div class="card-block">
							<fieldset class="form-group">
								<label for="oldpassText">Old Password:</label>
								<input name="oldpass" type="password" class="form-control" id="oldpassView"
								placeholder="Enter your old password">
							</fieldset>
							<fieldset class="form-group">
								<label for="newpassText">New Password:</label>
								<input name="newpass" type="password" class="form-control" id="newpassView"
								placeholder="Enter the new password">
							</fieldset>
							<fieldset class="form-group">
								<label for="addrText">Re-Enter New Password:</label>
								<input name="newpass1" type="password" class="form-control" id="newpass1View"
								placeholder="Re-Enter the new password">
							</fieldset>
							<input type="submit" class="btn btn-success btn-dark" value="Save">
						</div>
					</div>
				</form>
		</div>
	</div>
</body>
</html>