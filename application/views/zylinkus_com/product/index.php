<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-26
 * Time: 下午6:00
 * File: index.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
?>
<?php $this->load->view(themes('library/header'));?>
<div class="section_container">
<!--Mid Section Starts-->
<section>
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="leisure_listing.html">Women</a></li>
    <li class="active"><a href="#">Shirts &amp; Blouses</a></li>
</ul>
<!--PRODUCT DETAIL STARTS-->
<div id="product_detail">
    <!--Product Left Starts-->
    <div class="product_leftcol"> <img src="<?php echo $product->img;?>"> <span class="pr_info">ROLL OVER IMAGE TO ZOOM</span>
        <ul class="pr_gallery">
            <li><a href="#"><img src="images/pr_gal1.jpg"></a></li>
            <li><a href="#"><img src="images/pr_gal2.jpg"></a></li>
            <li><a href="#"><img src="images/pr_gal3.jpg"></a></li>
        </ul>
    </div>
    <!--Product Left Ends-->
    <!--Product Right Starts-->
    <div class="product_rightcol"> <small class="pr_type">Formal Dress</small>
        <h1>Notch-collar shirt</h1>
        <p class="short_dc"> Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.

        </p><div class="pr_price"> <big>$49.90</big> <small>$72.00</small> </div>
        <div class="size_info">
            <div class="size_sel">
                <label>Available Size :</label>
                <div id="uniform-undefined" class="selector"><span style="-moz-user-select: none;">SELECT</span><select style="opacity: 0;">
                    <option>SELECT</option>
                    <option>32</option>
                </select></div>
            </div>
            <div class="color_sel">
                <label>Color :</label>
                <div id="uniform-undefined" class="selector"><span style="-moz-user-select: none;">BEIGE</span><select style="opacity: 0;">
                    <option>BEIGE</option>
                    <option>CORAL</option>
                </select></div>
            </div>
        </div>
        <div class="qty_info">
            <div class="quantity">
                <label>Quantity :</label>
                <div id="uniform-undefined" class="selector"><span style="-moz-user-select: none;">1</span><select style="opacity: 0;">
                    <option>1</option>
                    <option>2</option>
                </select></div>
            </div>
        </div>
        <div class="add_to_buttons">
            <button onclick="parent.location='leisure_cart.html'" class="add_cart">Add to Cart</button>
            <span>or</span>
            <ul>
                <li><a href="#">Add to Wishlist</a></li>
            </ul>
        </div>
        <div class="product_overview">
            <h4>Quick Overview</h4>
            <ul>
                <li>Long sleeves with single button cuffs.</li>
                <li>Cuffs can be rolled up and secured with button-tabs.</li>
                <li>Standing collar with notched detailing.</li>
                <li>Front button placket.</li>
                <li>Hem is longer in back.</li>
            </ul>
        </div>
        <!--Options-->
        <div class="product_options">
            <h4>Available Options</h4>
            <ul>
                <li>
                    <span class="required">*</span>
                    <label>Select:</label>
                    <div id="uniform-undefined" class="selector"><span style="-moz-user-select: none;">Select</span><select style="opacity: 0;">
                        <option>Select</option>
                    </select></div>
                </li>
                <li>
                    <span class="required">*</span>
                    <label>Radio:</label>
                    <div class="input_container">
                        <input id="option-value-5" value="5" name="option[218]" type="radio">
                        <label for="option-value-5">Small                        (+$13.75) </label>
                        <input id="option-value-6" value="6" name="option[218]" type="radio">
                        <label for="option-value-6">Medium                        (+$25.50) </label>
                        <input id="option-value-7" value="7" name="option[218]" type="radio">
                        <label for="option-value-7">Large                        (+$37.25) </label>
                    </div>
                </li>
                <li>
                    <span class="required">*</span> <label>Checkbox:</label>
                    <div class="input_container">
                        <input id="option-value-8" value="8" name="option[223][]" type="checkbox">
                        <label for="option-value-8">Checkbox 1                        (+$13.75) </label>
                        <input id="option-value-9" value="9" name="option[223][]" type="checkbox">
                        <label for="option-value-9">Checkbox 2                        (+$25.50) </label>
                        <input id="option-value-10" value="10" name="option[223][]" type="checkbox">
                        <label for="option-value-10">Checkbox 3                        (+$37.25) </label>
                        <input id="option-value-11" value="11" name="option[223][]" type="checkbox">
                        <label for="option-value-11">Checkbox 4                        (+$49.00) </label>
                    </div>
                </li>
                <li>
                    <div class="txt_frm">
                        <span class="required">*</span> <label>Text:</label>
                        <input value="test" name="option[208]" type="text">
                        <br class="clear">
                        <span class="required">*</span> <label>Textarea:</label>
                        <textarea rows="3" cols="40" name="option[209]"></textarea>
                    </div>
                </li>
                <li>
                    <div class="file_upload">
                        <span class="required">*</span> <label>File:</label>
                        <input class="button" id="button-option-222" value="Upload File" type="button">
                        <input value="" name="option[222]" type="hidden">
                        <br class="clear">
                        <span class="required">*</span> <label>Date:</label>
                        <input class="date hasDatepicker" value="2011-02-20" name="option[219]" id="dp1347114619217" type="text">
                        <span class="required">*</span> <label>Time:</label>
                        <input class="time hasDatepicker" value="22:25" name="option[221]" id="dp1347114619219" type="text">
                        <br class="clear">
                        <span class="required">*</span> <label>Date &amp; Time:</label>
                        <input class="datetime hasDatepicker" value="2011-02-20 22:25" name="option[220]" id="dp1347114619218" type="text">
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <!--Product Right Ends-->

    <!--Tabs-->
    <div id="tabber33" class="simpleTabs">
        <ul class="simpleTabsNavigation">
            <li><a class="" id="tabber33_a_0" href="#">Tab 1</a></li>
            <li><a class="current" id="tabber33_a_1" href="#">Tab 2</a></li>
            <li><a class="" id="tabber33_a_2" href="#">Other tab</a></li>
        </ul>
        <div id="tabber33_div_0" class="simpleTabsContent">
            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec turpis. Fusce aliquet lorem vitae est. In hac habitasse platea dictumst. Phasellus iaculis facilisis pede. Fusce vulputate elit non magna. Nunc commodo rhoncus dolor. Integer auctor. Aliquam tincidunt purus id mauris. Vivamus eros. Vestibulum velit libero, dapibus ac, consectetuer dignissim, adipiscing sed, libero. Ut mi metus, tempor eget, aliquet sit amet, euismod ut, est. Sed nec leo eu lacus laoreet venenatis. Praesent massa sem, facilisis quis, mollis non, consequat et, sapien. Vestibulum dui sapien, sollicitudin ut, hendrerit id, cursus sed, eros. Aliquam eu purus. Proin iaculis. Vestibulum elementum metus sed ipsum. Integer facilisis. Donec aliquam ligula eu neque. Etiam urna. </p>
            <p> Cras pretium fringilla nibh. Duis posuere. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque semper. Ut quis arcu. Integer ac nulla. Ut auctor. Pellentesque scelerisque nisl in tortor. Integer eget purus. Ut volutpat, neque eu tincidunt tincidunt, justo tortor pretium elit, vitae varius mauris arcu a lectus. Phasellus bibendum pretium urna. Donec non quam in augue molestie congue. Aenean metus diam, volutpat vitae, tristique id, porttitor a, elit. Cras bibendum, augue non pulvinar aliquam, est nulla posuere nunc, gravida gravida magna leo nec arcu. Donec arcu mi, pellentesque quis, placerat quis, egestas id, leo. Morbi urna est, convallis eget, tristique at, egestas a, lectus.</p>
        </div>
        <div id="tabber33_div_1" class="simpleTabsContent currentTab">
            <div>
                <div>
                    <div>
                        <div>
                            <p>Proin ullamcorper bibendum tellus. Donec vel ipsum sit amet mi convallis lacinia. Maecenas non nunc bibendum orci commodo aliquam. Integer vel justo. Sed vestibulum semper mi. Vestibulum tincidunt leo at augue. Morbi ut justo. Sed cursus, lorem nec lobortis blandit, urna nisl rhoncus erat, id vulputate dui sem sed erat. Sed velit diam, pretium in, hendrerit non, eleifend ut, nisi. Nullam at risus. Donec vitae tellus ut tellus dictum adipiscing. Sed nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam condimentum, odio at rhoncus cursus, dolor lacus malesuada est, in pulvinar arcu justo ultricies justo. Ut sagittis luctus dui. </p>
                            <p> Maecenas fringilla diam fermentum ante. Vivamus tempor, sem vitae semper aliquam, arcu nunc pretium quam, vitae auctor sapien dolor ut lorem. Integer eros. Sed pulvinar mi eu tortor. Pellentesque faucibus neque eu erat. Nullam pulvinar, urna vitae elementum malesuada, tortor lectus consequat nulla, in pharetra augue lacus et odio. Donec enim nulla, lacinia sed, interdum non, laoreet ut, nisi. Quisque posuere, purus id pretium luctus, dui ligula porttitor neque, vitae consequat sem arcu posuere metus. Duis dictum convallis ipsum. Nulla mi. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tabber33_div_2" class="simpleTabsContent">
            <p> Vestibulum sit amet arcu a leo dignissim lobortis. Quisque augue neque, adipiscing id, condimentum eu, congue at, pede. Vivamus rhoncus. Aliquam pulvinar justo et ligula. Pellentesque ligula elit, placerat vel, luctus ac, facilisis et, enim. Nulla malesuada venenatis metus. Etiam pellentesque tincidunt diam. Ut et pede. Cras ante. Maecenas sagittis mi vulputate neque. Aenean dignissim justo non lectus. Nulla facilisi. Maecenas enim lorem, lacinia non, bibendum at, varius consectetuer, ipsum. Fusce ut lacus in nulla rutrum pellentesque. Nunc velit. Vestibulum eleifend porta risus. Cras congue volutpat leo. Nam nec mi quis libero placerat ultrices. Nulla massa velit, scelerisque sed, rutrum in, sollicitudin nec, mi. Pellentesque imperdiet laoreet sapien. </p>
        </div>
    </div>
    <!--Tabs-->

