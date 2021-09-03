<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- shopping-cart31:32-->
<head>
    <script type="text/javascript">
	function UpdateCost() {
		var productInfo = <?php echo json_encode($product); ?>;
		var sum = 0;
		var total = <?php Print(count($product)); ?>;
		var elem;
		for (i=0; i<total; i++) {
			elem = document.getElementById(i);
			var price_i = productInfo[elem.value]['quantity']*productInfo[elem.value]['price'];
			if (elem.checked == true) { 
				sum += Number(price_i); 
			}
		}
		document.getElementById('totalcost' ).value = sum;
	}
	</script>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shopping Cart || Group 8</title>
        <?php include 'head_tag.php';?>
</head>
<body>
<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <?php include 'header.php';?>
        <!-- Header Area End Here -->
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>Home">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Shopping Cart Area Strat-->
        <div class="Shopping-cart-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">remove</th>
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-quantity">Quantity</th>
                                        <th class="li-product-checkbox">Choose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if($product){
                                        $total = count($product);
                                        for ($i = 0; $i < $total; $i++) { ?>
                                        <tr>
                                            <td class="li-product-remove">
                                                <form action="<?= base_url(); ?>Home/DeleteFromCart" enctype="multipart/form-data" method="post">
                                                    <input type='hidden' name='stt' value=<?= $product[$i]['stt'] ?>>
                                                    <input type='hidden' name='id_buyer' value=<?= $this->session->userdata('id_user') ?>>
                                                    <input type='hidden' name='id_product' value=<?= $product[$i]['id_product'] ?>>
                                                    <input type='hidden' name='quantity' value=<?= $product[$i]['quantity'] ?>>
                                                    <input type='hidden' name='price' value=<?= $product[$i]['price'] ?>>
                                                    <input type='submit' class='btn btn-success btn-dark' value='Delete'>
                                                </form>
                                            </td>
                                            <td class="li-product-thumbnail"><a href="Product/<?= $product[$i]['id_product'] ?>"><img src="<?= base_url().'uploads/'.$img[$i] ?>" alt="Li's Product Image" style="width:240px"></a></td>
                                            <td class="li-product-name"><a href="Product/<?= $product[$i]['id_product'] ?>"><?= $product[$i]['name'] ?></a></td>
                                            <td class="li-product-price"><span class="amount"><?= $product[$i]['price'] ?>VNĐ</span></td>
                                            <td class="li-product-price"><?= $product[$i]['quantity'] ?></td>
                                            <td class="li-product-checkbox"><input type="checkbox" id="<?= $i ?>" name="<?= $i ?>" value="<?= $i ?>" onclick="UpdateCost()"></td>
                                        </tr>
                                        <?php } }
                                        else{
                                            echo '<h4>You do not have any product</h4>';
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Total (VNĐ)</h2>
                                    <ul>
                                        <input type="text" name="totalcost" id="totalcost" value="0" disabled>
                                    </ul>
                                    <a href="#">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Shopping Cart Area End-->
        <!-- Begin Footer Area -->
        <?php include 'footer.php';?>
        <!-- Footer Area End Here -->
    </div>
    <!-- Body Wrapper End Here -->
    <?php include 'load_js.php';?>
</body>

<!-- shopping-cart31:32-->
</html>