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
	<title>Change your product information</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	<div class="container">
		<h2 class="text-xl-center"><a href="<?= base_url(); ?>/Home">Return Home</a></h2>
	</div>
	<div class="alert alert-success" role ="alert">
		<b><?= $this->session->userdata('username'); ?>, permission: <?= $this->session->userdata('permission_user'); ?>, id: <?= $this->session->userdata('id_user'); ?></b>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 push-sm-2">
				<h4>Change your product information:</h4>
				<form action="<?= base_url(); ?>/home/EditProductInfo" enctype="multipart/form-data" method="post">
					<div class="card">
						<div class="card-block">
							<fieldset class="form-group">
								<input type="hidden" name="idproduct" value="<?= $info[0]['id'] ?>">
								<label for="nameText">Name:</label>
								<input name="name" type="text" class="form-control" id="nameView"
								value="<?= $info[0]['name'] ?>">
							</fieldset>
							<fieldset class="form-group">
								<label for="priceText">Price (VNĐ):</label>
								<input name="price" type="text" class="form-control" id="priceView"
								value="<?= $info[0]['price'] ?>">
							</fieldset>
							<fieldset class="form-group">
								<label for="desText">Description:</label>
								<input name="des" type="text" class="form-control" id="desView"
								value="<?= $info[0]['description'] ?>">
							</fieldset>
							<fieldset class="form-group">
								<label for="instockText">In Stock:</label>
								<input name="instock" type="text" class="form-control" id="instockView"
								value="<?= $info[0]['instock'] ?>">
							</fieldset>
							<input type="submit" class="btn btn-success btn-dark" value="Save">
						</div>
					</div>
				</form>
			</div>

			<div class="col-sm-8 push-sm-2">
				<h4>Add new pictures:</h4>
				<form action="<?= base_url(); ?>/home/AddProductImg" enctype="multipart/form-data" method="post">
					<div class="card">
						<div class="card-block">
							<input type="hidden" name="idproduct" value="<?= $info[0]['id'] ?>">
							<label for="imgText">Upload new pictures:</label>
							<input type="file" name="userfile[]" multiple="multiple">
							
							<input type="submit" class="btn btn-success btn-dark" value="Add new pictures">
						</div>
					</div>
				</form>
			</div>
		

			<form action="<?= base_url(); ?>/home/DelProductImg" enctype="multipart/form-data" method="post">
				<h4>Delete pictures:</h4>
				<div class="card">
					<div class="col-sm-6">
						<div class="row">
							<input type="hidden" name="idproduct" value="<?= $info[0]['id'] ?>">
							<?php 
							$total = count($img);
							for ($i = 0; $i < $total; $i++) { 
								if($img[$i]['id'] == $info[0]['avt']){
									continue;
								}
								?>

								<div class="col-sm-4 ">
									<div class="card">
										<img class="card-img-top img-fluid" src="<?= base_url().'uploads/'.$img[$i]['name'] ?>" alt="Card image cap">
										<div class="card-block">
											<label for="imgText">Select:</label>
											<input type="checkbox" name="ticked[]" value="<?= $img[$i]['id'] ?>">

										</div>
									</div>
								</div>
							<?php } ?>
							
						</div>
					</div>
					<div class="card-block">
						<input type="submit" class="btn btn-success btn-dark" value="Delete">
					</div>
				</div>
			</form>

			<form action="<?= base_url(); ?>/home/SetProductAvt" enctype="multipart/form-data" method="post">
				<h4>Set as main pictures:</h4>
				<div class="card">
					<div class="col-sm-6">
						<div class="row">
							<input type="hidden" name="idproduct" value="<?= $info[0]['id'] ?>">
							<?php 
							$total = count($img);
							for ($i = 0; $i < $total; $i++) { ?>
								<div class="col-sm-4 ">
									<div class="card">
										<img class="card-img-top img-fluid" src="<?= base_url().'uploads/'.$img[$i]['name'] ?>" alt="Card image cap">
										<div class="card-block">
											<label for="imgText">Select:</label>
											<input type="radio" name="avt" value="<?= $img[$i]['id'] ?>" 
											<?php if($img[$i]['id'] == $info[0]['avt']){
												echo 'checked="checked"';

											} ?> >
						  	

										</div>
									</div>
								</div>
							<?php } ?>
							<div class="card-block">
								<input type="submit" class="btn btn-success btn-dark" value="Save">
							</div>
						</div>
					</div>
					
				</div>
			</form>
		</div>
	</div>
</body>
</html>