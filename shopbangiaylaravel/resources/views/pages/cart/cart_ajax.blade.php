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
                                                <th class="raavin-product-quantity">Quantity</th>
                                                <th class="raavin-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(Session::get('cart')==false)
                                        <tr>
							<td colspan="7"><center>
							@php 
							echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
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
                                                <td class="raavin-product-price"><span class="amount">{{number_format($cart['product_price'],0,',','.')}}đ</span></td>
                                                <td class="raavin-product-quantity">
                                                    <input class="input-text qty text" step="1" min="1" max="200" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" title="Qty" size="4" type="number">
                                                </td>
                                                <td class="product-subtotal"><span class="amount">{{number_format($subtotal,0,',','.')}}đ</span></td>
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
                                                <li>Subtotal <span>{{number_format($total,0,',','.')}}đ</span></li>
                                                @if(Session::get('coupon'))
                                                @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['coupon_condition']==1)
                                                <li>Coupon <span>{{$cou['coupon_code']}}/ Discount {{$cou['coupon_number']}}% <a href="{{url('/unset-coupon')}}"><i class="fa fa-times"></i></a></span></li>
                                                @php 
												$total_coupon = ($total*$cou['coupon_number'])/100;
                                                @endphp
                                                <li>Total <span>{{number_format($total-$total_coupon,0,',','.')}}đ</span></li>
                                                @elseif($cou['coupon_condition']==2)
                                                <li>Coupon <span>{{$cou['coupon_code']}}/ Discount {{number_format($cou['coupon_number'],0,',','.')}} đ <a href="{{url('/unset-coupon')}}"><i class="fa fa-times"></i></a></span></li>
                                                @php 
												$total_coupon = $total - $cou['coupon_number'];
                                                @endphp
                                                <li>Total <span>{{number_format($total_coupon,0,',','.')}}đ</span></li>
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