<?php

namespace App\Http\Controllers\Admin;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCategoryEditRequest;
use App\Http\Requests\CourseCategoryRequest;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourserCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseCategories = CourseCategory::whereNull('parent_id')->paginate(15);
        return view('admin.course.category.index',compact('courseCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCategoryRequest $request)
    {
        $filename = $this->upload($request->file('image'), 'uploads/course_category');
        CourseCategory::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$filename,
            'show_at_trending'=>$request->show_at_trending?$request->show_at_trending:0,
            'status'=>$request->status?$request->status:0,
            'icon'=>$request->icon
        ]);
        return redirect()->route('admin.course-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $course_category)
    {
        return view('admin.course.category.edit',compact('course_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCategoryEditRequest $request,CourseCategory $course_category)
    {
        if ($request->hasFile('image')) {
            $this->deleteFile($course_category->image);
            $imagePath = $this->upload($request->file('image'),'course_category');
        }else{
            $imagePath = null;
        }

        $course_category->update(
            [
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'icon'=>$request->icon,
                'image'=>$imagePath?? $course_category->image,
                'status'=>$request->status ?? 0,
                'show_at_trending'=>$request->show_at_trending??0,
            ]
        );
        return redirect()->route('admin.course-category.index')->with(['success','Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $course_category)
    {

        $course_category->delete();
        $this->deleteFile($course_category->image);
        return redirect()->route('admin.course-category.index')->with(['success','Category deleted successfully']);

    }
}
