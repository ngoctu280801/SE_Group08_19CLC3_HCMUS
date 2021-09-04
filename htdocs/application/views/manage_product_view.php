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
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="li-product-thumbnail">Product Images</th>
                            <th class="cart-product-name">Name</th>
                            <th class="cart-product-price">Price</th>
                            <th class="quantity">Quantity</th>
                            <th class="li-product-edit">Edit</th>
                            <th class="li-product-remove">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                    if($info){
                        $total = count($info);
                        for ($i = 0; $i < $total; $i++) { ?>
                        <tr>
                            <td class="li-product-thumbnail"><a href="Product/<?= $info[$i]['id'] ?>"><img src="<?= base_url().'uploads/'.$img[$i] ?>" alt="Li's Product Image" style="width:150px;height:150px;"></a></td>
                            <td class="li-product-name"><a href="Product/<?= $info[$i]['id'] ?>"><?= $info[$i]['name'] ?></a></td>
                            <td class="li-product-price"><span class="amount" style="font-weight:bold"><?= $info[$i]['price'] ?>VNĐ</span></td>
                            <td class="quantity"><span style="font-weight:bold"><?= $info[$i]['instock'] ?></span></td>
                            <td class="li-product-edit"><i class="fa fa-edit" onclick="location.href='ChangeProductInfo/<?= $info[$i]['id'] ?>'"></i></td>
                            <td class="li-product-remove"><i class="fa fa-trash" onclick="return deleteProduct(<?= $info[$i]['id'] ?>)"></i></td>
                        </tr>
                    <?php } }?>

                    </tbody>
                    <script>
                        function deleteProduct(id_product)
                        {
                            if(confirm("Are you sure want to delete this product ?"))
                            {
                                return location.href='DeleteProduct/'+id_product;
                            }
                        }
                    </script>
                </table>
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