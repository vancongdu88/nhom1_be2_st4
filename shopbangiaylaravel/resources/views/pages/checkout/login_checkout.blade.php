@extends('layout')
@section('content')
<div class="login-register-area pt-80 pb-95">
                <div class="container">
                    <div class="row">
                        <!--Login Form Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="customer-login-register">
                            <?php
                            $message = Session::get('message');
  if($message){
    echo '<span class="text-alert">'.$message.'</span>';
    Session::put('message',null);
  }
  ?>
                                <div class="form-login-title">
                                    <h2>Login</h2>
                                </div>
                                <div class="login-form">
                                    <form action="{{URL::to('/login-customer')}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="form-fild">
                                            <label>Username or email address <span class="required">*</span></label>
                                            <input name="email_account" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <label>Password <span class="required">*</span></label>
                                            <input name="password_account" value="" type="password">
                                        </div>
                                        <div class="login-submit">
                                            <button type="submit" class="form-button">Login</button>
                                            <label>
                                                <input class="checkbox" name="rememberme" value="" type="checkbox">
                                                <span>Remember me</span>
                                            </label>
                                        </div>
                                        <div class="lost-password">
                                            <a href="{{url('/quen-mat-khau')}}s">Lost your password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Login Form End-->
                        <!--Register Form Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="customer-login-register register-pt-0">
                                <div class="form-register-title">
                                    <h2>Register</h2>
                                </div>
                                <div class="register-form">
                                    <form action="{{URL::to('/add-customer')}}" method="POST">
                                    {{ csrf_field() }}
                                        <div class="form-fild">
                                            <label>Username <span class="required">*</span></label>
                                            <input name="customer_name" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <label>Your email <span class="required">*</span></label>
                                            <input name="customer_email" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <label>Phone <span class="required">*</span></label>
                                            <input name="customer_phone" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <label>Password <span class="required">*</span></label>
                                            <input name="customer_password" value="" type="password">
                                        </div>
                                        <div class="register-submit">
                                            <button type="submit" class="form-button">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Register Form End-->
                    </div> 
                </div>
            </div>
@endsection