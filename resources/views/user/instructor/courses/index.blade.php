@extends('user.layouts.app')
@section("content")
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @include('user.pages.sections.breadcrumb-section')
                @include('user.include.side-bar')
                <div class="col-xl-9 col-md-8 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>Courses</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                                <a class="common_btn" href="{{route('instructor.add-course')}}">+ add course</a>
                            </div>
                        </div>

                        <form action="#" class="wsus__dash_course_searchbox">
                            <div class="input">
                                <input type="text" placeholder="Search our Courses">
                                <button><i class="far fa-search" aria-hidden="true"></i></button>
                            </div>
                            <div class="selector">
                                <select class="select_js" style="display: none;">
                                    <option value="">Choose</option>
                                    <option value="">Choose 1</option>
                                    <option value="">Choose 2</option>
                                </select><div class="nice-select select_js" tabindex="0"><span class="current">Choose</span><ul class="list"><li data-value="" class="option selected">Choose</li><li data-value="" class="option">Choose 1</li><li data-value="" class="option">Choose 2</li></ul></div>
                            </div>
                        </form>

                        <div class="wsus__dash_course_table">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th class="image">
                                                    COURSES
                                                </th>
                                                <th class="details">

                                                </th>
                                                <th class="sale">
                                                    STUDENT
                                                </th>
                                                <th class="status">
                                                    STATUS
                                                </th>
                                                <th class="action">
                                                    ACTION
                                                </th>
                                            </tr>
                                            <tr>
                                                @foreach($courses As $course)
                                                    <td class="image">
                                                        <div class="image_category">
                                                            <img src="{{$course->thumbnail}}" alt="img" class="img-fluid w-100">
                                                        </div>
                                                    </td>
                                                    <td class="details">
                                                        <p class="rating">
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                            <span>(5.0)</span>
                                                        </p>
                                                        <a class="title" href="#">{{$course->title}}</a>

                                                    </td>
                                                    <td class="sale">
                                                        <p>3400</p>
                                                    </td>
                                                    <td class="status">
                                                        <p class="active">Active</p>
                                                    </td>
                                                    <td class="action">
                                                        <a class="edit" href="{{route('instructor.course.edit',['id'=>$course->id,'step'=>1])}}"><i class="far fa-edit" aria-hidden="true"></i></a>
                                                        <a class="del" href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
                                                    </td>
                                                @endforeach

                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
