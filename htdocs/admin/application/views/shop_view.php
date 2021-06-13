<!DOCTYPE html>
<html>
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
		<h2 class="text-xl-center"><a href="../Home">Return Home</a></h2>
	</div>
	<div class="alert alert-success" role ="alert">
		<b><?= $this->session->userdata('username'); ?>, permission: <?= $this->session->userdata('permission_user'); ?>, id: <?= $this->session->userdata('id_user'); ?></b>
	</div>
	<div class="container">
		<div class="col-sm-4">
			<div class="card">
				
				<div class="card-block">
					<h4 class="card-title info_name"><b><?= $info[0]['name'] ?></b></h4>
					<p class="card-text phonenum"><u>Phone number: <?= $info[0]['phonenum'] ?></u></p>

					<p class="card-text addr">Address: <?= $info[0]['addr'] ?></p>
					
						
					
				</div>
			</div>
		</div>

		<h4><?= $info[0]['name'] ?>'s Product:</h4>
		<div class="row">
			<?php 
			if($info_product){
				$total = count($info_product);
				for ($i = 0; $i < $total; $i++) { ?>
					<div class="col-sm-4">
						<div class="card">
							<img class="card-img-top img-fluid" src="<?= base_url().'uploads/'.$img[$i] ?>" alt="Card image cap">
							<div class="card-block">
								<h4 class="card-title product_name"><a href="../Product/<?= $info_product[$i]['id'] ?>"><?= $info_product[$i]['name'] ?></a></h4>
								<p class="card-text price"><u><?= $info_product[$i]['price'] ?>VNĐ</u></p>
							</div>
						</div>
					</div>
			<?php } } ?>
			
			
		</div>
	</div>
</body>
</html>