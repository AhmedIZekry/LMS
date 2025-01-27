@extends('admin.layouts.master')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Category</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.course-category.update',$course_category)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @if($course_category->image)
                                <div class="col-md-12">
                                    <img src="{{$course_category->image}}" alt="">
                                </div>

                            @endif

                            <div class="col-md-6">
                                <x-input-file-block name="image" label="Image"/>
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="icon" label="Icon" :value="$course_category->icon"/>
                            </div>

                            <div class="col-md-12">
                                <x-input-block name="name" label="Name" :value="$course_category->name"/>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <x-input-toggle-block name="show_at_trending" label="Show At Trending" :checked="$course_category->show_at_trending==1" :value="$course_category->show_at_trending"/>
                                </div>
                                <div class="col-md-3">
                                    <x-input-toggle-block name="status" label="Status" :checked="$course_category->status==1"/>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="Submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"/>
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/>
                                    <path d="M14 4l0 4l-6 0l0 -4"/>
                                </svg>
                                Update
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
