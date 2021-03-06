<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from demo.devitems.com/raavin-v3/raavin/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 15:10:26 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home-2 || Raavin - Shoes eCommerce Bootstrap 4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{('public/frontend/images/favicon.png')}}">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/material-design-iconic-font.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{asset('public/frontend/css/fontawesome-stars.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/meanmenu.css')}}">
        <!-- Nivo Slider CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/nivo-slider.css')}}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.min.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/venobox.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/nice-select.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
        <!-- Toasty -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/toasty.min.css')}}">
        <!-- SweetAlert -->
        <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
        <!-- Modernizr js -->
        <script src="{{asset('public/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Main Header Area -->
                <div class="main-header main-header-2 stick header-sticky">
                     <div class="container-fluid pl-40 pr-40">
                         <div class="row">
                             <!-- Begin Main Menu Area -->
                             <div class="col-lg-5 d-none d-lg-block d-xl-block">
                                 <div class="main-menu main-menu-2">
                                     <nav>
                                         <ul>
                                             <li class="active"><a href="{{URL::to('/')}}">Home</a>
                                             </li>
                                                <!-- List category -->
                                                <li>
                                                <a href="#">Category</a>
                                                    <ul class="dropdown">
                                                                @foreach($category as $key => $danhmuc)
                                                                    <li><a href="{{URL::to('/danh-muc/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a></li>
                                                                @endforeach
                                                    </ul>
                                                </li>
                                                <!-- List brand -->
                                                <li>
                                                <a href="#">Brand</a>
                                                    <ul class="dropdown">
                                                                @foreach($brand as $key => $brand)
                                                                <li><a href="{{URL::to('/thuong-hieu/'.$brand->brand_slug)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                                                @endforeach
                                                    </ul>
                                                </li>
                                                <!-- end -->
                                                <li><a href="{{URL::to('/lien-he')}}">Contact Us</a></li>
                                                <li><a href="{{URL::to('/yeu-thich')}}">Wishlist</a></li>
                                         </ul>
                                     </nav>
                                 </div>
                             </div>
                             <!-- Main Menu Area End Here -->
                             <!-- Begin Logo Area -->
                             <div class="col-lg-2 col-md-6 col-2">
                                 <div class="logo logo-2">
                                     <a href="index.html">
                                         <img src="{{('public/frontend/images/menu/logo/3.png')}}" alt="">
                                  </a>
                                 </div>
                             </div>
                             <!-- Logo Area End Here -->
                             <!-- Begin Header Right Area -->
                             <div class="col-lg-5 col-md-6 col-10">
                                 <div class="header-right">
                                     <!-- Begin Mini Cart Area -->
                                     <div class="main-menu primary-menu primary-menu-2">
                                         <nav>
                                             <ul>
                                                 <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-bag"></i>Cart <span>({{$dem_hang}})</span></a>
                                                 </li>
                                             </ul>
                                         </nav>
                                     </div>
                                     <!-- Mini Cart Area End Here -->
                                     <!-- Begin Header Search Area -->
                                     <div class="main-menu primary-menu primary-menu-2">
                                         <nav>
                                             <ul>
                                                 <li><a href="#"><i class="fa fa-search"></i>Search</a>
                                                     <ul class="dropdown header-search">
                                                         <li>
                                                         <form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="POST">
                                                                {{csrf_field()}}
                                                                <input type="text" name="keywords_submit" id="keywords" value="Enter key words..." onblur="if(this.value==''){this.value='Enter key words...'}" onfocus="if(this.value=='Enter key words...'){this.value=''}">
                                                                <button type="submit" name="search_items"><i class="fa fa-search"></i></button>
                                                            </form>
                                                         </li>
                                                     </ul>
                                                 </li>
                                             </ul>
                                         </nav>
                                     </div>
                                     <!-- Header Search Area End Here -->
                                     <!-- Begin User Account Area -->
                                     <div class="main-menu primary-menu primary-menu-2">
                                         <nav>
                                             <ul>
                                                 <li><a href="#"><i class="fa fa-cog"></i>Setting</a>
                                                     <ul class="dropdown primary-dropdown">
                                                     <?php
                                                     $customer_id = Session::get('customer_id');
                                                     $customer_name = Session::get('customer_name');
                                                     if($customer_id!=NULL){ 
                                                        ?>
                                                        <li><a href="#"><i class="fa fa-user"></i>Hello {{$customer_name}}</a></li>
                                                         <li><a href="{{URL::to('/history')}}"><i class="fa fa-history" aria-hidden="true"></i>History Order</a></li>
                                                         <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-check-square"></i>Checkout</a></li>
                                                         <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-unlock"></i>Logout</a></li>
                                                        <?php
                                                    }else{
                                                       ?>
                                                       <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i>Login</a></li>
                                                       <?php 
                                                   }
                                                         ?>
                                                     </ul>
                                                 </li>
                                             </ul>
                                         </nav>
                                     </div>
                                     <!-- User Account Area End Here -->
                                 </div>
                             </div>
                             <!-- Header Right Area End Here -->
                             <!-- Begin Mobile Menu Area -->
                             <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                                 <div class="mobile-menu">
                                     <nav>
                                         <ul>
                                             <li class="active"><a href="index.html">Home</a>
                                                 <!-- Begin Dropdown Menu Area -->
                                                 <ul class="dropdown">
                                                     <li><a href="index.html">Home Shop 1</a></li>
                                                     <li><a href="index-2.html">Home Shop 2</a></li>
                                                     <li><a href="index-3.html">Home Shop 3</a></li>
                                                 </ul>
                                                 <!-- Dropdown Menu Area End Here -->
                                             </li>
                                             <li><a href="shop.html">Shop</a>
                                                 <!-- Begin Megamenu Area -->
                                                 <ul class="dropdown megamenu">
                                                     <!-- Begin Megamenu List Area -->
                                                     <li>
                                                         <h3 class="megamenu-title"><a href="#">Shop Grid Pages</a></h3>
                                                         <ul>
                                                             <li><a href="shop-3-column.html">Shop Three Column</a></li>
                                                             <li><a href="shop-4-column.html">Shop Four Column</a></li>
                                                             <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                             <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                         </ul>
                                                     </li>
                                                     <!-- Megamenu List Area End Here -->
                                                     <!-- Begin Megamenu List Area -->
                                                     <li>
                                                         <h3 class="megamenu-title"><a href="#">Shop List Pages</a></h3>
                                                         <ul>
                                                             <li><a href="shop-list.html">Shop List</a></li>
                                                             <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                                             <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                                                         </ul>
                                                     </li>
                                                     <!-- Megamenu List Area End Here -->
                                                     <!-- Begin Megamenu List Area -->
                                                     <li>
                                                         <h3 class="megamenu-title"><a href="#">Product Types</a></h3>
                                                         @foreach($all_product as $key => $product)
                                                         <ul>
                                                             <li><a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">Product Details</a></li>
                                                             <li><a href="product-details-reverse.html">Product Details Reverse</a></li>
                                                             <li><a href="product-details-2.html">Product Details-2</a></li>
                                                             <li><a href="product-details-2-reverse.html">Product Details 2 Reverse</a></li>
                                                         </ul>
                                                         @endforeach
                                                     </li>
                                                     <!-- Megamenu List Area End Here -->
                                                 </ul>
                                                 <!-- Megamenu Area End Here -->
                                             </li>
                                             <li><a href="blog.html">Blog</a>
                                                 <!-- Begin Megamenu Area -->
                                                 <ul class="dropdown megamenu megamenu-3">
                                                     <!-- Begin Megamenu List Area -->
                                                     <li>
                                                         <h3 class="megamenu-title"><a href="#">Blog Layouts</a></h3>
                                                         <ul>
                                                             <li><a href="blog-none-sidebar.html">Blog None Sidebar</a></li>
                                                             <li><a href="blog-left-sidebar.html">Blog left Sidebar</a></li>
                                                             <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                                         </ul>
                                                     </li>
                                                     <!-- Megamenu List Area End Here -->
                                                     <!-- Begin Megamenu List Area -->
                                                     <li>
                                                         <h3 class="megamenu-title"><a href="#">Blog Details</a></h3>
                                                         <ul>
                                                             <li><a href="blog-details-none-sidebar.html">Blog Details None Sidebar</a></li>
                                                             <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                                                             <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>
                                                         </ul>
                                                     </li>
                                                     <!-- Megamenu List Area End Here -->
                                                     <!-- Begin Megamenu List Area -->
                                                     <li>
                                                         <h3 class="megamenu-title"><a href="#">Blog Format</a></h3>
                                                         <ul>
                                                             <li><a href="blog-image-format.html">Blog Image Format</a></li>
                                                             <li><a href="blog-gallery-format.html">Blog Gallery Format</a></li>
                                                             <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                             <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                         </ul>
                                                     </li>
                                                     <!-- Megamenu List Area End Here -->
                                                 </ul>
                                                 <!-- Megamenu Area End Here -->
                                             </li>
                                             <li><a href="#">Pages</a>
                                                <!-- Begin Dropdown Menu Area -->
                                                <ul class="dropdown">
                                                    <li><a href="login-register.html">My Account</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="services.html">Services</a></li>
                                                    <li><a href="faq.html">FAQ</a></li>
                                                    <li><a href="404.html">Error 404</a></li>
                                                </ul>
                                                <!-- Dropdown Menu Area End Here --> 
                                             </li>
                                             <li><a href="portfolio.html">Portfolio</a>
                                                <!-- Begin Dropdown Menu Area -->
                                                <ul class="dropdown">
                                                     <li><a href="portfolio-colums-3.html">Portfolio Columns 3</a></li>
                                                </ul>
                                                <!-- Dropdown Menu Area End Here -->
                                                <!-- Dropdown Menu Area End Here --> 
                                             </li>
                                             <li><a href="contact-us.html">Contact Us</a></li>
                                         </ul>
                                     </nav>
                                 </div>
                             </div>
                             <!-- Mobile Menu Area End Here -->
                         </div>
                     </div>
                </div>
                <!-- Main Header Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Slider Area -->
            <div class="slider-area">
                <div class="slider-active slider-active-2 owl-carousel">
                    <!-- Begin Single Slide Area -->
                    <div class="single-slide align-center animation-style-01 bg-3">
                        <div class="slider-progress"></div>
                        <div class="container">
                            <div class="slider-content-2">
                                <h3>Create impossible</h3>
                                <h1>Blue Nike</h1>
                                <div class="slider-icon">
                                    <img class="img-slide" src="{{('public/frontend/images/slider/slider-icon-1.png')}}" alt="">
                                </div>
                                <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula</p>
                                <div class="default-btn-2 slide-btn">
                                    <a class="links links-4" href="#">Shop mens</a>
                                    <a class="links links-4 links-4_2" href="#">Shop all Soccer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Slide Area End Here -->
                    <!-- Begin Single Slide Area -->
                    <div class="single-slide align-center animation-style-02 bg-4">
                        <div class="slider-progress"></div>
                        <div class="container">
                            <div class="slider-content-2 slider-content-2_1">
                                <h3>Sale up to 50% off</h3>
                                <h1>Soocer</h1>
                                <div class="slider-icon">
                                    <img class="img-slide" src="{{('public/frontend/images/slider/slider-icon-2.png')}}" alt="">
                                </div>
                                <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula</p>
                                <div class="default-btn-2 slide-btn">
                                    <a class="links links-4" href="#">Shop mens</a>
                                    <a class="links links-4 links-4_2 links-4_3" href="#">Shop all Soccer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Slide Area End Here -->
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Featured Porduct Section -->
            <section class="featured-pro featured-pro-2 pt-95">
                 <div class="container-fluid  pl-40 pr-40">
                     <div class="row">
                         <div class="col-lg-12">
                             <!-- Begin Featured Product Title Area -->
                             <div class="pos-title pos-title-2">
                                 <h2>Sale products</h2>
                                 <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts Separated.</p>
                             </div>
                             <!-- Featured Product Title Area End Here -->
                             <!-- Begin Random Product Content Area -->
                     <div class="row featured-pos-content featured-pos-content-2">
                         <div class="col-lg-12 p-0">
                             <div class="pos-content">
                                 <div class="porduct-details-active owl-carousel">
                                     <!-- Begin Single Random Product Area -->
                                     <?php
                                        use App\Rating;
                                        ?>
                                     @foreach($sale_product as $key => $product)
                                     <div class="single-product single-featured-pro-2">
                                     <?php
                            $colors = $product->product_color;
                            $colors = explode(",",$colors);
                            $sizes = $product->product_size;
                            $sizes = explode(",",$sizes);
                            ?>
                                     <form>
                                     @csrf
                                     <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">

                                    <input type="hidden" id="wishlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                          
                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                            
                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">

                                    <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}}VN??">

                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">

                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                    <input type="hidden" value="{{$colors[0]}}" class="cart_product_color_{{$product->product_id}}">

                                    <input type="hidden" value="{{$sizes[0]}}" class="cart_product_size_{{$product->product_id}}">
                                         <!-- Begin Product Image Area -->
                                         <div style="min-height:337px;max-height:337px" class="product-img">
                                             <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                 <img class="primary-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                                                 <div class="sticker"><span>Sale</span></div>
                                             </a>
                                             <div class="product-action">
                                                         <div class="product-action-inner">
                                                             <div class="cart">
                                                                 <input type="button" value="Add To Cart" class="add-to-cart" href="#" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                                             </div>
                                                         </div>
                                                     </div>
                                         </div>
                                         <!-- Product Image Area End Here -->
                                         </form>
                                         <!-- Begin Product Content Area -->
                                         <div class="product-contents">
                                             <!-- Begin Product Name Area -->
                                             <h5 class="product-name">
                                                 <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}" title="Printed Chiffon Dress">{{$product->product_name}}</a>
                                             </h5>
                                             <!-- Product Name Area End Here -->
                                             <!-- Begin Price Box Area -->
                                             @if($product->product_condition_id == 1)
                                             <div class="price-box">
                                                 <span class="price">{{number_format($product->price_cost,0,',','.').' '.'VN??'}}</span>
                                             </div>
                                             @else
                                             <div class="price-box">
                                                 <span class="price">{{number_format($product->product_price,0,',','.').' '.'VN??'}}</span>
                                                 <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VN??'}}</span>
                                             </div>
                                             @endif
                                             <!-- Price Box Area End Here -->
                                             <?php
                                                $rating2 = Rating::where('product_id',$product->product_id)->where('rating_status',0)->avg('rating');
                                                $rating2 = round($rating2);
                                                ?>
                                                @if($rating2 > 0)
                                                <div class="rating">
                                                <?php
                                                for($x = 1; $x <= $rating2; $x++){
                                                 echo '<i class="fa fa-star"></i>';
                                                }
                                                ?>
                                                </div>
                                                @else
                                                <div class="rating">
                                                <p>Ch??a c?? ????nh gi??</p>
                                                </div>
                                                @endif
                                         </div>
                                         <!-- Product Content Area End Here -->
                                     </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- Random Product Content Area End Here -->
                         </div>
                     </div>
                 </div>
            </section>
            <!-- Featured Porduct Section End Here -->
            <!-- Begin New Product Section -->
            <section class="new-product new-product-2 pb-30">
                 <div class="container-fluid  pl-40 pr-40">
                     <div class="col-lg-12 p-0">
                         <!-- Begin New Product Title Area -->
                         <div class="pos-title pos-title-2">
                             <h2>new arrivals</h2>
                             <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts Separated.</p>
                         </div>
                         <!-- New Product Title Area End Here -->
                         <div class="order-2 order-lg-1">
                            <div class="porduct-details-active owl-carousel">
                                     <!-- Begin Single Random Product Area -->
                                     @foreach($new_product as $key => $product)
                                     <div class="single-product single-featured-pro-2">
                                     <?php
                            $colors = $product->product_color;
                            $colors = explode(",",$colors);
                            $sizes = $product->product_size;
                            $sizes = explode(",",$sizes);
                            ?>
                                     <form>
                                     @csrf
                                     <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">

                                    <input type="hidden" id="wishlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                          
                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                            
                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">

                                    <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}}VN??">

                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">

                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                    <input type="hidden" value="{{$colors[0]}}" class="cart_product_color_{{$product->product_id}}">

                                    <input type="hidden" value="{{$sizes[0]}}" class="cart_product_size_{{$product->product_id}}">
                                         <!-- Begin Product Image Area -->
                                         <div style="min-height:337px;max-height:337px" class="product-img">
                                             <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                 <img class="primary-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                                                 <div class="sticker"><span>New</span></div>
                                             </a>
                                             <div class="product-action">
                                                         <div class="product-action-inner">
                                                             <div class="cart">
                                                                 <input type="button" value="Add To Cart" class="add-to-cart" href="#" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                                             </div>
                                                         </div>
                                                     </div>
                                         </div>
                                         <!-- Product Image Area End Here -->
                                         </form>
                                         <!-- Begin Product Content Area -->
                                         <div class="product-contents">
                                             <!-- Begin Product Name Area -->
                                             <h5 class="product-name">
                                                 <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}" title="Printed Chiffon Dress">{{$product->product_name}}</a>
                                             </h5>
                                             <!-- Product Name Area End Here -->
                                             <!-- Begin Price Box Area -->
                                             @if($product->product_condition_id == 1)
                                             <div class="price-box">
                                                 <span class="price">{{number_format($product->price_cost,0,',','.').' '.'VN??'}}</span>
                                             </div>
                                             @else
                                             <div class="price-box">
                                                 <span class="price">{{number_format($product->product_price,0,',','.').' '.'VN??'}}</span>
                                                 <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VN??'}}</span>
                                             </div>
                                             @endif
                                             <!-- Price Box Area End Here -->
                                             <?php
                                                $rating2 = Rating::where('product_id',$product->product_id)->where('rating_status',0)->avg('rating');
                                                $rating2 = round($rating2);
                                                ?>
                                                @if($rating2 > 0)
                                                <div class="rating">
                                                <?php
                                                for($x = 1; $x <= $rating2; $x++){
                                                 echo '<i class="fa fa-star"></i>';
                                                }
                                                ?>
                                                </div>
                                                @else
                                                <div class="rating">
                                                <p>Ch??a c?? ????nh gi??</p>
                                                </div>
                                                @endif
                                         </div>
                                         <!-- Product Content Area End Here -->
                                     </div>
                                     @endforeach
                                 </div>

                            <div class="banner-static-2">
                                <div class="banner-img">
                                    <div class="banner-box">
                                        <a href="#">
                                            <img src="{{('public/frontend/images/banner/3_2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
            </section>
            <!-- New Product Section End Here -->
            <!-- Begin Random Product Section -->
            <section class="featured-pro random-pro random-pro-reverse pt-30 pb-60">
                 <div class="container-fluid  pl-40 pr-40">
                     <!-- Begin Random Product Title Area -->
                     <div class="pos-title pos-title-2">
                         <h2>Random products</h2>
                     </div>
                     <!-- Random Product Title Area End Here -->
                     <!-- Begin Random Product Content Area -->
                     <div class="row featured-pos-content featured-pos-content-2">
                         <div class="col-lg-12 p-0">
                             <div class="pos-content">
                                 <div class="porduct-details-active owl-carousel">
                                     <!-- Quoc -->
                                     @foreach($all_product as $key => $product)
                                     <div class="single-product single-featured-pro-2">
                                     <form>
                                     @csrf
                                     <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">

                                    <input type="hidden" id="wishlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                          
                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                            
                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">

                                    <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}}VN??">
                                    @if($product->product_condition_id == 1)
                                    <input type="hidden" value="{{$product->price_cost}}" class="cart_product_price_{{$product->product_id}}">
                                    @else
                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                    @endif

                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                         <!-- Begin Product Image Area -->
                                         <div style="min-height:337px;max-height:337px" class="product-img">
                                             <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                 <img class="primary-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                                                 @if($product->product_condition_id == 3)
                                                 <div class="sticker"><span>Sale</span></div>
                                                 @elseif($product->product_condition_id == 2)
                                                 <div class="sticker"><span>New</span></div>
                                                 @endif
                                             </a>
                                             <div class="product-action">
                                                         <div class="product-action-inner">
                                                             <div class="cart">
                                                             <input type="button" value="Add To Cart" class="add-to-cart" href="#" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                                             </div>
                                                         </div>
                                                     </div>
                                         </div>
                                         </form>
                                         <!-- Product Image Area End Here -->
                                         <!-- Begin Product Content Area -->
                                         <div class="product-contents">
                                             <!-- Begin Product Name Area -->
                                             <h5 class="product-name">
                                                 <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}" title="Printed Chiffon Dress">{{$product->product_name}}</a>
                                             </h5>
                                             <!-- Product Name Area End Here -->
                                             <!-- Begin Price Box Area -->
                                             @if($product->product_condition_id == 1)
                                             <div class="price-box">
                                                 <span class="price">{{number_format($product->price_cost,0,',','.').' '.'VN??'}}</span>
                                             </div>
                                             @else
                                             <div class="price-box">
                                                 <span class="price">{{number_format($product->product_price,0,',','.').' '.'VN??'}}</span>
                                                 <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VN??'}}</span>
                                             </div>
                                             @endif
                                             <?php
                                                $rating2 = Rating::where('product_id',$product->product_id)->where('rating_status',0)->avg('rating');
                                                $rating2 = round($rating2);
                                                ?>
                                                @if($rating2 > 0)
                                                <div class="rating">
                                                <?php
                                                for($x = 1; $x <= $rating2; $x++){
                                                 echo '<i class="fa fa-star"></i>';
                                                }
                                                ?>
                                                </div>
                                                @else
                                                <div class="rating">
                                                <p>Ch??a c?? ????nh gi??</p>
                                                </div>
                                                @endif
                                             <!-- Price Box Area End Here -->
                                         </div>
                                         <!-- Product Content Area End Here -->
                                     </div>
                                     @endforeach
                                     <!-- Single Random Product Area End Here -->
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- Random Product Content Area End Here -->
                 </div>
            </section>
            <!-- Random Product Section End Here -->
           <!-- Begin Footer Area -->
            <div class="footer">
                <!-- Begin Footer Full Area -->
                <div class="footer-full">
                    <!-- Begin Footer Static Top Area -->
                    <div class="footer-static-top">
                        <div class="container">
                            <div class="row">
                                <!-- Begin Footer Bolck Area -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="footer-block first-child">
                                        <h4>About Us</h4>
                                        <p class="footer-desc">
                                            H???y ?????n v???i ch??ng t??i , v???i c??u ch??m ng??n "Kh??ch h??ng l?? th?????ng ?????".
                                        </p>
                                        <ul class="footer-contact">
                                            <li class="address add"><i class="fa fa-map-marker"></i>Tr?????ng cao ?????ng c??ng ngh??? Th??? ?????c</li>
                                            <li class="phone add"><i class="fa fa-phone"></i><a href="callto://+123123321345">(0399) 456789</a></li>
                                            <li class="email add"><i class="fa fa-envelope-o"></i><a href="mailto://info@yourdomain.com">shopbangiay@shop.co</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Bolck Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Footer Static Top Area End Here -->
                    <!-- Begin Footer Static Bottom Area -->
                    <div class="footer-static-bottom">
                        <div class="container">
                            <div class="copyright">
                                        <span>Copyright &copy; 2020 <a href="#">DTQ VIETNAM.</a> All rights reserved.</span>
                                    </div>
                        </div>
                    </div>
                    <!-- Footer Static Bottom Area End Here -->
                </div>
                <!-- Footer Full Area End Here -->
            </div>
            <!-- Footer Area End Here -->
            <!-- Begin Modal Area -->
            <div class="modal fade open-modal" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                   </div>
                   <div class="modal-body">
                     <div class="row">
                         <!-- Begin Modal Image Area -->
                         <div class="col-md-5">
                             <!-- Begin Modal Tab Content Area -->
                             <div class="tab-content product-details-large myTabContent">
                               <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                   <!--Single Product Image Start-->
                                   <div class="single-product-img img-full">
                                     <img src="{{('public/frontend/images/single-product/large/1.jpg')}}" alt="">
                                   </div>
                                   <!--Single Product Image End-->
                               </div>
                               <div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
                                   <!--Single Product Image Start-->
                                   <div class="single-product-img img-full">
                                     <img src="{{('public/frontend/images/single-product/large/2.jpg')}}" alt="">
                                   </div>
                                   <!--Single Product Image End-->
                               </div>
                               <div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
                                   <!--Single Product Image Start-->
                                   <div class="single-product-img img-full">
                                     <img src="{{('public/frontend/images/single-product/large/3.jpg')}}" alt="">
                                   </div>
                                   <!--Single Product Image End-->
                               </div>
                               <div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
                                   <!--Single Product Image Start-->
                                   <div class="single-product-img img-full">
                                     <img src="{{('public/frontend/images/single-product/large/4.jpg')}}" alt="">
                                   </div>
                                   <!--Single Product Image End-->
                               </div>
                               <div class="tab-pane fade" id="single-slide5" role="tabpanel" aria-labelledby="single-slide-tab-4">
                                   <!--Single Product Image Start-->
                                   <div class="single-product-img img-full">
                                     <img src="{{('public/frontend/images/single-product/large/5.jpg')}}" alt="">
                                   </div>
                                   <!--Single Product Image End-->
                               </div>
                               <div class="tab-pane fade" id="single-slide6" role="tabpanel" aria-labelledby="single-slide-tab-4">
                                   <!--Single Product Image Start-->
                                   <div class="single-product-img img-full">
                                     <img src="{{('public/frontend/images/single-product/large/6.jpg')}}" alt="">
                                   </div>
                                   <!--Single Product Image End-->
                               </div>
                             </div>
                             <!-- Modal Tab Content Area End Here -->
                             <!-- Begin Modal Tab Menu Area -->
                             <div class="single-product-menu">
                                 <div class="nav single-slide-menu owl-carousel" role="tablist">
                                     <div class="single-tab-menu img-full">
                                         <a class="active" data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="{{('public/frontend/images/single-product/small/1.jpg')}}" alt=""></a>
                                     </div>
                                     <div class="single-tab-menu img-full">
                                         <a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2"><img src="{{('public/frontend/images/single-product/small/2.jpg')}}" alt=""></a>
                                     </div>
                                     <div class="single-tab-menu img-full">
                                         <a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3"><img src="{{('public/frontend/images/single-product/small/3.jpg')}}" alt=""></a>
                                     </div>
                                     <div class="single-tab-menu img-full">
                                         <a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4"><img src="{{('public/frontend/images/single-product/small/4.jpg')}}" alt=""></a>
                                     </div>
                                     <div class="single-tab-menu img-full">
                                         <a data-toggle="tab" id="single-slide-tab-5" href="#single-slide5"><img src="{{('public/frontend/images/single-product/small/5.jpg')}}" alt=""></a>
                                     </div>
                                     <div class="single-tab-menu img-full">
                                         <a data-toggle="tab" id="single-slide-tab-6" href="#single-slide6"><img src="{{('public/frontend/images/single-product/small/6.jpg')}}" alt=""></a>
                                     </div>
                                 </div>
                             </div>
                             <!-- Modal Tab Menu End Here -->
                         </div>
                         <!-- Modal Image Area End Here -->
                         <!-- Begin Modal Content Area -->
                         <div class="col-md-7">
                             <div class="modal-product-info">
                                 <h2>Faded Short Sleeves T-shirt</h2>
                                 <p class="product_reference">
                                     <label>Reference: </label>
                                     <span class="editable" content="demo_1">demo_1</span>
                                 </p>
                                 <p id="product_condition">
                                 <label>Condition: </label>
                                     <span class="editable">New product</span>
                                 </p>
                                 <div class="modal-product-price">
                                    <span class="new-price">$69.00</span>
                                </div>
                                <div class="cart-description">
                                    <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                </div>
                                <div class="quantity">
                                    <input class="input-text qty text" step="1" min="1" max="200" name="quantity" value="1" title="Qty" size="4" type="number">
                                </div>
                                <div class="qty-cart-btn modal-qty-btn">
                                    <a href="#">Add To Cart</a>
                                </div>
                                <ul class="group-modal-btn mt-20">
                                    <li>
                                        <a href="#"><i class="fa fa-envelope"></i>Sent to a friend</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-print"></i>Print</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-heart"></i>Add to wishlist</a>
                                    </li>
                                </ul>
                                <!-- Begin Social Share Area -->
                                 <div class="social-share mt-20">
                                     <h3>Share this product</h3>
                                     <ul class="socil-icon2">
                                          <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                          <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                          <li><a href="#" data-toggle="tooltip" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                          <li><a href="#" data-toggle="tooltip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                          <li><a href="#" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                      </ul>
                                 </div>
                                 <!-- Social Share Area End Here -->
                            </div>
                         </div>
                         <!-- Modal Content Area End Here -->
                     </div>
                   </div>
                 </div>
               </div>
            </div>
            <!-- Modal Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{asset('public/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('public/frontend/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{asset('public/frontend/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('public/frontend/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
        <!-- Nivo Slider js -->
        <script src="{{asset('public/frontend/js/jquery.nivo.slider.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('public/frontend/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('public/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('public/frontend/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('public/frontend/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('public/frontend/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('public/frontend/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{asset('public/frontend/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('public/frontend/js/scrollUp.min.js')}}"></script>
        <!-- SweetAlert -->
        <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
        <!-- Toasty -->
        <script src="{{asset('public/frontend/js/toasty.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){

                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var cart_product_color = $('.cart_product_color_' + id).val();
                var cart_product_size = $('.cart_product_size_' + id).val();
                var _token = $('input[name="_token"]').val();

                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('L??m ??n ?????t nh??? h??n ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_color:cart_product_color,cart_product_size:cart_product_size,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                            swal({
                                    title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                    text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem ti???p",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "??i ?????n gi??? h??ng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });

                        }

                    });
                }

                
            });
        });
    </script>

