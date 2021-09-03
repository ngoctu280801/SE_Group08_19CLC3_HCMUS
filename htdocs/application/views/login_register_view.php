<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- login-register31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login Register - BestGear</title>
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
                        <li class="active">Login Register</li>
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
                        <form action="Login_register/Login" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <h4 class="login-title">Login</h4>
                                <div class="card-block">
                                    <fieldset class="form-group">
                                        <label for="usernameText">Username:</label>
                                        <input name="username" type="text" class="form-control" id="usernameView"
                                        placeholder="Enter username">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="passwordText">Password:</label>
                                        <input name="password" type="password" class="form-control" id="passwordView"
                                        placeholder="Enter password">
                                    </fieldset>
                                    <input type="submit" class="btn btn-success btn-dark" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form action="Login_register/Register" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <h4 class="login-title">Register</h4>
                                <div class="card-block">
                                    <fieldset class="form-group">
                                        <label for="usernameText">Username:</label>
                                        <input name="username" type="text" class="form-control" id="usernameView"
                                        placeholder="Enter username">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="passwordText">Password:</label>
                                        <input name="password" type="password" class="form-control" id="passwordView"
                                        placeholder="Enter password">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="passwordText1">Password:</label>
                                        <input name="password1" type="password" class="form-control" id="passwordView1"
                                        placeholder="Re-Enter password">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="nameText">Your Name:</label>
                                        <input name="name" type="text" class="form-control" id="nameView"
                                        placeholder="Enter your name">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="addrText">Your Address:</label>
                                        <input name="addr" type="text" class="form-control" id="addrView"
                                        placeholder="Enter your Adress">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="phoneText">Your Phone number:</label>
                                        <input name="phonenum" type="text" class="form-control" id="phoneView"
                                        placeholder="Enter your phone number">
                                    </fieldset>
                                    <p>Select your plan:</p>
                                    <fieldset class="radio-group">
                                        <input type="radio" id="buyer" name="plan" value="1" checked="checked">
                                        <label for="buyer">Buyer</label><br>
                                    </fieldset>
                                    <fieldset class="radio-group">
                                        <input type="radio" id="seller" name="plan" value="2">
                                        <label for="seller">Seller</label><br>
                                    </fieldset>
        
                                    <input type="submit" class="btn btn-success btn-dark" value="Register">
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
