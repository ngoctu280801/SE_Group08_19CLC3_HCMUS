<?php
if (isset($_SESSION['permission_user']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang đăng nhập
	redirect('/Login_register','refresh');
	if ($this->session->userdata('permission_user') != '1') {
		redirect('/Login_register','refresh');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>YOUR CART</title>
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
			<div class="col-sm-7" style="text-align:center;">Product</div>
			<div class="col-sm-2" style="text-align:center;">Price/ Product</div>
			<div class="col-sm-0.5"> </div>
			<div class="col-sm-1" style="text-align:center;">Quantity</div>
			<div class="col-sm-1" style="text-align:center;">Action</div>
		</div>
		
		<?php 
		if($product){

			$total = count($product);
			for ($i = 0; $i < $total; $i++) { ?>
				<div class="container">
					<div class="row">
						<div class="col-sm-2">

							<img class="card-img-top img-fluid" src="<?= base_url().'uploads/'.$img[$i] ?>" alt="Card image cap">
					
								
						</div>
						
						<div class="col-sm-5" >
							<h4 class="card-title product_name"><a href="Product/<?= $product[$i]['id_product'] ?>"><?= $product[$i]['name'] ?></a></h4>
						</div>

						<div class="col-sm-2">
							<p style="text-align:center;"><u><?= $product[$i]['price'] ?>VNĐ</u></p>
						</div>
						<div style="text-align:right;">X</div>
						<div class="col-sm-1">
							<p style="text-align:center;"><?= $product[$i]['quantity'] ?></p>
						</div>
						<div class="col-sm-1">
							<form action="<?= base_url(); ?>Home/DeleteFromCart" enctype="multipart/form-data" method="post">
								<input type='hidden' name='stt' value=<?= $product[$i]['stt'] ?>>
								<input type='hidden' name='id_buyer' value=<?= $this->session->userdata('id_user') ?>>
								<input type='hidden' name='id_product' value=<?= $product[$i]['id_product'] ?>>
								<input type='hidden' name='quantity' value=<?= $product[$i]['quantity'] ?>>
								<input type='hidden' name='price' value=<?= $product[$i]['price'] ?>>
								<input type='submit' class='btn btn-success btn-dark' value='Delete'>
							</form>
						</div>
					</div>
					<div class="row"><h3> </h3></div>
				</div>
		<?php } }
		else{
			echo '<h4>You do not have any product</h4>';
		} ?>




			
	</div>
	
</body>
</html>