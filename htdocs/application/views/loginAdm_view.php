<?php 
if (isset($_SESSION['admin'])){
	redirect('','refresh');
} ?>

<!doctype html>
<html class="no-js" lang="zxx">
    <style>
        #css{
            width: 960px;
            margin-left: 540px;
        }
        #css1{
            width: 960px;
            margin-left: 140px;
        }
        .text-center{
            text-align: center;
        }
    </style>  

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Admin - BestGear</title>
    <?php include 'head_tag.php';?>
</head>
<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <?php include 'header.php';?>
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Home">Home</a></li>
                            <li class="active">Login Admin</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin edit Content Area -->
            <div id = "css", class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Edit Form s-->
                            <form action="LoginAdm/LoginAdmin" method="post" enctype="multipart/form-data">
                                <div class="text-center">
                                    <div class="login-form">
                                        <h4 class="info-title">Login Admin Account</h4>
                                        <div class="row">
                                            <div class="col-md-12 col-12 mb-20">
                                                <label>Username</label>
                                                <input name="username" type="text" id="usernameView" placeholder="Enter your username" required>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>Password</label>
                                                <input name="password" type="password" id="passwordView" placeholder="Enter your Password" required>
                                            </div>

                                            <div id = "css1",class="col-md-12">
                                                <button input type="submit" class="register-button mt-0" value="Login to dashboard">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Edit Content Area End Here -->
            <!-- Begin Footer Area -->
            <?php include 'footer.php';?>
            <!-- Footer Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <?php include 'load_js.php';?>
</body>
</html>