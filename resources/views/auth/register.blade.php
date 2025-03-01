@extends('user.layouts.app')
<!--===========================
        SIGN UP START
    ============================-->

@section('content')
    <section class="wsus__sign_in sign_up">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{asset("user/assets/images/login_img_2.jpg")}}" alt="login" class="img-fluid">
                    <a href="index.html">
                        <img src="{{asset("user/assets/images/logo.png")}}" alt="EduCore" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab" tabindex="0">
                            <form method="POST" action="{{route("register")}}">
                                @csrf
                                <h2>Sign Up</h2>
                                <p class="new_user">Already have an account? <a href="{{route("login")}}">Sign In</a>
                                </p>
                                <div class="row">

                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Name">
                                        </div>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                    </div>
                                    {{--                                    <div class="col-xl-12">--}}
                                    {{--                                        <div class="wsus__login_form_input">--}}
                                    {{--                                            <label>Last name</label>--}}
                                    {{--                                            <input type="text" placeholder="Last name">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Your email</label>
                                            <input type="email" name="email" placeholder="Your email">
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Your password">
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation"
                                                   placeholder="Your password">
                                        </div>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <div class="form-check">
                                                <input class="form-check-input" name="agree" type="checkbox" value=""
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault"> By clicking
                                                    Create
                                                    account, I agree that I have read and accepted the <a href="#">Terms
                                                        of
                                                        Use</a> and <a href="#">Privacy Policy.</a>
                                                </label>
                                            </div>
                                            <button type="submit" class="common_btn">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a class="back_btn" href="{{route('home')}}">Back to Home</a>
    </section>
@endsection

<!--===========================
    SIGN UP END
============================-->