</div>
<!--PRODUCT DETAIL ENDS-->
<!--Product List Starts-->
<div class="products_list products_slider">
    <h2 class="sub_title">You might also like</h2>
    <div class=" jcarousel-skin-tango"><div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 1612px;" id="first-carousel" class="first-and-second-carousel jcarousel-list jcarousel-list-horizontal">
        <li jcarouselindex="1" style="float: left; list-style: none outside none;" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a class="product_image"><img src="images/pr_l_1.jpg"></a>
            <div class="product_info">
                <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
            <div class="price_info"> <a href="#">+ Add to wishlist</a>
                <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
            </div>
        </li>
        <li jcarouselindex="2" style="float: left; list-style: none outside none;" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a class="product_image"><img src="images/pr_l_2.jpg"></a>
            <div class="product_info">
                <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
            <div class="price_info"> <a href="#">+ Add to wishlist</a>
                <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
            </div>
        </li>
        <li jcarouselindex="3" style="float: left; list-style: none outside none;" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a class="product_image"><img src="images/pr_l_3.jpg"></a>
            <div class="product_info">
                <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
            <div class="price_info"> <a href="#">+ Add to wishlist</a>
                <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
            </div>
        </li>
        <li jcarouselindex="4" style="float: left; list-style: none outside none;" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a class="product_image"><img src="images/pr_l_5.jpg"></a>
            <div class="product_info">
                <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
            <div class="price_info"> <a href="#">+ Add to wishlist</a>
                <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
            </div>
        </li>
        <li jcarouselindex="5" style="float: left; list-style: none outside none;" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a class="product_image"><img src="images/pr_l_1.jpg"></a>
            <div class="product_info">
                <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
            <div class="price_info"> <a href="#">+ Add to wishlist</a>
                <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
            </div>
        </li>
        <li jcarouselindex="6" style="float: left; list-style: none outside none;" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a class="product_image"><img src="images/pr_l_2.jpg"></a>
            <div class="product_info">
                <h3><a href="leisure_detail.html">CN Clogs Beach/Garden Clog</a></h3>
                <small>Comfortable and fun to wear these clogs are the latest trend in fash</small> </div>
            <div class="price_info"> <a href="#">+ Add to wishlist</a>
                <button class="price_add" title="" type="button"><span class="pr_price">$76.00</span><span class="pr_add">Add to Cart</span></button>
            </div>
        </li>
    </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div></div>
</div>
<!--Product List Ends-->

<!--Newsletter_subscribe Starts-->
<div class="subscribe_block">
    <div class="find_us">
        <h3>Find us on</h3>
        <a class="twitter" href="#"></a> <a class="facebook" href="#"></a> <a class="rss" href="#"></a> </div>
    <div class="subscribe_nl">
        <h3>Subscribe to our Newsletter</h3>
        <small>Instant wardrobe updates, new arrivals, fashion news, don’t miss a beat – sign up to our newsletter now.</small>
        <form id="newsletter" method="post" action="#">
            <input class="input-text" value="Enter your email" title="Enter your email" id="newsletter" name="email" type="text">
            <button class="button" title="" type="submit"></button>
        </form>
    </div>
</div>
<!--Newsletter_subscribe Ends-->

</section>
<!--Mid Section Ends-->
</div>
<?php $this->load->view(themes('library/footer'));?>