@extends('layout')
@section('content')
<div class="login-register-area pt-80 pb-95">
                <div class="container">
                    <div class="row">
                        <!--Login Form Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="customer-login-register">
                                <div class="form-login-title">
                                    <h2>Login</h2>
                                </div>
                                <div class="login-form">
                                    <form action="#">
                                        <div class="form-fild">
                                            <label>Username or email address <span class="required">*</span></label>
                                            <input name="username" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <label>Password <span class="required">*</span></label>
                                            <input name="password" value="" type="password">
                                        </div>
                                        <div class="login-submit">
                                            <button type="submit" class="form-button">Login</button>
                                            <label>
                                                <input class="checkbox" name="rememberme" value="" type="checkbox">
                                                <span>Remember me</span>
                                            </label>
                                        </div>
                                        <div class="lost-password">
                                            <a href="#">Lost your password?</a>
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
                                    <form action="#">
                                        <div class="form-fild">
                                            <label>Username or email address <span class="required">*</span></label>
                                            <input name="username" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <label>Password <span class="required">*</span></label>
                                            <input name="password" value="" type="password">
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