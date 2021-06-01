@extends('layout')
@section('content')
<!--Contact Area Start-->
<div class="contact-area">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-6">
                            <div class="contact-form-wrap">
                                <h2 class="contact-title">TELL US YOUR ADDRESS</h2>
                                <form method="POST" action="{{url('/calculate-fee')}}">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-12">
                                            <div class="country-select clearfix">
                                                <label>Tỉnh/Thành phố <span class="required">*</span></label>
                                                <select class="city choose" name="city" id="city">
                                                  <option value="">--Chọn tỉnh thành phố--</option>
                                                  @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="country-select clearfix">
                                            <label>Quận/Huyện <span class="required">*</span></label>
                                                <select class="province choose" name="province" id="province">
                                                <option value="">--Chọn quận huyện--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="country-select clearfix">
                                            <label>Xã <span class="required">*</span></label>
                                                <select class="wards" name="wards" id="wards">
                                                <option value="">--Chọn xã phường--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-form-style">
                                                <button class="form-button" type="submit"><span>Check Out</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <img src="{{('public/frontend/images/blog/4_1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--Contact Area End-->
@endsection