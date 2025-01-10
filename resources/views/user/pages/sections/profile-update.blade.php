@extends('user.layouts..app')
@include('user.pages.sections.breadcrumb-section')
@section('content')
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @include('user.pages.sections.side-bar')
                <div class="col-xl-9 col-md-8 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your Information</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                            </div>
                            <div class="wsus__dashboard_profile_delete">
                                <a href="#" class="common_btn">Delete Profile</a>
                            </div>
                        </div>


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{route('student.personalInformationUpdate')}}" class="wsus__dashboard_profile_update" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="wsus__dashboard_profile wsus__dashboard_profile_avatar">
                                <div class="img">
                                    <img src="{{asset($user->image)}}" alt="profile" class="img-fluid w-100">
                                    <label for="profile_photo">
                                        <img src="{{asset('user/assets/images/dash_camera.png')}}" alt="camera" class="img-fluid w-100">
                                    </label>
                                    <input type="file" name="image" id="profile_photo" hidden="">
                                </div>
                                <div class="text">
                                    <h6>Your avatar</h6>
                                    <p>PNG or JPG no bigger than 400px wide and tall.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Name</label>
                                        <input type="text" placeholder="{{$user->name}}" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Headline</label>
                                        <input type="text" placeholder="{{$user->headline}}" name="headline">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="{{$user->gender}}">{{$user->gender}}</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>About Me</label>
                                        <textarea rows="7" placeholder="{{$user->bio}}" name="bio"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Security update</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                            </div>
                        </div>

                        <div class="wsus__dashboard_password_change">
                            <h6>Change Password</h6>
                            <p>We will email you a confirmation when changing your password, so please expect that email
                                after submitting.</p>
                            <form method="POST" action="{{route('student.passwordUpdate')}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="wsus__dashboard_password_change_input">
                                            <label>Current Password</label>
                                            <input type="password"  name="current_password" placeholder="Enter Current Password">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="wsus__dashboard_password_change_input">
                                            <label>New Password</label>
                                            <input type="password" name="new_password" placeholder="Enter New Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__dashboard_password_change_input">
                                            <label>Confirm Password</label>
                                            <input type="password" name="new_password_confirmation" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__dashboard_password_change_btn">
                                            <button type="submit" class="common_btn">Save Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your Social links</h5>
                            </div>

                        </div>

                        <form method="POST" action="{{route('student.socialInformationUpdate')}}" class="wsus__dashboard_profile_update">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Git Hub</label>
                                        <input type="text" placeholder="{{$user->GitHub}}" name="GitHub">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Gmail</label>
                                        <input type="email" placeholder="{{$user->Gmai}}" name="Gmail">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>X</label>
                                        <input type="text" placeholder="{{$user->X}}" name="X">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>FaceBook</label>
                                        <input type="text" placeholder="{{$user->Facebook}}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Links</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
