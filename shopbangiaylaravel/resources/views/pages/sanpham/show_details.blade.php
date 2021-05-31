@extends('layout')
@section('content')
@foreach($product_details as $key => $value)

<div class="product-details pt-100">
    <div class="container">
        <!-- note -->
        <div class="row">
            <!-- Begin Modal Image Area -->
            <div class="col-lg-5 col-md-5">
                <!-- Begin Product Details Left Area -->
                <div class="product-details-right">
                    <!-- Begin Modal Tab Content Area -->
                    @foreach($gallery as $key => $gal)
                    <div class="tab-content product-details-tab product-details-large" id="myTabContent">
                        <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                            <!--Single Product Image Start-->
                            <div class="single-product-img img-full">
                            <!-- node -->
                                <img src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" alt="{{$gal->gallery_name}}">
                                <a class="popup-img venobox vbox-item" href="images/single-product/large/1.jpg" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                            </div>
                            <!--Single Product Image End-->
                        </div>
                    </div>
                    @endforeach	
                    <!-- Modal Tab Content Area End Here -->
                    <!-- Begin Modal Tab Menu Area -->
                    <div class="single-product-menu">
                        <div class="nav single-slide-menu owl-carousel" role="tablist">
                        @foreach($gallery as $key => $gal)
                            <div class="single-tab-menu img-full">
                                <a class="active" data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" alt="{{$gal->gallery_name}}"></a>
                            </div>
                        @endforeach	    
                        </div>
                    </div>
                    <!-- Modal Tab Menu End Here -->
                </div>
                <!-- Product Details Left Area End Here -->
            </div>
            <!-- Modal Image Area End Here -->
            <!-- Begin Product Details Right -->
            <div class="col-lg-7 col-md-7">
                <div class="product-details-right">
                    <!-- Begin Product Details Nav Area -->
                    <div class="product-nav">
                        <ul class="next-prev">
                            <li class="prev">
                                <a href="product-details.html" rel="prev"><i class="fa fa-angle-left"></i></a>
                            </li>
                            <li class="next">
                                <a href="product-details-reverse.html" rel="next"><i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Product Details Nav Area End Here -->
                    <!-- Begin Product Content Area -->
                    <div class="product-details-contents">
                        <!-- Begin Product Name Area -->
                        <h5 class="product-details-name">
                            <a href="#" title="Ornare sed consequat">{{$value->product_name}}</a>
                        </h5>
                        <!-- Product Name Area End Here -->
                        <!-- Begin Rating Area -->
                        <div class="rating-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <!-- Rating Area End Here -->
                        <!-- Begin Review Area -->
                        <div class="review">
                            <a href="#">(2 customer reviews)</a>
                        </div>
                        <!-- Review Area End Here -->
                        <!-- Begin Price Box Area -->
                        <div class="price-box-2">
                            <span class="price">{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
                        </div>
                        <!-- Price Box Area End Here -->
                        <p class="short-desc">{{$value->category_desc}}</p>
                        <p class="stock">{{$value->product_quantity}} in stock</p>
                        <form class="pro-details-cart" action="#" method="post">
                            <div class="quantity">
                                <input class="input-text qty text" step="1" min="1" max="200" name="quantity" value="1" title="Qty" size="4" type="number">
                            </div>
                            <div class="qty-cart-btn">
                                <a href="#">Add To Cart</a>
                            </div>
                            <div class="group-btn">
                                <div class="qty-cart-btn qty-cart-btn-2">
                                    <a href="#"><i class="fa fa-heart-o"></i>Add To Wishlist</a>
                                </div>
                                <div class="qty-cart-btn qty-cart-btn-2">
                                    <a href="#"><i class="fa fa-refresh"></i>Add To Compare</a>
                                </div>
                            </div>
                            <div class="product-meta">
                                <p>
                                    Categories:
                                    <a href="#">{{$value->meta_keywords}}</a>

                                </p>
                            </div>
                            <div class="single-product-sharing">
                                <h3>Share this product :</h3>
                                <ul class="social-icon">
                                    <li class="facebook">
                                        <a class="_blank" data-toggle="tooltip" href="https://www.facebook.com/" title="Facebook" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twetter">
                                        <a class="_blank" data-toggle="tooltip" href="https://www.twitter.com/" title="Twetter" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="rss">
                                        <a class="_blank" data-toggle="tooltip" href="https://www.rss.com/" title="RSS" target="_blank">
                                            <i class="fa fa-rss"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a class="_blank" data-toggle="tooltip" href="https://www.youtube.com/" title="Youtube" target="_blank">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a class="_blank" data-toggle="tooltip" href="https://www.plus.google.com/discover" title="Google Plus" target="_blank">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <!-- Product Content Area End Here -->
                </div>
            </div>
            <!-- Product Details Right End Here -->
        </div>
    </div>
</div>
            <!-- Product Details Area End Here -->
            <!-- Begin Vertical Tab Area -->
<div class="vertical-tab-area">
    <div class="container">
        <div class="vertical-tab-item">
            <div class="row no-gutters">
                <div class="col-lg-3">
                    <ul class="nav vertical-product-tabs">
                        <li class="desc-tab active"><a data-toggle="tab" href="#description">Description</a></li>
                        <li class="review-tab"><a data-toggle="tab" href="#riview">Review (2)</a></li>
                    </ul>
                </div>
                <!-- Begin Vertical Tab Content Area -->
                <div class="col-lg-9">
                    <div class="tab-content vertical-tab-desc">
                        <div id="description" class="tab-pane show fade in active">
                        <p>{{$value->product_content}}
                        </p>
                        <p>{{$value->product_desc}}
                        </p>
                        </div>
                        <div id="riview" class="tab-pane fade">
                        <!-- Begin Reviws Area -->
                        <div class="reviews">
                            <div class="comments">
                                <h2>2 reviews for Ornare sed consequat</h2>
                                <div class="comment-list">
                                    <div class="user-img">
                                        <img src="images/product-details/user.png" alt="">
                                    </div>
                                    <div class="user-details">
                                        <p class="user-info"><span>User -</span>March 23, 2015: </p>
                                        <div class="rating user-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span class="user-comment">Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</span>
                                    </div>
                                <div class="comment-list comment-list-2">
                                    <div class="user-img">
                                        <img src="images/product-details/admin.png" alt="">
                                    </div>
                                    <div class="user-details">
                                        <p class="user-info"><span>Admin -</span>March 23, 2015: </p>
                                        <div class="rating user-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span class="user-comment admin-comment">Thank You.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Reviws Area End Here -->
                        <!-- Begin Feedback Area -->
                        <div class="feedback-area">
                            <div class="feedback">
                                <h3 class="feedback-title">Our Feedback</h3>
                                <form action="#">
                                    <p class="your-opinion">
                                        <label>Your Rating</label>
                                        <span>
                                            <select class="star-rating">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </span>
                                    </p>
                                    <p class="feedback-form">
                                        <label for="feedback">Your Review</label>
                                        <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                    </p>
                                    <div class="feedback-input">
                                        <p class="feedback-form-author">
                                            <label for="author">Name<span class="required">*</span>
                                            </label>
                                            <input id="author" name="author" value="" size="30" aria-required="true" type="text">
                                        </p>
                                        <p class="feedback-form-author feedback-form-email">
                                            <label for="email">Email<span class="required">*</span>
                                            </label>
                                            <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                        </p>
                                        <div class="qty-cart-btn feedback-btn">
                                            <a href="#">Submit</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Feedback Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Vertical Tab Content Area End Here -->
            </div>
        </div>
    </div>
</div>
@endforeach
            <!-- Vertical Tab Area End Here -->
            <!-- Begin Upsells Product Section -->
<section class="new-product featured-pro-3 upsells-product pt-80 pb-50">
    <div class="container">
        <!-- Begin Featured Product Title Area -->
        <div class="pos-title pos-title-2">
            <h2>Upsells Products</h2>
        </div>
        <!-- Featured Product Title Area End Here -->
        <!-- Begin Featured Product Content Area -->
        <div class="row">
            <div class="col-lg-12">
                <div class="pos-content">
                    <div class="new-product-active owl-carousel">
                        <!-- Begin Single Product Area -->
                        @foreach($product_details as $key => $value1)
                        <div class="product-slide-item">
                            <div class="single-product">
                                <!-- Begin Product Image Area -->
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-img" src="{{asset('public/uploads/product/'.$value1->product_image)}}" alt="{{$value1->product_image}}">
                                    </a>
                                    <div class="sticker"><span>New</span></div>
                                    <!-- Begin Product Action Area -->
                                    <div class="product-action">
                                        <div class="product-action-inner">
                                            <div class="cart">
                                                <a href="#">
                                                    <span>Add To Cart</span>
                                                </a>
                                            </div>
                                            <ul class="add-to-links">
                                                <li  class="rav-wishlist"><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
                                                <li class="rav-compare"><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                <li class="rav-quickviewbtn">
                                                    <a href=".open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-eye"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Product Action Area End Here -->
                                </div>
                                <!-- Product Image Area End Here -->
                                <!-- Begin Product Content Area -->
                                <div class="product-contents">
                                    <!-- Begin Product Name Area -->
                                    <h5 class="product-name">
                                        <a href="#" title="Printed Chiffon Dress">Printed Chiffon Dress</a>
                                    </h5>
                                    <!-- Product Name Area End Here -->
                                    <!-- Begin Price Box Area -->
                                    <div class="price-box">
                                        <span class="price">$16.40</span>
                                        <span class="old-price">$20.50</span>
                                    </div>
                                    <!-- Price Box Area End Here -->
                                    <!-- Begin Rating Area -->
                                    <div class="rating pro-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <!-- Rating Area End Here -->
                                </div>
                                <!-- Product Content Area End Here -->
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Product Area End Here -->
                        <!-- Begin Single Product Area -->
                        <!-- Single Product Area End Here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Product Content Area End Here -->
    </div>
</section>
            <!-- Upsells Product Section End Here -->
            <!-- Begin Related Product Section -->
<section class="new-product featured-pro-3 related-product related-product-2 pt-45 pb-80">
    <div class="container">
        <!-- Begin Featured Product Title Area -->
        <div class="pos-title pos-title-2">
            <h2>Related Products</h2>
        </div>
        <!-- Featured Product Title Area End Here -->
        <!-- Begin Featured Product Content Area -->
        <div class="row">
            <!-- Begin Single Related Product Area -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-product">
                @foreach($product_details as $key => $value1)
                    <!-- Begin Featured Product Image Area -->
                    <div class="product-img">
                        <a href="#">
                        <img class="primary-img" src="{{asset('public/uploads/product/'.$value1->product_image)}}" alt="{{$value1->product_image}}">
                        </a>
                        <div class="sticker"><span>Sale</span></div>
                        <!-- Begin Product Action Area -->
                        <div class="product-action">
                            <div class="product-action-inner">
                                <div class="cart">
                                    <a href="#">
                                        <span>Add To Cart</span>
                                    </a>
                                </div>
                                <ul class="add-to-links">
                                    <li  class="rav-wishlist"><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li class="rav-compare"><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                    <li class="rav-quickviewbtn">
                                        <a href=".open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product Action Area End Here -->
                    </div>
                    <!-- Featured Product Image Area End Here -->
                    <!-- Begin Featured Product Content Area -->
                    <div class="product-contents">
                        <!-- Begin Featured Product Name Area -->
                        <h5 class="product-name">
                            <a href="#" title="Printed Chiffon Dress">Printed Chiffon Dress</a>
                        </h5>
                        <!-- Featured Product Name Area End Here -->
                        <!-- Begin Price Box Area -->
                        <div class="price-box">
                            <span class="price">{{number_format($value1->product_price,0,',','.').'VNĐ'}}</span>
                            <span class="old-price">{{number_format($value1->price_cost,0,',','.').'VNĐ'}}</span>
                        </div>
                        <!-- Price Box Area End Here -->
                        <!-- Begin Rating Area -->
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <!-- Rating Area End Here -->
                    </div>
                    <!-- Featured Product Content Area End Here -->
                    @endforeach    
                </div>
            
            </div>
            <!-- Single Related Product Area End Here -->
        </div>
        <!-- Featured Product Content Area End Here -->
    </div>
</section>
@endsection