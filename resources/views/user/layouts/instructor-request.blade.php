@extends('user.layouts.app')
@section('content')

    <!--===========================
        BREADCRUMB START
    ============================-->
    <section class="wsus__breadcrumb" style="background: url({{asset('user/assets/images/breadcrumb_bg.jpg')}});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Instructor Application</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Instructor Application</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
        BREADCRUMB END
    ============================-->

    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @include('user.pages.sections.side-bar')
                <div class="col-xl-9 col-md-6">
                    <div class="text-end mt-4 mb-4">
                        <button class="btn btn-primary">
                            <a href="{{route('student.dashboard')}}" style="color: #FFFFFF">Back</a>
                        </button>
                    </div>

                    <div class="row ">
                        <div class="card">
                            <div class="card-header">
                                Become Instructor
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('student.request.submit')}}"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Document</label>
                                        <input type="file" name="file" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="submit" value="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
