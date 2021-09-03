<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- login-register31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Manage Your Products || Group 8</title>
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
                        <li class="active">Shop's products list</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Login Content Area -->
        <div class="shop-information">
            <h2>Shop information</h2>
            <div class="shop-information-container">
                <img src="<?php echo base_url(); ?>images/store.jpg">
                <p><?= $this->session->userdata('username'); ?></p>
                <p>Followers: 300</p>
                <ul class="shop-information-rating">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star-half"></i></li>
                </ul>
            </div>
        </div>
        <div class="shops-products-list">
            <h2>Product</h2>
            <button class="shop-information-add-button"><a href="toAddProduct">Add new product</button></a>
            <div class="shops-products-list-container">
                <ul class="shops-products-list-all">
                    <?php 

                    if($info){
                        $total = count($info);
                        for ($i = 0; $i < $total; $i++) { ?>
                        <li class="shops-products-list-single">
                            <ul>
                                <li><img src="<?= base_url().'uploads/'.$img[$i] ?>" alt="Product Icon" width='150' height='150'></li>
                                <li><a href="Product/<?= $info[$i]['id'] ?>"><?= $info[$i]['name'] ?></a></li>
                                <li><?= $info[$i]['price'] ?>VNĐ</li>
                                <li input type="button" onclick="location.href='ChangeProductInfo/<?= $info[$i]['id'] ?>'"><i class="fa fa-edit"></i></li>
                                <li input type="button" onclick="return deleteProduct(<?= $info[$i]['id'] ?>)"><i class="fa fa-trash" ></i></li>
                                    <script type="text/javascript">
                                        function deleteProduct(id_product)
                                        {
                                            if(confirm("Are you sure want to delete this product ?"))
                                            {
                                                return location.href='DeleteProduct/'+id_product;
                                            }
                                        }
                                    </script>
                            </ul> 
                        </li>
                    <?php } }?>
                </ul>
            </div>
        </div>
        <!-- Login Content Area End Here -->
        <!-- Begin Footer Area -->
        <?php include 'footer.php';?>
        <!-- Footer Area End Here -->
    </div>
    <!-- Body Wrapper End Here -->
    <?php include 'load_js.php';?>
</body>

<!-- login-register31:27-->
</html>