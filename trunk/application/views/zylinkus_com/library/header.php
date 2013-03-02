<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $title;?></title>
<meta name="author" content="Shanghai ZhiYan Technology Co., Ltd." />
<meta name="keywords" content="<?php echo $keywords;?>" />
<meta name="description" content="<?php echo $description;?>" />
<link rel="shortcut icon" href="/public/favicon.ico" />
<!--CSS-->
<link rel="stylesheet" href="/application/views/<?php echo themes("css/styles.css");?>">

<!--Google Webfont -->
<link href='http://fonts.googleapis.com/css?family=Istok+Web' rel='stylesheet' type='text/css'>
<!--Javascript-->
<script type="text/javascript" src="/application/views/<?php echo themes("js/jquery-1.7.2.min.js");?>" ></script>
<script type="text/javascript" src="/application/views/<?php echo themes("js/jquery.flexslider.js");?>" ></script>
<script type="text/javascript" src="/application/views/<?php echo themes("js/jquery.easing.js");?>"></script>
<script type="text/javascript" src="/application/views/<?php echo themes("js/jquery.jcarousel.js");?>"></script>
<script type="text/javascript" src="/application/views/<?php echo themes("js/jquery.jtweetsanywhere-1.3.1.min.js");?>" ></script>
<script type="text/javascript" src="/application/views/<?php echo themes("js/simpletabs_1.3.js");?>"></script>
<script type="text/javascript" src="/application/views/<?php echo themes("js/form_elements.js");?>" ></script>
<script type="text/javascript" src="/application/views/<?php echo themes("js/custom.js");?>"></script>
<!--[if lt IE 9]>
    <script src="/application/views/<?php echo themes('js/html5.js');?> "></script>
    <![endif]-->
<!-- mobile setting -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="wrapper">
    <div class="header_container">
        <!--Header Starts-->
        <header>
            <div class="top_bar clear">
                <!--Language Switcher Starts-->
                <div class="language_switch"> <a class="active" href="#" title="ENGLISH">EN</a> <a href="#" title="FRENCH">FR</a> </div>
                <!--Language Switcher Ends-->
                <!--Top Links Starts-->
                <ul class="top_links">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">Login</a></li>
                    <li class="highlight"><a href="#">Sign Up</a></li>
                </ul>
                <!--Top Links Ends-->
            </div>
            <!--Logo Starts-->
            <h1 class="logo"> <a href="leisure_index.html"><img src="images/logo.png" /></a> </h1>
            <!--Logo Ends-->
            <!--Responsive NAV-->            <div class="responsive-nav" style="display:none;">
            <select  onchange="if(this.options[this.selectedIndex].value != ''){window.top.location.href=this.options[this.selectedIndex].value}">
                <option selected="" value="">Navigate...</option>
                <option value="leisure_index.html"> Home</option>
                <option value="leisure_listing.html"> -  Listing Page</option>
                <option value="leisure_detail.html">Product Page</option>
                <option value="leisure_cart.html"> -  Shopping Cart</option>
                <option value="leisure_checkout.html"> -  Checkout</option>
                <option value="leisure_contact.php">Contact</option>
            </select>
        </div>
            <!--Responsive NAV-->
            <!--Search Starts-->
            <form class="header_search" action="<?php echo site_url("search/index/")?>" name="search_form" method="get">
                <div class="form-search">
                    <input id="search" type="text" name="q" value="" class="input-text" autocomplete="off" placeholder="Search">
                    <button type="submit" title="Search"></button>
                </div>
            </form>
            <!--Search Ends-->
        </header>
        <!--Header Ends-->
    </div>
    <div class="navigation_container">
        <!--Navigation Starts-->
        <nav>
            <ul class="primary_nav">
                <li class="active"><a href="leisure_listing.html">Women</a>
                    <!--SUbmenu Starts-->
                    <ul class="sub_menu">
                        <li> <a href="#">Dresses</a>
                            <ul>
                                <li><a href="#">Skirts</a></li>
                                <li><a href="#">Shorts</a></li>
                                <li><a href="#">Premium Pants</a></li>
                                <li><a href="#">Khakis</a></li>
                                <li><a href="#">Casual Pants</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Outerwear & Blazers</a></li>
                            </ul>
                        </li>
                        <li> <a href="#">Accessories</a>
                            <ul>
                                <li><a href="#">Sunglasses</a></li>
                                <li><a href="#">Scarves</a></li>
                                <li><a href="#">Hair Accessories</a></li>
                                <li><a href="#">Hats and Gloves</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Outerwear & Blazers</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--SUbmenu Ends-->
                </li>
                <li><a href="leisure_listing.html">Men</a>
                    <!--SUbmenu Starts-->
                    <ul class="sub_menu">
                        <li> <a href="#">Men Summer Collection</a>
                            <ul>
                                <li><a href="#">Premium Pants</a></li>
                                <li><a href="#">Khakis</a></li>
                                <li><a href="#">Casual Pants</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Outerwear & Blazers</a></li>
                            </ul>
                        </li>
                        <li> <a href="#">Accessories</a>
                            <ul>
                                <li><a href="#">Sunglasses</a></li>
                                <li><a href="#">Scarves</a></li>
                                <li><a href="#">Hair Accessories</a></li>
                                <li><a href="#">Hats and Gloves</a></li>
                                <li><a href="#">Jeans</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--SUbmenu Ends-->
                </li>
                <li><a href="leisure_listing.html">Kids</a></li>
                <li><a href="leisure_listing.html">Fashion</a></li>
                <li><a href="#">Accessories</a></li>
            </ul>
            <div class="minicart"> <a href="#" class="minicart_link" > <span class="item"><b>2</b> ITEM /</span> <span class="price"><b>$69.20</b></span> </a>
                <div class="cart_drop"> <span class="darw"></span>
                    <ul>
                        <li><img src="images/mini_c_item1.png"><a href="#">Clogs Beach/Garden Clog</a> <span class="price">$49.90</span></li>
                        <li><img src="images/mini_c_item2.png"><a href="#">Faded chambray shorts</a> <span class="price">$12.90</span></li>
                        <div class="cart_bottom">
                            <div class="subtotal_menu"><small>Subtotal:</small><big>$69.20</big></div>
                            <a href="leisure_cart.html">Checkout</a></div>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Navigation Ends-->
    </div>