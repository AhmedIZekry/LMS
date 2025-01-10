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

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')"/>

                            <form method="POST" action="{{route("password.email")}}">
                                @csrf
                                <h2>Forgot Password</h2>
                                <p class="new_user">Forgot your password? No problem. Just let us know your email
                                    address and we will email you a password reset link that will allow you to choose a
                                    new one.</p>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="Email" required>
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <button type="submit" class="common_btn">Email Password Rest Link</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back_btn" href="{{route("home")}}">Back to Home</a>
    </section>
@endsection
