<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- shop-4-column31:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shop View</title>
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
                            <li class="active">Shop Information</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <!-- Li's Banner Area End Here -->
                            <!-- shop-top-bar start -->
                            <h4 class="info-title">Shop's information</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Shop name: <?= $info[0]['name'] ?></label>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Phone number: <?= $info[0]['phonenum'] ?></label>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Address: <?= $info[0]['addr'] ?></label>
                                    </div>
                                    
                                    
                                </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <h4 class="info-title">Shop's product</h4>
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                <?php 
                                                if($info_product){
                                                    $total = count($info_product);
                                                    for ($i = 0; $i < $total; $i++) { ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                        <!-- single-product-wrap start -->
                                                        <div class="single-product-wrap">
                                                            <div class="product-image">
                                                                <a href="../Product/<?= $info_product[$i]['id'] ?>">
                                                                    <img src="<?= base_url().'uploads/'.$img[$i] ?>" alt="Li's Product Image" width='150' height='150'>
                                                                </a>
                                                                <span class="sticker">New</span>
                                                            </div>
                                                            <div class="product_desc">
                                                                <div class="product_desc_info">
                                                                    <div class="product-review">
                                                                        <h5 class="manufacturer">
                                                                            <a href="../Product/<?= $info_product[$i]['id'] ?>">Graphic Corner</a>
                                                                        </h5>
                                                                        <div class="rating-box">
                                                                            <ul class="rating">
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h4><a class="product_name" href="../Product/<?= $info_product[$i]['id'] ?>"><?= $info_product[$i]['name'] ?></a></h4>
                                                                    <div class="price-box">
                                                                        <span class="new-price"><?= $info_product[$i]['price'] ?>VNĐ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- single-product-wrap end -->
                                                    </div>
                                                    <?php } } ?>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
            <!-- Begin Footer Area -->
            <?php include 'footer.php';?>
            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            
            <!-- Quick View | Modal Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <?php include 'load_js.php';?>
    </body>

<!-- shop-4-column31:48-->
</html>