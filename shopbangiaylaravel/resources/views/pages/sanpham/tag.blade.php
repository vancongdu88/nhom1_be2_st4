@extends('layout')
@section('content')
            <div class="shop-topbar-area shop-topbar-area-reverse pt-100 pb-100">
                <div class="container">
            <h3>Tag tìm kiếm <span style="text-transform:none;">"{{$tag}}"</span></h3>
                    <div class="row">
                        <div class="col-lg-12 order-1 order-lg-2">
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
                                            @foreach($pro_tag as $key => $product)
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
                                                                <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VNĐ'}}</span>
                                                                <span class="price">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
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
                                        @foreach($pro_tag as $key => $product)
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
                            <!-- Pagination Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
@endsection