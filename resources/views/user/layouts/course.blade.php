@extends('user.layouts.app')
@include('user.pages.sections.breadcrumb-section')
<section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
    <div class="container">
        <div class="row">
            @include('user.include.side-bar')
            <div class="col-xl-9 col-md-8 wow fadeInRight"
                 style="visibility: visible; animation-name: fadeInRight;">
                <div class="wsus__dashboard_contant">
                    <div class="wsus__dashboard_contant_top">
                        <div class="wsus__dashboard_heading relative">
                            <h5>Add Courses</h5>
                            <p>Manage your courses and its update like live, draft and insight.</p>
                        </div>
                    </div>

                    <div class="dashboard_add_courses">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{request('step'== 1?'active':'')}} course-tab" id="pills-home-tab" data-step="1" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Basic Infos
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{request('step'== 2?'active':'')}} course-tab" id="pills-profile-tab" data-step="2" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false" tabindex="-1">More Infos
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{request('step'== 3?'active':'')}} course-tab" id="pills-contact-tab" data-step="3" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false" tabindex="-1" >Course
                                    Contents
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{request('step'== 4?'active':'')}} course-tab" id="pills-contact-tab2" data-step="4" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact2" type="button" role="tab"
                                        aria-controls="pills-contact2" aria-selected="false" tabindex="-1">Finish
                                </button>
                            </li>
                        </ul>
                        <div id="content-area">
                            @yield('contents')
                            <div class="modal fade " id="dynamic-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
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
</section>
@push('header_script')
    @vite(['resources/js/course-form.js'])
@endpush
@push('scripts')
    <script>$('#lfm').filemanager('file');</script>
@endpush
