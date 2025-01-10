<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLanguage;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        $languages = CourseLanguage::paginate(10);
        return view('admin.course.language.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:course_languages,name,',
        ]);
        CourseLanguage::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ]);
        return redirect()->route('admin.course-language.index')->with('success', 'Course Language created successfully.');
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
    public function edit(CourseLanguage $course_language)
    {
        return view('admin.course.language.edit',compact('course_language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,CourseLanguage $course_language)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:course_languages,name,' .$course_language->id,
        ]);
        $course_language->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.course-language.index')->with('success', 'Course Language updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseLanguage $course_language)
    {
        try {
            $course_language->delete();
            return redirect()->route('admin.course-language.index')->with('success', 'Course Language deleted successfully.');
        }catch (QueryException $e){
            return response(['message'=>'Some thing is wrong.','errors'=>[$e->getMessage()]],500);
        }

    }
}
