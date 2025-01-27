@extends('user.layouts.course')


@section("contents")
    <div class="tab-content" id="pills-tabContent">
        <!-- Course More Info Form -->
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
             aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="add_course_more_info">
                <form action="{{route('instructor.update-course')}}" class="form-more-info course-form" id="form-more-info" data-step="more-info">
                    @csrf
                    <input type="hidden" name="id" value="{{request()?->id}}"/>
                    <input type="hidden" name="current_step" value="2">
                    <input type="hidden" name="next_step" value="3">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="add_course_more_info_input">
                                <label for="#">Capacity</label>
                                <input type="text" name="capacity" placeholder="Capacity" value="{{$course?->capacity}}">
                                <p>leave blank for unlimited</p>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="add_course_more_info_input">
                                <label for="#">Course Duration (Minutes)*</label>
                                <input type="text" name="duration" placeholder="300" value="{{$course?->duration}}">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="add_course_more_info_checkbox">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="qan"
                                           id="flexCheckDefault"
                                        @checked($course->qan == 1)
                                    >
                                    <label class="form-check-label" for="flexCheckDefault">Q&amp;A</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                           name="certificate"
                                           id="flexCheckDefault2"
                                        @checked($course->certificate == 1)
                                    >
                                    <label class="form-check-label" for="flexCheckDefault2">Completion
                                        Certificate</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="add_course_more_info_input">
                                <label for="#">Category *</label>
                                <select name="category_id"
                                        class="select_2 select2-hidden-accessible"
                                        data-select2-id="select2-data-1-qgim" tabindex="-1"
                                        aria-hidden="true">
                                    <option value="" data-select2-id="select2-data-3-8oko">
                                        Please Select
                                    </option>
                                    @foreach($categories As $category)
                                        @if($category->subCategories->isNotEmpty())
                                            <optgroup label="{{$category->name}}">
                                                @foreach($category->subCategories As $subCategory)
                                                    <option
                                                        value="{{$subCategory->id}}"
                                                        @selected($course?->category_id == $subCategory->id)
                                                    >
                                                        {{$subCategory->name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="add_course_more_info_radio_box">
                                <h3>Level</h3>
                                @foreach($levels As $level)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                               name="course_level_id" id="{{$level->id}}"
                                               value="{{$level->id}}"
                                            @checked($course->course_level_id === $level->id)>
                                        <label class="form-check-label"
                                               for="level-{{$level->id}}">
                                            {{$level->name}}

                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="add_course_more_info_radio_box">
                                <h3>Language</h3>
                                @foreach($languages As $language)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                               name="course_language_id"
                                               id="lang-{{$language->id}}"
                                               value="{{$language->id}}"
                                            @checked($course->course_language_id === $language->id)>
                                        <label class="form-check-label"
                                               for="lang-{{$language->id}}">
                                            {{$language->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="common_btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @vite(['resources/js/course-form.js'])
@endpush
