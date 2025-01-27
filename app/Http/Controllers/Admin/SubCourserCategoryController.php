<?php

namespace App\Http\Controllers\Admin;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCourseCategoryRequest;
use App\Models\CourseCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCourserCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(CourseCategory $course_category): Application|Factory|View
    {
        $course_subcategory = CourseCategory::where('parent_id',$course_category->id)->get();
        return view('admin.course.category.subcategory.index',compact('course_category','course_subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CourseCategory $course_category): Application|Factory|View
    {
        return view('admin.course.category.subcategory.create',compact('course_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCourseCategoryRequest $request,CourseCategory $course_category): RedirectResponse
    {
//        $course_subcategory = new CourseCategory();
        $request->validated();
        if ($request->hasFile('image')) {
            $filePath = $this->upload($request->file('image'), 'uploads/course_category/course_subcategory');
        }
//        $course_subcategory->name=$request->name;
//        $course_subcategory->slug=Str::slug($request->name);
//        $course_subcategory->image=$filePath;
//        $course_subcategory->show_at_trending=$request->show_at_trending?$request->show_at_trending:0;
//        $course_subcategory->status=$request->status?$request->status:0;
//        $course_subcategory->icon=$request->icon;
//        $course_subcategory->parent_id=$course_category->id;
//        $course_subcategory->save();
        CourseCategory::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$filePath,
            'icon'=>$request->icon,
            'show_at_trending'=>$request->show_at_trending?$request->show_at_trending:0,
            'status'=>$request->status?$request->status:0,
            'parent_id'=>$course_category->id,
        ]);
        return redirect()->back();
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
        return view('admin.course.category.subcategory.edit',compact('course_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
