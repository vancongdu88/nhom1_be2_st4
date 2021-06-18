@extends('layout')
@section('content')
<!--Checkout Area Strat-->
<div class="checkout-area pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                        <div class="alert-success"></div>
                        <div class="alert-danger"></div>
                        @if(session()->has('message'))
                    <div class="alert alert-success notify-re">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger notify-re">
                        {!! session()->get('error') !!}
                    </div>
                @endif
                            <div class="coupon-accordion">
                            @if(!Session::get('coupon'))
                                <!--Accordion Start-->
                                <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                                <div id="checkout_coupon" class="coupon-checkout-content">
                                    <div class="coupon-info">
                                        <form method="POST" action="{{url('/check-coupon')}}">
                                        @csrf
                                            <p class="checkout-coupon">
                                                <input placeholder="Coupon code" name="coupon" type="text">
                                                <input value="Apply Coupon" type="submit">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <!--Accordion End-->
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <form name="form-re" onsubmit="return checkforblank() && validate()">
                            @csrf
                                <div class="checkbox-form">
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Your Email <span class="required">*</span></label>
                                                <input placeholder="Please type your Email" type="text" name="customer_email" class="shipping_email location" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Your name <span class="required">*</span></label>
                                                <input placeholder="Please type your name" type="text" name="shipping_name" class="shipping_name location" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input placeholder="Street address" type="text" name="shipping_address" class="shipping_address location" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Your number <span class="required">*</span></label>
                                                <input placeholder="Please type your number" type="text" name="customer_phone" class="shipping_phone location" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Note <span class="required">*</span></label>
                                                <textarea placeholder="Please type your note" rows="5" name="shipping_notes" class="shipping_notes"></textarea>
                                            </div>
                                        </div>

                                        @if(Session::get('fee'))
											<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
										@else 
											<input type="hidden" name="order_fee" class="order_fee" value="10000">
										@endif

										@if(Session::get('coupon'))
											@foreach(Session::get('coupon') as $key => $cou)
												<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
											@endforeach
										@else 
											<input type="hidden" name="order_coupon" class="order_coupon" value="no">
										@endif
                                        
                                        <div class="col-md-12">
                                            <div class="country-select clearfix">
                                                <label>Payment <span class="required">*</span></label>
                                                <select class="payment_select" name="payment_select">
                                                  <option value="1">Cash</option>
                                                  <option value="0">Credit Card</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="order-button-payment">
                                                <input value="Place order" type="button" name="send_order" class="send_order">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                @if(Session::get('cart')==true)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
									@php
											$total = 0;
									@endphp
									@foreach(Session::get('cart') as $key => $cart)
										@php
											$subtotal = $cart['product_price']*$cart['product_qty'];
											$total+=$subtotal;
										@endphp
                                            <tr class="cart_item">
                                              <td class="cart-product-name"> {{$cart['product_name']}}
                                              <strong class="product-quantity"> Color( {{$cart['product_color']}} )</strong>
                                              <strong class="product-quantity"> Size( {{$cart['product_size']}} )</strong>
                                              <strong class="product-quantity"> × {{$cart['product_qty']}}</strong>
                                              </td>
                                              <td class="cart-product-total"><span class="amount">{{number_format($subtotal,0,',','.')}}đ</span></td>  
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">{{number_format($total,0,',','.')}}đ</span></td>
                                            </tr>
                                            @if(Session::get('fee'))
                                            <tr class="cart-subtotal">
                                                <th>Ship cost</th>
                                                <td><span class="amount">{{number_format(Session::get('fee'),0,',','.')}}đ/ <a href="{{url('/changeaddress')}}"> Change address</a> </span></td>
                                            </tr>
                                            <?php $total_after_fee = $total + Session::get('fee'); ?>
                                            @endif
                                            @if(Session::get('coupon'))
                                            <tr class="cart-subtotal">
                                            </tr>
                                            @foreach(Session::get('coupon') as $key => $cou)
													@if($cou['coupon_condition']==1)
                                                    <tr class="cart-subtotal">
                                                <th>Coupon</th>
                                                <td><span class="amount">{{$cou['coupon_code']}}/ Discount {{$cou['coupon_number']}}%</span></td>
                                            </tr>
														<p>
															@php 
															$total_coupon = ($total*$cou['coupon_number'])/100;
															
															@endphp
														</p>
														<p>
														@php 
															$total_after_coupon = $total-$total_coupon;
														@endphp
														</p>
													@elseif($cou['coupon_condition']==2)
                                                    <tr class="cart-subtotal">
                                                <th>Coupon</th>
                                                <td><span class="amount">{{$cou['coupon_code']}}/ Discount {{number_format($cou['coupon_number'],0,',','.')}} đ </span></td>
                                            </tr>
														<p>
															@php 
															$total_coupon = $total - $cou['coupon_number'];
														
															@endphp
														</p>
														@php 
															$total_after_coupon = $total_coupon;
														@endphp
													@endif
												@endforeach
                                            @endif
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">@php 
											if(Session::get('fee') && !Session::get('coupon')){
												$total_after = $total_after_fee;
												echo number_format($total_after,0,',','.').'đ';

											}elseif(!Session::get('fee') && Session::get('coupon')){
												$total_after = $total_after_coupon;
												echo number_format($total_after,0,',','.').'đ';
											}elseif(Session::get('fee') && Session::get('coupon')){
												$total_after = $total_after_coupon;
												$total_after = $total_after + Session::get('fee');
												echo number_format($total_after,0,',','.').'đ';
											}elseif(!Session::get('fee') && !Session::get('coupon')){
												$total_after = $total;
												echo number_format($total_after,0,',','.').'đ';
											}
										@endphp</span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endif
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                          <div class="card">
                                            <div class="card-header" id="#payment-1">
                                              <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Direct Bank Transfer.
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-2">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Cheque Payment
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-3">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  PayPal
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Checkout Area End-->
@endsection