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
	<title>Manage your product</title>
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
				<form action="toAddProduct">
					<div class="card">
						<div class="card-block">
							
							<input type="submit" class="btn btn-success btn-dark" value="Add new product">

						</div>
					</div>
				</form>
			</div>
		</div>
		<h4>Your Product:</h4>
		<div class="row">
			
			
			<?php 
			$total = count($info);
			for ($i = 0; $i < $total; $i++) { ?>
				<div class="col-sm-4">
					<div class="card">
						<img class="card-img-top img-fluid" src="<?= base_url().'uploads/'.$img[$i] ?>" alt="Card image cap">
						<div class="card-block">
							<h4 class="card-title product_name"><a href="Product/<?= $info[$i]['id'] ?>"><?= $info[$i]['name'] ?></a></h4>
							<p class="card-text price"><u><?= $info[$i]['price'] ?>VNĐ</u></p>

							
							<p class="card-text edit_product">
								<small><a href="ChangeProductInfo/<?= $info[$i]['id'] ?>" class="btn btn-warning btn-xs">Change</a></small>
								<small><a href="DeleteProduct/<?= $info[$i]['id'] ?>" class="btn btn-outline-danger btn-xs">Remove</a></small>
							</p>
								
							
						</div>
					</div>
				</div>
			<?php } ?>
			
			
		</div>
	</div>
</body>
</html>