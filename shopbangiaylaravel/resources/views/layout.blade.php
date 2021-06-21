<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from demo.devitems.com/raavin-v3/raavin/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 15:10:26 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$meta_title}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/images/favicon.png')}}">
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
        <!-- Toast -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/toast.min.css')}}">
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

        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <style>
        .bg-3 {
    background-image: url(public/frontend/images/slider/8.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    width: 100%;
}
.bg-4 {
    background-image: url(public/frontend/images/slider/4.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    width: 100%;
}
.static-info::before,
.featured-pro .featured-pos-content::before,
.new-product-3 .tab-content:before,
.vertical-tab-item:before {
	content: url('{{asset('public/frontend/images/static-info/bg_shadow.png')}}');
	height: 22px;
	left: 50%;
	position: absolute;
	top: 100%;
	transform: translateX(-50%);
	width: 390px;
}
    </style>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div id="preloader">
        </div>
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Main Header Area -->
                <div class="main-header stick header-sticky">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Logo Area -->
                            <div class="col-lg-2 col-md-3 col-2">
                            <div class="logo logo-2">
                                <a href="{{URL::to('/')}}">
                                    <img src="{{asset('public/frontend/images/menu/logo/3.png')}}" alt="">
                                </a>
                            </div>
                            </div>
                            <!-- Logo Area End Here -->
                            <!-- Begin Main Menu Area -->
                            <div class="col-lg-6 d-none d-lg-block d-xl-block">
                                <div class="main-menu">
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
                                            <li><a href="{{URL::to('/lien-he')}}">Contact Us</a></li>
                                            <li><a href="{{URL::to('/yeu-thich')}}">Wishlist</a></li>
                                                <!-- end -->
                                         </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Main Menu Area End Here -->
                            <!-- Begin Header Right Area -->
                            <div class="col-lg-4 col-md-9 col-10">
                                <div class="header-right">
                                    <!-- Begin Mini Cart Area -->
                                    <div class="main-menu primary-menu">
                                        <nav>
                                            <ul>
                                            @php $dem_hang = 0; @endphp
        @if(Session::get('cart'))
        @php
            $dem_hang = count(Session::get('cart'));
        @endphp
        @endif
                                                <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-bag"></i>Cart <span>({{$dem_hang}})</span></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Mini Cart Area End Here -->
                                    <!-- Begin Header Search Area -->
                                    <div class="main-menu primary-menu">
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
                                    <div class="main-menu primary-menu">
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
                                                        <ul>
                                                            <li><a href="product-details.html">Product Details</a></li>
                                                            <li><a href="product-details-reverse.html">Product Details Reverse</a></li>
                                                            <li><a href="product-details-2.html">Product Details-2</a></li>
                                                            <li><a href="product-details-2-reverse.html">Product Details 2 Reverse</a></li>
                                                        </ul>
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
            <!-- Begin Page Banner Area -->
            <div class="page-banner">
                <div class="container">
                    <div class="page-banner-content">
                        <ul>
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            @isset($bread_crumb)
                            <li>{{$bread_crumb}}</li>
                            @endisset
                            <li class="active"><a href="@isset($url_canonical)
                            {{$url_canonical}}
                            @else
                            #
                            @endisset">{{$meta_title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Page Banner Area End Here -->
            <!--Login Register Area Strat-->
            @yield('content')
            <!--Login Register Area End-->
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
                                            Hảy đến với chúng tôi , với câu châm ngôn "Khách hàng là thượng đế".
                                        </p>
                                        <ul class="footer-contact">
                                            <li class="address add"><i class="fa fa-map-marker"></i>Trường cao đẳng công nghệ Thủ Đức</li>
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
        <!-- Simple money -->
        <script src="{{asset('public/frontend/js/simple.money.format.js')}}"></script>
        <!-- SweetAlert -->
        <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
        <!-- Toast js -->
        <script src="{{asset('public/frontend/js/toast.min.js')}}"></script>
        <!-- Toasty -->
        <script src="{{asset('public/frontend/js/toasty.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('public/frontend/js/main.js')}}"></script>

        <script type="text/javascript">
        var loader = document.getElementById('preloader');
        window.addEventListener("load",function(){
            loader.style.display = "none";
        })
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
    });  
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        
        load_comment();

        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/load-comment')}}",
              method:"POST",
              data:{product_id:product_id, _token:_token},
              success:function(data){
              
                $('#comment_show').html(data);
              }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var comment_user_id = $('.comment_user_id').val();
            var star_rating = $('.star-rating').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/send-comment')}}",
              method:"POST",
              data:{product_id:product_id,comment_name:comment_name,comment_user_id:comment_user_id,star_rating:star_rating,comment_content:comment_content, _token:_token},
              success:function(data){
                $('.feedback').css('display','none');
                $('#notify_comment').html('<p class="text text-success">Cảm ơn bạn đã đánh giá, bình luận đang chờ duyệt</p>');
                load_comment();
                $('#notify_comment').fadeOut(5000);
                $('.comment_name').val('');
                $('.comment_content').val('');
              }
            });
        });
    });
