<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index-231:32-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BestGear - Group 8</title>
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
        <!-- Begin Slider With Category Menu Area -->
        <div class="slider-with-banner">
            <div class="container">
                <div class="row">
                    <!-- Begin Category Menu Area -->
                    <div class="col-lg-3">
                        <!--Category Menu Start-->
                        <div class="category-menu">
                            <div class="category-heading">
                                <h2 class="categories-toggle"><span>categories</span></h2>
                            </div>
                            <div id="cate-toggle" class="category-menu-list">
                                <ul>
                                    <li><a href="#">Laptops Gaming</a></li>
                                    <li ><a href="#">PC Gaming</a></li>
                                    <li><a href="#">Keyboard</a></li>
                                    <li><a href="#">Headphone</a></li>
                                    <li><a href="#">Gamepad</a></li>
                                    <li><a href="#">Gaming Chair</a></li>
                                    <li><a href="#">Hardware</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                        <!--Category Menu End-->
                    </div>
                    <!-- Category Menu Area End Here -->
                    <!-- Begin Slider Area -->
                    <div class="col-lg-9">
                        <div class="slider-area pt-sm-30 pt-xs-30">
                            <div class="slider-active owl-carousel">
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide align-center-left animation-style-02 bg-4">
                                    <div class="slider-progress"></div>
                                    <div class="slider-content">
                                        <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                        <h3>Starting at <span>18500000</span>VNĐ</h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="#">Shopping Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Slide Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                </div>
            </div>
        </div>
        <!-- Slider With Category Menu Area End Here -->

        <!-- Begin Li's Trending Product | Home V2 Area -->
        <section class="product-area li-trending-product li-trending-product-2 pt-60 pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Tab Menu Area -->
                    <div class="col-lg-12">
                        <div class="li-product-tab li-trending-product-tab">
                            <h2>
                                <span>Trendding Products</span>
                            </h2>
                            <ul class="nav li-product-menu li-trending-product-menu">
                               <li><a class="active" data-toggle="tab" href="#"><span><?= $info[0]['name'] ?></span></a></li>
                               <!-- <li><a data-toggle="tab" href="#home2"><span>Camera Accessories</span></a></li> -->
                            </ul>               
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                        <div class="tab-content li-tab-content li-trending-product-content">
                            <div id="home1" class="tab-pane show fade in active">
                                <div class="row">
                                    <div class="product-active owl-carousel">
                                    <?php
                                    $total = count($info_product);

                                    for ($i = 0; $i < $total; $i++)
                                    { ?>
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="<?= base_url()?>Home/Product/<?= $info_product[$i]['id'] ?>">
                                                        <img src="<?= base_url().'uploads/'.$img[$i] ?>" width='150' height='150' alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="<?= base_url()?>Home/Product/<?= $info_product[$i]['id'] ?>">Rating</a>
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
                                                        <h4><a class="product_name" href="<?= base_url()?>Home/Product/<?= $info_product[$i]['id'] ?>"><?= $info_product[$i]['name'] ?></a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price"><?= $info_product[$i]['price'] ?>VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                    <?php
                                    } 
                                    ?>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Menu Content Area End Here -->
                    </div>
                    <!-- Tab Menu Area End Here -->
                </div>
            </div>
        </section>
        <!-- Li's Trending Product | Home V2 Area End Here -->
        <!-- Begin Footer Area -->
        <?php include 'footer.php';?>
        <!-- Footer Area End Here -->

        <!-- Begin Quick View | Modal Area -->
        <!-- Quick View | Modal Area End Here -->
    </div>
    <!-- Body Wrapper End Here -->
    <?php include 'load_js.php';?>
</body>

<!-- index-231:38-->
</html>