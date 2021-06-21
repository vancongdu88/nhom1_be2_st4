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
                                        <?php
                                              use App\Rating;
                                              ?>
                                            <div class="row">
                                            @foreach($pro_tag as $key => $product)
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <!-- Begin Single Product Area -->
                                                    <?php
                                                $colors = $product->product_color;
                                                $colors = explode(",",$colors);
                                                $sizes = $product->product_size;
                                                $sizes = explode(",",$sizes);
                                                ?>
                                                    <div class="single-product single-product-3">
                                                    <form>
                                                   @csrf
                                                   <input type="hidden" value="{{$product->product_id}}" class="cart_product_relate_id_{{$product->product_id}}">

                                                    <input type="hidden" id="wishlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_relate_name_{{$product->product_id}}">
                                          
                                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_relate_quantity_{{$product->product_id}}">
                                            
                                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_relate_image_{{$product->product_id}}">

                                                    <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}}VNĐ">

                                                    @if($product->product_condition_id == 1)
                                    <input type="hidden" value="{{$product->price_cost}}" class="cart_product_price_{{$product->product_id}}">
                                    @else
                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                    @endif

                                                    <input type="hidden" value="1" class="cart_product_relate_qty_{{$product->product_id}}">

                                                    <input type="hidden" value="{{$colors[0]}}" class="cart_product_relate_color_{{$product->product_id}}">

                                                    <input type="hidden" value="{{$sizes[0]}}" class="cart_product_relate_size_{{$product->product_id}}">
                                                        <!-- Begin Product Image Area -->
                                                        <div style="min-height:350px;max-height:350px" class="product-img">
                                                            <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                                <img class="primary-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                                                            </a>
                                                            @if($product->product_condition_id == 3)
                                                 <div class="sticker"><span>Sale</span></div>
                                                 @elseif($product->product_condition_id == 2)
                                                 <div class="sticker"><span>New</span></div>
                                                 @endif
                                                            <!-- Begin Product Action Area -->
                                                            <div class="product-action">
                                                                <div class="product-action-inner">
                                                                <div class="cart">
                                                              <input type="button" value="Add To Cart" class="add-to-cart2" href="#" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                                              </div>
                                                                </div>
                                                            </div>
                                                            </form>
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
                                                            @if($product->product_condition_id == 1)
                                             <div class="price-box">
                                                 <span class="price">{{number_format($product->price_cost,0,',','.').' '.'VNĐ'}}</span>
                                             </div>
                                             @else
                                             <div class="price-box">
                                                 <span class="price">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                 <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VNĐ'}}</span>
                                             </div>
                                             @endif
                                                            <!-- Price Box Area End Here -->
                                                            <!-- Begin Rating Area -->
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
                                                           <p>Chưa có đánh giá</p>
                                                           </div>
                                                           @endif
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
                                            <?php
                                                $colors = $product->product_color;
                                                $colors = explode(",",$colors);
                                                $sizes = $product->product_size;
                                                $sizes = explode(",",$sizes);
                                                ?>
                                                <div class="col-lg-4 col-md-4">
                                                <form>
                                                   @csrf
                                                   <input type="hidden" value="{{$product->product_id}}" class="cart_product_relate_id_{{$product->product_id}}">

                                                    <input type="hidden" id="wishlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_relate_name_{{$product->product_id}}">
                                          
                                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_relate_quantity_{{$product->product_id}}">
                                            
                                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_relate_image_{{$product->product_id}}">

                                                    <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}}VNĐ">

                                                    @if($product->product_condition_id == 1)
                                    <input type="hidden" value="{{$product->price_cost}}" class="cart_product_price_{{$product->product_id}}">
                                    @else
                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                    @endif

                                                    <input type="hidden" value="1" class="cart_product_relate_qty_{{$product->product_id}}">

                                                    <input type="hidden" value="{{$colors[0]}}" class="cart_product_relate_color_{{$product->product_id}}">

                                                    <input type="hidden" value="{{$sizes[0]}}" class="cart_product_relate_size_{{$product->product_id}}">
                                                    <!-- Begin Product Image Area -->
                                                    <div class="product-img pro-list-item pro-list-sidebar-items">
                                                        <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                            <img class="primary-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                                                        </a>
                                                        @if($product->product_condition_id == 3)
                                                 <div class="sticker"><span>Sale</span></div>
                                                 @elseif($product->product_condition_id == 2)
                                                 <div class="sticker"><span>New</span></div>
                                                 @endif
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
                                                        <?php
                                                           $rating2 = Rating::where('product_id',$product->product_id)->where('rating_status',0)->avg('rating');
                                                           $rating2 = round($rating2);
                                                           ?>
                                                           @if($rating2 > 0)
                                                           <div class="rating list-rating">
                                                           <?php
                                                           for($x = 1; $x <= $rating2; $x++){
                                                            echo '<i class="fa fa-star"></i>';
                                                           }
                                                           ?>
                                                           </div>
                                                           @else
                                                           <div class="rating">
                                                           <p>Chưa có đánh giá</p>
                                                           </div>
                                                           @endif
                                                        <!-- List Rating Area End Here -->
                                                        <!-- Begin Price list Box Area -->
                                                        @if($product->product_condition_id == 1)
                                             <div class="price-box">
                                                 <span class="price-box list-price-box">{{number_format($product->price_cost,0,',','.').' '.'VNĐ'}}</span>
                                             </div>
                                             @else
                                             <div class="price-box list-price-box">
                                                 <span class="price">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                 <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VNĐ'}}</span>
                                             </div>
                                             @endif
                                                        <!-- Price List Box Area End Here -->
                                                        <!-- Begin List Text -->
                                                        <div class="list-text">
                                                            <p>{!!$product->product_content!!}</p>
                                                        </div>
                                                        <!-- List Text End Here -->
                                                        <!-- Begin Product Action Area -->
                                                        <div class="product-action product-action-2">
                                                            <div class="product-action-inner">
                                                            <div class="cart">
                                                              <input type="button" value="Add To Cart" class="add-to-cart2" href="#" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                                              </div>
                                                            </div>
                                                            </form>
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