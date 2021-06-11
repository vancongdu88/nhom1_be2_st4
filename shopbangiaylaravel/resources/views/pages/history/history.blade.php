@extends('layout')
@section('content')
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
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
                <h3 class="text-center mb-5">Lịch sử đơn hàng của bạn</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Thứ tự</th>
                                                <th class="cart-product-name">Mã đơn hàng</th>
                                                <th class="cart-product-name">Ngày tháng đặt hàng</th>
                                                <th class="cart-product-name">Tình trạng đặt hàng</th>
                                                <th class="cart-product-name">Xem đơn hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $order_num = count($getorder);
                                        ?>
                                        @if($order_num == 0)
                                        <tr>
							<td colspan="5"><center>
							@php 
							echo 'Hiện tại bạn chưa có đơn hàng nào';
							@endphp
							</center></td>
						</tr>
                        @else
                                 @php 
                                 $i = 0;
                                 @endphp
                                 @foreach($getorder as $key => $ord)
                                 @php 
                                 $i++;
                                 @endphp
                                            <tr>
                                                <td class="raavin-product-remove">{{$i}}</td>
                                                <td class="raavin-product-thumbnail">{{ $ord->order_code }}</td>
                                                <td class="raavin-product-name">{{ $ord->created_at }}</td>
                                                <td class="raavin-product-name">@if($ord->order_status==1)
                                                    Đơn hàng mới
                                                @else 
                                                    Đã xử lý - Đã giao hàng
                                                @endif</td>
                                                <td class="raavin-product-price"><a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">Xem đơn hàng</a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    {!!$getorder->links()!!}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
@endsection