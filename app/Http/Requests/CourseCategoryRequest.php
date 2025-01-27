<?php

namespace App\Http\Requests;

use App\Models\CourseCategory;
use Illuminate\Foundation\Http\FormRequest;

class CourseCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $courseCategory = $this->route('course_category')?->id;
        $courseCategoryId = is_object($courseCategory)?$courseCategory->id:$courseCategory;
        return [
            'name' => 'required|unique:course_categories,name,'.$courseCategoryId,
            'icon' => 'required|nullable|string',
            'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'show_at_trending' =>'sometimes|nullable|boolean',
            'status' => 'sometimes|nullable|boolean',
            'slug' => 'nullable|string|unique:course_categories,slug,'.$courseCategoryId,
            'parent_id' => 'sometimes|nullable|integer',
        ];
    }
}
