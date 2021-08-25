<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Best Gear Project</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	<div class="alert alert-success" role ="alert">
		<b><?= $this->session->userdata('username'); ?>, permission: <?= $this->session->userdata('permission_user'); ?>, id: <?= $this->session->userdata('id_user'); ?></b>
	</div>
	<div class="container">
		<h2 class="text-xl-center">Trang chủ Best Gear</h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 push-sm-2">

				<form action="<?= base_url(); ?>Home/Search" enctype="multipart/form-data" method="post">
					<div class="card">
						<div class="card-block">
							<fieldset class="form-group">
								<input name="name" type="text" class="form-control" id="nameView"
								placeholder="Search ?">
								<input type="checkbox" name="ticked[]" value="shop">
								<label for="shopText">Shop</label>

								<input type="checkbox" name="ticked[]" value="product" checked="checked">
								<label for="productText">Product</label>
							</fieldset>
							<input type="submit" class="btn btn-success btn-dark" value="Search">
						</div>
					</div>
				</form>

				<?php 
				if(isset($_SESSION['permission_user']) == false){
					echo"<form action='Home/toLogin'>
							<input type='submit' class='btn btn-success btn-dark' value='Login'>
						</form>";
				}
				else{
					echo"<form action='Home/ManageAccount'>
							<input type='submit' class='btn btn-success btn-dark' value='Manage Account'>
						</form><hr>";
					if($this->session->userdata('permission_user') == '2'){
						echo"<form action='Home/ManageProduct'>
								<input type='submit' class='btn btn-success btn-dark' value='Manage Product'>
							</form><hr>";
					}
					else{
						echo"<form action='Home/cart'>
								<input type='submit' class='btn btn-success btn-dark' value='Your cart'>
							</form><hr>";
					}
					echo"<form action='Home/SignOut'>
							<input type='submit' class='btn btn-success btn-dark' value='Sign out'>
						</form>";
					}
				?>
				
			</div>
		</div>
	</div>
</body>
</html>