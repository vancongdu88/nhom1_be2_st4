@extends('layout')
@section('content')
<div class="shop-topbar-area shop-topbar-area-reverse pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 order-2 order-lg-1">
                            <div class="shop-sidebar shop-sidebar-reverse">
                                <!-- Shop Sidebar Area -->
                                <div class="category">
                                    <h4>Categories</h4>
                                    <!-- Begin Category List Area -->
                                    <div class="category-list">
                                        @foreach($brand_name as $key => $name)
                                        <ul>
                                            <li><a href="#">{{$name->brand_name}}</a></li>
                                        </ul>
                                        @endforeach
                                    </div>
                                    <!-- Category List Area End Here -->
                                </div>
                                <!-- Shop Sidebar Area End-->
                                <!-- Shop Sidebar Area -->
                                <div class="category mt-30">
                                    <h4>Color</h4>
                                    <!-- Begin Category List Area -->
                                    <div class="category-list">
                                        @foreach($brand_name as $key => $name)
                                        <ul>
                                            <li><a href="#">{{$name->color}}</a></li>
                                        </ul>
                                        @endforeach
                                    </div>
                                    <!-- Category List Area End Here -->
                                </div>
                                <!-- Shop Sidebar Area End-->
                                <!-- Shop Sidebar Area -->
                                <div class="category mt-30">
                                    <h4>Filter</h4>
                                    <div class="price-filter">
                                        <div id="slider-range"></div>
                                        <div class="price-slider-amount">
                                            <div class="label-input">
                                                <label>price : </label>
                                                <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                            </div>
                                            <button type="button">Filter</button> 
                                        </div>
                                    </div>
                                </div>
                                <!-- Shop Sidebar Area End-->
                            </div>
                            <!-- Begin Sidebar Compare Area -->
                            <div class="sidebar-compare sidebar-compare-reverse">
                                <h3 class="widget-title-2">
                                    <span>Compare</span>
                                </h3>
                                <ul>
                                    <li>No products to compare</li>
                                </ul>
                            </div>
                            <!-- Sidebar Compare Area End Here -->
                            <!-- Begin Sidebar Compare Area -->
                            <div class="sidebar-compare top-rated top-rated-reverse">
                                <h3 class="widget-title-2">
                                    <span>Top Rated Products</span>
                                </h3>
                                <ul>
                                    <li>
                                        <div class="top-rated-img">
                                            <a href="#">
                                                <img src="images/top-rated-pro/1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="top-rated-info">
                                            <a href="#" title="Natus erro">
                                                <span>Natus erro</span>
                                            </a>
                                            <!-- Begin Rating Area -->
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!-- Rating Area End Here -->
                                            <div class="price-box price-box-3">
                                                <span class="price">$16.40</span>
                                                <span class="old-price">$20.50</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="top-rated-img">
                                            <a href="#">
                                                <img src="images/top-rated-pro/2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="top-rated-info">
                                            <a href="#" title="Natus erro">
                                                <span>Natus erro</span>
                                            </a>
                                            <!-- Begin Rating Area -->
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!-- Rating Area End Here -->
                                            <div class="price-box price-box-3">
                                                <span class="price">$16.40</span>
                                                <span class="old-price">$20.50</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Sidebar Compare Area End Here -->
                            <!-- Begin Banner Static 2 Area -->
                            <div class="banner-static-2 top-rated-banner top-rated-banner-reverse">
                                <div class="banner-img">
                                    <div class="banner-box shop-banner-box">
                                        <a href="#">
                                            <img src="images/banner/2_3.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Banner Static 2 Area End Here -->
                            <!-- Begin Widge Tags Area -->
                            <div class="widge widge-tags top-rated-tags top-rated-tags-reverse">
                                <div class="widge-title">
                                    <span>Tags</span>
                                </div>
                                <div class="widge-list widge-tag-list">
                                    <ul>
                                        <li>
                                            <a href="#">Fashion</a>
                                        </li>
                                        <li>
                                            <a href="#">Food</a>
                                        </li>
                                        <li>
                                            <a href="#">Holidays</a>
                                        </li>
                                        <li>
                                            <a href="#">Light</a>
                                        </li>
                                        <li>
                                            <a href="#">Travel</a>
                                        </li>
                                        <li>
                                            <a href="#">Video-2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Widge Tags End Here -->
                        </div>
                        <div class="col-lg-9 order-1 order-lg-2">
                            <div class="shop-topbar-wrapper shop-list-topbar-wrapper">
                                <!-- Begin Grid List Area -->
                                <div class="grid-list">
                                    <ul class="nav">
                                        <li>
                                            <a class="active show" data-toggle="tab" href="#grid" title="Grid">
                                                <i class="fa fa-th-large"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#list" title="List">
                                                <i class="fa fa-th-list"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- Toolbar Short Area End Here -->
                            </div>
                            <div class="shop-product">
                                <!-- Begin Tab Menu Content Area -->
                                <div class="tab-content">
                                    <div id="grid" class="tab-pane show fade in active">
                                        <div class="grid-view">
                                            <div class="row">
                                                @foreach($brand_by_id as $key => $product)
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <!-- Begin Single Product Area -->
                                                    <div class="single-product single-product-3">
                                                        <!-- Begin Product Image Area -->
                                                        <div class="product-img">
                                                            <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                                <img class="primary-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                                                            </a>
                                                            <div class="sticker"><span>New</span></div>
                                                            <!-- Begin Product Action Area -->
                                                            <div class="product-action">
                                                                <div class="product-action-inner">
                                                                    <div class="cart">
                                                                        <a href="shopping-cart.html">
                                                                            <span>Add To Cart</span>
                                                                        </a>
                                                                    </div>
                                                                    <ul class="add-to-links">
                                                                        <li  class="rav-wishlist"><a href="wishlist.html" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
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
                                                                <a href="product-details.html" title="Printed Chiffon Dress">{{$product->product_name}}</a>
                                                            </h5>
                                                            <!-- Product Name Area End Here -->
                                                            <!-- Begin Price Box Area -->
                                                            <div class="price-box">
                                                                <span class="price">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                                <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VNĐ'}}</span>
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
                                                        <!-- Product Content Area End Here -->
                                                    </div>
                                                    <!-- Single Product Area End Here -->
                                                </div>
                                                @endforeach
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div id="list" class="tab-pane fade">
                                        <div class="list-view">
                                            @foreach($brand_by_id as $key => $product)
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <!-- Begin Product Image Area -->
                                                    <div class="product-img pro-list-item pro-list-sidebar-items">
                                                        <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                            <img class="primary-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image Area End Here -->
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <!-- Begin Product List Content Area -->
                                                    <div class="pro-list-content">
                                                        <!-- Begin Product Name Area -->
                                                        <h5 class="product-name">
                                                            <a href="product-details.html" title="Printed Chiffon Dress">{{$product->product_name}}</a>
                                                        </h5>
                                                        <!-- Product Name Area End Here -->
                                                        <!-- Begin List Rating Area -->
                                                        <div class="rating list-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <!-- List Rating Area End Here -->
                                                        <!-- Begin Price list Box Area -->
                                                        <div class="price-box list-price-box">
                                                            <span class="price">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                            <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VNĐ'}}</span>
                                                        </div>
                                                        <!-- Price List Box Area End Here -->
                                                        <!-- Begin List Text -->
                                                        <div class="list-text">
                                                            <p>{{$product->product_content}}</p>
                                                        </div>
                                                        <!-- List Text End Here -->
                                                        <!-- Begin Product Action Area -->
                                                        <div class="product-action product-action-2">
                                                            <div class="product-action-inner">
                                                                <div class="cart">
                                                                    <a href="shopping-cart.html">
                                                                        <span>Add To Cart</span>
                                                                    </a>
                                                                </div>
                                                                <ul class="add-to-links">
                                                                    <li  class="rav-wishlist"><a href="wishlist.html" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
                                                                    <li class="rav-compare"><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                                    <li class="rav-quickviewbtn">
                                                                        <a href=".open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-eye"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Product Action Area End Here -->
                                                    </div>
                                                    <!-- Product List Content Area End Here -->
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab Menu Content Area End Here -->
                            </div>
                            <!-- Begin Pagination Area -->
                            <div class="pagination-area pagination-area-reverse">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 p-0">
                                            <div class="product-pagination">
                                                <ul>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination Area End Here -->
                        </div>
                    </div>
                </div>
            </div>

@endsection