</script>
    <script type="text/javascript">

    function checkforblank() {

        var x = document.getElementsByClassName("location");
        var i;
        var index = 0;
        for (i = 0; i < x.length; i++) {
            if(x[i].value == ""){
                x[i].classList.add("error");
                index++;
            }
            else{
                x[i].classList.remove("error");
            }
        }
        if(index > 0){
            var toast = new Toasty({
                transition: "slideLeftRightFade",
                progressBar: true,
            });
    toast.error("Bạn không thể để trống những trường này",5000);
            return false
        }
    return true;
}

function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
function validateNumber(number) {
  const re = /^[0-9]+$/;
  return re.test(number);
}

function validate() {
  const $danger = $(".alert-danger");
  const $success = $(".alert-success");
  const email =  document.forms["form-re"]["customer_email"].value;
  const number =  document.forms["form-re"]["customer_phone"].value;
  const $notify = $(".notify-re");
  $success.removeClass("alert");
  $success.text("");
  $danger.removeClass("alert");
  $danger.text("");
  if (!validateEmail(email) || !validateNumber(number)) {
    $notify.css('display','none');
    var toast = new Toasty({
                transition: "slideLeftRightFade",
                progressBar: true,
            });
    toast.error("Email hoặc số điện thoại của bạn không đúng",5000);
    $('input[name="customer_email"]').addClass("error");
    $('input[name="customer_phone"]').addClass("error");
    /* $danger.addClass("alert");
    $danger.text('Email hoặc số điện thoại của bạn không đúng'); */
    return false;
  }
   else {
    $notify.css('display','none');
    /* $success.addClass("alert");
    $success.text('Mọi thứ đều ổn bạn vui lòng đợi kết quả trong giây lát'); */
    <?php
    sleep(2);
    ?>
    return true;
  }
  
}
    </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload(); 
                    }
                    });
                } 
        });
    });
    </script>
    <script type="text/javascript">

$(document).ready(function(){
  $('.send_order').click(function(){
var total_after = $('.total_after').val();
var loader = document.getElementById('preloader');
if(checkforblank() && validate()){
      swal({
        title: "Xác nhận đơn hàng",
        text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Cảm ơn, Mua hàng",

          cancelButtonText: "Đóng,chưa mua",
          closeOnConfirm: false,
          closeOnCancel: false
      },
      function(isConfirm){
           if (isConfirm) {
              var shipping_email = $('.shipping_email').val();
              var shipping_name = $('.shipping_name').val();
              var shipping_address = $('.shipping_address').val();
              var shipping_phone = $('.shipping_phone').val();
              var shipping_notes = $('.shipping_notes').val();
              var shipping_method = $('.payment_select').val();
            
              var order_fee = $('.order_fee').val();
              var order_coupon = $('.order_coupon').val();
              var _token = $('input[name="_token"]').val();

              $.ajax({
                  url: '{{url('/confirm-order')}}',
                  method: 'POST',
                  data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                  beforeSend: function(){
                    loader.style.display = "block";
                        },
                  success:function(){
                    loader.style.display = "none";
                     swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                     window.setTimeout(function(){ 
                     location.reload();
                     } ,3000);
                  }
              });

            } else {
              swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

            }
    
      });
    }

     
  });
});