@if(session()->has('login-gg'))
    <script type="text/javascript">
    $(document).ready(function(){
        var toast = new Toasty({
                transition: "slideLeftRightFade",
                progressBar: true,
            });
    toast.success("{!! session()->get('login-gg') !!}",5000);
    });
    <?php
    Session::forget('login-gg')
    ?>
   </script>
   @endif

    @if(session()->has('notification_logout'))
    <script type="text/javascript">
    $(document).ready(function(){
        var toast = new Toasty({
                transition: "slideLeftRightFade",
                progressBar: true,
            });
    toast.success("????ng xu???t th??nh c??ng",5000);
    });
    <?php
    Session::forget('notification_logout')
    ?>
   </script>
   @endif

    @if(session()->has('notification'))
    <script type="text/javascript">
    $(document).ready(function(){
        var toast = new Toasty({
                transition: "slideUpDownFade",
                progressBar: true,
            });
    toast.success("Ch??o m???ng b???n ?????n v???i shop gi??y c???a ch??ng t??i",5000);
    });
    <?php
    Session::forget('notification')
    ?>
   </script>
   @endif

    @if(session()->has('back'))
    <script type="text/javascript">
    $(document).ready(function(){
        var toast = new Toasty({
                transition: "slideLeftRightFade",
                progressBar: true,
            });
    toast.success("Ch??o m???ng b???n tr??? l???i",5000);
    });
    <?php
    Session::forget('back')
    ?>
   </script>
   @endif
    </body>

<!-- Mirrored from demo.devitems.com/raavin-v3/raavin/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 15:11:29 GMT -->
</html>
