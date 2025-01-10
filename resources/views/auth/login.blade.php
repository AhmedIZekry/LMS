<!--===========================
        SIGN IN START
    ============================-->
@extends('user.layouts.app')
@section('content')
    <section class="wsus__sign_in">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{asset("user/assets/images/login_img_1.jpg")}}" alt="login" class="img-fluid">
                    <a href="{{route('home')}}">
                        <img src="{{asset("user/assets/images/logo.png")}}" alt="EduCore" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab" tabindex="0">
                            <form method="POST" action="{{route("login")}}">
                                @csrf
                                <h2>Log in</h2>
                                <p class="new_user">Welcome Back, Please provide your credentials for login </p>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Email or Username</label>
                                            <input type="text" name="email" placeholder="Email or Username" required>
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Password <a href="{{route('password.request')}}">Forgot Password?</a></label>
                                            <input type="password" name="password" placeholder="Password" required>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <div class="form-check">
                                                <input class="form-check-input" name="remember" type="checkbox" value=""
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remember Me
                                                </label>
                                            </div>
                                            <button type="submit" class="common_btn">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                           <p class="or">or</p>
                           <ul class="social_login d-flex flex-wrap">
                               <li>
                                   <a href="{{url('auth/google')}}">
                                       @csrf
                                       <span><img src="{{asset('user/assets/images/google_icon.png')}}"
                                                  alt="Google" class="img-fluid"></span>
                                       Google
                                   </a>
                              </li>
                            </ul>
                            <p class="create_account">Don't have an account? <a href="{{route("register")}}">Create free
                                    account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back_btn" href="{{route("home")}}">Back to Home</a>
    </section>
@endsection
<!--===========================
    SIGN IN END
============================-->

