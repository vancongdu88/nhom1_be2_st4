@extends('layout')
@section('content')
<div class="shop-topbar-area shop-topbar-area-reverse pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 order-2 order-lg-1">
                            <div class="shop-sidebar shop-sidebar-reverse">
                                <!-- Shop Sidebar Area -->
                                <div class="category">
                                    <h4>Brands</h4>
                                    <!-- Begin Category List Area -->
                                    @php
                                    use App\Product;
                                    @endphp
                                    <div class="category-list">
                                        @foreach($brand as $key => $name)
                                        @php
                                        $product_brand = Product::where('brand_id',$name->brand_id)->get();
                                        $product_num = count($product_brand);
                                        @endphp
                                        <ul>
                                            <li style="text-transform: capitalize"><a href="{{URL::to('/thuong-hieu/'.$name->brand_slug)}}">{{$name->brand_name}} ({{$product_num}})</a></li>
                                        </ul>
                                        @endforeach
                                    </div>
                                    <!-- Category List Area End Here -->
                                </div>
                                <!-- Shop Sidebar Area End-->
                                <!-- Shop Sidebar Area -->
                                <div class="category mt-30">
                                    <h4>Filter</h4>
                                    <form>
                                    <div class="price-filter">
                                        <div id="slider-range"></div>
                                        <div class="price-slider-amount">
                                            <div class="label-input">
                                                <label>price : </label>
                                            <p><input type="text" id="amount_start" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
                                            <p><input type="text" id="amount_end" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
                                            </div>
                                            <input type="hidden" name="start_price" id="start_price">
                                            <input type="hidden" name="end_price" id="end_price">
                                            <button type="submit" name="filter_price" value="Lọc giá" class="btn btn-sm btn-default">Filter</button> 
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- Shop Sidebar Area End-->
                            </div>
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
                                        @foreach($brand_name as $key => $name)
                                        <li> <h3>{{$name->brand_name}}</h3></li>
                                        @endforeach
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
                                            <?php
                                              use App\Rating;
                                              ?>
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
                                                                <p>Chưa có đánh giá</p>
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
                                                            <a href="product-details.html" title="{{$product->product_name}}">{{$product->product_name}}</a>
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
                                                           <p>Chưa có đánh giá</p>
                                                           @endif
                                                        <!-- List Rating Area End Here -->
                                                        <!-- Begin Price list Box Area -->
                                                        <div class="price-box list-price-box">
                                                            <span class="price">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                            <span class="old-price">{{number_format($product->price_cost,0,',','.').' '.'VNĐ'}}</span>
                                                        </div>
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
                                                <ul class="pagination pagination-sm m-t-none m-b-none justify-content-end">
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