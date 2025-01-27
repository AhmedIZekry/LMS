<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLevel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        $courseLevels = CourseLevel::paginate(15);
        return view('admin.course.level.index',compact('courseLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required|string',
        ]);
        CourseLevel::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);
        return redirect(route('admin.course-level.index'))->with(['success'=>'Your course leve has been created successfully']);
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
    public function edit(CourseLevel $course_level)
    {
        return view('admin.course.level.edit',compact('course_level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,CourseLevel $course_level)
    {
        $request->validate([
            'name'=>'required|string|unique:course_levels,name,' .$course_level->id,
        ]);

        $course_level->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);
        return redirect()->route('admin.course-level.index')->with('success', 'Course Level updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseLevel $course_level)
    {
        $course_level->delete();
        return redirect()->route('admin.course-level.index')->with('success', 'Course Level Deleted successfully.');
    }
}
