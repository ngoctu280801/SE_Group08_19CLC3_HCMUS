<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- login-register31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Add new product</title>
        <?php include 'head_tag.php';?>
</head>
<body>
<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <?php include 'header.php';?>
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?= base_url(); ?>Home">Home</a></li>
                        <li class="active">Add new product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Login Content Area -->
        <div class="add-new-product">
            <h3>Add new product</h3>
            <form action="<?= base_url(); ?>/home/AddProduct" method="post" enctype="multipart/form-data">
                <div class="detail"><p class="detail-title">Upload picture</p><input type="file" name="userfile[]" multiple="multiple" placeholder="Choose Files" required></div>
                <div class="detail"><p class="detail-title">Name</p><input name="name" type="text" placeholder="Enter product's name" required></div>
                <div class="detail"><p class="detail-title">Price(VND)</p><input name="price" type="text" placeholder="Enter product's price" required></div>
                <div class="detail"><p class="detail-title">Description</p><input name="des" type="text" placeholder="Product description" required></div>
                <div class="detail"><p class="detail-title">In stock</p><input name="instock" type="text" placeholder="Available products" required></div>
                <p><button type="submit">Add product</button></p>
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