</script>

<script type="text/javascript">
        $(document).ready(function(){
            var toast = new Toasty({
                transition: "slideLeftRightFade",
                progressBar: true,
            });
            function checkforblank() {

var x = document.getElementsByClassName("location");
var i;
var index = 0;
for (i = 0; i < x.length; i++) {
    if(x[i].value == ""){
        x[i].classList.add("error");
        index++;
    }
    else{
        x[i].classList.remove("error");
    }
}
if(index > 0){
    return true;
}
return false;
}
            $('.add-cart').click(function(){
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
                    toast.warning('Làm ơn đặt nhỏ hơn ' + cart_product_quantity,3000);
                }
                else if(checkforblank()){
                    toast.error("Bạn chưa chọn màu và size",3000);
                }
                
                else{
                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_color:cart_product_color,cart_product_size:cart_product_size,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
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

    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart2').click(function(){
                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_relate_id_' + id).val();
                var cart_product_name = $('.cart_product_relate_name_' + id).val();
                var cart_product_image = $('.cart_product_relate_image_' + id).val();
                var cart_product_quantity = $('.cart_product_relate_quantity_' + id).val();
                var cart_product_price = $('.cart_product_relate_price_' + id).val();
                var cart_product_qty = $('.cart_product_relate_qty_' + id).val();
                var cart_product_color = $('.cart_product_relate_color_' + id).val();
                var cart_product_size = $('.cart_product_relate_size_' + id).val();
                var _token = $('input[name="_token"]').val();
                
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                }
                
                else{
                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_color:cart_product_color,cart_product_size:cart_product_size,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
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
    <!-- Wishlist Quốc -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $('.add-to-wishlist').click(function(){
                var id = $(this).data('id_product');
                var wishlist = $('.cart_product_wishlist_' + id).val();
                if (wishlist == 1) {
                    $.ajax({
                        url: '{{url('/add-wishlist')}}',
                        method: 'POST',
                        data:{
                            wishlist: 0,
                        },
                        success:function(response){
                            console.log(response);
                            swal({
                                    title: "Đã thêm vào sản phẩm yêu thích",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới trang yêu thích",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến yêu thích",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/yeu-thich')}}";
                                });
                        }

                    });
                } else {
                    $.ajax({
                        url: '{{url('/add-wishlist')}}',
                        method: 'POST',
                        data:{
                            wishlist: 1,
                        },
                        success:function(){
                            swal({
                                    title: "Đã thêm sản phẩm vào sản phẩm yêu thích",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới trang yêu thích",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến yêu thích",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/yeu-thich')}}";
                                });
                        }

                    });
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){

           $( "#slider-range" ).slider({
              orientation: "horizontal",
              range: true,

              min:{{$min_price_range}},
              max:{{$max_price_range}},

              steps:10000,
              values: [ {{$min_price}}, {{$max_price}} ],
             
              slide: function( event, ui ) {
                $( "#amount_start" ).val(ui.values[ 0 ]).simpleMoneyFormat();
                $( "#amount_end" ).val(ui.values[ 1 ]).simpleMoneyFormat();


                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);

              }

            });

            $( "#amount_start" ).val($( "#slider-range" ).slider("values",0)).simpleMoneyFormat();
            $( "#amount_end" ).val($( "#slider-range" ).slider("values",1)).simpleMoneyFormat();

        }); 
</script>
    </body>

<!-- Mirrored from demo.devitems.com/raavin-v3/raavin/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 15:11:29 GMT -->
</html>
