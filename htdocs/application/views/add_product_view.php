<?php
if (isset($_SESSION['permission_user']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang đăng nhập
	redirect('/Login_register','refresh');
	if ($this->session->userdata('permission_user') != '2') {
		redirect('/Login_register','refresh');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add new product</title>
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
				<h4>Add new product:</h4>
				<form action="<?= base_url(); ?>/home/AddProduct" enctype="multipart/form-data" method="post">
					<div class="card">
						<div class="card-block">
							<label for="imgText">Upload pictures:</label>
							<input type="file" name="userfile[]" multiple="multiple" required>
							<fieldset class="form-group">
								<label for="nameText">Name:</label>
								<input name="name" type="text" class="form-control" id="nameView"
								placeholder="Enter product name" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="priceText">Price (VNĐ):</label>
								<input name="price" type="text" class="form-control" id="priceView"
								placeholder="Enter product price" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="desText">Description:</label>
								<input name="des" type="text" class="form-control" id="desView"
								placeholder="Enter product description" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="instockText">In Stock:</label>
								<input name="instock" type="text" class="form-control" id="stockView"
								placeholder="Enter number of product in stock" required>
							</fieldset>
							<input type="submit" class="btn btn-success btn-dark" value="Add new product">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>