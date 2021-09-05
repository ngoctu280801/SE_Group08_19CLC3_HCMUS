<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- checkout31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Checkout</title>
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
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">

                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-accordion">
                                <!--Accordion Start-->
                                
                                <!--Accordion End-->
                                <!--Accordion Start-->
                                <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                                <div id="checkout_coupon" class="coupon-checkout-content">
                                    <div class="coupon-info">
                                        <form action="#">
                                            <p class="checkout-coupon">
                                                <input placeholder="Coupon code" type="text">
                                                <input value="Apply Coupon" type="submit">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <!--Accordion End-->
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url(); ?>Home/CheckOut" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <form action="#">
                                    <div class="checkbox-form">
                                        <h3>Billing Details</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="country-select clearfix">
                                                    <label>Country <span class="required">*</span></label>
                                                    <select class="nice-select wide">
                                                      <option data-display="Vietnam">Vietnam</option>
                                                      <option value="uk">London</option>
                                                      <option value="rou">Romania</option>
                                                      <option value="fr">French</option>
                                                      <option value="de">Germany</option>
                                                      <option value="aus">Australia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Full name</label>
                                                    <input placeholder="" type="text"require>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input placeholder="Street address" type="text" required>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input placeholder="" type="email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Phone  <span class="required">*</span></label>
                                                    <input type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list create-acc">
                                                    <label style="background-color:powderblue; color:red;">*This page is just a demo to demonstrate the flow scenario of website. This page does not process and save data from user.*</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="your-order">
                                    <h3>Your order</h3>
                                    <div class="your-order-table table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="cart-product-name">Product</th>
                                                    <th class="cart-product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $total = count($products);
                                                for ($i = 0; $i < $total; $i++) { ?>
                                                    <tr class="cart_item">
                                                    <td class="cart-product-name"><?= $products[$i]['name'] ?><strong class="product-quantity"> × <?= $products[$i]['quantity'] ?></strong></td>
                                                    <td class="cart-product-total"><span class="amount"><?= $products[$i]['quantity']*$products[$i]['price'] ?>VNĐ</span></td>  
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount"><?= $totalcost ?>VNĐ</span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount"><?= $totalcost ?>VNĐ</span></strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <div id="accordion">
                                              <div class="card">
                                                <div class="card-header" id="#payment-1">  
                                                  <h5 class="panel-title">
                                                    <input type="radio" name="paymentmethods">
                                                    <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      Direct Bank Transfer.
                                                    </a>
                                                  </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="card">
                                                <div class="card-header" id="#payment-2">
                                                  <h5 class="panel-title">
                                                    <input type="radio" name="paymentmethods">
                                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      Cheque Payment
                                                    </a>
                                                  </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="card">
                                                <div class="card-header" id="#payment-3">
                                                  <h5 class="panel-title">
                                                    <input type="radio" name="paymentmethods">
                                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                      PayPal
                                                    </a>
                                                  </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="order-button-payment">
                                                <input value="Place order" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--Checkout Area End-->
            <!-- Begin Footer Area -->
            <?php include 'footer.php';?>
            </div>
            <!-- Footer Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <?php include 'load_js.php';?>
    </body>

<!-- checkout31:27-->
</html>
