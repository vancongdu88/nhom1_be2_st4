@extends('layout')
@section('content')
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{url('/update-cart')}}" method="POST">
                            @csrf
                                <div class="table-content table-responsive">
                                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="raavin-product-remove">remove</th>
                                                <th class="raavin-product-thumbnail">Images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-name">In stock</th>
                                                <th class="raavin-product-price">Unit Price</th>
                                                <th class="raavin-product-quantity">Shoe color</th>
                                                <th class="raavin-product-quantity">Shoe size</th>
                                                <th class="raavin-product-quantity">Quantity</th>
                                                <th class="raavin-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        use App\Product;
                                        ?>
                                        @if(Session::get('cart')==false)
                                        <tr>
							<td colspan="9"><center>
							@php 
							echo 'L??m ??n th??m s???n ph???m v??o gi??? h??ng';
							@endphp
							</center></td>
						</tr>
                                            @else
                                            @php
								$total = 0;
						@endphp
						@foreach(Session::get('cart') as $key => $cart)
							@php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
							@endphp
                                            <tr>
                                                <td class="raavin-product-remove"><a href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a></td>
                                                <td class="raavin-product-thumbnail"><a href="#"><img width="90" src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}"></a></td>
                                                <td class="raavin-product-name"><a href="#">{{$cart['product_name']}}</a></td>
                                                <td class="raavin-product-name"><a href="#">{{$cart['product_quantity']}}</a></td>
                                                <td class="raavin-product-price"><span class="amount">{{number_format($cart['product_price'],0,',','.')}}??</span></td>
                                                <?php
                                                $product = Product::where('product_id',$cart['product_id'])->first();
                                                $colors = $product->product_color;
                                                $colors = explode(",",$colors);
                                                $sizes = $product->product_size;
                                                $sizes = explode(",",$sizes);
                                                ?>
                                                <td class="raavin-product-quantity">
                                                <select class="cart_product_color"  name="cart_color[{{$cart['session_id']}}]" >
                                                    @foreach($colors as $color)
                                                    @if($color == $cart['product_color'])
                                                    <option selected value="{{$color}}">{{$color}}</option>
                                                    @else
                                                    <option value="{{$color}}">{{$color}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                </td>
                                                <td class="raavin-product-quantity">
                                                <select class="cart_product_color"  name="cart_size[{{$cart['session_id']}}]">
                                                    @foreach($sizes as $size)
                                                    @if($size == $cart['product_size'])
                                                    <option selected value="{{$size}}">{{$size}}</option>
                                                    @else
                                                    <option value="{{$size}}">{{$size}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                </td>
                                                <td class="raavin-product-quantity">
                                                    <input class="input-text qty text" step="1" min="1" max="200" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" title="Qty" size="4" type="number">
                                                </td>
                                                <td class="product-subtotal"><span class="amount">{{number_format($subtotal,0,',','.')}}??</span></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    
                                </div>
                                @if(Session::get('cart'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Update cart" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </form>
                            @if(Session::get('cart'))
                                
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Subtotal <span>{{number_format($total,0,',','.')}}??</span></li>
                                                @if(Session::get('coupon'))
                                                @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['coupon_condition']==1)
                                                <li>Coupon <span>{{$cou['coupon_code']}}/ Discount {{$cou['coupon_number']}}% <a href="{{url('/unset-coupon')}}"><i class="fa fa-times"></i></a></span></li>
                                                @php 
												$total_coupon = ($total*$cou['coupon_number'])/100;
                                                @endphp
                                                <li>Total <span>{{number_format($total-$total_coupon,0,',','.')}}??</span></li>
                                                @elseif($cou['coupon_condition']==2)
                                                <li>Coupon <span>{{$cou['coupon_code']}}/ Discount {{number_format($cou['coupon_number'],0,',','.')}} ?? <a href="{{url('/unset-coupon')}}"><i class="fa fa-times"></i></a></span></li>
                                                @php 
												$total_coupon = $total - $cou['coupon_number'];
                                                @endphp
                                                <li>Total <span>{{number_format($total_coupon,0,',','.')}}??</span></li>
                                                @endif
                                                @endforeach
                                                @endif
                                            </ul>
                                            <div class="coupon-all">
                                                <div class="coupon">
                                                @if(!Session::get('coupon'))
                                                <form method="POST" action="{{url('/check-coupon')}}">
                                                @csrf
                                                    <input id="coupon_code" class="input-text" name="coupon" value="" placeholder="Coupon code" type="text">
                                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                                </form>
                                                @endif
                                                </div>
                                            </div>
                                            @if(Session::get('customer_id'))
                                            <a href="{{url('/checkaddress')}}">Proceed to checkout</a>
	                                     	@else 
	                          	            <a href="{{url('/dang-nhap')}}">Proceed to checkout</a>
								            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
@endsection