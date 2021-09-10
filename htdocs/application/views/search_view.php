<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index-231:32-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Search : <?= $name ?></title>
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
        
        <!-- Begin Li's TV & Audio Product Area -->
        <section class="product-area li-laptop-product li-tv-audio-product-2 pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Result of the Search</span>
                            </h2>
                            
                        </div>

                        <h4>Product:</h4>
                        <?php 
                            if($product)
                            { ?>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                <?php
                                $total = count($product);

                                for ($i = 0; $i < $total; $i++)
                                { ?>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="Product/<?= $product[$i]['id'] ?>">
                                                <img src="<?= base_url().'uploads/'.$img[$i] ?>" width='150' height='150'>
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
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
                                                <h4><a class="product_name" href="Product/<?= $product[$i]['id'] ?>"><?= $product[$i]['name'] ?></a></h4>
                                                <div class="price-box">
                                                    <span class="new-price"><?= $product[$i]['price'] ?>VNĐ</span>
                                                    <p class="card-text instock">In Stock: <?= $product[$i]['instock'] ?></p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            
                            <?php } 
                            }
                                else{
                                    echo '<p>Not Found any product</p>';
                                }
                            ?>                               
                                </div>
                            </div>

                    <h4>Shop:</h4>
                    <?php 
                        if($shop)
                        {?>
                        <div class="row">
                            <div class="product-active owl-carousel">
                            <?php 
                                $total = count($shop);
                                for ($i = 0; $i < $total; $i++)
                                { ?>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
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
                                                <h4><a class="product_name" href="Shop/<?= $shop[$i]['id'] ?>"><?= $shop[$i]['name'] ?></a></h4>
                                                <p class="card-text phonenum"><u>Phone number: <?= $shop[$i]['phonenum'] ?></u></p>
                                                <p class="card-text addr">Address: <?= $shop[$i]['addr'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            
                    <?php }
                    }
                        else{
                            echo '<p>Not Found any shop</p>';
                        }
                    ?>                               
                        </div>
                    </div>
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>
        <!-- Li's TV & Audio Product Area End Here -->
        
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