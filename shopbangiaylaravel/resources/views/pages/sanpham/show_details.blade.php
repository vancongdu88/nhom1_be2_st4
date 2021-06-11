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
                    <div class="tab-content product-details-tab product-details-large" id="myTabContent">
                    <div class="tab-pane fade show active" id="single-slide" role="tabpanel" aria-labelledby="single-slide-tab-1">
                            <!--Single Product Image Start-->
                            <div class="single-product-img img-full">
                            <!-- node -->
                                <img src="{{asset($share_images)}}">
                                <a class="popup-img venobox vbox-item" href="{{asset($share_images)}}" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                            </div>
                            <!--Single Product Image End-->
                        </div>
                    @foreach($gallery as $key => $gal)
                    <div class="tab-pane fade" id="single-slide{{$loop->index + 1}}" role="tabpanel" aria-labelledby="single-slide-tab-2">
                                      <!--Single Product Image Start-->
                                      <div class="single-product-img img-full">
                                        <img src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" alt="{{$gal->gallery_name}}">
                                        <a class="popup-img venobox vbox-item" href="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                      </div>
                                      <!--Single Product Image End-->
                                  </div>
                    @endforeach	
                    </div>
                    <!-- Modal Tab Content Area End Here -->
                    <!-- Begin Modal Tab Menu Area -->
                    <div class="single-product-menu">
                        <div class="nav single-slide-menu owl-carousel" role="tablist">
                        <div class="single-tab-menu img-full">
                                <a class="active" data-toggle="tab" id="single-slide-tab-1" href="#single-slide"><img src="{{asset($share_images)}}"></a>
                        </div>
                        @foreach($gallery as $key => $gal)
                        <div class="single-tab-menu img-full">
                                            <a data-toggle="tab" id="single-slide-tab-2" href="#single-slide{{$loop->index + 1}}"><img src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" alt="{{$gal->gallery_name}}"></a>
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
                    <!-- Begin Product Content Area -->
                    <div class="product-details-contents">
                        <!-- Begin Product Name Area -->
                        <h5 class="product-details-name">
                            <a href="#" title="Ornare sed consequat">{{$value->product_name}}</a>
                        </h5>
                        <!-- Product Name Area End Here -->
                        <!-- Begin Rating Area -->
                        @if($rating > 0)
                        <div class="rating-2">
                        <?php
                        for($x = 1; $x <= $rating; $x++){
                         echo '<i class="fa fa-star"></i>';
                        }
                        ?>
                        </div>
                        @else
                        <p>Chưa có đánh giá</p>
                        @endif
                        <!-- Rating Area End Here -->
                        <!-- Begin Review Area -->
                        <div class="review">
                            <p><i class="fa fa-eye" aria-hidden="true"></i> {{$view}} View</p>
                        </div>
                        <!-- Review Area End Here -->
                        <!-- Begin Price Box Area -->
                        <div class="price-box-2">
                            <span class="price">{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
                        </div>
                        <!-- Price Box Area End Here -->
                        <p class="short-desc">{{$value->category_desc}}</p>
                        <p class="stock">{{$value->product_quantity}} in stock</p>
                        <form class="pro-details-cart">
                        @csrf
                        <input type="hidden" id="product_viewed_id" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

                                            <input type="hidden" id="product_viewed{{$value->product_id}}" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                            <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
                            <div class="quantity">
                                <input class="input-text qty text cart_product_qty_{{$value->product_id}}" step="1" min="1" max="200" name="quantity" value="1" title="Qty" size="4" type="number">
                            </div>
                            <div class="qty-cart-btn">
                                <input type="button" class="add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart" value="Add To Cart">
                            </div>
                            <div class="group-btn">
                                <div class="qty-cart-btn qty-cart-btn-2">
                                    <a href="#"><i class="fa fa-heart-o"></i>Add To Wishlist</a>
                                </div>
                            </div>
                            <div class="product-meta">
                                <p>
                                    Categories:
                                    <a href="#">{{$value->category_name}}</a>

                                </p>
                            </div>
                            <div class="product-meta">
                                <p>
                                    Brand:
                                    <a href="#">{{$value->brand_name}}</a>

                                </p>
                            </div>
                            <div class="single-product-sharing">
                                <h3>Tags :</h3>
                                <div class="widge-list widge-tag-list">
                                    <ul>
                                    @php 
											$tags = $value->product_tags;
											$tags = explode(",",$tags);
										@endphp
                                        @foreach($tags as $tag)
                                        <?php
                                        $link = Str::slug($tag);
                                        ?>
                                        <li>
                                            <a href="{{url('/tag/'.$link)}}">{{$tag}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
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
                        <li class="review-tab"><a data-toggle="tab" href="#riview">Review ({{count($comment)}})</a></li>
                    </ul>
                </div>
                <!-- Begin Vertical Tab Content Area -->
                <div class="col-lg-9" style="border-left: 1px solid #ddd;">
                    <div class="tab-content vertical-tab-desc">
                        <div id="description" class="tab-pane show fade in active">
                        <p>{!!$value->product_desc!!}</p>
                        </div>
                        <div id="riview" class="tab-pane fade">
                                    <!-- Begin Reviws Area -->
                                    <div class="reviews">
                            <div class="comments">
                            @if(count($comment) > 0)
                                <h2>{{count($comment)}} reviews for {{$value->product_name}}</h2>
                                <form>
									@csrf
									<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
									<div id="comment_show"></div>
								</form>
                            @else
                            <p>Hãy là khách hàng đầu tiên đánh giá sản phầm này của chúng tôi</p>
                            @endif
                                </div>
                            </div>
                                    <!-- Reviws Area End Here -->
                        <!-- Begin Feedback Area -->
                        <div class="feedback-area">
                        <div id="notify_comment"></div>
                        @if(Session::get('customer_id'))
                        @if($comment_count < $user_bought_slot)
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
                                        <textarea id="feedback" class="comment_content" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                    </p>
                                    <div class="feedback-input">
                                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
                                            <input class="comment_name" value="{{Session::get('customer_name')}}" type="hidden">
                                            <input class="comment_user_id" value="{{Session::get('customer_id')}}"  type="hidden">
                                        
                                        <div class="qty-cart-btn feedback-btn">
                                            <input type="button" value="Submit" class="send-comment">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        @endif
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
            @foreach($relate as $key => $lienquan)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-product">
                    <!-- Begin Featured Product Image Area -->
                    <div class="product-img">
                        <a href="{{URL::to('/chi-tiet/'.$lienquan->product_slug)}}">
                        <img class="primary-img" src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="">
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
                            <a href="#" title="{{$lienquan->product_name}}">{{$lienquan->product_name}}</a>
                        </h5>
                        <!-- Featured Product Name Area End Here -->
                        <!-- Begin Price Box Area -->
                        <div class="price-box">
                            <span class="price">{{number_format($lienquan->price_cost,0,',','.').' '.'VNĐ'}}</span>
                            <span class="old-price">{{number_format($lienquan->product_price,0,',','.').' '.'VNĐ'}}</span>
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
                </div>
            </div>
            @endforeach    
            <!-- Single Related Product Area End Here -->
        </div>
        <!-- Featured Product Content Area End Here -->
    </div>
</section>
@endsection