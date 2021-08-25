<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search: <?= $name ?></title>
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
		<h4>Product:</h4>
		<div class="row">
			
			
			<?php 
			if($product){
				$total = count($product);
				for ($i = 0; $i < $total; $i++) { ?>
					<div class="col-sm-4">
						<div class="card">
							<img class="card-img-top img-fluid" src="<?= base_url().'uploads/'.$img[$i] ?>" alt="Card image cap">
							<div class="card-block">
								<h4 class="card-title product_name"><a href="Product/<?= $product[$i]['id'] ?>"><?= $product[$i]['name'] ?></a></h4>
								<p class="card-text price"><u><?= $product[$i]['price'] ?>VNĐ</u></p>

								<p class="card-text instock">In Stock: <?= $product[$i]['instock'] ?></p>
								
									
								
							</div>
						</div>
					</div>
			<?php } }
			else{
				echo '<p>Not Found any product</p>';
			} ?>
		</div>
		<hr>

		<h4>Shop:</h4>
		<div class="row">
			
			
			<?php 
			if($shop){
			$total = count($shop);
			for ($i = 0; $i < $total; $i++) { ?>
				<div class="col-sm-4">
					<div class="card">
						
						<div class="card-block">
							<h4 class="card-title shop_name"><a href="Shop/<?= $shop[$i]['id'] ?>"><?= $shop[$i]['name'] ?></a></h4>
							<p class="card-text phonenum"><u>Phone number: <?= $shop[$i]['phonenum'] ?></u></p>

							<p class="card-text addr">Address: <?= $shop[$i]['addr'] ?></p>
							
								
							
						</div>
					</div>
				</div>
			<?php } }
			else{
				echo '<p>Not Found any Shop</p>';
			} ?>
		</div>
	</div>
</body>
</html>