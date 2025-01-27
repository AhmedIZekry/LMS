<?php

namespace App\Http\Controllers\FrontEnd;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLanguage;
use App\Models\CourseLevel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;

class CourseController extends Controller
{
    use FileUpload;
    public function index(): Application|Factory|View
    {
        $courses = Course::all();
        return view('user.instructor.courses.index',compact('courses'));
    }
    public function addCourse(): Application|Factory|View
    {
        return view('user.instructor.courses.create');
    }
    public function saveStep(CourseRequest $request)
    {
        $course = new Course();
        $imagePath  = $this->upload($request->thumbnail,'uploads/courses/thumbnail');
        if ($imagePath){
            $course->thumbnail = $imagePath;
        }else{
            $course->thumbnail = "";
        }

        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->seo_description = $request->seo_description;
        $course->demo_video_source = $request->filled('file')?$request->file('file'):$request->url;
        $course->demo_video_storage = $request->demo_video_storage;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->description = $request->description;
        $course->instructor_id = Auth::guard('web')->user()->id;
        $course->save();
        Session::put('course_id',$course->id);
//      dd($request->next_step);
        return response(['success' => true,
            'message' => 'Course added successfully.',
            'redirect' => route('instructor.course.edit',['id'=>$course->id,'step'=>$request->next_step])
        ]);
    }

    public function editCourse(Request $request): Application|Factory|View
    {
        switch ($request->step){
            case 1:
                $course = Course::findOrFail($request->id);
                return view('user.instructor.courses.edit',compact('course'));
            case 2:
                $categories = CourseCategory::where('status','1')->get();
                $course = Course::findOrFail($request->id);
                $levels = CourseLevel::all();
                $languages = CourseLanguage::all();
                return view('user.instructor.courses.more-info',compact('categories','levels','languages','course'));
                break;
            case 3:
                $course = Course::findOrFail($request->id);
                return view('user.instructor.courses.content',compact('course'));
            default:
                break;
        }
        return response(['success' => false,
            'message' => 'Something went wrong.',],400);
    }
    public function update(Request $request)
    {
        switch ($request->current_step){
            case '1':
                $course = Course::findOrFail($request->id);
//                dd($course);
                $request->validate([
                    'title' => 'required|string|max:255',
                    'seo_description'=>'nullable|string|max:255',
                    'demo_video_storage'=>'nullable|string|in:,youtube,vimeo,external_link,upload',
                    'price'=>'required|numeric|min:0',
                    'discount'=>'nullable|numeric|min:0',
                    'description'=>'nullable|string',
                    'thumbnail'=>'nullable|image|mimes:jpeg,jpg,png|max:2000',
                    'demo_video_source'=>'nullable|string',
                ]);


                if ($request->hasFile('thumbnail')){
                    $imagePath  = $this->upload($request->thumbnail,'uploads/courses/thumbnail');
                    $this->deleteFile($course->thumbnail);
                    $course->thumbnail = $imagePath;
                }

                $course->title = $request->title;
                $course->slug = Str::slug($request->title);
                $course->seo_description = $request->seo_description;
                $course->price = $request->price;
                $course->discount = $request->discount;
                $course->description = $request->description;
                $course->instructor_id = Auth::guard('web')->user()->id;
                $course->save();

                return response(['success' => true,
                    'message' => 'Course updated successfully.',
                    'redirect' => route('instructor.course.edit',['id'=>$course->id,'step'=>$request->next_step])
                ]);

                break;
            case '2':
                $request->validate([
                    'category_id'=>'required|integer',
                    'course_level_id'=>'required|integer',
                    'course_language_id'=>'required|integer',
                    'capacity'=>'required|numeric ',
                    'duration'=>'required|numeric',
                    'certificate'=>'nullable|numeric',
                    'qan'=>'required|numeric',
                ]);
                $course = Course::findOrFail($request->id);
                $course->category_id = $request->category_id;
                $course->course_level_id = $request->course_level_id;
                $course->course_language_id = $request->course_language_id;
                $course->capacity = $request->capacity;
                $course->duration = $request->duration;
                $course->certificate = $request->certificate?1:0;
                $course->qan = $request->qan?1:0;
                $course->save();
                return response(['success' => true,
                    'message' => 'Course updated successfully.',
                    'redirect' => route('instructor.course.edit',['id'=>$course->id,'step'=>$request->next_step])
                ]);
                break;
        default:
            return response()->json(['success' => false, 'message' => 'Invalid step provided.'], 400);
            break;


        }


    }
}


