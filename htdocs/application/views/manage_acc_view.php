<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- login-register31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Edit information</title>
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
                        <li class="active">Update your information</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Login Content Area -->
        <div class="page-section mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                        <!-- Login Form s-->
                        <form action="ChangeInfo" method="post" enctype="multipart/form-data">
                            <div class="login-form">
                                <h4 class="info-title">Change information</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Name</label>
                                        <input name="name" type="text" value="<?= $attribute[0]['name']; ?>" class="mb-0" placeholder="Enter your Name"required>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Phone number</label>
                                        <input name="phonenum" type="text" value="<?= $attribute[0]['phonenum']; ?>" class="mb-0" placeholder="Enter your Phone number"required>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Address</label>
                                        <input name="addr" type="text" value="<?= $attribute[0]['addr']; ?>" class="mb-0" placeholder="Enter your Address"required>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="register-button mt-0" value="Save">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form action="ChangePassword" method="post" enctype="multipart/form-data">
                            <div class="login-form">
                                <h4 class="login-title">Change password</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Old Password</label>
                                        <input name="oldpass" type="password" class="mb-0" placeholder="Enter your Old password"required>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>New password</label>
                                        <input name="newpass" type="password" class="mb-0" placeholder="Enter your New password"required>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Re-Enter New password</label>
                                        <input name="newpass1" type="password" class="mb-0" placeholder="Re-Enter your New password"required>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="register-button mt-0" value="Save">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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