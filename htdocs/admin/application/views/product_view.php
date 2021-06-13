<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $info[0]['name'] ?></title>
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
		<h2 class="text-xl-center"><?= $info[0]['name'] ?></h2>
		<h2 class="text-xl-right">Price: <?= $info[0]['price'] ?>VNĐ</h2>
		<form action="<?= base_url(); ?>/home/" enctype="multipart/form-data" method="post">
				<h4>Pictures about product:</h4>
				<div class="card">
						<div class="row">
							<?php 
							$total = count($img);
							for ($i = 0; $i < $total; $i++) { ?>
								<div class="col-sm-4 ">
									<div class="card">
										<img class="card-img-top img-fluid" src="<?= base_url().'uploads/'.$img[$i]['name'] ?>" alt="Card image cap">
									</div>
								</div>
							<?php } ?>
						</div>
					
				</div>

				<div class="col-sm-4 push-sm-4">
					<form>
						<div class="card">
							<div class="card-block">
								
								<p>In stock: <?= $info[0]['instock'] ?></p>

							</div>
						</div>
					</form>
				</div>

				<div class="col-sm-8 push-sm-2">
					<h4>Information about product:</h4>
					<form>
						<div class="card">
							<div class="card-block">
								
								<p><?= $info[0]['description'] ?></p>

							</div>
						</div>
					</form>
				</div>
		</form>
	</div>
</body>
</html>