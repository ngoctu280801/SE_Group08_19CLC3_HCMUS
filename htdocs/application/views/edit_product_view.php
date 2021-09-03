<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- login-register31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Change product information || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
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
                        <li class="active">Change product information</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Login Content Area -->
        <div class="edit-product">
            <h3>Change your product information:</h3>
            <div class="edit-product-container">
                <form action="<?= base_url(); ?>/home/EditProductInfo" enctype="multipart/form-data" method="post">
                    <div class="detail">
                        <input type="hidden" name="idproduct" value="<?= $info[0]['id'] ?>">    
                        <p class="detail-title">Name</p>
                        <input name="name" type="text" value="<?= $info[0]['name'] ?>" placeholder="Enter product's name" required></div>
                    <div class="detail">
                        <p class="detail-title">Price(VNĐ)</p>
                        <input name="price" type="text" value="<?= $info[0]['price'] ?>" placeholder="Enter product's price" required></div>
                    <div class="detail">
                        <p class="detail-title">Description</p>
                        <input name="des" type="text" value="<?= $info[0]['description'] ?>" placeholder="Description of product" required></div>
                    <div class="detail">
                        <p class="detail-title">In stock</p>
                        <input name="instock" type="text" value="<?= $info[0]['instock'] ?>" placeholder="Available products" required></div>
                    
                    <p><button type="submit" value="Save">Save</button></p>
                </form>
            </div>

            <h3>Add new images</h3>
            <div class="edit-product-container">
                <form action="<?= base_url(); ?>/home/AddProductImg" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="idproduct" value="<?= $info[0]['id'] ?>" required>
                    <div class="detail"><p class="detail-title">Add new images</p>
                    <input type="file" name="userfile[]" multiple="multiple" placeholder="Choose product images" accept="image/*" required></div>
                    <p><button type="submit" value="Add new pictures">Add</button></p>
                </form>
            </div>

            <h3>Delete images</h3>
            <form action="<?= base_url(); ?>/home/DelProductImg" enctype="multipart/form-data" method="post">
                <div class="image-product-container">
                    <div class="image-product-images-list">
                        <ul>
                            <input type="hidden" name="idproduct" value="<?= $info[0]['id'] ?>">
                            <?php 
                            $total = count($img);
                            for ($i = 0; $i < $total; $i++) { 
                                if($img[$i]['id'] == $info[0]['avt'])
                                {
                                    continue;
                                }
                            ?>

                            <li class="image-product-images-single">
                                <img src="<?= base_url().'uploads/'.$img[$i]['name'] ?>" alt="product-image" width="150" height = "90">
                                <label for="imgText">Select:</label>
                                <input type="checkbox" name="ticked[]" value="<?= $img[$i]['id'] ?>">
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <p><button type="submit" value="Delete">Delete</button></p>
                </div>
            </form>

            <h3>Set as main pictures</h3>
            <form action="<?= base_url(); ?>/home/SetProductAvt" enctype="multipart/form-data" method="post">
                <div class="image-product-container">
                    <div class="image-product-images-list">
                        <ul>
                            <input type="hidden" name="idproduct" value="<?= $info[0]['id'] ?>">
                            <?php 
                            $total = count($img);
                            for ($i = 0; $i < $total; $i++) { ?>
                            <li class="image-product-images-single">
                                <img src="<?= base_url().'uploads/'.$img[$i]['name'] ?>" alt="product-image" width="150" height = "90">
                                <label for="imgText">Select:</label>
                                <input type="radio" name="avt" value="<?= $img[$i]['id'] ?>" 
                                    <?php 
                                    if($img[$i]['id'] == $info[0]['avt'])
                                    {
                                        echo 'checked="checked"';
                                    } ?> 
                                >
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <p><button type="submit" value="Save">Save</button></p>
                </div>
            </form>

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