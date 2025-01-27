@extends('user.layouts.course')
@section("contents")
    <div class="tab-content" id="pills-tabContent">
        <!-- Course Basic Info Form -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
             aria-labelledby="pills-home-tab" tabindex="0">
            <div class="add_course_basic_info">
                <form action="{{route('instructor.update-course')}}" id="form-basic-info" class="form-basic-info course-form" data-step="basic">
                    @csrf
                    <input type="hidden" name="id" value="{{$course->id}}">
                    <input type="hidden" name="current_step" value="1">
                    <input type="hidden" name="next_step" value="2">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="add_course_basic_info_imput">
                                <label for="#">Title *</label>
                                <input type="text" name="title" value="{{$course->title}}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="add_course_basic_info_imput">
                                <label for="#">Slug *</label>
                                <input type="text" name="slug" value="{{$course->slug}}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="add_course_basic_info_imput">
                                <label for="#">Seo description</label>
                                <input type="text" name="seo_description"
                                       value="{{$course->seo_description}}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="add_course_basic_info_imput">
                                <label for="#">Thumbnail *</label>
                                <input type="file" name="thumbnail">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="add_course_basic_info_imput">
                                <label for="demo_video_storage">Demo Video Storage
                                    <b>(optional)</b></label>
                                <select name="demo_video_storage" class="storage"
                                        style="">
                                    <option value=""> Please Select</option>
                                    <option @selected($course->demo_video_storage === "upload") value="upload">Upload</option>
                                    <option @selected($course->demo_video_storage === "youtube") value="youtube">Youtube</option>
                                    <option @selected($course->demo_video_storage === "vimeo") value="vimeo">Vimeo</option>
                                    <option @selected($course->demo_video_storage === "external_link") value="external_link">External Link</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-xl-6">
                            <div class="add_course_basic_info_imput external_source {{$course->demo_video_storage =='upload' ? 'd-none':''}}">
                                <label for="#">Path</label>
                                <input type="text" name="url">
                            </div>
                            <div class="add_course_basic_info_imput upload_source {{$course->demo_video_storage !='upload' ? 'd-none':''}}">
                                <label for="#">Path</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                           <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                   </span>
                                    <input id="thumbnail" class="form-control source_input" type="text" name="file">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>

                        </div>
                        <div class="col-xl-6">
                            <div class="add_course_basic_info_imput">
                                <label for="#">Price *</label>
                                <input type="text" name="price" value="{{$course->price}}">
                                <p>Put 0 for free</p>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="add_course_basic_info_imput">
                                <label for="#">Discount Price</label>
                                <input type="text" name="discount" value="{{$course->discount ?? 0}}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="add_course_basic_info_imput mb-0">
                                <label for="#">Description</label>
                                <textarea rows="8"  name="description" placeholder="Description">{!! $course->description !!}</textarea>
                                <button type="submit" class="common_btn mt_20">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('header_script')
    @vite(['resources/js/course-form.js'])
@endpush
@push('scripts')
    <script>$('#lfm').filemanager('file');</script>
@endpush
