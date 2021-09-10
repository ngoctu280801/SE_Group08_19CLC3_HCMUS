<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li>
                                <div class="ht-setting-trigger"><span>Setting</span></div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        
                                        
                                        <!-- Begin Login / Logout -->
                                        <?php 
                                        if(isset($_SESSION['permission_user']) == false){?>
                                            <li><a href="<?= base_url(); ?>Home/toLogin">Sign In</a></li>
                                        <?php
                                        }
                                        else if($_SESSION['id_user'] == 'admin'){?>
                                            <li><a href="<?= base_url(); ?>LoginAdm/SignOut">Sign Out</a></li>
                                        <?php
                                        }
                                        else
                                        {?>
                                            <li><a href="<?= base_url(); ?>Home/ManageAccount">My Account</a></li>
                                            
                                            <li><a href="<?= base_url(); ?>Home/SignOut">Sign Out</a></li>
                                        <?php } ?>
                                        <!-- End Login / Logout -->
                                    </ul>
                                </div>
                            </li>
                            <!-- Setting Area End Here -->
                            <!-- Begin Currency Area -->
                            <li>
                                <span class="currency-selector-wrapper">Currency :</span>
                                <div class="ht-currency-trigger"><span>USD $</span></div>
                                <div class="currency ht-currency">
                                    <ul class="ht-setting-list">
                                        <li><a href="#">EUR €</a></li>
                                        <li class="active"><a href="#">USD $</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Currency Area End Here -->
                            <!-- Begin Language Area -->
                            <li>
                                <span class="language-selector-wrapper">Language :</span>
                                <div class="ht-language-trigger"><span>English</span></div>
                                <div class="language ht-language">
                                    <ul class="ht-setting-list">
                                        <li class="active"><a href="#"><img src="<?php echo base_url(); ?>images/menu/flag-icon/1.jpg" alt="">English</a></li>
                                        <li><a href="#"><img src="<?php echo base_url(); ?>images/menu/flag-icon/2.jpg" alt="">Français</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="<?php echo base_url(); ?>Home">
                            <img src="<?php echo base_url(); ?>images/menu/logo/1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="<?= base_url(); ?>Home/Search" enctype="multipart/form-data" method="post" class="hm-searchbox">
                        <select class="nice-select select-search-category">
                            <option value="0">All</option>                         
                            <option value="10">Laptops</option>                     
                            <option value="17">- -  Prime Video</option>                    
                            <option value="20">- - - -  All Videos</option>                     
                            <option value="21">- - - -  Blouses</option>                        
                            <option value="22">- - - -  Evening Dresses</option>                
                            <option value="23">- - - -  Summer Dresses</option>                     
                            <option value="24">- - - -  T-shirts</option>                       
                            <option value="25">- - - -  Rent or Buy</option>                        
                            <option value="26">- - - -  Your Watchlist</option>                     
                            <option value="27">- - - -  Watch Anywhere</option>                     
                            <option value="28">- - - -  Getting Started</option>         
                            <option value="18">- - - -  Computers</option>                      
                            <option value="29">- - - -  More to Explore</option>         
                            <option value="30">- - - -  TV &amp; Video</option>                     
                            <option value="31">- - - -  Audio &amp; Theater</option>               
                            <option value="32">- - - -  Camera, Photo </option>
                            <option value="33">- - - -  Cell Phones</option>                        
                            <option value="34">- - - -  Headphones</option>                     
                            <option value="35">- - - -  Video Games</option>                        
                            <option value="36">- - - -  Wireless Speakers</option>            
                            <option value="19">- - - -  Electronics</option>                        
                            <option value="37">- - - -  Amazon Home</option>                        
                            <option value="38">- - - -  Kitchen &amp; Dining</option>           
                            <option value="39">- - - -  Furniture</option>                      
                            <option value="40">- - - -  Bed &amp; Bath</option>                     
                            <option value="41">- - - -  Appliances</option>                 
                            <option value="11">TV &amp; Audio</option>                  
                            <option value="42">- -  SamSung</option>                        
                            <option value="45">- - - -  Office</option>                     
                            <option value="47">- - - -  Gaming</option>                 
                            <option value="48">- - - -  Chromebook</option>                     
                            <option value="49">- - - -  Refurbished</option>                    
                            <option value="50">- - - -  Touchscreen</option>                        
                            <option value="51">- - - -  Ultrabooks</option>                     
                            <option value="52">- - - -  Blouses</option>                        
                            <option value="43">- -  Toshiba</option>                        
                            <option value="53">- - - -  Hard Drives</option>                        
                            <option value="54">- - - -  Graphic Cards</option>                      
                            <option value="55">- - - -  Processors (CPU)</option>  
                            <option value="56">- - - -  Memory</option>                     
                            <option value="57">- - - -  Motherboards</option>                       
                            <option value="58">- - - -  Fans &amp; Cooling</option> 
                            <option value="59">- - - -  CD/DVD Drives</option>                      
                            <option value="44">- -  Sony Bravia</option>                        
                            <option value="60">- - - -  Sound Cards</option>                        
                            <option value="61">- - - -  Cases &amp; Towers</option>   
                            <option value="62">- - - -  Casual Dresses</option>                     
                            <option value="63">- - - -  Evening Dresses</option>       
                            <option value="64">- - - -  T-shirts</option>                       
                            <option value="65">- - - -  Tops</option>                                 
                            <option value="12">Smartphone</option>                  
                            <option value="66">- -  Camera Accessories</option>                     
                            <option value="68">- - - -  Octa Core</option>                      
                            <option value="69">- - - -  Quad Core</option>                  
                            <option value="70">- - - -  Dual Core</option>                      
                            <option value="71">- - - -  7.0 Screen</option>                     
                            <option value="72">- - - -  9.0 Screen</option>                     
                            <option value="73">- - - -  Bags &amp; Cases</option>                   
                            <option value="67">- -  Camcorders</option>                     
                            <option value="74">- - - -  Batteries</option>                      
                            <option value="75">- - - -  Microphones</option>                        
                            <option value="76">- - - -  Stabilizers</option>                        
                            <option value="77">- - - -  Video Tapes</option>                        
                            <option value="78">- - - -  Memory Card Readers</option> 
                            <option value="79">- - - -  Tripods</option>           
                            <option value="13">Cameras</option>                          
                            <option value="14">headphone</option>                                
                            <option value="15">Smartwatch</option>                           
                            <option value="16">Accessories</option>
                        </select>
                        <input type="text" name="name" class="search-text" placeholder="Enter your search key ...">
                        <input type="checkbox" class="default-checkbox" name="ticked[]" value="shop">
                        <label for="shopText">Shop</label>
                        <input type="checkbox" class="default-checkbox" name="ticked[]" value="product" checked="checked">
                        <label for="productText">Product</label>
                        <button class="li-btn" type="submit" value="Search"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <?php
                            if($this->session->userdata('permission_user') == '1'){ ?>
                                <li class="hm-wishlist">
                                    <a href="wishlist.html">
                                        <span class="cart-item-count wishlist-item-count">0</span>
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            
                                <li class="hm-minicart">
                                    <a href="<?= base_url(); ?>Home/cart">
                                        <span class="item-icon"></span>
                                        <span class="item-text">VNĐ
                                    </a>
                                </li>
                            <?php } ?>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <a class ="home" href="<?= base_url(); ?>Home">Home</a>                                
                                <li><a href="<?php echo base_url(); ?>Home/aboutUs">About Us</a></li>
                                <?php
                                if($this->session->userdata('permission_user') == '2'){ ?>
                                    <li><a href="<?php echo base_url(); ?>Home/ManageProduct">Shop Management</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container"> 
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Mobile Menu Area End Here -->
</header>
<!-- Header Area End Here -->
